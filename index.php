<?php
// csv formatted data to be displayed
// I choose to read in the whole excel file as a CSV and then modifying it programmatically rather than
// manually going through the data and deleting what I don't need
// Allows for anyone to simply put in their own CSV of similar layout for similar results.

// Globals
header('Content-Type: text/plain');

// reads a given CSV file, returning an array of rows
$csv = file_get_contents(__DIR__ . '/xlsx_data.csv');
$csvValues = explode(PHP_EOL, $csv); // array of values

// filters out the names and whitespaces out of the array
function filterArray($str){

    return array_values(array_filter(explode(',',$str), function($el){
        return preg_match("/\d/", $el);
    }));

}

// parses the CSV 
function parseCSV($arr){

    return array_map(function($el){
        return filterArray($el);
    },array_values(array_filter($arr, function($el){
        return preg_match("/\*/", $el);
    })));
    
}

print_r(parseCSV($csvValues));
echo json_encode(parseCsv($csvValues));
$JSONValues = json_encode(parseCSV($csvValues));
?>