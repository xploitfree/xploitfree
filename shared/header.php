<?php
    include_once "funcs.php";
    include_once './svgs.php'; 
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
        <div class="navmenu">
            <a class="navlink navitem" href="services"><span class="menutext">Services</span></a>
            <a class="navlink navitem" href="trainings"><span class="menutext">Trainings</span></a>
            <a class="navlink navitem" href="aboutus"><span class="menutext">About us</span></a>
            <a class="navlink navitem" href="contactus"><span class="menutext">Contact us</span></a>
            <a class="navlink navitem" href="blog"><span class="menutext">Blog</span></a>
        </div>
    </div>
    <div class="content content-wrap">
        <div class="pagehead">
            <p class="headtext">
                <?php 
                        echo give_heading();
                ?>
            </p>
        </div>
    </div>
</header>
<div class="pichead"></div>