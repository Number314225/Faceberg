<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> View Your Setting </title>
    <style type="text/css">
        body{
            <?php
                if(isset($_COOKIE['font_size'])){
                    print "\t\t font-size : ".htmlentities($_COOKIE['font_size']).";\n";
                }else{
                    print "\t\t font-size: medium;";
                }

                if(isset($_COOKIE['font_color'])){
                    print "\t\t color : #".htmlentities($_COOKIE['font_color']).";\n";
                }else{
                    print "\t\t color: #000;";
                }

            ?>
        }
    </style>
</head>
<body>
    <p><a href="test.php"> Customize Your Setting </a></p>
    <p><a href="reset.php"> Reset Your Setting </a></p>
    <p>
        Bisez-LAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA!
        haganeno haganeno haganeno
        shine shine shine
    </p>
</body>
</html>
