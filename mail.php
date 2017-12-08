<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"> 
    
<style>
</style>
</head>
<body>
<?php
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $headers = "From: '$email'" . "\r\n" .
        "Reply-To: '$email'" . "\r\n" .
        'X-Mailer: PHP/' . phpversion();
        
    mail('j.addis@jacob-addis.com', $subject, $message, $headers);
?>    
</body>
</html>    

    