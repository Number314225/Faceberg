<?php

    $sginEmail = $_POST['sginEmail'];
    $sginPsw = $_POST['sginPsw'];
    $crntTime = date("Y-m-d H:i:s");
    $userName = $_POST['sginName'];
    $userAvatar = "index";

    $userID = 0;

    echo "
        <p> Email : $sginEmail </p>
        <p> Psw   : $sginPsw </p>
        <p> Name  : $userName </p>
        <img src=\"../avatar/$userAvatar.png\" alt=\"error\">
        <p> $crntTime </p>
    ";

    include 'conn.php';
    if($con){
        echo '<p style="color: green"> Successfully </p>';
        if(mysqli_select_db($con, 'Faceberg')){
            print '<p> has been selected </p>';
        }else{
            printf("Error: %s\n", mysqli_error($con));
            exit();
        }
        $sql = '
            INSERT INTO xuser (email,psw,name,avatar,signTime)
            VALUES ("'.$sginEmail.'","'.$sginPsw.'","'.$userName.'","index","'.$crntTime.'");
        ';
        mysqli_query($con,$sql);
        $sql2 = '
            SELECT id
            FROM xuser
            WHERE email = "'.$sginEmail.'";
         ';
        $result = mysqli_query($con,$sql2);
        if(!$result){
            printf("Error: %s\n", mysqli_error($con));
            exit();
        }
        while($row = mysqli_fetch_assoc($result)){
            $userID = $row['id'];
        }
        $sql3 = '
            CREATE TABLE IF NOT EXISTS usr'.$userID.'frnd(
                id int unsigned auto_increment,
                frndID int unsigned,
                PRIMARY KEY(id)
            );
        ';
        mysqli_query($con,$sql3);
    }else{
        echo '<p style="color: red;"> Error </p>';
    }
    mysqli_close($con);
    header("location: ../index.php");
?>
