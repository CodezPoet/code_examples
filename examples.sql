
Example 1:  An example of a joined query 

SELECT tn.custom_field_2, cf.custom_field_3, group_concat(n.custom_field_4 separator ', '), group_concat(nr.custom_field_5 separator ', ')
FROM database_1.table_1 n
LEFT JOIN database_1.table_2 tn ON n.nid = tn.nid
LEFT JOIN database_1.table_3 nr ON n.nid = nr.nid
LEFT JOIN database_2.table_4 cf ON n.nid = cf.nid
WHERE n.custom_field_8 = '%d'
GROUP BY n.custom_field_10
ORDER BY n.date_created DESC

Example 2:  Search for the word "and" in WordPress posts.
            Count how many times the word "and" occurs in a post, show the count, and order by descending count

SELECT ID,
    post_title,
    post_content,
    LENGTH(post_content) - LENGTH(REPLACE(post_content, 'and', '')) AS and_count
FROM wp_posts
WHERE post_type = 'post'
  AND post_status = 'publish'
  AND post_content LIKE '%and%'
ORDER BY and_count DESC;
