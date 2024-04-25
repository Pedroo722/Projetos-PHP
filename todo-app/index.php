<?php

$notes = [];

if (file_exists('note.json')) {
    $json = file_get_contents('note.json');
    $notes = json_decode($json, true);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo App</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container">
    <form action="newnote.php" method="post">
        <input type="text" name="note_name" placeholder="Digite sua anotação">
        <button>Nova Anotação</button>
    </form>
    <br>

    <?php foreach ($notes as $noteName => $note): ?>
        <div class="todo-item">
            <form action="change_status.php" method="post">
                <input type="hidden" name="note_name" value="<?php echo $noteName ?>" >
                <input type="checkbox" name="completed_<?php echo $noteName ?>" <?php echo $note['completed'] ? 'checked' : '' ?>>
            </form>

            <span><?php echo $noteName ?></span>

            <form action="delete.php" method="post">
                <input type="hidden" name="note_name" value="<?php echo $noteName ?>">
                <button>Delete</button>
            </form>
        </div>
    <?php endforeach; ?>
</div>

<script>
    const checkboxes = document.querySelectorAll('input[type=checkbox][name^=completed]');
    checkboxes.forEach(ch => {
        ch.onclick = function () {
            this.parentNode.submit();
        }
    });
</script>

</body>
</html>
