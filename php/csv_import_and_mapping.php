<?php

/**
 * CSV to Database Mapping
 *
 *  This code example imports and converts a specific CSV to a custom mapping for a Database
 *  It takes the column headings from the CSV and converts it to the column headings of the Database
 *  It selects only the columns chosen, and array values are given column names for the keys
 *  It checks the data if it is safe to import, and if not it can log an error for that record, 
 *  does not add that record, and proceeds to evaluate the next record
 */

// require sanitizer to check data is safe for import
require('sanitizer.php');

/**
 * Set delimiter 
 * 
 * Important note Excel and CSV:  
 * 
 *      If using CSV through Excel use comma delimited(,) source file, 
 *      before exporting as comma delimited and/or check that Excel doesn't 
 *      add "" around " when using semicolon(;) delimited as source, 
 *      it breaks fgetcsv() otherwise 
 * 
 */
$delimiter = ',';

// file location and name
$csvFile = 'path_to_file/file_name';

// filehandle
$fileHandle = fopen($csvFile, 'r');

// Check if file handle was created successfully
if (!$fileHandle) {
    die("Error: Unable to open the CSV file.");
}

// custom column Mappings
$columnMapping = [
    "csv_column_heading_1" => "table_column_heading_1",
    "csv_column_heading_2" => "table_column_heading_2",
    "csv_column_heading_3" => "table_column_heading_3",
    "csv_column_heading_4" => "table_column_heading_4",
    "csv_column_heading_5" => "table_column_heading_5",
];

// Process CSV data
$recordsData = processCsvData($fileHandle, $delimiter);

// Convert CSV data to desired format
$dataImportList = convertToDesiredFormat($recordsData, $columnMapping);

/**
 * Put the CSV data in columns and fields
 * 
 * @param mixed $fileHandle A resource handle poring to an open file
 * @param string $delimiter The delmiter used in the CSV file
 * 
 * @return array
 */
function processCsVData(mixed $fileHandle, string $delimiter): array
{
    $countRow = 0;
    $records = [];
    $recordsData = [];
    while (($row = fgetcsv($fileHandle, 1000, $delimiter)) !== false) {
        $countRow++;
        if (1 === $countRow) {
            $columHeadings = $row;
        } else {
            $records[] = $row;
        }
    }
    foreach ($records as $record) {
        $recordsData[] = array_combine($columHeadings, $record);
    }

    return $recordsData;
}

/**
 * convert the CSV data from the existing CSV Column headings 
 * to the database Column Headings and select only the data we want
 *
 * @param array $recordsData
 * @param array $columnMapping
 * 
 * @return array
 */
function convertToDesiredFormat(array $recordsData, array $columnMapping): array
{
    $countRecord = 0;
    $dataImportList = [];
    foreach ($recordsData as $data) {
        $countRecord++;
        $sanitizedData = [];
        $sanitationError = false;
        foreach ($data as $columnHeading => $field) {
            if (isset($columnMapping[$columnHeading])) {
                $desiredKey = $columnMapping[$columnHeading];
                $sanitizedField = sanitizeTextString($field);
                if (empty($sanitizedField)) {
                    $sanitationError = true;
                    break 1;
                } else {
                    $sanitizedData[$desiredKey] = $sanitizedField;
                }
            }
        }
        if ($sanitationError) {
            // do error handling (can depend on framework or way of error handling for example)
        } else {
            $dataImportList['records'][$countRecord] = $sanitizedData;
        }
    }

    return $dataImportList;
}

// Close the file handle
fclose($fileHandle);
