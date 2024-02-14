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

  // Register Symfony listeners for CiviCRM hooks
  Civi::service('dispatcher')->addListener('civi.dao.postDelete', 'contribpagealias_symfony_civicrm_postDelete', -100);
  Civi::service('dispatcher')->addListener('hook_civicrm_validateForm', 'contribpagealias_symfony_civicrm_validateForm', -100);
  Civi::service('dispatcher')->addListener('hook_civicrm_pre', 'contribpagealias_symfony_civicrm_pre', -100);
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

function contribpagealias_symfony_civicrm_pre($event) {
  if ( $event->action == 'edit' && $event->entity == 'ContributionPage') {
    $alias = $event->params['au-org-greens-contribpagealias__url_alias'];
    if (!empty($alias)) {
      $path = 'civicrm/contribute/transact';
      $pathParams = 'id=' . $event->id . '&reset=1';
      // Switch on CMS version to call appropriate code
      switch (CRM_Core_Config::singleton()->userFramework) {
        case "Drupal": 
          CRM_Contribpagealias_Drupal::pre($path, $alias, $pathParams);
          break;
        case "Drupal8":
          CRM_Contribpagealias_Drupal8::pre($path, $alias, $pathParams);
          break;
      }
    }
  }
  return;
}

function contribpagealias_symfony_civicrm_postDelete($event) {
  $obj =& $event->object;
  if (get_class($obj) == 'CRM_Contribute_DAO_ContributionPage') {
    $pageId = $obj->id;
    // Delete URL alias if one exists
    $path = 'civicrm/contribute/transact';
    $pathParams = 'id=' . $pageId . '&reset=1';
    switch (CRM_Core_Config::singleton()->userFramework) {
      case "Drupal":
        CRM_Contribpagealias_Drupal::postDelete($path, $pathParams);
        break;
      case "Drupal8":
        CRM_Contribpagealias_Drupal8::postDelete($path, $pathParams);
        break;
    }
    $result = civicrm_api3('entity_setting', 'delete', [
      'entity_id' => $pageId,
      'entity_type' => 'contribution_page',
      'key' => 'au.org.greens.contribpagealias',
    ]);
  }
}

function contribpagealias_symfony_civicrm_validateForm($event) {
  if ($event->formName == "CRM_Contribute_Form_ContributionPage_Settings") {
    $matches = [];
    $alias = $event->fields['au-org-greens-contribpagealias__url_alias'];
    if (preg_match('/^(\/)*(.*)/', $alias, $matches)) {
      $alias = $matches[2];
    }
    if (!empty($alias)) {
      // Does the alias already exist
      $path = "";
      switch (CRM_Core_Config::singleton()->userFramework) {
        case "Drupal":
          $path = CRM_Contribpagealias_Drupal::getPath($alias);
          break;
        case "Drupal8":
          $path = CRM_Contribpagealias_Drupal8::getPath($alias);
          break;
        }
      if (!empty($path) && preg_match('/id=([0-9]+)/', $path, $matches)) {
        // If the alias is used for another form, throw an error
        if (!($event->form->getVar('_id') == $matches[1])) {
          $event->errors['au-org-greens-contribpagealias__url_alias'] = E::ts('Alias already in use');
        }
      }
    }
  }
}
