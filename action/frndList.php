<?php
    $con = mysqli_connect('localhost', 'number_ddd', '314225AN41');
    if($con){
        echo '<p style="color: green"> Successfully </p>';
        if(mysqli_select_db($con, 'test')){
            print '<p> has been selected </p>';
        }else{
            printf("Error: %s\n", mysqli_error($con));
            exit();
        }
        $sql = '
            SELECT *
            FROM xuser;
        ';
        $result = mysqli_query($con, $sql);
        if(!$result){
            printf("Error: %s\n", mysqli_error($con));
            exit();
        }
        while($row = mysqli_fetch_assoc($result)){
            echo "
                <li class=\"oneFrnd\">
                    <img src=\"avatar\/{$row['avatar']}.png\" alt=\"error\">
                    <span class=\"frndName\">${row['name']}</span>
                </li>
            ";
        }
        mysqli_free_result($result);
    }else{
        echo '<p style="color: red;"> Error </p>';
    }
    mysqli_close($con);
?>
