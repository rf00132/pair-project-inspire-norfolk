<?php

    try {
        $db = new PDO("mysql:host=localhost;port=3306;dbname=", "", "");
        $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    } catch (Exception $e) {
        echo "Unable to connect";
        echo $e->getMessage();
        exit;
    }

    function escape($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

//       Variable set up
$name = $email = $phone = $message = "";

//       Error checking and filtering
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      
        if (empty($_POST["name"])) {
            $error = true;
        } else {
            $name = filter_input( INPUT_POST, "name", FILTER_SANITIZE_STRING );
        }
        
        if (empty($_POST["email"])) {
            $error = true;
        } else {
            $email = filter_input( INPUT_POST, "email", FILTER_SANITIZE_EMAIL );
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error = true;
            }
        }
            
        if (empty($_POST["phone"])) {
            $error = true;
        } else {
            $phone = filter_input( INPUT_POST, "phone", FILTER_SANITIZE_NUMBER_INT );
            if (strlen($phone) < 10 || strlen($phone) > 15) {
            $error = true;
            }
        }
        
        if (empty($_POST["message"])) {
            $error = true;
        } else {
            $message = filter_input( INPUT_POST, "message", FILTER_SANITIZE_STRING );
        }
      
//          Escaping output and submitting
      
        if ($error == false) { 
            $name = escape($name);
            $email = escape($email);
            $phone = escape($phone);
            $subject = escape($subject);
            $message = escape($message);

            $sql = "INSERT INTO responses VALUES (NULL, ?, ?, ?, ?)";
    
            try {
                    $results = $db->prepare($sql);
                    $results->bindValue(1, $name, PDO::PARAM_STR);
                    $results->bindValue(2, $email, PDO::PARAM_STR);
                    $results->bindValue(3, $phone, PDO::PARAM_STR);
                    $results->bindValue(4, $message, PDO::PARAM_STR);
                    $submitErr = !$results->execute();
                } catch (Exception $e) {
                $submitErr = true;
            }


            if ($submitErr == false) {
                $sent = true;
                $name = $email = $phone = $message = "";
            }
        }
    }

    try{
    $responses = $db->query('SELECT * FROM responses');
    $statement = $responses->fetchAll();
    }
    catch (exception $e) {
        echo $e->getMessage();
    } ?>
    <p> Number of responses: <?php if(!empty($statement)) echo count($statement);?> </p>


<?php
require_once '../src/autoload.php';

define("RECAPTCHA_V3_SECRET_KEY", '6Lcgh3McAAAAAM-lz9Bd7FIJvtrhZLZyy_YKCZhb');
 
if (isset($_POST['email']) && $_POST['email']) {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
} else {
    // set error message and redirect back to form...

    //we need to change this
    header('location: subscribe_newsletter_form.php');
    exit;
}

$token = $_POST['token'];
$action = $_POST['action'];

// use the reCAPTCHA PHP client library for validation
$recaptcha = new \ReCaptcha\ReCaptcha(RECAPTCHA_V3_SECRET_KEY);
$resp = $recaptcha->setExpectedAction($action)
                  ->setScoreThreshold(0.5)
                  ->verify($token, $_SERVER['REMOTE_ADDR']);

 // verify the response
if ($resp->isSuccess()) {
    // valid submission
    // go ahead and do necessary stuff
} else {
    // collect errors and display it
    $errors = $resp->getErrorCodes();
}
?>