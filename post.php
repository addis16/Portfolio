<?php

session_start();

$text = $_POST['text'];
$name = $_POST['name'];
$string = ": ";
    
date_default_timezone_set("America/New_York");

$open = fopen("log.html", 'a');
fwrite($open, "<div id='newLine'>".date("h:i:sa: ")."".$name."".$string."".stripslashes(htmlspecialchars($text))."</div>\n");
fclose($open);

?>