<!DOCTYPE html>
<html>

<head>
    <title>Contact us</title>
    <link rel="icon" href="images/xlogo.ico">
    <link
        href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700|Dancing+Script:400,700|Frank+Ruhl+Libre:400,500,700|Gloria+Hallelujah|Liu+Jian+Mao+Cao|Ruge+Boogie|Sacramento|Turret+Road:400,500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans+Condensed:wght@300&family=Roboto:wght@300&display=swap"
        rel="stylesheet">
    <!-- <link href="./styl.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="./css/styl.css">
    <link rel="stylesheet" href="./css/contactus.css">


</head>

<body>


    <?php
    include 'shared/header.php';
?>

    <div class="c2ccont">
        <div class="row c2cdetail justify-content-between">
            <div class="col-7 d-flex flex-column align-items-start">
                <p class="forbusi">For queries:-</p>
                <p class="fordata"><span><?php phnsvg(30, 30, "black") ?></span>(+91) 8800880088</p>
                <p class="fordata"><span><?php mailsvg(30, 30, "black") ?></span>xploitfreesecurity@gmail.com</p>
            </div>
            <div class="col-5 d-flex flex-column align-items-start">
                <p class="forbusi">For Business:-</p>
                <p class="fordata"><span><?php phnsvg(30, 30, "black") ?></span>(+91) 8800880088</p>
                <p class="fordata"><span><?php mailsvg(30, 30, "black") ?></span>xploitfreesecurity@gmail.com</p>
            </div>
        </div>
        <form method="POST" name="contact_form" onsubmit="formValidation(event)">
            <div class="row cform">
                <div class="col-6 cformcol">
                    <p class="dropp">Or drop a message below</p>
                    <p class="form-msg error-msg"></p>
                    <input name="yname" class="cforminp" type="text" placeholder="Your Name" />
                    <input name="email" class="cforminp" type="text" placeholder="Email" />
                    <input name="phone" class="cforminp" type="text" placeholder="Phone Number" />
                </div>
                <div class="col-6 cformcolimg">

                </div>
            </div>
            <div class="row cformr2">
                <div class="col-12" style="height:100%">
                    <input name="subject" class="cforminp1" type="text" placeholder="Subject" />
                </div>
            </div>

            <div class="biginp">
                <div class="row biginpr">
                    <div class="col-12 biginpc">
                        <textarea name="message" class="txtara" placeholder="message" name="" id="" cols="30"
                            rows="10"></textarea>
                    </div>
                </div>
                <div class="row biginprb justify-content-end">
                    <div class="c2ccolb col-2 d-flex flex-column justify-content-start align-items-center">
                        <button name="submit" class="c2csub">Submit</button>
                    </div>
                </div>
            </div>
        </form>
</div>

        <?php
    include 'shared/footer.php';
?>

</body>

<script src="./js/contact.js"></script>

</html>