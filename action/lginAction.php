<?php

    $email = $_POST['lginEmail'];
    $psw = $_POST['lginPsw'];

    echo"
        <p>$email</p>
        <p>$psw</p>
     ";

    $userID = 0;
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
            SELECT id,psw FROM xuser WHERE email = "'.$email.'"
         ';
        $result = mysqli_query($con,$sql);
        if(!$result){
            printf("Error: %s\n", mysqli_error($con));
            exit();
        }
        while($row = mysqli_fetch_assoc($result)){
            $userID = $row['id'];
            echo "
                <p>{$row['id']}</p>
                <p>{$row['psw']}</p>
             ";
        }
        echo "
            <p> $userID </p>
         ";
    }else{
        echo '<p style="color: red;"> Error </p>';
    }
    mysqli_close($con);
    header("location: http://localhost:8081/Faceberg/user.php?userID=".$userID);
?>
