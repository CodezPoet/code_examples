/* SQL Example 1: Joined query */
SELECT tn.custom_field_2, cf.custom_field_3, group_concat(n.custom_field_4 separator ', '), group_concat(nr.custom_field_5 separator ', ')
FROM database_1.table_1 n
  LEFT JOIN database_1.table_2 tn ON n.nid = tn.nid
  LEFT JOIN database_1.table_3 nr ON n.nid = nr.nid
  LEFT JOIN database_2.table_4 cf ON n.nid = cf.nid
WHERE n.custom_field_8 = '%d'
GROUP BY n.custom_field_10
ORDER BY n.date_created DESC

/* SQL Example 2: Compare two columns of the same name in two different tables and show the unmatched records */
SELECT phrase 
FROM (
Select phrase From table_1
    UNION ALL 
Select phrase From table_2
) tbl
GROUP BY phrase
HAVING count(*) = 1
ORDER BY phrase;

/* SQL Example 3: Create a view */
CREATE VIEW `Makeup View` AS
SELECT ID, post_title, post_content, post_date 
FROM wp_posts
WHERE post_content LIKE '%makeup%'
AND post_status = "publish"
ORDER BY post_date DESC
