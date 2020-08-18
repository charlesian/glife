<?php

$userid = $_POST['userid'];

    $response = "";
    $response .= "<input class='form-control' type='text' name='note' >";
    $response .= "<input hidden type='text' name='id' value='$userid' >";

echo $response;
exit;