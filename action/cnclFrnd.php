<?php

    $userID = $_GET['userID'];
    $frndID = $_GET['frndID'];

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
            DELETE FROM applyfrnd WHERE frmUser = '.$frndID.' AND toUser = '.$userID.';
        ';

        if(mysqli_query($con,$sql)){
            printf("Error: %s\n", mysqli_error($con));
            exit();
        }
    }else{
        echo '<p style="color: red;"> Error </p>';
    }
    mysqli_close($con);

?>
