<?php
    // from function sendMsg() in user.php 235 line
    $userID = $_GET['userID'];
    $chatWith = $_GET['chatWith'];
    $msg = $_GET['msg'];
    // $crntTime = date("Y-m-d H:i:s");
    $t = $_GET['t'];

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
            INSERT INTO chatmsg(frmID,toID,msg,sendTime) VALUES ('.$userID.','.$chatWith.',"'.$msg.'","'.$t.'");
        ';
        mysqli_query($con,$sql);
    }else{
        echo '<p style="color: red;"> Error </p>';
    }
    mysqli_close($con);
?>
