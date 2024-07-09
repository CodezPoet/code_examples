<?php

declare(strict_types=1);

namespace Plugin_Example\Includes;

use Plugin_Example\Includes\Example_Table;

class WP_REST_API 
{
    /**
     * Summary of __construct
     * 
     * @param \Plugin_Example\Includes\Example_Table $example_table
     */
    public function __construct(
        public Example_Table $example_table,
    ) {}

    /**
     * Register the custom route in the class
     * 
     * @return void
     */
    public function register_custom_rest_routes(): void
    {
        register_custom_plugin_rest_route();
    }

    /**
     * Show filtered records
     * 
     * @link: https://yourdomain.com/wp-json/custom-plugin/v1/records?filter_column=id&filter_value=1
     * 
     * @param mixed $request
     * 
     * @return mixed
     */
    public function show_filtered_records( mixed $request ): object
    {
        $filter_column = $request->get_param( 'filter_column' );
        $filter_value  = $request->get_param( 'filter_value' );
        $records       = $this->example_table->get_filtered_records( $filter_column, $filter_value );

        return rest_ensure_response( $records );
    }
}
