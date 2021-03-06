<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Inspire Norfolk</title>
        <meta name="description" content="Leading a generation into work">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link rel="shortcut icon" href="img/icons/favicon.png">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
        <script src="https://kit.fontawesome.com/352c99e409.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="css/stylesheet.css">
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin=""/>
        <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
        <script src='https://www.google.com/recaptcha/api.js'></script>
    </head>
    
    <body>
        <div id="container">
            <div id="inner">
                <?php include "header.html"?>
                <main id="contact-page">
                    <div class="container banner">
                        <div class="page-center">

                        </div>
                    </div>
                    <div class="container">
                        <div class="page-center left-align">
                            <h1>Contact Us</h1>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p>
                            <?php include "php/contact-check.php" ?>
                            <form class="contact-form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                                <div class="form-section">
                                    <div class="form-subsection">
                                        <label for="name-input" class="required-field">Full Name</label>
                                        <input name="name" id="name-input" type="text" class="form-input" value="<?php echo $name;?>">
                                    </div>
                                    <div class="form-subsection">
                                        <label for="email-input" class="required-field">Email Address</label>
                                        <input name="email" id="email-input" type="text" class="form-input" value="<?php echo $email;?>">
                                    </div>
                                    <div class="form-subsection">
                                        <label for="number-input" class="required-field">Phone Number</label>
                                        <input name="phone" id="number-input" type="text" class="form-input" value="<?php echo $phone;?>">
                                    </div>
                                    
                                </div>
                                <div class="form-section">
                                    <div class="form-subsection">
                                        <label for="message-input" class="required-field">Message</label>
                                        <textarea name="message" id="message-input" class="form-input"><?php echo $message;?></textarea>
                                    </div>
                                    <div class="gdpr-container">
                                        <input id="gdpr-checkbox" type="checkbox">
                                        <label for="gdpr-checkbox" class="required-field">I have read and agree to the Inspire Norfolk <a href="privacy_terms.php">Privacy Policy & Terms of Service</a>.</label>
                                    </div>
                                </div>
                                <div class="g-recaptcha" data-sitekey="6LeSZZ0cAAAAAGCWrZOlAlvSMUCPda4TWEgHDLca"></div>
                                <input type="submit" value="Send" id="form-submit-button" class="button">
                            </form>
                            <script src="js/formValidation.js"></script>
                            
                        </div>
                    </div>
                    <div class="container">
                        <div class="page-center left-align">
                            <div class="text-container">
                                <h1>Come See Us <hr></h1>
                                <p>
                                    19 St John Maddermarket, Norwich NR2 1DN <br>
                                    info@inspirenorfolk.co.uk <br>
                                    01603 670909
                                </p>
                            </div>
                            <div class="contact-details">
                                <div id="leafletjs-map"></div>
                                <script src="js/initMap.js"></script>
                            </div>
                        </div>
                    </div>
                    
                </main>
                <?php include "footer.html"?>
            </div>
        </div>

    </body>
</html>