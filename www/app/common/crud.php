<?php
function create_update($data, $db_path): void
{
    $json_data  = json_decode($data, true);
    $final_data = '';
    foreach ($json_data as $j) {
      $final_data .= $j;
      $final_data .= ',';
    }

    file_put_contents($db_path, rtrim($final_data, ',') . "\n", FILE_APPEND);
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