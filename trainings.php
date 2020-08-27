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
                            <img src="./images/web-training.jpg"></img>
                            <div class="card-name">Secure Web Development</div>
                            <div class="card-overlay"></div>
                        </div>
                    </a>
                    <a href="/" class="card-link">
                        <div class="card">
                            <img src="./images/android-training.jpg"></img>
                            <div class="card-name">Secure Android Development</div>
                            <div class="card-overlay"></div>
                        </div>
                    </a>
                </div>
                <div class="sec-row logo-sec">
                    <?php include_once "./svgs/trainingsvg.svg"; ?>
                </div>
                <div class="sec-row">
                    <a href="/" class="card-link">
                        <div class="card">
                            <img src="./images/hacking-training.jpg"></img>
                            <div class="card-name">Ethical Hacking</div>
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