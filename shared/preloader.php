<?php

if(basename($_SERVER['SCRIPT_FILENAME']) == "funcs.php"){
    include_once "../shared/notfound.php";
}
else{
     
?>

    <div id="preloader">
        <?php smspinner(100, 100) ?>
    </div>

<?php } ?>