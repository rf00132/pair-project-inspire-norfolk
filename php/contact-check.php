<?php


    // Checks if form has been submitted
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        function post_captcha($user_response) {
            $fields_string = '';
            $fields = array(
                'secret' => '6LeSZZ0cAAAAAMHGRUkz8298F6PkRASoUb4xj2hs',
                'response' => $user_response
            );
            foreach($fields as $key=>$value)
            $fields_string .= $key . '=' . $value . '&';
            $fields_string = rtrim($fields_string, '&');

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, 'https://www.google.com/recaptcha/api/siteverify');
            curl_setopt($ch, CURLOPT_POST, count($fields));
            curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, True);

            $result = curl_exec($ch);
            curl_close($ch);

            return json_decode($result, true);
        }

        // Call the function post_captcha
        $res = post_captcha($_POST['g-recaptcha-response']);

        if (!$res['success']) {
            // What happens when the CAPTCHA wasn't checked
            echo '<p>Please go back and make sure you check the security CAPTCHA box.</p><br>';
        } else {
            // If CAPTCHA is successfully completed...
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
        
            echo '<b>Form Submitted</b>';
        }
    }




?>
        
        
        
        

        


