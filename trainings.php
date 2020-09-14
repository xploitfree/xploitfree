<?php

    include_once "back/dbconn.php";
    include_once "back/funcs.php";

    $db_connection = new Db_Connect();
    $conn = $db_connection->get_connection();

    if(!isset($_GET['name'])){

//************* Training Menu Code Starts ***************************//
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/xlogo.ico">
    <link rel="stylesheet" href="./css/styl.css">
    <link rel="stylesheet" href="./css/menu.css">
    <title>Services</title>
</head>

<body>

    <?php include_once "shared/header.php" ?>

    <div class="content">
        <div class="section">
            <section class="sub-section1">
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
            </section>
            <section class="sub-section2">

        <?php

            $query_trainings = "select * from trainings";

            $trainings_data = $conn->query($query_trainings);

            $no_of_trainings = $trainings_data->num_rows;

            $counter = 0;

            while($training = $trainings_data->fetch_array(MYSQLI_ASSOC)){
                if($counter % 2 == 0){
        ?>

                <div class="sec-row">

                    <?php } ?>

                    <a href=<?php echo $training['training_url'] ?> class="card-link">
                        <div class="card <?php echo ($counter % 2 == 0) ? "left": "right" ?> ">
                            <img src=<?php echo $training['img_url'] ?>></img>
                            <div class="card-name"><span class="card-btn"><?php echo $training['name'] ?></span>
                            </div>
                            <div class="card-overlay">
                                <ul class="card-list">
                                    <?php 
                                    $query_features = "select feature_name from features_of_training where training_id ='".$training["id"]."'";

                                    $features_data = $conn->query($query_features);

                                    while($feature = $features_data->fetch_array(MYSQLI_ASSOC)){
                                ?>
                                    <li class="list-item">
                                        <span class="item-icon"> <?php ticksvg(13, 13) ?> </span>
                                        <span class="item-text"><?php echo $feature['feature_name'] ?></span>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </div>
                            <div class="card-action">
                                <span data-name="<?php echo $training['name'] ?>" class="card-btn btn-action" onclick="btnClickHandler(this, <?php echo is_training_available($training['name']) ?>, event)" title="Register Now">Register Now</span>
                            </div>
                        </div>
                    </a>

                    <?php 

                    $counter++;
                    if($counter == 2){
                ?>

                </div>

                <div class="sec-row logo-sec">
                    <?php trainingsvg(238, 148) ?>
                </div>

                <?php } 
                if($counter == $no_of_trainings && $no_of_trainings % 2 == 0){
                    echo '</div>';
                }
                else if($counter == $no_of_trainings && $no_of_trainings %2 != 0){
                    echo '<a class="card-link"></a></div>';
                }
            } ?>
            </section>
        </div>
    </div>

    <?php include_once "shared/footer.php" ?>
    <?php include_once "shared/register.php"; ?>
    <?php include_once "shared/preloader.php" ?>

</body>
<script src="./js/scroll.js"></script>
<script src="./js/preloader.js"></script>
<script src="./js/modal.js"></script>
<script>
    createObserver(1, "section-head");
    createObserver(1, "section-para");
    createObserver(0.1, "card");
</script>

</html>

<?php

//*************************** Training Menu code ends **************************//

    }
    else if(isset($_GET['name'])){

        $name = implode(' ',explode('_', $_GET['name']));

        $name = sanitizeStringOstyle($conn, $name);

        $name = filter_var($name, FILTER_SANITIZE_STRING);

        $query = "select * from trainings where name = '$name'";
    
        $data = $conn->query($query);
    
        $row_returned = $data->num_rows;

        if($row_returned){

            $training = $data->fetch_array(MYSQLI_ASSOC);

//*************************** Selected training code starts **************************//

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/xlogo.ico">
    <link rel="stylesheet" href="./css/styl.css">
    <link rel="stylesheet" href="./css/trainings.css">
    <title><?php echo $training['name'] ?></title>
</head>

<body>
    <?php include_once "shared/header.php" ?>

    <div class="content content-wrap">
        <div class="main-content">

            <section class="section-main">
                <div class="training-head">
                    <p><?php echo $training['name'] ?></p>
                </div>
                <div class="training-info">
                    <p><?php echo $training['description'] ?></p>
                </div>
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
                <p class="body-head"><strike class="head-sec">&#8377;<?php echo $training['cp'] ?></strike><span
                        class="head-main">&#8377;<?php echo $training['sp'] ?>/--</span></p>
                <p class="body-para">Starts from 10th September to 15th September</p>
                <p class="body-para">2hrs/Day</p>
            </div>
            <div class="training-action">
                <span data-name="<?php echo $training['name'] ?>" class="training-btn btn-action" onclick="btnClickHandler(this, <?php echo is_training_available($training['name']) ?>, event)" title="Register Here">Register Here</span>
            </div>
        </div>

    </div>

    <?php include_once "shared/register.php"; ?>
    <?php include_once "shared/footer.php" ?>
    <?php include_once "shared/preloader.php" ?>
</body>

<script src="./js/scroll.js"></script>
<script src="./js/preloader.js"></script>
<script src="./js/modal.js"></script>
<script>
    createObserver(1, "section-main");
    createObserver(0.3, "training-card");
    createObserver(0.1, "topics");
    createObserver(1, "subtopics");
    createObserver(1, "perk");
</script>

</html>

<?php 

//*************************** Selected training code ends **************************//

    }else{
        include_once "shared/notfound.php";
    }
}
?>