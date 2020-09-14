<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/xlogo.ico">
    <link rel="stylesheet" href="./css/styl.css">
    <link rel="stylesheet" href="./css/services.css">
    <link rel="stylesheet" href="./css/special.css">
    <title>Web Security|XploitFree Services</title>
</head>

<body class="ws-section">

    <?php include_once "shared/header.php" ?>

    <div class="service-section">
        <div class="content content-wrap">
            <section class="section-main">
                <div class="service-head">
                    <p>Want someone to diagnose your web app as you deal with the aesthetics of your business, you'll be fine with us.</p>
                </div>
                <button data-name="Web Security" class="service-btn top-btn" onclick="btnClickHandler(this)">Register Now</button>
            </section>
            <section class="section-sec">
                <div class="section-what">
                    <div class="section-q">
                        <p><span class="what">What is Web Application Security test ?</span></p>
                    </div>
                    <div class="section-a">
                        <p>Web Application Security Testing Service aims at identifying business logic and complex
                            technical vulnerabilities in your web applications from a hacker’s point of view and
                            providing you remediation guidelines to fix the identified issues.
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
                    <div class="steps column">

                        <div class="steps-row">
                            <div class="step step1">
                                <?php wss1svg(150, 150, "sicon1") ?>
                                <p class="step-title">Application profiling and reconnassiance</p>
                                <p class="step-info">Our team will set objectives and will reconnassiance</p>
                            </div>
                            <?php rtbgarrowsvg("rarrow1") ?>
                            <div class="step step2">
                                <?php wss2svg(150, 150, "sicon2") ?>
                                <p class="step-title">Web-application mapping and test case generation</p>
                                <p class="step-info">•We create an in-depth map of your web-aplcation, business
                                    logic and workflow for through manual assessment</p>
                            </div>
                            <?php rtbgarrowsvg("rarrow2") ?>
                        </div>

                        <div class="steps-row row-end">
                            <div class="step step3">
                                <?php wss3svg(150, 150, "sicon3") ?>
                                <p class="step-title">Vulneribility assessment and business logic testing</p>
                                <p class="step-info">Our testing includes identifying both technical (OWASP Top 10,
                                    WASC 25) and business logic vulnerabilities through proprietary, open-source and
                                    commercial tools</p>
                            </div>
                        </div>

                        <div class="steps-row">
                            <div class="step step5">
                                <?php wss5svg(150, 150, "sicon5") ?>
                                <p class="step-title">Reporting</p>
                                <p class="step-info">Our reports provide step-by-step POCs and detailed fix
                                    recommendations</p>
                            </div>
                            <?php rtbgarrowsvg("rarrow4") ?>
                            <div class="step step4">
                                <?php wss4svg(150, 150, "sicon4") ?>
                                <p class="step-title">Exploitation</p>
                                <p class="step-info">Our team will simulate exploitation to identify security
                                    vulnerabilities. Then we’ll analys the simulation</p>
                            </div>
                            <?php rtbgarrowsvg("rarrow3") ?>
                        </div>

                    </div>
                </div>
                <button data-name="Web Security" class="service-btn bottom-btn" onclick="btnClickHandler(this)">Do W.A.P.T for me</button>
            </section>
        </div>
    </div>

    <?php include_once "shared/footer.php" ?>
    <?php include_once "shared/register.php"; ?>
    <?php include_once "shared/preloader.php" ?>
</body>

<script src="./js/scroll.js"></script>
<script src="./js/preloader.js"></script>
<script src="./js/services.js"></script>
<script src="./js/modal.js"></script>
<script>
    document.documentElement.style.setProperty('--how-color', '#BE531D')
</script>

</html>