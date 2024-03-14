<!DOCTYPE html>
<html lang="en">
<head>
    <div class="container">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Пользователи</title>
    <h1>Пользователи</h1></div>
</head>
<body>
    <div class="container mt-5">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <?php
        $res = [];
        if(($file = fopen('users.csv','r'))!==false){
            while(($data = fgetcsv($file,1000,",")) !== false){
                $res[] = $data;
            } 
            fclose($file);
        }   
        echo '<table class="table">';
        echo '<thead>';
            echo '<tr>';
            for($i = 0; $i<count($res[$i]);$i++){
                echo '<th scope="col">'.$res[0][$i].'</th>';
            }
            echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
            for($i = 1; $i<count($res); $i++){
                echo '<tr>';
                for($j = 0; $j<count($res[$j]); $j++){
                    echo '<td>'.$res[$i][$j].'</td>';
                }
                echo '</tr>';
            }
        echo '</tbody>';
        echo '</table>';
    ?>
    </div>
</body>
</html>