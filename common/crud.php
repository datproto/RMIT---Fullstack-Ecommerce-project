<?php
function create_update($data, $db_path) {
    $decode = json_decode($data, true);

    $db_file = fopen($db_path, 'w');

    foreach($decode as $d) {
        fputcsv($db_file, $d);
    }

    fclose($db_file);
}

// Read db files & update db files
function read($db_path) {
    // open csv file
    if (!($fp = fopen($db_path, 'r'))) {
        die("Can't open file...");
    }

    //read csv headers
    $key = fgetcsv($fp,"1024",",");

    // parse csv rows into array
    $json = array();
    while ($row = fgetcsv($fp,"1024",",")) {
        $json[] = array_combine($key, $row);
    }

    // release file handle
    fclose($fp);

    // encode array to json
    return json_decode(json_encode($json));
}

function get_item($key, $filter, $array){
    $filtered_array = [];
    for ($i = 0; $i < count($array); $i++){
        if($array[$i]->$key == $filter)
            $filtered_array[] = $array[$i];
    }
    return $filtered_array;
}