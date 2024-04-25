<?php

$noteName = $_POST['note_name'] ?? '';
$noteName = trim($noteName);

if ($noteName) {
    if (file_exists('note.json')) {
        $json = file_get_contents('note.json');
        $jsonArray = json_decode($json, true);
    } else {
        $jsonArray = [];
    }

    $jsonArray[$noteName] = ['completed' => false];
    file_put_contents('note.json', json_encode($jsonArray, JSON_PRETTY_PRINT)); 
}

header('Location: index.php');