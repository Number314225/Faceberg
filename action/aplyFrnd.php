<?php

    $userID = $_GET['userID'];
    $frndID = $_GET['frndID'];
    $crntTime = date("Y-m-d H:i:s");

    include 'conn.php';
    if($con){
        // echo '<p style="color: green"> Successfully </p>';
        if(mysqli_select_db($con, 'Faceberg')){
            // print '<p> has been selected </p>';
        }else{
            printf("Error: %s\n", mysqli_error($con));
            exit();
        }
        $sql = '
            INSERT INTO applyfrnd (frmUser,toUser,applyTime) VALUES ('.$userID.','.$frndID.',"'.$crntTime.'");
        ';
        mysqli_query($con,$sql);
        if(!$result){
            printf("Error: %s\n", mysqli_error($con));
            exit();
        }
    }else{
        echo '<p style="color: red;"> Error </p>';
    }
    mysqli_close($con);

?>
