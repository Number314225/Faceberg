<?php
    $userID = $_GET['userID'];
    $userName = "";
    $userAvatar = "";
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
            SELECT name,avatar
            FROM xuser
            WHERE id = $userID
         ";
        $result = mysqli_query($con,$sql);
        if(!$result){
            printf("Error: %s\n", mysqli_error($con));
            exit();
        }
        while($row = mysqli_fetch_assoc($result)){
            $userName = $row['name'];
            $userAvatar = $row['avatar'];
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
    <title> Faceberg Chat </title>
    <link rel="stylesheet" href="css/normal.css">
    <link rel="stylesheet" href="css/user.css">
    <link rel="stylesheet" href="icomoon/demo-files/demo.css">
    <link rel="stylesheet" href="icomoon/style.css">

</head>
<body style="background-image: url('imgs/bg.jpg'); background-repeat: no-repeat; background-attachment: fixed;">

    <div class="main">
        <div class="panel">
            <div class="userPanel">
                <!--
                    左上角 用户图标 名称及一些其他待定设计
                 -->
                <div class="userInfo">
                    <?php
                        echo "
                            <a href="."http://localhost:8081/Faceberg/info.php?userID=".$userID.">
                                <img src=\"avatar/".$userAvatar.".png\" alt=\"error\" title=\"avatar\">
                            </a>
                         ";
                    ?>

                    <span class="userName icon-menu5">
                        <?php
                            echo $userName;
                        ?>
                    </span>
                </div>

                <!--
                    左下角 好友列表 设计 或一些其他待定设计
                 -->
                <div class="userTool scrollBar">
                    <ul id="ulFrndList">

                        <?php
                            $con = mysqli_connect('localhost', 'number_ddd', '314225AN41');
                            if($con){
                                echo '<p style="color: green"> Successfully </p>';
                                if(mysqli_select_db($con, 'Faceberg')){
                                    print '<p> has been selected </p>';
                                }else{
                                    printf("Error: %s\n", mysqli_error($con));
                                    exit();
                                }
                                $sql = '
                                    SELECT xuser.id,avatar,name
                                    FROM xuser,usr'.$userID.'frnd
                                    WHERE xuser.id=usr'.$userID.'frnd.frndID;
                                ';
                                echo '
                                    SELECT avatar,name
                                    FROM xuser,usr'.$userID.'frnd
                                    WHERE xuser.id=usr'.$userID.'frnd.frndID;
                                 ';
                                $result = mysqli_query($con, $sql);
                                if(!$result){
                                    printf("Error: %s\n", mysqli_error($con));
                                    exit();
                                }
                                while($row = mysqli_fetch_assoc($result)){
                                    echo '
                                        <li class="oneFrnd" onclick="changeTalk('.$row['id'].')">
                                            <img src="avatar/'.$row['avatar'].'.png" alt="error">
                                            <span class="frndName">'.$row['name'].'</span>
                                        </li>
                                    ';
                                }
                                mysqli_free_result($result);
                            }else{
                                echo '<p style="color: red;"> Error </p>';
                            }
                            mysqli_close($con);

                        ?>
                    </ul>
                </div>
            </div>

            <div class="chatPanel ">
                <div id="chatTextPanel" class="chatTextPanel scrollBar">
                    <p> nothing... </p>
                </div>
                <div class="sendText">
                    <div class="userEvent">
                        <button class="sendBtn" onclick="sendMsg()">Send</button>
                    </div>
                    <textarea id="typeText" type="textarea" multiple="" placeholder="Type your message here..."></textarea>
                </div>
            </div>
        </div>
    </div>

    <script>
        var chatWith = "";
        function getNowFormatDate() {
            var date = new Date();
            var seperator1 = "-";
            var seperator2 = ":";
            var month = date.getMonth() + 1;
            var strDate = date.getDate();
            if (month >= 1 && month <= 9) {
                month = "0" + month;
            }
            if (strDate >= 0 && strDate <= 9) {
                strDate = "0" + strDate;
            }
            var currentdate = date.getFullYear() + seperator1 + month + seperator1 + strDate
                    + " " + date.getHours() + seperator2 + date.getMinutes()
                    + seperator2 + date.getSeconds();
            return currentdate;
        }
        function scrlToBtm(){
            document.getElementById('chatTextPanel').scrollTop = document.getElementById('chatTextPanel').scrollHeight;
        }
        function changeTalk(who){
            chatWith = who;
        }
        function showChatMsg(){
            var xmlhttp;
            if(chatWith === ""){
                return;
            }
            if(window.XMLHttpRequest){
                // ie7+,Firefox,chrome,Opera,Safari
                xmlhttp = new XMLHttpRequest();
            }else{
                //ie 5,6
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function(){
                if(xmlhttp.readyState === 4 && xmlhttp.status === 200){
                    document.getElementById("chatTextPanel").innerHTML = xmlhttp.responseText;
                }
            }
            xmlhttp.open("GET","action/chatWith.php?chatWith="+chatWith+"&userID=<?php echo $userID ?>",true);
            xmlhttp.send();
        }
        function sendMsg(){
            var msg = document.getElementById('typeText').value;
            var xmlhttp_send;
            var t = getNowFormatDate();
            if(chatWith === "" || msg === ""){
                return;
            }
            if(window.XMLHttpRequest){
                // ie7+,Firefox,chrome,Opera,Safari
                xmlhttp_send = new XMLHttpRequest();
            }else{
                //ie 5,6
                xmlhttp_send = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp_send.onreadystatechange = function(){
                if(xmlhttp_send.readyState === 4 && xmlhttp_send.status === 200){
                    ;
                }
            }
            xmlhttp_send.open("GET","action/sendMsg.php?msg="+msg+"&chatWith="+chatWith+"&t="+t+"&userID=<?php echo $userID ?>",true);
            xmlhttp_send.send();
            scrlToBtm();
        }
        var intvl = setInterval(showChatMsg,1000);

    </script>

</body>
</html>
