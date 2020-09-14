<?php

if(basename($_SERVER['SCRIPT_FILENAME']) == "funcs.php"){
    include_once "../shared/notfound.php";
}
else{
     
?>

    <div id="preloader">
        <?php monitorsvg(300, 300, "loader") ?>
    </div>

<?php } ?>