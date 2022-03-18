<?php

class CRM_Contribpagealias_Drupal8 {

  public static function pre($source, $alias): void {
    // Check if an alias already exists
    $existing_alias = \Drupal::entityTypeManager()->getStorage('path_alias')->loadByProperties(['path' => $source]);
    if (!empty($existing_alias)) {
      if ($alias == $existing_alias) {
        return;
      }
      // It's different, so we delete the existing alias
      \Drupal::entityTypeManager()->getStorage('path_alias')->delete([$alias]);
    }
    if (!empty($alias)) {
      // If alias isn't empty, create new alias
      $new_alias = \Drupal::entityTypeManager()->getStorage('path_alias')->create($alias);
      $new_alias->save();
    }
  }

  /*
   * Delete URL aliases for a supplied source path
   *
   * @source string
   */
  public static function postDelete($source): void {
    $aliases = \Drupal::entityTypeManager()->getStorage('path_alias')->loadByProperties(['path' => $source]);
    foreach ($aliases as $alias) {
      \Drupal::entityTypeManager()->getStorage('path_alias')->delete([$alias]);
    }
    return;
  }

  public static function getSource($alias): string {
    return "string";
  }
}
