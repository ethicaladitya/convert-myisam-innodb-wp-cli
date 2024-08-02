<?php
/**
 * Plugin Name: WP-CLI Convert MyISAM to InnoDB
 * Description: A WP-CLI command to convert MyISAM tables to InnoDB.
 * Version: 1.0
 * Author: Aditya Shah
 * Author URI: https://adityashah.dev
 * License: GPLv2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */

if ( defined( 'WP_CLI' ) && WP_CLI ) {
    /**
     * Convert MyISAM tables to InnoDB.
     *
     * ## EXAMPLES
     *
     *     wp convert myisam-to-innodb
     *
     * @when after_wp_load
     */
    WP_CLI::add_command( 'convert myisam-to-innodb', function() {
        global $wpdb;

        // Get all MyISAM tables
        $tables = $wpdb->get_results( "SHOW TABLE STATUS WHERE Engine = 'MyISAM'", ARRAY_A );

        if ( empty( $tables ) ) {
            WP_CLI::success( "No MyISAM tables found." );
            return;
        }

        // Loop through each table and convert to InnoDB
        foreach ( $tables as $table ) {
            $table_name = $table['Name'];
            WP_CLI::log( "Converting {$table_name} to InnoDB..." );

            // Prepare the query with a placeholder
            $query = $wpdb->prepare( "ALTER TABLE %s ENGINE=InnoDB", $table_name );

            $result = $wpdb->query( $query );

            if ( $result !== false ) {
                WP_CLI::success( "Converted {$table_name} to InnoDB." );
            } else {
                WP_CLI::error( "Failed to convert {$table_name} to InnoDB." );
            }
        }
    });
}
