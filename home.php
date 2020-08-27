<!DOCTYPE html>
<html>
    <head>
            <title>XploitFree Security</title>
            <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700|Dancing+Script:400,700|Frank+Ruhl+Libre:400,500,700|Gloria+Hallelujah|Liu+Jian+Mao+Cao|Ruge+Boogie|Sacramento|Turret+Road:400,500&display=swap" rel="stylesheet">
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
            <link rel="stylesheet" href="./css/styl.css">
            <link href="https://fonts.googleapis.com/css2?family=Open+Sans+Condensed:wght@300&family=Roboto:wght@300&display=swap" rel="stylesheet">


        </head>
        <body>  

        <!-- header container -->
                
            <?php
                include_once 'shared/header.php';
            ?>
            
            <!-- hero page1 -->

                <div class="row hero1">
                    <div class="col-5 secure d-flex flex-column justify-content-center align-items-center">
                        <p id="securetext">
                            Secure<br>Your Digital<br>Presense!
                        </p>
                    </div>
                    <div class="col-2 audit d-flex flex-column justify-content-end align-items-end">
                        <button class="herobtn">Audit Now</button>
                    </div>
                </div>

            <!-- hero page2 -->

                
                <div class="row hero2">
                    <div class="col-5 prevention d-flex flex-column justify-content-center align-items-center">
                        <div class="row align-items-center justify-content-center" style="height:55%;width:100%">
                        <p id = "preventiontext">
                            <span style="color:#1e8130">Prevention</span> is<br> better than<br> cure
                        </p>
                        </div>
                        <div class="row" style="height:45%;width:45%">
                            <p class="preventionsub">
                                    Make your applications prone to cyber threats with our little help. Join our trainings to get insights of Do’s and Dont’s while development.  
                            </p>
                        </div>
                    </div>
                    <div class="col-2 audit d-flex flex-column justify-content-end align-items-end">
                        <button class="herobtn">Audit Now</button>
                    </div>
                </div>

            <!-- hero3 -->

                <div class="row hero3">
                    <div class="hero3box">
                    <div class="row whowe align-items-center">
                        <p class="whoweare">Who we are...</p>
                    </div>
                    <div class="row whoweinfo">
                            We are an IT security company covering the latest news, research, cyber 
                            threats and malware discoveries.Cyber security threats are increasing day
                            by day as the hackers are using latest tools and tricks to intrude into
                            business networks.
                    </div>
                    <div class="row whowebtn justify-content-end">
                        <button class="whowebttn">Know More</button>
                    </div>
                    </div>
                </div>

            <!-- Testimony -->
                <div class="row testimony">
                    <div class="container">
                        <div class="row testhead justify-content-center align-items-center">
                            <p>What they said about us...</p>
                        </div>
                        <div class="row testimg justify-content-center">
                            <div class="col-2">
                                
                            </div>
                        </div>
                        <div class="row testname justify-content-center">
                                <p>Shubham Upadhyay<br> 
                            Associate Consultant, XYZ Company</p>
                        </div>
                        <div class="row testdata justify-content-center align-items-center">
                            <div class="col-8">
                                  <p>  “The audits done by XploitSecurity team helped us identify 
                                    key vulnerablities in our website. Security report provided 
                                    to us enabled us secure loopholes in our website and further
                                     helped us in enhancing security in order to provide a more 
                                     secure experience to users.“ </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- footer -->
               <?php
                include 'shared/footer.php';
                ?>
    </body>

</html>

          
                