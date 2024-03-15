<?php
    session_start(); 

    unset($_SESSION["error_message"]);
    unset($_SESSION["success"]);
    unset($_SESSION["error_file"]);
    function redirect(){
        header("Location: main.php");
        exit;
    }
 
    function uploadpic(){
        $allowed = array("png", "jpg", "");
        $target_dir = "uploads/"; 
        $target_file = $target_dir . basename($_FILES["file"]["name"]);
        $file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                if (!in_array($file_type, $allowed)) {
                    $_SESSION["error_file"] = "Недопустимое разрешение файла";
                } else {
                    move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
                }
    }

    $username = htmlspecialchars(trim($_POST["username"]));
    $email = htmlspecialchars(trim($_POST["email"]));
    $message = htmlspecialchars(trim($_POST["message"]));
    $filename = $_FILES["file"]["name"];


    if(strlen($username) == 0 || strlen($email) == 0 || strlen($message) == 0){
        $_SESSION["error_message"] = "Заполните все обязательные поля";  
        redirect();
    }
    else if(strpos($email, "@") == false){
        $_SESSION["error_email"] = "Укажите верную электронную почту";
        redirect();
    }
    else{
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["file"])) {
            if(is_dir($target_dir)) {
                uploadpic();
            } else {
                mkdir("uploads/");
                uploadpic();
            }
        }
        $_SESSION["success"] = "Ваше сообщение отправлено!";
        $f = fopen("$username.txt", "w");
        fwrite($f, $username. "\n".$email."\n".$message."\n".$_SERVER['DOCUMENT_ROOT']."/".basename(__DIR__)."/"."uploads/".basename($_FILES["file"]["name"])); 
        fclose($f);
        redirect();
    }
 
   

    