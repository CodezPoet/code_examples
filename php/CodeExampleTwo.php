<?php

// Path/To/Example/CodeExampleTwo.php
namespace Path\To\Example;

use Path\To\Sanitize;
use Path\To\OutputAdjustment;

class CodeExampleTwo
{
    /*
    * The data is coming from a multiple join query in SQL and needs to be prepared for the wished HTML output
    * Check if the data is save and if is organize the data in an array for the HTML, else return false 
    * This could be run as a Service for a Controller for example
    */
     function mtd_familie_overview($records)
    {
        $obj_sanitize = new Sanitize();
        $obj_output_adjustment = new OutputAdjustment;
        foreach ($records as $record) {
            foreach ($record as $key => $row) {
                $key = $obj_sanitize->mtd_sfi($key);
                $row = $obj_sanitize->mtd_sfi($row);
                if(false === $key && false === $row) {
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
