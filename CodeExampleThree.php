<?php

namespace example;

require_once('path.php');

// Class Autoloader example
class CodeExampleThree
{

    // autoload classes
    function mtd_autoload_classes()
    {
        spl_autoload_register(function ($class) {
            $obj_path = new Path();
            $app_folder = $obj_path->mtd_app_folder();
            $project_folder = $_SERVER['DOCUMENT_ROOT'] . '/' . $app_folder . '/';
            $class = preg_split('/(?=[A-Z])/', $class);
            $class = implode('-', $class);
            $class = strtolower(str_replace('\-', '\\', $class));
            $fullPath = $project_folder . str_replace("\\", '/', $class) . '.php';
            if (!file_exists($fullPath)) {
                require_once('messages.php');
                $obj_messages = new Messages();
                return $obj_messages->mtd_autoload();
            }
            require_once $fullPath;
        });
        $obj_connect = new DbConnect();
        $obj_add_records = new AddRecords();
        $obj_delete_records = new DeleteRecords();
        $obj_update_records = new UpdateRecords();
        $obj_retrieve_records = new RetrieveRecords();
        $obj_path = new Path();
        $obj_current = new Current();
        $obj_post_vars = new PostVars();
        $obj_messages = new Messages();
        $obj_output_adjustment = new OutputAdjustment();
        $obj_sanitize = new Sanitize();
        $obj_query_retrieve_records_router = new DbResultsRouter();
    }
}
