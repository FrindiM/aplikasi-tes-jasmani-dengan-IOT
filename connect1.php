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

$query = "SELECT isi FROM sensor_status2 WHERE id='1'";
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        if ($row["isi"] == "hidup") {
            $api_key = test_input($_GET["api_key"]);
            if ($api_key == $api_key_value) {
                $tag = test_input($_GET["tag"]);
                $nodeID = test_input($_GET["nodeID"]);

                // Create connection

                $string_tag = explode(",", $tag);
                foreach ($string_tag as $value) {
                    if (!empty(trim($value))) {
                        $sql = "INSERT INTO sensordata2 (tag, nodeID)
        VALUES ('" . $value . "', '" . $nodeID . "')";
                        if ($conn->query($sql) === TRUE) {
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
