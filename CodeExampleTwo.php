<?php

namespace example;

//  code example of data manipulation for arrays and output
class CodeExampleTwo
{
    // take information from xml request, sanitize the data, and put it in an array
    function mtd_xml($xml, $category)
    {
        $obj_sanitize = new Sanitize();
        $obj_output_adjustment = new OutputAdjustment();
        $obj_keywords_processor = new KeywordsProcessor();
        $ns = $xml->getNameSpaces(true);
        $c = 0;
        foreach ($xml->entry as $entry) {
            $c++;
            $source_name = $obj_sanitize->mtd_sfi((string)$xml->author->name);
            $source_url = $obj_sanitize->mtd_youtube_url($xml->author->uri);
            $video_title = $obj_sanitize->mtd_sfi((string)$entry->title);
            $tags = $obj_keywords_processor->mtd_tags($video_title);
            $video_published_date = $obj_output_adjustment->youtube_date($entry->published);
            $video_link = $obj_sanitize->mtd_youtube_url($entry->link->attributes()->href);
            $group = $entry->children($ns["media"]);
            $group = $group->group;
            $attrs = $group->thumbnail->attributes();
            $video_thumbnail = $obj_sanitize->mtd_youtube_url($attrs['url']);
            $list[$c]['source_name'] = $source_name;
            $list[$c]['source_url'] = $source_url;
            $list[$c]['video_title'] = $video_title;
            $list[$c]['published'] = $video_published_date;
            $list[$c]['video_link_original'] = $video_link;
            $list[$c]['video_link_no_cookie'] = str_replace("https://www.youtube.com/watch?v=", "https://www.youtube-nocookie.com/embed/", $video_link . '?feature=oembed');
            $list[$c]['video_thumbnail'] = $video_thumbnail;
            $list[$c]['category'] = $category;
            $list[$c]['tags'] = $tags;
        }
        return $list;
    }
    
   // resultaat uit database voor het voorpagina familie overzicht in array voor output 
    function mtd_familie_contributies($records)
    {
        $obj_sanitize = new Sanitize();
        foreach ($records as $record) {
            $familienaam = $obj_sanitize->mtd_sfi($record['familienaam']);
            $bedrag = $obj_sanitize->mtd_sfi($record['bedrag']);
            $boekjaar = $obj_sanitize->mtd_sfi($record['boekjaar']);
            $familie_bedrag[$boekjaar][$familienaam][] = $bedrag;
        }
        foreach ($familie_bedrag as $boekjaar => $familie) {
            foreach ($familie as $familienaam => $familieleden) {
                $familie_overzicht[$boekjaar][$familienaam] = array_sum($familieleden);
            }
        }
        return $familie_overzicht;
    }
  // resultaat uit database voor familie onderhoud in array voor output 
    function mtd_familie_onderhoud($records)
    {
        $obj_sanitize = new Sanitize();
        $obj_output_adjustment = new OutputAdjustment;
        foreach ($records as $record) {
            foreach ($record as $key => $row) {
                $key = $obj_sanitize->mtd_sfi($key);
                $row = $obj_sanitize->mtd_sfi($row);
                $records[$key] = $row;
                if ('id' == $key || 'persoonsnaam' == $key || 'soort_lid' == $key || 'geboortedatum' == $key) {
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
