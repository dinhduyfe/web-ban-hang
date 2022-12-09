<div class="main">
    <?php
        if(isset($_GET["action"])){
            $action = $_GET["action"];
        }else{
            $action = "";
        }
        if(isset($_GET["query"])){
            $query = $_GET["query"];
        }
        else{
            $query ="";
        }

        if(($action == "quanlydanhmucsp") && ($query == "them")){
            include("modules/quanlydanhmucsp/them.php");
            include("modules/quanlydanhmucsp/lietke.php");
        }elseif(($action == "quanlydanhmucsp") && ($query == "sua")){
            include("modules/quanlydanhmucsp/sua.php");
        }elseif(($action == "quanlysp")){
            if(($query == "them")){
                include("modules/quanlysp/them.php");
            }elseif($query == "sua"){
                include("modules/quanlysp/sua.php");
            }else{
                include("modules/quanlysp/lietke.php");
            }
        }elseif(($action == "quanlydonhang")){
            include("modules/quanlydonhang/lietke.php");
        }else{
            include("modules/dashboard.php");
        }
        
    ?>
</div>