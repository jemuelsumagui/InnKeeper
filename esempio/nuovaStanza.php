<?php
require_once('init.php');
$msg = FALSE;

if ($_REQUEST['ok'] == 'ok') {
    $query = 'INSERT INTO stanze '.
        '(stanza_fkutente, stanza_nome, stanza_note) VALUES
        ('.
        $_REQUEST['stanza_fkutente'].', "'.
        $_REQUEST['stanza_nome'].'", "'.
        $_REQUEST['stanza_note'].'"
        );';
    
    if ($rs = mysqli_query($link, $query)) {
        header('Location: main.php?msg=insert_ok');
    }   else {
        $msg = TRUE;
    }
}


?>

<html>
<head>
<title></title>    
</head>
<body>
<?php if ($msg) { ?>
    ERRORE
<?php } ?>
    
</body>
</html>