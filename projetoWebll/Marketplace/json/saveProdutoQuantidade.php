<?php
    session_start();

    $data_json = $_POST['data'];

    $data = json_decode($data_json);
    $_SESSION['produtos_quantidade'] = $data;
?>