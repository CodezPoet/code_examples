<?php 

namespace models;

class CodeExampleOne

{

    // database connection 
    function mtd_connect_db()
    {
        $mtd_db_connection = new DbConnect();
        return $mtd_db_connection->mtd_connect_db();
    }

    // delete record database by id
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

    // update record database
    function mtd_update_example($post_vars)
    {
        try {
            $pdo = $this->mtd_connect_db();
            $stmt = $pdo->prepare('UPDATE example_table SET column_a=? WHERE id=?');
            $stmt->bindParam(1, $post_vars['column_a'], \PDO::PARAM_STR);
            $stmt->bindParam(2, $post_vars['id'], \PDO::PARAM_INT);
            $stmt->execute();
        } catch (\PDOException $e) {
            $obj_message = new Messages();
            return $obj_message->mtd_query_error($e);;
        }
    }

}
