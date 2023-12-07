<?php

namespace example;

// code example of data manipulation for arrays and output
class CodeExampleTwo
{
    // take result from database for family records and organize the data in an array
    function mtd_familie_onderhoud($records)
    {
        $obj_sanitize = new Sanitize();
        $obj_output_adjustment = new OutputAdjustment;
        foreach ($records as $record) {
            foreach ($record as $key => $row) {
                $key = $obj_sanitize->mtd_sfi($key);
                $row = $obj_sanitize->mtd_sfi($row);
                if (false !== $key && false !== $row) {
                    $records[$key] = $row;
                    if ('id' == $key || 'persoonsnaam' == $key || 'soort_lid' == $key || 'geboortedatum' == $key) {
                        if ('geboortedatum' == $key) {
                            $row = $obj_output_adjustment->mtd_human_readable_date($row);
                        }
                        $familieleden[$key] = $row;
                    }
                }
            }
            if (!empty($records['familienaam']) && !empty($records['familie_id']) && isset($familieleden)) {
                $familie_overzicht[$records['adres']]['familienaam'] = $records['familienaam'];
                $familie_overzicht[$records['adres']]['familie_id'] = $records['familie_id'];
                $familie_overzicht[$records['adres']]['familieleden'][] = $familieleden;
            }
        }
        if (isset($familie_overzicht)) {
            return $familie_overzicht;
        } else {
            return false;
        }
    }
}
