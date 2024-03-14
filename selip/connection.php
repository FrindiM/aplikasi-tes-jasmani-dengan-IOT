<?php
$connect = mysqli_connect("jolteon", "werislin_me", "GKYJc[}WJ]Il", "werislin_test");
$sql = mysqli_query($connect, "SELECT * FROM geb ORDER BY id DESC");
$sql2 = mysqli_query($connect, "SELECT * FROM geb ORDER BY id desc limit 5");

$data = mysqli_fetch_array($sql);
function data($string)
{
    global $data;
    return $data[$string] == "" ? 0 : $data[$string];
}


function dataArray($string)
{
    global $sql2;
    $data = "";
    while ($data_reading1 = mysqli_fetch_array($sql2)) {
        $data .=  '' .  RemoveSpecialChar($data_reading1[$string])  . ',';
    }

    return $data;
}


function RemoveSpecialChar($str)
{

    // Using str_replace() function
    // to replace the word
    $res = str_replace(array(
        '\'', '"',
        ',', ';', '<', '>'
    ), ' ', $str);

    // Returning the result
    return $res;
}
