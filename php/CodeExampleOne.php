<?php

namespace Vendor\Path\Examples;

use Vendor\Path\Sanitize;
use Vendor\Path\OutputAdjustment;

class CodeExampleOne
{
    /*
    * The data is coming from a multiple join query in SQL and needs to be prepared for the wished HTML output
    * Check if the data is safe for HTML output and if is organize the data in an array, else return false 
    */
    public function mtdFamilieOverview($records)
    {
        $objSanitize = new Sanitize();
        $objOutputAdjustment = new OutputAdjustment;
        foreach ($records as $record) {
            foreach ($record as $key => $row) {
                $key = $objSanitize->mtdSanitizeData($key);
                $row = $objSanitize->mtdSanitizeData($row);
                if (false === $key && false === $row) {
                    return false;
                }
                $records[$key] = $row;
                if ('id' === $key || 'persoonsnaam' === $key || 'soort_lid' === $key || 'geboortedatum' === $key) {
                    if ('geboortedatum' == $key) {
                        $row = $objOutputAdjustment->mtdHumanReadableDate($row);
                    }
                    $familieleden[$key] = $row;
                }
            }
            $familieOverzicht[$records['adres']]['familienaam'] = $records['familienaam'];
            $familieOverzicht[$records['adres']]['familie_id'] = $records['familie_id'];
            $familieOverzicht[$records['adres']]['familieleden'][] = $familieleden;
        }
        return $familieOverzicht;
    }
}
