<?php
    $userID = $_GET['userID'];
    $newAvatar = $_POST['avatar'];
    echo $newAvatar;
    echo $userID;

    include 'conn.php';
    if($con){
        // echo '<p style="color: green"> Successfully </p>';
        if(mysqli_select_db($con, 'Faceberg')){
            // print '<p> has been selected </p>';
        }else{
            printf("Error: %s\n", mysqli_error($con));
            exit();
        }
        $sql = "
            UPDATE xuser
            SET avatar='".$newAvatar."'
            WHERE id='".$userID."';
        ";
        mysqli_query($con,$sql);
    }else{
        echo '<p style="color: red;"> Error </p>';
    }
    mysqli_close($con);
    header("location: ../info.php?userID=$userID");

?>
