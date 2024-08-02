# WP-CLI Convert MyISAM to InnoDB

A WP-CLI command to convert MyISAM tables to InnoDB in WordPress.

## Description

This plugin provides a WP-CLI command to convert MyISAM tables to InnoDB. It helps in optimizing your WordPress database by changing the storage engine of MyISAM tables to InnoDB.

## Installation

1. Place the `wp-cli-convert-myisam-to-innodb.php` file in the `wp-content/mu-plugins` directory of your WordPress installation.

2. Ensure that WP-CLI is installed and accessible on your server.

## Usage

After installing the plugin, you can use the following command to convert MyISAM tables to InnoDB:

```bash
wp convert myisam-to-innodb
