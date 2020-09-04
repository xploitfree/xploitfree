<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/styl.css">
    <link rel="stylesheet" href="./css/services.css">
    <title>Web Security|XploitFree Services</title>
</head>

<body class="ws-section">
    <?php include_once "shared/header.php" ?>

    <div class="service-section">
        <div class="content content-wrap">
            <section class="section-main">
                <div class="service-head">
                    <p>Worried choosing someone for phising vishing and Smishing? <br />Don’t you worry we handle them with utmost care.</br><em><b>OUR RENUNCIATION FOR YOUR SALVATION !</b></em></p>
                </div>
                <button class="service-btn top-btn">Register Now</button>
            </section>
            <section class="section-sec">
                <div class="section-what">
                    <div class="section-q">
                        <p><span class="what">What is Web Application Security test ?</span></p>
                    </div>
                    <div class="section-a">
                        <p>Web Application Security Testing Service aims at identifying business logic and complex technical vulnerabilities in your web applications from a hacker’s point of view and providing you remediation guidelines to fix the identified issues.
                        </p>
                        <div>
                            <div class="flowchart"></div>
                        </div>
                    </div>
                </div>
                
                <div class="section-how">
                    <div class="section-q">
                        <span class="how">How is it done ?</span>
                    </div>
                    <div class="steps">
                        <div class="step step1">
                            <?php rts1svg(100, 100, "sicon1") ?>
                            <p class="step-title">Set Objective</p>
                            <p class="step-info">Our team will set objectives of attack by discussing with you</p>
                        </div>
                        <?php rtarrowsvg("rarrow1") ?>
                        <div class="step step2">
                            <?php rts2svg(100, 100, "sicon2") ?>
                            <p class="step-title">Gather information</p>
                            <p class="step-info">You will provide us with relevant information</p>
                        </div>
                        <?php rtarrowsvg("rarrow2") ?>
                        <div class="step step3">
                            <?php rts3svg(100, 100, "sicon3") ?>
                            <p class="step-title">Simulate attack</p>
                            <p class="step-info">Our team will simulate attack on your employees</p>
                        </div>
                        <?php rtarrowsvg("rarrow3") ?>
                        <div class="step step4">
                            <?php rts4svg(100, 100, "sicon4") ?>
                            <p class="step-title">Report Findings</p>
                            <p class="step-info">We will submit you detailed report of loopholes in your website</p>
                        </div>
                    </div>
                </div>
                <button class="service-btn bottom-btn">Do  W.A.P.T for me</button>
            </section>
        </div>
    </div>

    <?php include_once "shared/footer.php" ?>
</body>

<script src="./js/scroll.js"></script>
<script src="./js/services.js"></script>
<script>
    document.documentElement.style.setProperty('--how-color', '#BE531D')
</script>

</html>