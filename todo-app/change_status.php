<?php 

$json = file_get_contents('note.json');
$jsonArray = json_decode($json, true);

$noteName = $_POST['note_name'];
$checkboxName = 'completed_' . $noteName;

if (isset($_POST[$checkboxName])) {
    $jsonArray[$noteName]['completed'] = true; 
} else {
    $jsonArray[$noteName]['completed'] = false; 
}

file_put_contents('note.json', json_encode($jsonArray, JSON_PRETTY_PRINT));

header('Location: index.php');
