<?php

    if(basename($_SERVER['SCRIPT_FILENAME']) == "header.php"){
        include_once "../shared/notfound.php";
    }
    else{

        include_once "./back/funcs.php";
        include_once './shared/svgs.php'; 
        include_once "back/dbconn.php";

        $db_head_connection = new Db_Connect();
        $head_conn = $db_head_connection->get_connection();
?>

<header class="navheader">
    <div class="content content-wrap">
        <div class="navlogo-section">
            <a class="navlink" href="home.php">
                <div class="navlogo">
                    <span class="brandlogo"><?php logosvg(70, 70); ?></span>
                    <span class="brandname">XploitFree</span>
                </div>
            </a>
        </div>
        <ul class="navmenu">
            <li class="navitem">
                <a class="navlink" href="services.php">
                    <span class="menutext">Services</span>
                </a>
                <ul class="navitem-list">
                    <a class="navlink" href="./redteaming.php">
                        <li class="navitem-list-item">Red Teaming</li>
                    </a>
                    <a class="navlink" href="./websecurity.php">
                        <li class="navitem-list-item">Web Security</li>
                    </a>
                    <a class="navlink" href="./networksecurity.php">    
                        <li class="navitem-list-item">Network Security</li>
                    </a>
                    <a class="navlink" href="./socialengg.php">
                        <li class="navitem-list-item">Social Engineering</li>
                    </a>
                </ul>
            </li>
            <li class="navitem">
                <a class="navlink" href="trainings.php">
                    <span class="menutext">Trainings</span>
                </a>
                <ul class="navitem-list">
                    <?php
                        $query_trainings = "select name, training_url from trainings";

                        $trainings_data = $head_conn->query($query_trainings);

                        while($trng = $trainings_data->fetch_array(MYSQLI_ASSOC)){
                    ?>
                        <a class="navlink" href="./<?php echo $trng["training_url"] ?>">
                            <li class="navitem-list-item"><?php echo $trng["name"] ?></li>
                        </a>
                    <?php } ?>
                </ul>
            </li>
            <li class="navitem">
                <a class="navlink" href="aboutus.php">
                    <span class="menutext">About us</span>
                </a>
            </li>
            <li class="navitem">
                <a class="navlink" href="contactus.php">
                    <span class="menutext">Contact us</span>
                </a>
            </li>
            <li class="navitem">
                <a class="navlink" href="blog.php">
                    <span class="menutext">Blog</span>
                </a>
            </li>
        </ul>
    </div>
    <div class="content content-wrap">
        <div class="pagehead">
            <p class="headtext">
                <?php
                    if( get_heading() != "home"){
                        echo get_heading();
                    }
                ?>
            </p>
        </div>
    </div>
</header>
<?php 
    if( get_heading() != "home"){
        echo "<div class='pichead'></div>";
    }
    $head_conn->close();

}
?>