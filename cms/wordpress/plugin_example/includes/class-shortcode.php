<?php

declare(strict_types=1);

namespace Plugin_Example\Includes;

use Plugin_Example\Includes\Example_Table;
use Plugin_Example\Styles\HTML\Shortcode_HTML;

class Shortcode 
{
    /**
     * Shortcode to display records in an unordened list
     * 
     * @return string
     */
    public static function display_records_shortcode(): string
    {
        $records = Example_Table::get_all_records_example_table();
        $result  = Shortcode_HTML::display_records_shortcode_html( $records );

        return $result;
    }
}
