<?php

/**
 * 
 * @package au.org.greens.contribpagealias
 * @copyright The Australian Greens
 *
 * Settings metadata file
 */

return array(
  array(
    'key' => 'au.org.greens.contribpagealias',
    'entity' => 'contribution_page',
    'name' => 'url_alias',
    'type' => 'Text',
    'html_type' => 'Text',
    'add' => '1.0',
    'title' => 'Page URL alias',
    'description' => 'What URL alias do you want for your contribution page (optional)?',
    'help_text' => 'Contribution pages can be configured to have a more human readable URL alias or path, such as /qld/donate, /act/support-tim-hollo, etc.',
    'add_to_setting_form' => TRUE,
    'form_child_of_parents_parent' => 'is_confirm_enabled',
  ),
);
