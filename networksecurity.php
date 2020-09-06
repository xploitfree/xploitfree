<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/styl.css">
    <link rel="stylesheet" href="./css/services.css">
    <title>Network Security|XploitFree Services</title>
</head>

<body class="ns-section">

    <div id="page-wrapper">

        <?php include_once "shared/header.php" ?>

        <div class="service-section">
            <div class="content content-wrap">
                <section class="section-main">
                    <div class="service-head">
                        <p>Worried choosing someone for phising vishing and Smishing? <br />Don’t you worry we handle
                            them with utmost care.</br><em><b>OUR RENUNCIATION FOR YOUR SALVATION !</b></em></p>
                    </div>
                    <button class="service-btn top-btn" onclick="btnClickHandler(this)">Register Now</button>
                </section>
                <section class="section-sec">
                    <div class="section-what">
                        <div class="section-q">
                            <p><span class="what">What is Network Vulnerability and Assessment test ?</span></p>
                        </div>
                        <div class="section-a">
                            <p>Network vulnerability assessment and penetration testing is an offensive assessment to
                                identify security vulnerability in organizational network. The primary objective of a
                                network VAPT is to identify exploitable security loopholes in systems and network
                                devices so that security vulnerabilities can be fixed before adversaries identify and
                                exploit them. This assessment will focus to deliver complete security assessment and
                                penetration testing of your network through our unique offering of Attacker Simulated
                                Exploitation.
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
                                <?php nss1svg(100, 100, "sicon1") ?>
                                <p class="step-title">Vulnerability identification</p>
                                <p class="step-info">Our team will perform automated vulnerability scanning to detect
                                    potential vulnerabilities.</p>
                            </div>
                            <?php rtsmarrowsvg("rarrow1") ?>
                            <div class="step step2">
                                <?php nss2svg(100, 100, "sicon2") ?>
                                <p class="step-title">Analysis & Exploitation</p>
                                <p class="step-info">Our team will simulate exploitation to identify security
                                    vulnerabilities. Then we’ll analys the simulation.</p>
                            </div>
                            <?php rtsmarrowsvg("rarrow2") ?>
                            <div class="step step3">
                                <?php nss3svg(100, 100, "sicon3") ?>
                                <p class="step-title">Risk Assesment</p>
                                <p class="step-info">We will then make assessment of identified vulnerabilities to
                                    determine the likelihood and impact on the organization.</p>
                            </div>
                            <?php rtsmarrowsvg("rarrow3") ?>
                            <div class="step step4">
                                <?php nss4svg(100, 100, "sicon4") ?>
                                <p class="step-title">Report Submission</p>
                                <p class="step-info">We will then provide an in-depth report on all the issues and
                                    provide proof of Concepts, exploitation techniques, demos and fix recommendations.
                                </p>
                            </div>
                        </div>
                    </div>
                    <button class="service-btn bottom-btn" onclick="btnClickHandler(this)">Do Network V.A.P.T for me</button>
                </section>
            </div>
        </div>

        <?php include_once "shared/footer.php" ?>
        <?php include_once "shared/register.php"; ?>

    </div>
    <?php include_once "shared/preloader.php" ?>
</body>

<script src="./js/scroll.js"></script>
<script src="./js/preloader.js"></script>
<script src="./js/services.js"></script>
<script src="./js/modal.js"></script>
<script>
    document.documentElement.style.setProperty('--how-color', '#6FB5BF')
</script>

</html>