<?php

// database connection such as credentials
require_once('connection.php');

// show the results for a join on multiple tables
function show_familie_contributies_records($dbh)
{
    $stmt = $dbh->query("
        SELECT 
            familie.familienaam, 
            contributie.bedrag, 
            contributie.boekjaar 
        FROM 
            familie 
            JOIN familielid ON familielid.familie_id = familie.id 
            JOIN  contributie ON contributie.soort_lid = familielid.soort_lid 
        ORDER BY 
            contributie.boekjaar DESC");
    return $stmt->fetchAll(\PDO::FETCH_ASSOC);
}


// insert record for a table in database
function add_record_contributie($dbh, $post_vars)
{
    $stmt = $dbh->prepare('INSERT INTO contributie VALUES(?, ?, ?, ?, ?)');
    $stmt->bindValue(1, NULL, \PDO::PARAM_STR);
    $stmt->bindParam(2, $post_vars['leeftijd'], \PDO::PARAM_STR);
    $stmt->bindParam(3, $post_vars['soort_lid'], \PDO::PARAM_STR);
    $stmt->bindParam(4, $post_vars['bedrag'], \PDO::PARAM_STR);
    $stmt->bindParam(5, $post_vars['boekjaar'], \PDO::PARAM_STR);
    $stmt->execute();
}

// update record for the contributions table in database
function update_contributie($dbh, $post_vars)
{
    $stmt = $dbh->prepare('UPDATE contributie SET leeftijd=?, soort_lid=?, bedrag=?, boekjaar=? WHERE id=?');
    $stmt->bindParam(1, $post_vars['leeftijd'], \PDO::PARAM_STR);
    $stmt->bindParam(2, $post_vars['soort_lid'], \PDO::PARAM_STR);
    $stmt->bindParam(3, $post_vars['bedrag'], \PDO::PARAM_STR);
    $stmt->bindParam(4, $post_vars['boekjaar'], \PDO::PARAM_STR);
    $stmt->bindParam(5, $post_vars['id'], \PDO::PARAM_INT);
    $stmt->execute();
}

// delete record for a booking year table in database by id
function del_record($dbh, $post_vars)
{
    $stmt = $dbh->prepare("DELETE FROM boekjaar WHERE id=?");
    $stmt->bindParam(1, $post_vars['id'], \PDO::PARAM_INT);
    $stmt->execute();
}
