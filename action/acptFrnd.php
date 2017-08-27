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
            INSERT INTO usr'.$userID.'frnd(frndID) VALUES('.$frndID.');
        ';
        mysqli_query($con,$sql);

        $sql2 = '
            INSERT INTO usr'.$frndID.'frnd(frndID) VALUES('.$userID.');
         ';
        mysqli_query($con,$sql2);

        $sql3 = '
            DELETE FROM applyfrnd WHERE frmUser = '.$frndID.' AND toUser = '.$userID.';
         ';
        mysqli_query($con,$sql3);
    }else{
        echo '<p style="color: red;"> Error </p>';
    }
    mysqli_close($con);

?>
