<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/styl.css">
    <link rel="stylesheet" href="./css/mainmenu.css">
    <title>Services</title>
</head>
<body>
    <?php include_once "shared/header.php" ?>
    <div class="pichead"></div>
    <div class="content">
        <div class="section">
            <div class="section-head">
                <h1 class="section-head-text">
                    Battle Harden your network with no threat to your data
                </h1>
            </div>
            <div class="section-para">
                <p class="section-para-text">
                Our experts will use extensive cutting edge methods to launch a
                full scale cyber attack . A complete analysis of the network security
                from an outsider’s Perspective to know the flaws and performance
                of the security protocol and the people faced with real world
                threats.We will provide you with the tactics to cover the security holes we
                discovered and exploited.
                </p>
            </div>
            <div class="sub-section">
                <div class="sec-row">
                    <a href="/" class="card-link">
                        <div class="card">
                            <img src="./images/red-teaming.jpg"></img>
                            <div class="card-name">Red Teaming</div>
                            <div class="card-overlay"></div>
                        </div>
                    </a>
                    <a href="/" class="card-link">
                        <div class="card">
                            <img src="./images/network-security.jpg"></img>
                            <div class="card-name">Network Security</div>
                            <div class="card-overlay"></div>
                        </div>
                    </a>
                </div>
                <div class="sec-row logo-sec">
                    <?php include_once "./svgs/servicesvg.svg"; ?>
                </div>
                <div class="sec-row">
                    <a href="/" class="card-link">
                        <div class="card">
                            <img src="./images/web-security.jpg"></img>
                            <div class="card-name">Web Security</div>
                            <div class="card-overlay"></div>
                        </div>
                    </a>
                    <a href="/" class="card-link">
                        <div class="card">
                            <img src="./images/social-engg.jpg"></img>
                            <div class="card-name">Social Engineering</div>
                            <div class="card-overlay"></div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="picfoot"></div>
    <?php include_once "shared/footer.php" ?>
</body>
</html>