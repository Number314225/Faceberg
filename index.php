<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Faceberg </title>
    <link rel="stylesheet" href="css/normal.css">
    <link rel="stylesheet" href="css/index.css">
    <script src="js/index.js"></script>
</head>
<body>
    <?php
        include 'header.php';
    ?>
    <div id="lginPanel" class="modal">
        <form class="modal-content animate" action="action/lginAction.php" method="POST">
            <h2 style="display: inline-block;">Login Form</h2>
            <span class="close" title="Close Modal" onclick="document.getElementById('lginPanel').style.display='none'">&times;</span>
            <div class="container">
                <label><b>Useremail</b></label>
                <input id="lginEmail" type="text" placeholder="Enter Email" name="lginEmail" required>
                <label><b>Password</b></label>
                <input id="lginPsw" type="password" placeholder="Enter Password" name="lginPsw" required>
                <input type="checkbox" checked="checked">Remember me
                <button type="submit" onclick="return clkLginSubmitBtn();">Login</button>
                <button type="button" class="cancelBtn" onclick="document.getElementById('lginPanel').style.display='none'">Cancel</button>
            </div>
        </form>
    </div>
    <div class="full-bg" style="background-image: url('imgs/bg.jpg'); background-repeat: no-repeat; background-attachment: fixed;">
        <p>Lead Generation</p>
    </div>
    <div class="main">
        <div class="infoPanel">
            <p>Best Social Website Ever</p>
            <p>Best Social Website Ever</p>
            <p>Best Social Website Ever</p>
            <p>Best Social Website Ever</p>
            <p>Best Social Website Ever</p>
            <p>Best Social Website Ever</p>
            <p>Best Social Website Ever</p>
            <p>Best Social Website Ever</p>
            <p>Best Social Website Ever</p>
            <p>Best Social Website Ever</p>
            <p>Best Social Website Ever</p>
            <p>Best Social Website Ever</p>
            <p>Best Social Website Ever</p>
        </div>
        <div class="signupForm">
            <div class="lginBtn">
                <button type="button" class="toLgin" onclick="document.getElementById('lginPanel').style.display='block'">Already have an account</button>
            </div>
            <h2 style="padding-left: 10px;">Signup Form</h2><br/>
            <form action="action/sgupAction.php" method="POST">
                <div class="container">
                    <label><b>Name</b></label>
                    <input id="sginName" type="text" placeholder="Enter name" name="sginName" required=""><br>
                    <label><b>Email Address</b></label>
                    <input id="sginEmail" type="text" placeholder="Enter Email" name="sginEmail" required><br/>
                    <label><b>Password</b></label>
                    <input id="sginPsw" type="password" placeholder="Enter Password" name="sginPsw" required><br/>
                    <label><b>Repeat Password</b></label>
                    <input id="sginPswRpt" type="password" placeholder="Repeat Password" name="sginPswRpt" required>
                    <input type="checkbox" checked="checked">Remember Me <br/><br/>
                    <p class="warning">By creating an account you agree to our Terms & Privacy.</p><br/>
                    <div class="clearFix">
                        <button type="submit" class="signupBtn" onclick="return clkSgupSubmitBtn();">Sign Up</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php
        include 'footer.php';
    ?>
</body>
</html>
