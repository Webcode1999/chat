<?php 
//データベースに接続する//
try{
    $pdo=new PDO('mysql:host=localhost;dbname=chat','root','root');
    $sql="SELECT * FROM `chat`;";
    $chatarray=$pdo->query($sql);
}catch(PDOException $e){
    echo $e->getMessage();
}








?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <div>
            <p>17</p>
            <p>名前</p>
            <p>2022-10-01 04:13:11</p>
        </div>
        <p>本文</p>
    </div>
    <form action="" method="post">
        <div>
            <input type="submit" value="書き込む" name="submitbutton">
            <label for="">名前:</label>
            <input type="text" name="username">
        </div>
        <div>
            <textarea name="comment" id="" cols="30" rows="10"></textarea>
        </div>
    </form>
</body>
</html>