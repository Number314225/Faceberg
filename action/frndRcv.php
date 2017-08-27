<?php
    $userID = $_GET['userID'];
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
            SELECT frmUser,applyTime,avatar,name,selfIntro
            FROM applyFrnd,xuser
            WHERE toUser=".$userID." AND applyfrnd.frmUser=xuser.id
        ";
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
                        <span class="aplyTime">Apply time : '.$row['applyTime'].'</span>
                        <span class="frndName">'.$row['name'].'</span>
                        <span style="color: #ff8000; font-family: consolas; margin-left: 10px;"> Wanna be your friend</span>
                        <br/>
                        <p class="selfIntro">'.$row['selfIntro'].'</p>
                        <button type="button" onclick="acptFrnd('.$row['frmUser'].')">Accept</button>
                        <button type="button" onclick="cnclFrnd('.$row['frmUser'].')">Ignore</button>
                    </div>
                </div>
            ';
        }
    }else{
        echo '<p style="color: red;"> Error </p>';
    }
    mysqli_close($con);
?>
