<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="~/css/variabledocument.css" type="text/css" /> 
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/grid.css">
    <link rel="stylesheet" href="css/chitietsanpham.css">
    <title>mywebPHP</title>
</head>
<body>
    <div class="wraper">
        <?php
            error_reporting(0); 
            include("admincp/config/config.php");
            include("pages/menu.php");
            include("pages/header.php");
            include("pages/main.php");
            include("pages/footer.php");
        ?>
    </div>
</body>
</html>