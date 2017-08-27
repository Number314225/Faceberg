<?php
    // from function showChatMsg() in user.php 215 line
    $userID = $_GET['userID'];
    $chatWith = $_GET['chatWith'];

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
            SELECT a.id, a.name AS aname, a.avatar AS aavatar, b.id, b.name AS bname, b.avatar AS bavatar, frmID, toID, msg, sendTime
            FROM chatmsg
                INNER JOIN xuser a ON a.id=frmID
                INNER JOIN xuser b on b.id=toID
            WHERE frmID='.$userID.' AND toID='.$chatWith.' OR frmID='.$chatWith.' AND toID='.$userID.'
            ORDER BY sendTime ASC
        ';
        $result = mysqli_query($con,$sql);
        if(!$result){
            printf("Error: %s\n", mysqli_error($con));
            exit();
        }
        while($row = mysqli_fetch_assoc($result)){
            if($row['frmID'] == $userID){
                // i talk to him
                echo '
                    <div class="oneMsg fromMe">
                        <div class="avatarHolder myAvatar">
                            <img src="avatar/'.$row['aavatar'].'.png" alt="error">
                        </div>
                        <div class="msgHolder myMsg">
                            <p class="times"> '.$row['aname'].' - '.$row['sendTime'].' </p>
                            <span>
                                '.$row['msg'].'
                            </span>
                        </div>
                    </div>
                 ';
            }else if($row['frmID'] == $chatWith){
                // he talks to me
                echo '
                    <div class="oneMsg fromFrnd">
                        <div class="avatarHolder frndAvatar">
                            <img src="avatar/'.$row['aavatar'].'.png" alt="error">
                        </div>
                        <div class="msgHolder frndMsg">
                            <p class="times"> '.$row['aname'].' - '.$row['sendTime'].' </p>
                            <span>
                                '.$row['msg'].'
                            </span>
                        </div>
                    </div>
                 ';
            }
            else{
                echo '
                    <p>error</p>
                 ';
            }
        }
    }else{
        echo '<p style="color: red;"> Error </p>';
    }
    mysqli_close($con);
?>
