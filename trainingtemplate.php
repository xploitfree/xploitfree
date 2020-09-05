<?php

    include_once "back/dbconn.php";

    $db_connection = new Db_Connect();
    $conn = $db_connection->get_connection();

    $id = $_GET['id'];

    $query = "select * from trainings where id = $id";

    $data = $conn->query($query);

    $training = $data->fetch_array(MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/styl.css">
    <link rel="stylesheet" href="./css/trainings.css">
    <title><?php echo $training['name'] ?></title>
</head>

<body>
    <?php include_once "shared/header.php" ?>

    <div class="content content-wrap">
        <div class="main-content">

            <section class="section-main">
                <div class="training-head"><p><?php echo $training['name'] ?></p></div>
                <div class="training-info"><p><?php echo $training['description'] ?></p></div>
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
                        <?php
                            $head_query = "select * from content_heads where training_id ='".$training["id"]."'";

                            $head_data = $conn->query($head_query);

                            while($head = $head_data->fetch_array(MYSQLI_ASSOC)){
                        ?>
                            <li class="topics"><?php echo $head['head_name'] ?>

                                <ul class="topic-sublist">
                                    <?php
                                        $content_query = "select * from content where head_id ='".$head["id"]."'";

                                        $content_data = $conn->query($content_query);

                                        while($content = $content_data->fetch_array(MYSQLI_ASSOC)){
                                    ?>
                                        <li class="subtopics"><?php echo $content['content_name'] ?></li>
                                    <?php } ?>
                                </ul>

                            </li>

                        <?php } ?>
                    </ul>
                </div>

            </section> 

        </div>

        <div class="training-card">
            <img src=<?php echo $training['img_url'] ?>></img>
            <div class="training-name"><span class="training-btn"><?php echo $training['name'] ?></span></div>
            <div class="card-body">
                <p class="body-head"><strike class="head-sec">&#8377;<?php echo $training['cp'] ?></strike><span class="head-main">&#8377;<?php echo $training['sp'] ?>/--</span></p>
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