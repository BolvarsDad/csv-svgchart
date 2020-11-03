<?php
// csv formatted data to be displayed
// I choose to read in the whole excel file as a CSV and then modifying it programmatically rather than
// manually going through the data and deleting what I don't need
// Allows for anyone to simply put in their own CSV of similar layout for similar results.

// Globals
header('Content-Type: text/plain');

// reads a given CSV file, returning an array of rows
// named based on UNIX rwx (read, write, execute)
$csv = file_get_contents(__DIR__ . '/xlsx_data.csv');
$csvValues = explode(PHP_EOL, $csv);

function parseCSV($arr){

    return array_map(function($el){
        return filterForNumbers($el);
    },array_values(array_filter($arr, function($el){
        return preg_match("/\*/", $el);
    })));
    
}

// filters out the array for names
function filterForNumbers($str){

    return array_values(array_filter(explode(',',$str), function($el){
        return preg_match("/\d/", $el);
    }));

}


print_r(parseCSV($csvValues));
?>