<?php
    $userID = $_GET['userID'];
    $userEmail = "";
    $userPsw = "";
    $userName = "";
    $userAvatar = "";
    $userSelfIntro = "";
    $userSignTime = "";
    include 'action/conn.php';
    if($con){
        // echo '<p style="color: green"> Successfully </p>';
        if(mysqli_select_db($con, 'Faceberg')){
            // print '<p> has been selected </p>';
        }else{
            printf("Error: %s\n", mysqli_error($con));
            exit();
        }
        $sql = "
            SELECT email,psw,name,avatar,selfIntro,signTime
            FROM xuser
            WHERE id = $userID
         ";
        $result = mysqli_query($con,$sql);
        if(!$result){
            printf("Error: %s\n", mysqli_error($con));
            exit();
        }
        while($row = mysqli_fetch_assoc($result)){
            $userEmail = $row['email'];
            $userPsw = $row['psw'];
            $userName = $row['name'];
            $userAvatar = $row['avatar'];
            $userSelfIntro = $row['selfIntro'];
            $userSignTime = $row['signTime'];
        }
    }else{
        echo '<p style="color: red;"> Error </p>';
    }
    mysqli_close($con);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Faceberg </title>
    <link rel="stylesheet" href="css/normal.css">
    <link rel="stylesheet" href="css/info.css">
    <link rel="stylesheet" href="icomoon/style.css">
</head>
<body style="background-image: url('imgs/bg.jpg'); background-repeat: no-repeat; background-attachment: fixed;">
    <div id="id01" class="modal">
        <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">×</span>
        <?php
            echo '
        <form class="modal-content animate" action="action/alterAvatar.php?userID='.$userID.'" method="POST">
             ';
        ?>
        <form class="modal-content animate" action="action/alterAvatar.php" method="POST">
            <div class="container">
                <div class="avatarHolder">

                    <label class="avatar">
                        <input type="radio" name="avatar" value="accelerator">
                        <img src="avatar/accelerator.png" alt="error">
                    </label>
                    <label class="avatar">
                        <input type="radio" name="avatar" value="ayano_tateyama">
                        <img src="avatar/ayano_tateyama.png" alt="error">
                    </label>
                    <label class="avatar">
                        <input type="radio" name="avatar" value="index">
                        <img src="avatar/index.png" alt="error">
                    </label>
                    <label class="avatar">
                        <input type="radio" name="avatar" value="kaneki">
                        <img src="avatar/kaneki.png" alt="error">
                    </label>
                    <label class="avatar">
                        <input type="radio" name="avatar" value="kira">
                        <img src="avatar/kira.png" alt="error">
                    </label>
                    <label class="avatar">
                        <input type="radio" name="avatar" value="kirisaki">
                        <img src="avatar/kirisaki.png" alt="error">
                    </label>

                </div>
                <div class="avatarBtnHolder">
                    <input type="submit" value="Replace" />
                </div>
            </div>
        </form>
    </div>
    <div class="main">
        <div class="panel">
            <div class="slctPanel">
                <button class="userInfo slct icon-profile"  onclick="openPanel(event,'userInfoPanel')" id="defaultOpen"></button>
                <button class="frndList slct icon-users"    onclick="openPanel(event,'frndListPanel')"></button>
                <button class="setting  slct icon-settings" onclick="openPanel(event,'settingPanel')"></button>
            </div>
            <div class="showPanel">
                <div id="userInfoPanel" class="userInfoPanel slctShowPanel">
                    <div class="infoContent slctContent">
                        <h2>Profile</h2>
                        <div class="imgHolder">
                            <?php
                                echo '
                                <img src="avatar/'.$userAvatar.'.png" alt="error">
                                 ';
                            ?>
                            <button onclick="document.getElementById('id01').style.display='block'">Change Avatar</button>
                            <button onclick="goChat()">Go Chat</button>
                        </div>
                        <div class="infoHolder">
                            <?php
                            echo '
                            <form action="action/alterInfo.php?userID='.$userID.'" method="POST">
                             ';
                            ?>
                                <label><b>Name</b></label>
                                <input type="text" id="name" name="name" value="<?php echo $userName; ?>"><br/>
                                <label><b>Sign Email</b></label>
                                <input type="text" id="email" name="email" value="<?php echo $userEmail; ?>"><br/>
                                <label><b>Password</b></label>
                                <input type="text" id="psw" name="psw" value="<?php echo $userPsw; ?>">
                                <label><b>Self-Intro</b></label>
                                <textarea style="font-family: Consolas;" name="selfIntro" id="selfIntro" cols="30" rows="10"><?php echo $userSelfIntro;?></textarea>
                                <input type="submit" value="Change">
                            </form>
                        </div>
                    </div>
                </div>
                <div id="frndListPanel" class="frndListPanel slctShowPanel">
                    <div class="frndContent slctContent">
                        <h2>Friend List</h2>
                        <div class="srchHolder">
                            <input type="text" placeholder="who you wanna meet..." onkeyup="showSrchFrnd(this.value)">
                            <button type="button">Search</button>
                        </div>
                        <div id="frndSrchHolder" class="frndSrchHolder">
                            <?php
                                include 'action/conn.php';
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

                        </div>
                    </div>
                </div>
                <div id="settingPanel" class="settingPanel slctShowPanel">
                    <div class="settingContent slctContent">
                        <h2>Setting</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- <script src="js/jquery.min.js"></script> -->
    <script src="js/info.js"></script>
    <script>
        function goChat(){
            location.href = "user.php?userID=<?php echo $userID ?>";
        }
        function showSrchFrnd(str){
            var xmlhttp;
            // document.getElementById("frndSrchHolder").innerHTML = "<p>nothing</p>";
            if(window.XMLHttpRequest){
                // ie7+,Firefox,chrome,Opera,Safari
                xmlhttp = new XMLHttpRequest();
            }else{
                //ie 5,6
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function(){
                if(xmlhttp.readyState === 4 && xmlhttp.status === 200){
                    document.getElementById("frndSrchHolder").innerHTML = xmlhttp.responseText;
                }
            }
            if(str.length === 0){
                xmlhttp.open("GET","action/frndRcv.php?userID=<?php echo$userID ?>",true);
                xmlhttp.send();
            }else{
                xmlhttp.open("GET","action/srchFrnd.php?s="+str+"&userID=<?php echo $userID ?>",true);
                xmlhttp.send();
            }
        }
        function acptFrnd(n){
            var xmlhttp_acpt;
            if(window.XMLHttpRequest){
                xmlhttp_acpt = new XMLHttpRequest();
            }else{
                xmlhttp_acpt = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp_acpt.onreadystatechange = function(){
                if(xmlhttp_acpt.readyState === 4 && xmlhttp_acpt.status === 200){
                    ;
                }
            }
            xmlhttp_acpt.open("GET","action/acptFrnd.php?frndID="+n+"&userID=<?php echo $userID ?>",true);
            xmlhttp_acpt.send();
            location.href = "info.php?userID=<?php echo $userID ?>";
        }
        function cnclFrnd(n){
            var xmlhttp_cncl;
            if(window.XMLHttpRequest){
                xmlhttp_cncl = new XMLHttpRequest();
            }else{
                xmlhttp_cncl = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp_cncl.onreadystatechange = function(){
                if(xmlhttp_cncl.readyState === 4 && xmlhttp_cncl.status === 200){
                    ;
                }
            }
            xmlhttp_cncl.open("GET","action/cnclFrnd.php?frndID="+n+"&userID=<?php echo $userID ?>",true);
            xmlhttp_cncl.send();
            location.href = "info.php?userID=<?php echo $userID ?>";
        }
        function aplyFrnd(n){
            var xmlhttp_aply;
            if(window.XMLHttpRequest){
                xmlhttp_aply = new XMLHttpRequest();
            }else{
                xmlhttp_aply = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp_aply.onreadystatechange = function(){
                if(xmlhttp_aply.readyState === 4 && xmlhttp_aply.status === 200){
                    ;
                }
            }
            xmlhttp_aply.open("GET","action/aplyFrnd.php?frndID="+n+"&userID=<?php echo $userID ?>",true);
            xmlhttp_aply.send();
            location.href = "info.php?userID=<?php echo $userID ?>";
        }
    </script>

</body>
</html>
