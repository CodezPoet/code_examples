<?php

namespace Vendor\Path\Examples;

use Vendor\Path\Sanitize;
use Vendor\Path\OutputAdjustment;

// Code Example of a Class with a Method
class CodeExampleOne
{
    /**
     * Prepare data from a multiple join SQL query for safe HTML output.
     * 
     *  @see for a screenshot of the HTML output that this prepares: https://github.com/CodezPoet/code_examples/blob/main/php/familieleden_overzicht_screenshot.png
     * 
     * @param mixed $records The data from the SQL query.
     * 
     * @return array|false If safe for HTML output, returns an array; otherwise, returns false.
     */
    public function mtd_familie_onderhoud($records)
    {
        $obj_sanitize = new Sanitize();
        $obj_output_adjustment = new OutputAdjustment;
        foreach ($records as $record) {
            foreach ($record as $key => $row) {
                $key = $obj_sanitize->mtd_sfi($key);
                $row = $obj_sanitize->mtd_sfi($row);
                if (false === $key && false === $row) {
                    return false;
                }
                $records[$key] = $row;
                if ('id' === $key || 'persoonsnaam' === $key || 'soort_lid' === $key || 'geboortedatum' === $key) {
                    if ('geboortedatum' == $key) {
                        $row = $obj_output_adjustment->mtd_human_readable_date($row);
                    }
                    $familieleden[$key] = $row;
                }
            }
            $familie_overzicht[$records['adres']]['familienaam'] = $records['familienaam'];
            $familie_overzicht[$records['adres']]['familie_id'] = $records['familie_id'];
            $familie_overzicht[$records['adres']]['familieleden'][] = $familieleden;
        }
        return $familie_overzicht;
    }
}
