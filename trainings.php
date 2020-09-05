<?php

    include_once "back/dbconn.php";

    $db_connection = new Db_Connect();
    $conn = $db_connection->get_connection();

?>

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
                            <div class="card-name"><span class="card-btn"><?php echo $training['name'] ?></span></div>
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
                            <div class="card-action"><span class="card-btn btn-action">Register Now</span></div>
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

</body>
<script src="./js/scroll.js"></script>
<script>
    createObserver(1, "section-head");
    createObserver(1, "section-para");
    createObserver(0.1, "card");
</script>

</html>