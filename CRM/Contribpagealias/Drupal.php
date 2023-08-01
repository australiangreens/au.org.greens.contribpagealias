<?php

class CRM_Contribpagealias_Drupal {

  public static function pre(string $path, string $alias, string $pathParams): void {
    // Check if an alias already exists
    $path_alias = path_load($path . '?' . $pathParams);
    if ($path_alias) {
      // If it's the same, no action
      if ($path_alias['alias'] == $alias) {
        return;
      }
      // It's different, so delete the existing
      path_delete($path_alias['pid']);
    }

    if (!empty($alias)) {
      // If alias isn't empty, create new alias
      $new_path = ['source'=> $path, 'alias' => $alias];
      path_save($new_path);
    }
  }

  public static function postDelete(string $path, string $pathParams): void {
    $path_alias = path_load($path . '?' . $pathParams);
    if ($path_alias) {
      path_delete($path_alias['pid']);
    }
  }

  public static function getPath(string $alias): string {
    return drupal_lookup_path('source', $alias);
  }
}
