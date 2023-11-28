<?php

namespace example;

// code example of data manipulation for arrays and output
class CodeExampleTwo
{

    // take information from xml request, sanitize the data, and put it in an array
    function mtd_xml($xml)
    {
        $obj_sanitize = new Sanitize();
        $obj_output_adjustment = new OutputAdjustment();
        $obj_keywords_processor = new KeywordsProcessor();
        $c = 0;
        foreach ($xml->entry as $entry) {
            $c++;
            $source_name = $obj_sanitize->mtd_sfi((string)$xml->author->name);
            $source_url = $obj_sanitize->mtd_youtube_url($xml->author->uri);
            $video_title = $obj_sanitize->mtd_sfi((string)$entry->title);
            $tags = $obj_keywords_processor->mtd_tags($video_title);
            $video_published_date = $obj_output_adjustment->youtube_date($entry->published);
            $video_link = $obj_sanitize->mtd_youtube_url($entry->link->attributes()->href);
            if (false !== $source_name && false !== $source_url && false !== $video_title && false !== $tags && false !== $video_published_date && false !== $video_link) {
                $list[$c]['source_name'] = $source_name;
                $list[$c]['source_url'] = $source_url;
                $list[$c]['video_title'] = $video_title;
                $list[$c]['published'] = $video_published_date;
                $list[$c]['video_link'] = $video_link;
                $list[$c]['tags'] = $tags;
            }
        }
        if (isset($list)) {
            return $list;
        } else {
            return false;
        }
    }

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
