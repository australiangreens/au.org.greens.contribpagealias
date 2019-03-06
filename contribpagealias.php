<?php

require_once 'contribpagealias.civix.php';
use CRM_Contribpagealias_ExtensionUtil as E;

/**
 * Implements hook_civicrm_config().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_config
 */
function contribpagealias_civicrm_config(&$config) {
  _contribpagealias_civix_civicrm_config($config);
}

/**
 * Implements hook_civicrm_xmlMenu().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_xmlMenu
 */
function contribpagealias_civicrm_xmlMenu(&$files) {
  _contribpagealias_civix_civicrm_xmlMenu($files);
}

/**
 * Implements hook_civicrm_install().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_install
 */
function contribpagealias_civicrm_install() {
  _contribpagealias_civix_civicrm_install();
}

/**
 * Implements hook_civicrm_postInstall().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_postInstall
 */
function contribpagealias_civicrm_postInstall() {
  _contribpagealias_civix_civicrm_postInstall();
}

/**
 * Implements hook_civicrm_uninstall().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_uninstall
 */
function contribpagealias_civicrm_uninstall() {
  _contribpagealias_civix_civicrm_uninstall();
}

/**
 * Implements hook_civicrm_enable().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_enable
 */
function contribpagealias_civicrm_enable() {
  _contribpagealias_civix_civicrm_enable();
}

/**
 * Implements hook_civicrm_disable().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_disable
 */
function contribpagealias_civicrm_disable() {
  _contribpagealias_civix_civicrm_disable();
}

/**
 * Implements hook_civicrm_upgrade().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_upgrade
 */
function contribpagealias_civicrm_upgrade($op, CRM_Queue_Queue $queue = NULL) {
  return _contribpagealias_civix_civicrm_upgrade($op, $queue);
}

/**
 * Implements hook_civicrm_managed().
 *
 * Generate a list of entities to create/deactivate/delete when this module
 * is installed, disabled, uninstalled.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_managed
 */
function contribpagealias_civicrm_managed(&$entities) {
  _contribpagealias_civix_civicrm_managed($entities);
}

/**
 * Implements hook_civicrm_caseTypes().
 *
 * Generate a list of case-types.
 *
 * Note: This hook only runs in CiviCRM 4.4+.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_caseTypes
 */
function contribpagealias_civicrm_caseTypes(&$caseTypes) {
  _contribpagealias_civix_civicrm_caseTypes($caseTypes);
}

/**
 * Implements hook_civicrm_angularModules().
 *
 * Generate a list of Angular modules.
 *
 * Note: This hook only runs in CiviCRM 4.5+. It may
 * use features only available in v4.6+.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_angularModules
 */
function contribpagealias_civicrm_angularModules(&$angularModules) {
  _contribpagealias_civix_civicrm_angularModules($angularModules);
}

/**
 * Implements hook_civicrm_alterSettingsFolders().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_alterSettingsFolders
 */
function contribpagealias_civicrm_alterSettingsFolders(&$metaDataFolders = NULL) {
  _contribpagealias_civix_civicrm_alterSettingsFolders($metaDataFolders);
}

/**
 * Implements hook_civicrm_entityTypes().
 *
 * Declare entity types provided by this module.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_entityTypes
 */
function contribpagealias_civicrm_entityTypes(&$entityTypes) {
  _contribpagealias_civix_civicrm_entityTypes($entityTypes);
}

// --- Functions below this ship commented out. Uncomment as required. ---

/**
 * Implements hook_civicrm_preProcess().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_preProcess
 *
function contribpagealias_civicrm_preProcess($formName, &$form) {

} // */

/**
 * Implements hook_civicrm_navigationMenu().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_navigationMenu
 *
function contribpagealias_civicrm_navigationMenu(&$menu) {
  _contribpagealias_civix_insert_navigation_menu($menu, 'Mailings', array(
    'label' => E::ts('New subliminal message'),
    'name' => 'mailing_subliminal_message',
    'url' => 'civicrm/mailing/subliminal',
    'permission' => 'access CiviMail',
    'operator' => 'OR',
    'separator' => 0,
  ));
  _contribpagealias_civix_navigationMenu($menu);
} // */

function contribpagealias_civicrm_alterEntitySettingsFolders(&$folders) {
  static $configured = FALSE;
  if ($configured) {
    return;
  }
  $configured = TRUE;

  $extRoot = dirname(__FILE__) . DIRECTORY_SEPARATOR;
  $extDir = $extRoot . 'settings';
  if (!in_array($extDir, $folders)) {
    $folders[] = $extDir;
  }
}

function contribpagealias_civicrm_pre($op, $objectName, $id, &$params) {
  watchdog('alias', 'op: %op obj: %obj', array('%op'=>$op, '%obj'=>$objectName), WATCHDOG_DEBUG);
  if (!($objectName == 'ContributionPage')) {
    return;
  }

  $alias = $params['au-org-greens-contribpagealias__url_alias'];
  $source = 'civicrm/contribute/transact?id=' . $id . '&reset=1';

  // Create the alias
  if ($op == 'edit') {
    // If the alias already exists we simply finish
    if (drupal_lookup_path('source', $alias)) {
      return;
    }
    $path = array('source'=> $source, 'alias' => $alias);
    path_save($path);
    return;
  }

  // If we're deleting the page, we should delete the alias
  if ($op == 'delete') {
    $path = path_load($source);
    if ($path) {
      path_delete($path['pid']);
    }
  }
  return;
}

function contribpagealias_civicrm_post($op, $objectName, $id, &$params) {
  if ($op == 'create' && $objectName == 'ContributionPage') {
    watchdog('alias', 'pars: %p', array('%p'=>print_r($params,TRUE)), WATCHDOG_DEBUG);
  }
}

function contribpagealias_civicrm_validateForm($formName, &$fields, &$files, &$form, &$errors) {
  if ($formName == "CRM_Contribute_Form_ContributionPage_Settings") {
    $alias = $fields['au-org-greens-contribpagealias__url_alias'];
    // Trim any leading slashes
    if (preg_match('/^(\/)+(.*)/', $alias, $matches)) {
      $alias = $matches[2];
    }
    if (!empty($alias)) {
      // Does the alias already exist
      $aliasSource = drupal_lookup_path('source', $alias);
      if (!empty($aliasSource) && preg_match('/id=([0-9]+)/', $aliasSource, $matches)) {
        // If the alias is used for another form, throw an error
        if (!($form->getVar('_id') == $matches[1])) {
          $errors['au-org-greens-contribpagealias__url_alias'] = ts('Alias already in use');
        }
      }
    }
  }
}
