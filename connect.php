<?php

/*
  Rui Santos
  Complete project details at https://RandomNerdTutorials.com/esp32-esp8266-mysql-database-php/
  
  Permission is hereby granted, free of charge, to any person obtaining a copy
  of this software and associated documentation files.
  
  The above copyright notice and this permission notice shall be included in all
  copies or substantial portions of the Software.
*/

include "config.php";

// Keep this API Key value to be compatible with the ESP32 code provided in the project page. 
// If you change this value, the ESP32 sketch needs to match
$api_key_value = "tPmAT5Ab3j7F9";

$api_key = $tag = $nodeID = "";

$query = "SELECT isi FROM sensor_status WHERE id='1'";
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        if ($row["isi"] == "hidup") {
            $api_key = test_input($_GET["api_key"]);
            if ($api_key == $api_key_value) {
                $tag = test_input($_GET["tag"]);
                $nodeID = test_input($_GET["nodeID"]);
                $dataLost = test_input($_GET["dataLost"]);


                // Create connection
        //         $string_tag = explode(",", $tag);
        //         foreach ($string_tag as $value) {
        //             if (!empty(trim($value))) {
        //                 $sql = "INSERT INTO sensordata (tag, nodeID, datalost)
        // VALUES ('" . $value . "', '" . $nodeID . "', '" . $value2 . "')";
        //                 if ($conn->query($sql) === TRUE) {
        //                     echo "New record created successfully";
        //                 } else {
        //                     echo "Error: " . $sql . "<br>" . $conn->error;
        //                 }
        //             }
        //         }

            // Proses input data
              // Cek apakah nodeID sudah ada di database
              $sql_check_nodeID = "SELECT * FROM sensordata WHERE nodeID = '$nodeID'";
              $result_check_nodeID = mysqli_query($conn, $sql_check_nodeID);
              $num_rows_nodeID = mysqli_num_rows($result_check_nodeID);
            
              // Jika nodeID belum ada di database, masukkan 10 tag untuk nodeID tersebut
              if ($num_rows_nodeID == 0) {
                $sql_select_tags = "SELECT tag_id FROM tag_id";
                $result_select_tags = mysqli_query($conn, $sql_select_tags);
                $tags = array();
                while ($row = mysqli_fetch_assoc($result_select_tags)) {
                  array_push($tags, $row['tag_id']);
                }
            
                foreach ($tags as $tag) {
                  $sql_insert = "INSERT INTO sensordata (nodeID, tag) VALUES ('$nodeID', '$tag')";
                  mysqli_query($conn, $sql_insert);
                }
              }
            
              else{
              // Masukkan input tag dan nodeID ke dalam database
              $string_tag = explode(",", $tag);
                $data_lost_arr = explode(",", $dataLost);
                foreach ($string_tag as $key => $value) {
                    $data_lost = !empty(trim($data_lost_arr[$key])) ? $data_lost_arr[$key] : '';
                    $sql = "INSERT INTO sensordata (tag, nodeID, datalost) 
                        VALUES ('" . $value . "', '" . $nodeID . "', '" . $data_lost . "')";
                    if ($conn->query($sql) === TRUE) {
                        echo $sql;
                        echo "New record created successfully";
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                }

              }

                $conn->close();
            } else {
                echo "Wrong Key";
            }
        }
    }
}



function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
