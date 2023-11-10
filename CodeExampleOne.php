<?php

namespace example;

// code examples for database record operations
class CodeExampleOne
{

    // database connection 
    function mtd_connect_db()
    {
        $mtd_db_connection = new DbConnect();
        return $mtd_db_connection->mtd_connect_db();
    }

    // delete record for a table in database by id
    function mtd_del_record_example($post_vars)
    {
        try {
            $pdo = $this->mtd_connect_db();
            $stmt = $pdo->prepare("DELETE FROM example_table WHERE id=?");
            $stmt->bindParam(1, $post_vars['id'], \PDO::PARAM_INT);
            $stmt->execute();
        } catch (\PDOException $e) {
            $obj_message = new Messages();
            return $obj_message->mtd_query_error($e);
        }
    }

    // update record for a table in database
    function mtd_update_example($post_vars)
    {
        try {
            $pdo = $this->mtd_connect_db();
            $stmt = $pdo->prepare('UPDATE example_table SET column_a=?, column_b=?, column_c=?, column_d=? WHERE id=?');
            $stmt->bindParam(1, $post_vars['column_a'], \PDO::PARAM_STR);
            $stmt->bindParam(2, $post_vars['column_b'], \PDO::PARAM_STR);
            $stmt->bindParam(3, $post_vars['column_c'], \PDO::PARAM_STR);
            $stmt->bindParam(4, $post_vars['column_d'], \PDO::PARAM_STR);
            $stmt->bindParam(5, $post_vars['id'], \PDO::PARAM_INT);
            $stmt->execute();
        } catch (\PDOException $e) {
            $obj_message = new Messages();
            return $obj_message->mtd_query_error($e);;
        }
    }

    // insert record for a table in database
    function mtd_add_example($post_vars)
    {
        try {
            $pdo = $this->mtd_connect_db();
            $stmt = $pdo->prepare('INSERT INTO example_table VALUES(?, ?, ?, ?, ?)');
            $stmt->bindValue(1, NULL, \PDO::PARAM_STR);
            $stmt->bindParam(2, $post_vars['column_a'], \PDO::PARAM_STR);
            $stmt->bindParam(3, $post_vars['column_b'], \PDO::PARAM_STR);
            $stmt->bindParam(4, $post_vars['column_c'], \PDO::PARAM_STR);
            $stmt->bindParam(5, $post_vars['column_d'], \PDO::PARAM_STR);
            $stmt->execute();
        } catch (\PDOException $e) {
            $obj_message = new Messages();
            return $obj_message->mtd_query_error($e);
        }
    }
}
