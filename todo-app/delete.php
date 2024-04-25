<?php

$json = file_get_contents('note.json');
$jsonArray = json_decode($json, true);

$noteName = $_POST['note_name'];
unset($jsonArray[$noteName]);

file_put_contents('note.json', json_encode($jsonArray, JSON_PRETTY_PRINT));

header('Location: index.php');