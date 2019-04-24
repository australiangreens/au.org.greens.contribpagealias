# au.org.greens.contribpagealias

![Screenshot](/images/screenshot.png)

This extension adds support for creating pretty aliases for CiviCRM contribution pages

The extension is licensed under [AGPL-3.0](LICENSE.txt).

## Requirements

* PHP v5.4+
* CiviCRM 5.8+
* [CiviCRM Entity Settings extension](https://civicrm.org/extensions/civicrm-entity-settings)
* Drupal 7

## Installation (Web UI)

This extension has not yet been published for installation via the web UI.

## Installation (CLI, Zip)

Sysadmins and developers may download the `.zip` file for this extension and
install it with the command-line tool [cv](https://github.com/civicrm/cv).

```bash
cd <extension-dir>
cv dl au.org.greens.contribpagealias@https://github.com/australiangreens/au.org.greens.contribpagealias/archive/master.zip
```

## Installation (CLI, Git)

Sysadmins and developers may clone the [Git](https://en.wikipedia.org/wiki/Git) repo for this extension and
install it with the command-line tool [cv](https://github.com/civicrm/cv).

```bash
git clone https://github.com/australiangreens/au.org.greens.contribpagealias.git
cv en contribpagealias
```

## Usage

Enable the extension. Now when creating Contribution Pages in Civi it is possible to specify a URL alias. If specified, the extension will call the Drupal path module to create/update a URL alias for the contribution page.

This means you can create Contribution Pages that have URLs like https://civicrm.example.org/donate-now instead of the standard https://civicrm.example.org/civicrm/contribute/transact?id=1&reset=1

## Details

This extension uses Symfony event handlers to watch for Contribution Page edit and delete events. When detected it calls the Drupal functions path_load, path_save, etc., to manage URL aliases.

## Known Issues

Limitations in the CiviCRM create workflow for Contribution Pages means it is not possible to succesfully set the alias at the same time as the contribution page is created. It is only possible to set it during an 'edit' operation for an existing page.

This extension makes use of the [CiviCRM Entity Settings extension](https://civicrm.org/extensions/civicrm-entity-settings) by Eileen McNaughton. This is no longer a recommended way of adding custom settings/fields to CiviCRM base entities.

This will be refactored in future.
