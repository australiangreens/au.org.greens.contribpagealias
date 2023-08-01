<?php

class CRM_Contribpagealias_Drupal8 {

  public static function pre(string $path, string $alias, string $pathParams): void {
    $path = '/' . $path . '/?' . $pathParms;
    if ($alias <> '') {
      $alias = (substr($alias, 0, 1) === '/') ? $alias : '/' . $alias;
    }
    $alias_exists = FALSE;
    \Drupal::logger('contribpagealias')->debug('pre: %p %a', ['%p' => $path, '%a' => $alias]);
    // Get default langcode
    $langcode = \Drupal::service('language.default')->get()->getId();
    // Check if the alias already exists
    $existing_aliases = \Drupal::entityTypeManager()->getStorage('path_alias')->loadByProperties(['path' => $path]);
    if (!empty($existing_aliases)) {
      foreach ($existing_aliases as $existing_alias) {
        if ($existing_alias->getAlias() == $alias) {
          $alias_exists = TRUE;
          break;
        }
        // It's different, so we delete the existing alias
        \Drupal::entityTypeManager()->getStorage('path_alias')->delete([$existing_alias]);
      }
    }
    // If alias isn't empty, and doesn't alread exist, create new alias
    if (!empty($alias) && !$alias_exists) {
      $new_alias = \Drupal::entityTypeManager()->getStorage('path_alias')->create([
        'path' => $path,
        'alias' => $alias,
        'langcode' => $langcode,
      ]);
      $new_alias->save();
    }
  }

  /*
   * Delete URL aliases for a supplied path
   *
   * @path string
   */
  public static function postDelete(string $path, string $pathParams): void {
    $path = '/' . $path . '/?' . $pathParams;
    $existing_aliases = \Drupal::entityTypeManager()->getStorage('path_alias')->loadByProperties(['path' => $path]);
    foreach ($existing_aliases as $alias) {
      \Drupal::entityTypeManager()->getStorage('path_alias')->delete([$alias]);
    }
    return;
  }

  public static function getPath(string $alias): string {
    $alias = (substr($alias, 0, 1) === '/') ? $alias : '/' . $alias;
    $existing_aliases = \Drupal::entityTypeManager()->getStorage('path_alias')->loadByProperties(['alias' => $alias]);
    if (!empty($existing_aliases)) {
      $key = array_key_first($existing_aliases);
      return $existing_aliases[$key]->getPath();
    }
    return "";
  }
}
