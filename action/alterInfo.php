<?php
    $userID = $_GET['userID'];
    $userName = $_POST['name'];
    $userEmail = $_POST['email'];
    $userPsw = $_POST['psw'];
    $userSelfIntro = $_POST['selfIntro'];

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
            SET name='".$userName."',email='".$userEmail."',psw='".$userPsw."',selfIntro='".$userSelfIntro."'
            WHERE id=".$userID.";
        ";
        mysqli_query($con,$sql);
    }else{
        echo '<p style="color: red;"> Error </p>';
    }
    mysqli_close($con);
    header("location: ../info.php?userID=$userID");
?>
