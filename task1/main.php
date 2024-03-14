<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Форма обратной связи</title>
</head>
<body>
    <div class="container mt-5">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <h1>Форма обратной связи</h1>
    <div class="text-success"><?=$_SESSION['success']?></div><br>
    <form action = "check_contact.php" method="post" enctype="multipart/form-data">
        <input type = "text" name = "username"  placeholder="Имя пользователя *" class="form-control"><br>
        <input type = "email" name = "email"  placeholder="Электронная почта *" class="form-control">
        <div class="text-danger"><?=$_SESSION['error_email']?></div><br>
        <textarea name="message"  placeholder="Сообщение *" class="form-control"></textarea>
        <div class="text-danger"><?=$_SESSION['error_message']?></div><br>
        <label for="file">Прикрепить файл:</label>
        <input type="file" name="file">
        <div class="text-danger"><?=$_SESSION['error_file']?></div><br>
        <p>Поля, помеченные * обязательны для заполнения</p>
        <button type="submit" class="btn btn-success">Отправить</button>
    </form>
    </div>
</body>
</html>