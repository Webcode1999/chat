<?php 
$erromessage=array();
//データベースに接続する//
try{
    $pdo=new PDO('mysql:host=localhost;dbname=chat','root','root');
    $sql="SELECT * FROM `chat`;";
    $chatarray=$pdo->query($sql);
}catch(PDOException $e){
    echo $e->getMessage();
}
if(!empty($_POST["submitbutton"])){
    if(empty($_POST["username"])){
        echo "名前を入力してください";
        $erromessage["username"]="名前を入力してください";
    }
    if(empty($_POST["comment"])){
        echo "コメントを入力してください";
        $erromessage["comment"]="コメントを入力してください";
    }
    if(empty($erromessage)){
        try{
            $stmt=$pdo->prepare("INSERT INTO `chat` (`username`,`comment`) VALUE (:username,:comment);");
            $stmt->bindParam(':username',$_POST['username']);
            $stmt->bindParam(':comment',$_POST['comment']);
            $stmt->execute();
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    $pdo=null;
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
    <?php 
    foreach($chatarray as $chat):
    ?>
    <div>
        <div>
            <p><?php echo $chat["id"]?></p>
            <p><?php echo $chat["username"]?></p>
            <p><?php echo $chat["time"]?></p>
        </div>
        <p><?php echo $chat["comment"]?></p>
    </div>
    <?php endforeach;?>
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