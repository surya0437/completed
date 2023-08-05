<?php
require_once "db.php";

// =======================================================================
// ==============================Popular locations========================
// ========================================================================

if (isset($_POST['login'])) {
    unset($_SESSION['loginError']);
    $email = strip_tags(mysqli_real_escape_string($con, $_POST['email']));
    $password = strip_tags(mysqli_real_escape_string($con, $_POST['password']));
    if (empty($email)) {
        $_SESSION['loginError'] = 'Please enter your email !!';
        echo '<script>
        window.history.back();
    </script>';
    } else if (empty($password)) {
        $_SESSION['loginError'] = 'Please enter your password !!';
        echo '<script>
        window.history.back();
    </script>';
    } else {
        $loginQry = "SELECT * FROM `administrators` WHERE `email`='$email'";
        $selectLogin = mysqli_query($con, $loginQry);
        $num = mysqli_num_rows($selectLogin);
        if ($num == 1) {
            while ($row = mysqli_fetch_assoc($selectLogin)) {
                if (password_verify($password, $row['password'])) {
                    $_SESSION['role'] = $row['role'];
                    $_SESSION['email'] = $row['email'];
                    echo "<script>
                            window.location.href = '../index.php';
                            </script>";
                } else {
                    $_SESSION['loginError'] = 'Invalid password !!';
                    echo '<script>
                            window.history.back();
                            </script>';
                }
            }
        } else {
            $_SESSION['loginError'] = 'Invalid email !!';
            echo '<script>
        window.history.back();
    </script>';
        }
    }
}

// =======================================================================
// ==============================Popular locations========================
// ========================================================================

if (isset($_POST['submit'])) {
    $topic = strip_tags(mysqli_real_escape_string($con, $_POST['topic']));
    $description = strip_tags(mysqli_real_escape_string($con, $_POST['description']));
    $image =  $_FILES['image'];
    $locationId = bin2hex(random_bytes(20));
    if (empty($topic)  || empty($description)) {
        echo "<script>alert('Please fill all the fields !!');
                // history.back();
            </script>";
    } else {

        $filename = $image['name'];
        $tempname = $image['tmp_name'];
        $size = $image['size'];
        $type = $image['type'];

        $file_ext = explode('.', $filename);
        $last_ext = strtolower(end($file_ext));
        $ext_arr = array('png', 'jpg', 'jpeg');

        if (in_array($last_ext, $ext_arr)) {
            if ($size < 2097152) {
                $location = 'locationImage/' . $filename;
                move_uploaded_file($tempname, $location);
                $sql = "INSERT INTO `popularlocations` (`locationId`, `topic`, `description`, `image`) 
                             VALUES ('$locationId', '$topic', '$description', '$location')";
                //  echo $sql;
                $re = mysqli_query($con, $sql);
                if ($re) {
                    echo "<script>alert('Added successfully');
                          window.history.back();
                        </script>";
                }
            } else {
                echo "<script>alert('file size must be less than 2mb');
                      window.history.back();
                     </script>";
            }
        } else {
            echo "<script>alert('File extension not valid. Enter png, jpg or jpeg file !!');
                 window.history.back();
                 </script>";
        }
    }
}



// =========================================================================
// =============================== Contact Form ============================
// =========================================================================

//contact form
if (isset($_POST['sendMessage']) && isset($_POST['name']) && isset($_POST['message']) && isset($_POST['message'])) {
    $name = strip_tags(mysqli_real_escape_string($con, $_POST['name']));
    $email = strip_tags(mysqli_real_escape_string($con, $_POST['email']));
    $subject = strip_tags(mysqli_real_escape_string($con, $_POST['subject']));
    $message = strip_tags(mysqli_real_escape_string($con, $_POST['message']));
    $contact_id = bin2hex(random_bytes(20));

    if (empty($name) || empty($email) || empty($message)) {
        $_SESSION['status'] = 'error';
        $_SESSION['error'] = 'Please fill all fields !';
        echo "<script>
                window.history.back();
                
            </script>";
    } else {
        $html =
            '
                <table>
                    <tr>
                        <td colspan="2" style="text-align: center;">New Message</td>
                    </tr>
                    <tr>
                        <td style="width: 120px;">Name:</td>
                        <td>' . "$name" . '</td>
                    </tr>
                    <tr>
                        <td>Email:</td>
                        <td>' . "$email" . '</td>
                    </tr>
                    <tr>
                        <td>Message:</td>
                        <td>' . "$message" . '</td>
                    </tr>
                </table>
            ';

        include('smtp/PHPMailerAutoload.php');

        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            try {
                $mail = new PHPMailer(true);
                $mail->isSMTP();
                $mail->Host = "smtp.gmail.com";
                $mail->Port = 587;
                $mail->SMTPSecure = "tls";
                $mail->SMTPAuth = true;
                $mail->Username = "parsllinternet@gmail.com";
                $mail->Password = "ctrzfpasipmdrewc";
                $mail->setFrom($email, 'Hotel Mountain View');
                $mail->addAddress('parsllinternet@gmail.com', '');

                $mail->IsHTML(true);
                $mail->Subject = $subject;
                // $mail->Subject = "You have got a new email";
                $mail->Body = $html;
                $mail->SMTPOptions = array('ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => false
                ));

                $send = $mail->send();

                if ($send) {
                    $subject = strip_tags(mysqli_real_escape_string($con, $_POST['subject']));
                    mysqli_query($con, "insert into `contact`(`Contact_id`, `Name`, `Email`, `subject`, `Message`) values('$contact_id','$name','$email','$subject','$message')");
                    $_SESSION['status'] = 'success';
                    echo "<script>
                            window.history.back();
                        </script>";
                }
            } catch (phpmailerException $e) {
                $_SESSION['status'] = 'error';
                $_SESSION['error'] = 'Email sending failed !<br>Please try again';
                echo "<script>
                        window.history.back();
                    </script>";
            }
        } else {
            $_SESSION['status'] = 'error';
            $_SESSION['error'] = 'Please Enter valid email';
            echo "<script>
                    window.history.back();
                </script>";
        }
    }
}


// =======================================================================
// ==============================Gallery section ==========================
// ========================================================================


if (isset($_POST['updateGallery'])) {



    // Validate and process image files
    $file_errors = array();
    if (!empty($_FILES['image']['name'][0])) {
        $numberOfFiles = count($_FILES['image']['name']);
        for ($i = 0; $i < $numberOfFiles; $i++) {
            $file_name = $_FILES['image']['name'][$i];
            $file_tmp = $_FILES['image']['tmp_name'][$i];
            $file_size = $_FILES['image']['size'][$i];
            $extension = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

            $image_id = bin2hex(random_bytes(20));

            $file_errors = checkExtensionAndSize($extension, $file_size);
            if (!empty($file_errors)) {
                break; // Stop processing further files if there are any errors
            }

            $location = 'gallery/' . $file_name;
            move_uploaded_file($file_tmp, $location);
            $insertImage = mysqli_query($con, "INSERT INTO `gallery`(`image_id`, `image`) VALUES ('$image_id','$location')");

            if (!$insertImage) {
                break;
            }
        }
        if ($insertImage) {
            echo "<script>
                        alert('Image Added');
                        window.history.back();
                        </script>";
        } else {
            echo "<script>
                alert('Something went wrong');
                window.history.back();
                </script>";
        }
    }
}


// =======================================================================
// =============================Add Package ==============================
// ========================================================================

if (isset($_POST['addPackage'])) {

    // Retrieve other form data
    $packageTitle = strip_tags(mysqli_real_escape_string($con, $_POST['packageTitle']));
    $packageDescription = strip_tags(mysqli_real_escape_string($con, $_POST['packageDescription']));
    $accommodation = strip_tags(mysqli_real_escape_string($con, $_POST['accommodation']));
    $mealsAvailable = strip_tags(mysqli_real_escape_string($con, $_POST['mealsAvailable']));
    $bestTimeForVisit = strip_tags(mysqli_real_escape_string($con, $_POST['bestTimeForVisit']));
    $difficultyLevel = strip_tags(mysqli_real_escape_string($con, $_POST['difficultyLevel']));
    $difficultyLevelPercentage = strip_tags(mysqli_real_escape_string($con, $_POST['difficultyLevelPercentage']));

    // Generate random packageId
    $packageId = bin2hex(random_bytes(20));

    // Validate and process image files
    $file_errors = array();
    if (!empty($_FILES['image']['name'][0])) {
        $numberOfFiles = count($_FILES['image']['name']);
        for ($i = 0; $i < $numberOfFiles; $i++) {
            $file_name = $_FILES['image']['name'][$i];
            $file_tmp = $_FILES['image']['tmp_name'][$i];
            $file_size = $_FILES['image']['size'][$i];
            $extension = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

            $file_errors = checkExtensionAndSize($extension, $file_size);
            if (!empty($file_errors)) {
                break; // Stop processing further files if there are any errors
            }

            $location = 'packageImages/' . $file_name;
            move_uploaded_file($file_tmp, $location);
            $insertImage = mysqli_query($con, "INSERT INTO `packageimages`(`packageId`, `packageImage`) VALUES ('$packageId','$location')");

            if (!$insertImage) {
                break;
            }
        }
    }

    if (empty($file_errors)) {

        $thumbnailImage_file_name = $_FILES['thumbnailImage']['name'];
        $thumbnailImage_file_tmp = $_FILES['thumbnailImage']['tmp_name'];
        $thumbnailImage_file_size = $_FILES['thumbnailImage']['size'];
        $thumbnailImage_file_extension = pathinfo($thumbnailImage_file_name, PATHINFO_EXTENSION);

        $error =  checkExtensionAndSize($thumbnailImage_file_extension, $thumbnailImage_file_size);
        if (empty($errors)) {
            $thumbnailImagePath = 'packageImages/' . $thumbnailImage_file_name;
            move_uploaded_file($thumbnailImage_file_tmp, $thumbnailImagePath);
            $sql = "INSERT INTO `packagelist`(`packageId`, `packageTitle`, `packageDescription`, `accommodation`, `mealsAvailable`, `bestTimeForVisit`, `difficultyLevel`, `difficultyLevelPercentage`,`packageThumbnailImage`) VALUES ('$packageId', '$packageTitle', '$packageDescription', '$accommodation', '$mealsAvailable', '$bestTimeForVisit', '$difficultyLevel', '$difficultyLevelPercentage', '$thumbnailImagePath')";

            // Use prepared statement to prevent SQL injection
            $stmt = mysqli_prepare($con, $sql);
            if ($stmt) {
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);
                $PMH = 1;

                // get and insert major highlights
                $numberOfHighlights = $_POST['num1'];
                for ($i = 0; $i < $numberOfHighlights; $i++) {

                    $packageMajorHighlights = strip_tags(mysqli_real_escape_string($con, $_POST['highlights'][$i]));

                    $HighlightsSql = "INSERT INTO `majorhighlights`(`packageId`, `packageMajorHighlights`) VALUES ('$packageId','$packageMajorHighlights')";

                    $insertMajorHighlights = mysqli_query($con, $HighlightsSql);

                    if ($insertMajorHighlights) {
                        $PMH++;
                    }
                }


                $PI = 1;

                // get and insert Itinearary
                $numberOfItinearary = $_POST['num2'];
                for ($i = 0; $i < $numberOfItinearary; $i++) {

                    $packageItinearary = strip_tags(mysqli_real_escape_string($con, $_POST['itinearary'][$i]));
                    $itineararyDescription = strip_tags(mysqli_real_escape_string($con, $_POST['itineararyDescription'][$i]));

                    $ItineararySql = "INSERT INTO `packageitineararys`(`packageId`, `packageItinearary`, `itineararyDescription`) VALUES ('$packageId','$packageItinearary', '$itineararyDescription')";

                    $insertItinearary = mysqli_query($con, $ItineararySql);

                    if ($insertItinearary) {
                        $PI++;
                    }
                }


                if ($PMH == $numberOfHighlights && $PI == $numberOfItinearary) {
                    echo "<script>
                                alert('Package added successfully');
                                window.history.back();
                            </script>";
                }
            } else {
                // Handle the case where the database insertion fails
                echo "Error: Unable to insert data into the database.";
            }
        } else {
            // Display error messages directly on the page
            foreach ($file_errors as $err) {
                echo $err . "<br>";
            }
        }
    } else {
        // Display error messages directly on the page
        foreach ($file_errors as $err) {
            echo $err . "<br>";
        }
    }
}

function checkExtensionAndSize($ext_name, $file_size)
{
    $allowed_extensions = array("jpeg", "jpg", "png");
    $max_file_size = 2097152; // 2 MB in bytes
    $error = array();

    if (!in_array($ext_name, $allowed_extensions)) {
        $error[] = "Please upload an image with a jpg, jpeg, or png extension.";
    }
    if ($file_size > $max_file_size) {
        $error[] = 'File size cannot be more than 2 MB.';
    }

    return $error;
}


// =======================================================================
// ================================= password ============================
// =======================================================================

if (isset($_POST['changePass'])) {
    unset($_SESSION['loginError']);
    $email = strip_tags(mysqli_real_escape_string($con, $_POST['email']));
    if (isset($_SESSION['otp'])) {
        $oldpassword = "old password not needed";
    } else {
        $oldpassword = strip_tags(mysqli_real_escape_string($con, $_POST['oldpassword']));
    }
    $newpassword = strip_tags(mysqli_real_escape_string($con, $_POST['newpassword']));
    $cnewpassword = strip_tags(mysqli_real_escape_string($con, $_POST['cnewpassword']));
    if (empty($email) || empty($oldpassword) || empty($newpassword) || empty($cnewpassword)) {
        $_SESSION['loginError'] = 'Please fill all fields !!';
    } else if ($newpassword != $cnewpassword) {
        $_SESSION['loginError'] = 'New password and confirm password is not matching !!';
    } else {
        $loginQry = "SELECT * FROM `administrators` WHERE `email`='$email'";
        $selectLogin = mysqli_query($con, $loginQry);
        $num = mysqli_num_rows($selectLogin);
        if ($num == 1) {
            while ($row = mysqli_fetch_assoc($selectLogin)) {

                if (password_verify($oldpassword, $row['password']) == TRUE) {
                    $encryptedPassword = password_hash($newpassword, PASSWORD_DEFAULT);

                    $upQry = "UPDATE `administrators` SET 
                    `password` = '$encryptedPassword'
                    WHERE `email` = '$email'";
                    $updatePass = mysqli_query($con, $upQry);
                    if ($updatePass) {
                        echo "<script>
                                alert('Password Updated');
                                window.location.href = '../index.php';
                            </script>";
                    }
                } else if (password_verify($oldpassword, $row['password']) == FALSE) {
                    $encryptedPassword = password_hash($newpassword, PASSWORD_DEFAULT);

                    $upQry = "UPDATE `administrators` SET 
                    `password` = '$encryptedPassword',
                    `otp` = NULL
                    WHERE `email` = '$email'";
                    $updatePass = mysqli_query($con, $upQry);
                    if ($updatePass) {
                        echo "<script>
                                alert('Password Updated');
                                window.location.href = '../index.php';
                            </script>";
                    }
                } else {
                    $_SESSION['loginError'] = 'Invalid Old password !!';
                    echo '<script>
                            window.history.back();
                            </script>';
                }
            }
        } else {
            $_SESSION['loginError'] = 'Invalid email !!';
            echo '<script>
        window.history.back();
    </script>';
        }
    }
}



// =======================================================================
// =====================sent otp to change password ======================
// =======================================================================

if (isset($_POST['sendOTP'])) {
    unset($_SESSION['loginError']);
    $email = strip_tags(mysqli_real_escape_string($con, $_POST['email']));
    $otp = rand(100000, 999999);
    $_SESSION['otp'] = $otp;
    echo $otp;
    sendotp($email, $otp);
    if (empty($email)) {
        $_SESSION['loginError'] = 'Please enter your email !!';
    } else {
        $loginQry = "SELECT * FROM `administrators` WHERE `email`='$email'";
        $selectLogin = mysqli_query($con, $loginQry);
        $num = mysqli_num_rows($selectLogin);
        if ($num == 1) {
            $upQry = "UPDATE `administrators` SET `otp` = '$otp' WHERE `email` = '$email'";
            echo $otp;
            $updateOtp = mysqli_query($con, $upQry);
            if ($updateOtp) {
                $_SESSION['loginError'] = 'OTP is sent to your email..';
                echo "<script>

                                window.location.href = '../sendOTP.php';
                            </script>";
            }
        } else {
            $_SESSION['loginError'] = 'Invalid email !!';
            echo '<script>
                            window.history.back();
                            </script>';
        }
    }
}

function sendotp($email, $otp)
{
    include('smtp/PHPMailerAutoload.php');

    // Set up the PHPMailer object
    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    $mail->SMTPSecure = 'tls';
    $mail->SMTPAuth = true;
    $mail->Username = 'parsllinternet@gmail.com'; // Your Gmail address
    $mail->Password = 'ctrzfpasipmdrewc'; // Your Gmail password

    // Set the sender and recipient
    $mail->setFrom('parsllinternet@gmail.com', 'Hotel Mountain View');
    $mail->addAddress($email, 'user');

    $mail->Subject = 'One-Time Password (OTP)';
    $mail->Body = 'Your OTP is: ' . $otp;

    // Send the email
    $mail->send();
}


if (isset($_POST['verifyOTP'])) {
    unset($_SESSION['loginError']);
    $otp = strip_tags(mysqli_real_escape_string($con, $_POST['otp']));
    $email = strip_tags(mysqli_real_escape_string($con, $_POST['email']));

    $loginQry = "SELECT * FROM `administrators` WHERE `email`='$email' AND `otp` = '$otp'";
    $selectLogin = mysqli_query($con, $loginQry);
    $num = mysqli_num_rows($selectLogin);
    if ($num == 1) {
        echo "<script>
                window.location.href = '../changePassword.php';
             </script>";
    }
}


mysqli_close($con);
