<?php
    $userID = $_GET['userID'];
    $hint = $_GET['s'];
    // echo "<p>$hint</p>";
    // echo "<p>$userID</p>";
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
            SELECT id,name,avatar,selfIntro,signTime
            FROM xuser
            WHERE id != '.$userID.' AND name LIKE "%'.$hint.'%"
        ';
        $result = mysqli_query($con,$sql);
        if(!$result){
            printf("Error: %s\n", mysqli_error($con));
            exit();
        }
        while($row = mysqli_fetch_assoc($result)){
            echo '
                <div class="srchOneFrnd">
                    <div class="srchImgHolder">
                        <img src="avatar/'.$row['avatar'].'.png" alt="error">
                    </div>
                    <div class="srchInfoHolder">
                        <span class="aplyTime">Sign time : '.$row['signTime'].'</span>
                        <span class="frndName">'.$row['name'].'</span><br/>
                        <p class="selfIntro">'.$row['selfIntro'].'</p>
                        <button type="button" onclick="aplyFrnd('.$row['id'].')">Apply</button>
                    </div>
                </div>
            ';
        }
    }else{
        echo '<p style="color: red;"> Error </p>';
    }
    mysqli_close($con);
?>
