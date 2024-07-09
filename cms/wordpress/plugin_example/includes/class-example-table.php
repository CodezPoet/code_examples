<?php

declare(strict_types=1);

namespace Plugin_Example\Includes;

class Example_Table 
{
  /**
   * The Example Table Version
   * 
   * @var string
   */
  private static $example_table_version = '1.0';

  /**
   * The example table name
   * 
   * @var string
   */
  private static $table_name = 'example_table';

  /**
   * Create table for the code example
   * 
   * @return void
   */
  public static function create_example_table(): void
  {
    global $wpdb;
    $charset_collate = $wpdb->get_charset_collate();
    $table_name      = $wpdb->prefix . self::$table_name;
    $sql             = "CREATE TABLE $table_name (
		id mediumint(9) NOT NULL AUTO_INCREMENT,
		created_at datetime DEFAULT CURRENT_TIMESTAMP NOT NULL,
		name tinytext NOT NULL,
		description text NOT NULL,
    post_type varchar(55) NOT NULL,
    acf_field_example text NOT NULL,
		url varchar(55) DEFAULT '' NOT NULL,
		PRIMARY KEY  (id),
    INDEX created_at_index (created_at),
    INDEX name_index (name),
    INDEX post_type_index (post_type),  
    FULLTEXT INDEX description_search (description)
	)
   $charset_collate;";
    require_once ABSPATH . 'wp-admin/includes/upgrade.php';
    dbDelta( $sql );
    add_option( 'example_plugin_db_version', self::$example_table_version );
  }

  /**
   * Drop the table for the code example
   * 
   * @return void
   */
  public static function drop_example_table(): void
  {
    global $wpdb;
    $table_name = $wpdb->prefix . self::$table_name;
    $sql        = "DROP TABLE IF EXISTS $table_name";
    $wpdb->query( $sql );
  }

  /**
   * Get all the records for the example Table
   * 
   * @return array
   */
  public static function get_all_records_example_table(): array
  {
    global $wpdb;
    $table_name = $wpdb->prefix . self::$table_name;

    return $wpdb->get_results( $wpdb->prepare( "SELECT * FROM $table_name" ) );
  }

  /**
   * Get the filtered records for the REST API response 
   * from the example table
   * 
   * @param mixed $request
   * 
   * @return mixed
   */
  public function get_filtered_records( string $filter_column = '', string $filter_value = '' ): mixed
  {
    global $wpdb;
    $table_name = $wpdb->prefix . self::$table_name;
    if ( empty( $filter_column ) || empty( $filter_value ) ) {
      return new \WP_Error( 'missing_params', 'Filter column and filter value are required', [ 'status' => 400 ] );
    }
    $allowed_columns = [ 'id', 'name', 'text', 'url' ];
    if ( ! in_array( $filter_column, $allowed_columns ) ) {
      return new \WP_Error( 'rest_invalid_param', 'Invalid filter column', [ 'status' => 400 ] );
    }
    $results = $wpdb->get_results(
      $wpdb->prepare(
        "SELECT * FROM $table_name WHERE `$filter_column` = %s",
        esc_sql( $filter_value )
      )
    );

    return $results;
  }

  /**
   * Example data for the code example
   * 
   * @return void
   */
  public static function example_data(): void
  {
    global $wpdb;
    $example_name              = 'example name';
    $example_text              = [ 
      'Wij bouwen websites die sales of leads genereren en processen automatiseren.',
      'Met een team van 20 professionals en ruim 23 jaar ervaring.',
      'Ervaar de kracht van een website die écht waarde toevoegt.',
    ];
    $example_json_encoded_text = json_encode( $example_text );
    $example_post_type         = 'example_post_type';
    $example_url               = 'https://yourdomain.com/';
    $example_acf_field         = self::ACF_example_data();
    $table_name                = $wpdb->prefix . self::$table_name;
    $wpdb->insert(
      $table_name,
      [ 
        'created_at'        => current_time( 'mysql' ),
        'name'              => $example_name,
        'description'       => $example_json_encoded_text,
        'url'               => $example_url,
        'acf_field_example' => $example_acf_field,
        'post_type'         => $example_post_type,

      ]
    );
  }

  /**
   * Create some Advance Custom Fields example data
   * to use in the example data for the table
   * 
   * @return string
   */
  public static function ACF_example_data(): string
  {
    $plain_text_value = '';
    $post_id          = 8;
    $field_name       = 'field_668b60377d297';
    $field_value      = get_field( $field_name, $post_id );
    if ( is_array( $field_value ) ) {
      $plain_text_value = json_encode( $field_value );
    } else {
      $plain_text_value = wp_filter_nohtml_kses( $field_value );
    }

    return $plain_text_value;
  }
}
