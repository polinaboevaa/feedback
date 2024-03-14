<?php
    session_start(); 

    unset($_SESSION["error_message"]);
    unset($_SESSION["success"]);
    unset($_SESSION["error_file"]);
    function redirect(){
        header('Location: main.php');
        exit;
    }

    $username = htmlspecialchars(trim($_POST['username']));
    $email = htmlspecialchars(trim($_POST['email']));
    $message = htmlspecialchars(trim($_POST['message']));
    $filepath = $_FILES["file"]["tmp_name"]; 
    $filename = $_FILES['file']['name'];
    $filetype = pathinfo($filename, PATHINFO_EXTENSION);
    $allowed = array('png', 'jpg', '');

    if(strlen($username) == 0 || strlen($email) == 0 || strlen($message) == 0){
        $_SESSION['error_message'] = 'Заполните все обязательные поля';  
        redirect();
    }
    else if(strpos($email, "@") == false){
        $_SESSION['error_email'] = 'Укажите верную электронную почту';
        redirect();
    }
    else if(!in_array($filetype, $allowed)){
        $_SESSION['error_file'] = 'Недопустимое разрешение файла';
        echo $filetype;
        //redirect();
    }
    else{
        $_SESSION['success'] = "Ваше сообщение отправлено!";
        $f = fopen("$username.txt", "w");
        fwrite($f, $username. "\t".$email. "\t".$message. "\t".$filepath); 
        fclose($f);
        redirect();
    }
 
   

    