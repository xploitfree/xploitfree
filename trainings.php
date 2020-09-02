<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/styl.css">
    <link rel="stylesheet" href="./css/menu.css">
    <title>Services</title>
</head>
<body>
    <?php include_once "shared/header.php" ?>
    
    <div class="content">
        <div class="section">
            <div class="sub-section1">
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
            </div>
            <div class="sub-section2">
                <div class="sec-row">
                    <a href="/" class="card-link">
                        <div class="card">
                            <img src="./images/web-training.jpg"></img>
                            <div class="card-name"><span class="card-btn">Secure Web Development</span></div>
                            <div class="card-overlay">
                                <ul class="card-list">
                                    <li class="list-item">
                                        <span class="item-icon"> <?php ticksvg(13, 13) ?> </span>
                                        <span class="item-text">Learn Html5, CSS3, Javascript, Php</span>
                                    </li>
                                    <li class="list-item">
                                        <span class="item-icon"> <?php ticksvg(13, 13) ?> </span>
                                        <span class="item-text">Develop Secure Website</span>
                                    </li>
                                    <li class="list-item">
                                        <span class="item-icon"> <?php ticksvg(13, 13) ?> </span>
                                        <span class="item-text">Live Deployment</span>
                                    </li>
                                    <li class="list-item">
                                        <span class="item-icon"> <?php ticksvg(13, 13) ?> </span>
                                        <span class="item-text">Get Certification</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-action"><span class="card-btn btn-action">Register Now</span></div>
                        </div>
                    </a>
                    <a href="/" class="card-link">
                        <div class="card">
                            <img src="./images/android-training.jpg"></img>
                           <div class="card-name"><span class="card-btn">Secure Android Development</span></div>
                            <div class="card-overlay">
                                <ul class="card-list">
                                    <li class="list-item">
                                        <span class="item-icon"> <?php ticksvg(13, 13) ?> </span>
                                        <span class="item-text">Learn Html5, CSS3, Javascript, Php</span>
                                    </li>
                                    <li class="list-item">
                                        <span class="item-icon"> <?php ticksvg(13, 13) ?> </span>
                                        <span class="item-text">Develop Secure Website</span>
                                    </li>
                                    <li class="list-item">
                                        <span class="item-icon"> <?php ticksvg(13, 13) ?> </span>
                                        <span class="item-text">Live Deployment</span>
                                    </li>
                                    <li class="list-item">
                                        <span class="item-icon"> <?php ticksvg(13, 13) ?> </span>
                                        <span class="item-text">Get Certification</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-action"><span class="card-btn btn-action">Register Now</span></div>
                        </div>
                    </a>
                </div>
                <div class="sec-row logo-sec">
                    <?php trainingsvg(238, 148) ?>
                </div>
                <div class="sec-row">
                    <a href="/" class="card-link">
                        <div class="card">
                            <img src="./images/hacking-training.jpg"></img>
                            <div class="card-name"><span class="card-btn">Ethical Hacking</span></div>
                            <div class="card-overlay">
                                <ul class="card-list">
                                    <li class="list-item">
                                        <span class="item-icon"> <?php ticksvg(13, 13) ?> </span>
                                        <span class="item-text">Learn Html5, CSS3, Javascript, Php</span>
                                    </li>
                                    <li class="list-item">
                                        <span class="item-icon"> <?php ticksvg(13, 13) ?> </span>
                                        <span class="item-text">Develop Secure Website</span>
                                    </li>
                                    <li class="list-item">
                                        <span class="item-icon"> <?php ticksvg(13, 13) ?> </span>
                                        <span class="item-text">Live Deployment</span>
                                    </li>
                                    <li class="list-item">
                                        <span class="item-icon"> <?php ticksvg(13, 13) ?> </span>
                                        <span class="item-text">Get Certification</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-action"><span class="card-btn btn-action">Register Now</span></div>
                        </div>
                    </a>
                    <a href="/" class="card-link">
                        
                    </a>
                </div>
            </div>
        </div>
    </div>
    <?php include_once "shared/footer.php" ?>
</body>

<script src="./js/scroll.js"></script>
<script>
    createObserver(0.6, "sub-section1");
    createObserver(0.6, "sub-section2");
</script>

</html>