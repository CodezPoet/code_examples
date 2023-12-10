<?php

/*
 * Reads from YouTube XML and converts it to array for the fields chosen
 */
function youtube_interpret_xml($api_url_list, $department_choice)
{
    if (!empty($api_url_list)) {
        $i = 0;
        foreach ($api_url_list as $url) {
            $i ++;
            if ($url) {
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
                curl_setopt($ch, CURLOPT_TIMEOUT, 60);
                curl_setopt($ch, CURLOPT_URL, $url);
                $xml = curl_exec($ch);
                curl_close($ch);
                unset($ch);
                if ($xml) {
                    $sxml = simplexml_load_string($xml);
                    if ($sxml) {
                        $ns = $sxml->getNameSpaces(true);
                    }
                    unset($xml);
                }
            }

            if ($sxml) {
                $c = 0;
                foreach ($sxml->entry as $entry) {
                    if ($entry) {
                        $c++;
                        $source_name = sanitize_text_field(strip_tags($sxml->author->name));
                        $source_url = allowed_video_url_and_sanitation_youtube($sxml->author->uri);
                        $video_title = sanitize_text_field(strip_tags($entry->title));
                        $video_published = scf_convert_youtube_date($entry->published);
                        $video_link = allowed_video_url_and_sanitation_youtube($entry->link->attributes()->href);
                        $categories = scf_category($video_title, $department_choice);
                        $sub_categories = scf_sub_category($video_title, $department_choice);
                        $group = $entry->children($ns["media"]);
                        $group = $group->group;
                        $attrs = $group->thumbnail->attributes();
                        $video_thumbnail = allowed_image_url_and_sanitation_youtube($attrs['url']);
                        if ($source_name && $source_url && $video_title && $video_published && $video_link && $video_thumbnail && $categories) {
                            $video_data_list[$i][$c]['source_name'] = $source_name;
                            $video_data_list[$i][$c]['source_url'] = $source_url;
                            $video_data_list[$i][$c]['video_title'] = $video_title;
                            $video_data_list[$i][$c]['published'] = $video_published;
                            $video_data_list[$i][$c]['video_link'] = $video_link;
                            $video_data_list[$i][$c]['video_id'] = str_replace("https://www.youtube.com/watch?v=", "", $video_link);
                            $video_data_list[$i][$c]['video_thumbnail'] = $video_thumbnail;
                            $video_data_list[$i][$c]['category'] = $categories;
                            $video_data_list[$i][$c]['sub_category'] = $sub_categories; 
                           
                        }
                    }
                }
                unset($sxml);
            }
        }
        if ($video_data_list) {
                foreach ($video_data_list as $video_data) {
                foreach ($video_data as $data) {
                    $data = filter_type_videos($data, $department_choice);
                    if ($data) {
                        $result[] = $data;
                    }
                }
            }
        }
        return $result;
    }
