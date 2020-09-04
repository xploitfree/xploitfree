<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/styl.css">
    <link rel="stylesheet" href="./css/trainings.css">
    <title>Training</title>
</head>

<body>
    <?php include_once "shared/header.php" ?>

    <div class="content content-wrap">
        <div class="main-content">

            <section class="section-main">
                <div class="training-head"><p>Secure Web Development</p></div>
                <div class="training-info"><p>Today, anyone can build a website easily, but students or practitiones forget a major concern in the industry, i.e to make their website secure. Secure not in terms of validating data, but in the terms of cybersecurity.Yes, have you ever heard about OWASP's Top 10 vulnerablities, go and search for it. You will come to know how the websites get attacted by hackers to steal your confidential data and harm your digital presence.Dont worry, we've got your back. Attend the workshop and get to know how to build a secured website, deploy it on server, attack and prevent your website.</p></div>
            </section>

            <section class="section-sec">

                <h2 class="perks-head">Perks of Completing our training!</h2>
                <div class="perks">
                    <div class="perk p1">
                        <?php certificatesvg("perk-icon") ?>
                        <p class="perk-name">Certification</p>
                    </div>
                    <div class="perk p2">
                        <?php skillupsvg("perk-icon") ?>
                        <p class="perk-name">Skill Development</p>
                    </div>
                    <div class="perk p3">
                        <?php studymatsvg("perk-icon") ?>
                        <p class="perk-name">Study Material</p>
                    </div>
                    <div class="perk p4">
                        <?php communitysvg("perk-icon") ?>
                        <p class="perk-name">Reliable Community</p>
                    </div>
                </div>

                <div class="training-content">
                    <h2 class="content-head">Contents of training</h2>
                    <ul class="content-list">
                        <li class="topics">HTML5
                            <ul class="topic-sublist">
                                <li class="subtopics">Dive into HTML5</li>
                                <li class="subtopics">Introduction</li>
                                <li class="subtopics">HTML5 Elements</li>
                                <li class="subtopics">Headings</li>
                                <li class="subtopics">Paragraphs</li>
                                <li class="subtopics">Links</li>
                                <li class="subtopics">Images</li>
                                <li class="subtopics">Tables</li>
                                <li class="subtopics">List</li>
                                <li class="subtopics">Forms</li>
                            </ul>
                        </li>
                        <li class="topics">CSS3
                            <ul class="topic-sublist">
                                <li class="subtopics">Dive into CSS3</li>
                                <li class="subtopics">Introduction</li>
                                <li class="subtopics">CSS Components</li>
                                <li class="subtopics">CSS Classes</li>
                            </ul>
                        </li>
                        <li class="topics">Javascript
                            <ul class="topic-sublist">
                                <li class="subtopics">Introduction</li>
                                <li class="subtopics">Variables</li>
                                <li class="subtopics">Functions</li>
                                <li class="subtopics">JS Form Validation</li>
                                <li class="subtopics">Cookies</li>
                                <li class="subtopics">Local Storage</li>
                            </ul>
                        </li>
                        <li class="topics">PHP
                            <ul class="topic-sublist">
                                <li class="subtopics">Get Post methods</li>
                                <li class="subtopics">PHP Super Global variables</li>
                                <li class="subtopics">PHP OOP</li>
                                <li class="subtopics">Ways of XSS attacks and Preventions</li>
                                <li class="subtopics">CSRF attack and Preventions</li>
                                <li class="subtopics">SQL Injection and Preventions</li>
                                <li class="subtopics">PHP filters</li>
                                <li class="subtopics">PHP form Handling</li>
                                <li class="subtopics">PHP form Filtering</li>
                                <li class="subtopics">Working with database</li>
                                <li class="subtopics">PHP URL Validation</li>
                                <li class="subtopics">Http and Https (SSL certificate)</li>
                                <li class="subtopics">Session</li>
                                <li class="subtopics">Data encryption and decryption</li>
                                <li class="subtopics">Deployment of website</li>
                            </ul>
                        </li>
                    </ul>
                </div>

            </section> 

        </div>

        <div class="training-card">
            <img src="./images/web-training.jpg"></img>
            <div class="training-name"><span class="training-btn">Secure Web Development</span></div>
            <div class="card-body">
                <p class="body-head"><strike class="head-sec">&#8377;800</strike><span class="head-main">&#8377;500/--</span></p>
                <p class="body-para">Starts from 10th September to 15th September</p>
                <p class="body-para">2hrs/Day</p>
            </div>
            <div class="training-action"><span class="training-btn btn-action">Register Here</span></div>
        </div>

    </div>

    <?php include_once "shared/footer.php" ?>
</body>

<script src="./js/scroll.js"></script>
<script>
    createObserver(1, "section-main");
    createObserver(0.3, "training-card");
    createObserver(0.1, "topics");
    createObserver(1, "subtopics");
    createObserver(1, "perk");
</script>
</html>