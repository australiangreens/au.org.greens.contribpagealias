<?php

class CRM_Contribpagealias_Drupal {

  public static function pre($source, $alias): void {
    // Check if an alias already exists
    $path = path_load($source);
      if ($path) {
        // It's the same, no action
        if ($path['alias'] == $alias) {
          return;
        }
        // It's different, so delete the existing
        path_delete($path['pid']);
      }

      if (!empty($alias)) {
        // If alias isn't empty, create new alias
        $newPath = array('source'=> $source, 'alias' => $alias);
        path_save($newPath);
    }
  }

  public static function postDelete($source): void {
    $path = path_load($source);
    if ($path) {
      path_delete($path['pid']);
    }
  }

  public static function getSource($alias): string {
    return drupal_lookup_path('source', $alias);}
}
