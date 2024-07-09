<?php

declare(strict_types=1);

namespace Plugin_Example\Styles\HTML;

class Shortcode_HTML 
{
    /**
     * Shortcode HTML to display records in an unordened list
     * 
     * @param array $records a list of records from the example table
     * 
     * @return string an unordened list with the records
     */
    public static function display_records_shortcode_html( array $records = [] ): string
    {
        if ( empty( $records ) ) {
            return '<p>No records were found</p>';
        }
        $result = '<ul>';
        foreach ( $records as $record ) {
            $result .= '<li class="name">' . esc_html( $record->name ) . '</li>';
            $result .= '<ul>';
            $result .= '<li class="text">' . esc_html( implode( ' ', json_decode( $record->description, true ) ) ) . '</li>';
            $result .= '</ul>';
        }
        $result .= '</ul>';

        return $result;
    }
}
