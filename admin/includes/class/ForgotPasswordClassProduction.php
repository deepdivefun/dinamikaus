<?php
require_once('ConnectionClass.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once('libs/vendor/autoload.php');

class ForgotPassword
{
    private $conn;

    public function __construct()
    {
        global $conn;
        $this->conn = $conn;

        return $this->conn;
    }

    public function sendEmailForgotPasswordAppAdminTools($Email)
    {
        global $conn;
        global $_SESSION;

        $mail   = new PHPMailer();

        $Token              = bin2hex(random_bytes(16));
        $ResetTokenHash     = hash("sha256", $Token);
        $ResetTokenExpired  = date("Y-m-d H:i:s", time() + 60 * 60 * 24);

        if (empty($Email)) {
            throw new Exception("Error Processing Request");
        } else {
            try {
                $query  = "UPDATE tbl_user SET 
                    ResetTokenHash = ?, 
                    ResetTokenExpired = ? 
                    WHERE Email = ?";
                $stmt   = $conn->prepare($query);
                $stmt->bind_param("sss", $ResetTokenHash, $ResetTokenExpired, $Email);
                $stmt->execute();

                $query      = "SELECT a.UserID, a.FullName, b.Email FROM tbl_profile a 
                                LEFT OUTER JOIN tbl_user b ON a.UserID = b.UserID 
                                WHERE b.Email = '$Email'";
                $sql        = mysqli_query($conn, $query);
                $result     = mysqli_fetch_array($sql);

                $UserID     = $result['UserID'];
                $FullName   = $result['FullName'];
                $Email      = $result['Email'];

                $query  = "INSERT INTO tbl_eventlog (EventLogTimeStamp, EventLogUser, EventLogData) 
                                VALUES (NOW(), ?, 'Helping reset password')";
                $stmt   = $conn->prepare($query);
                $stmt->bind_param("s", $FullName);
                $stmt->execute();

                if ($stmt->affected_rows > 0) {
                    try {
                        //Server settings
                        // $mail->SMTPDebug    = SMTP::DEBUG_SERVER;                    // Enable verbose debug output
                        $mail->isSMTP();                                                // Send using SMTP
                        $mail->Host         = 'mail.dinamikaus.com';                    // Set the SMTP server to send through
                        $mail->SMTPAuth     = true;                                     // Enable SMTP authentication
                        $mail->Username     = 'noreply@dinamikaus.com';                 // SMTP username
                        $mail->Password     = 'skpEn@FE(;8B';                           // SMTP password
                        $mail->SMTPSecure   = PHPMailer::ENCRYPTION_SMTPS;              // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                        $mail->Port         = 465;                                      // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

                        //Recipients
                        $mail->setFrom('noreply@dinamikaus.com', 'noreply');
                        $mail->addAddress($Email);                                      // Add a recipient

                        // Content
                        $mail->isHTML(true);                                            // Set email format to HTML
                        $mail->Subject      = 'Reset Password';
                        $mail->Body         = <<<END
            
                        Please click the following link to reset your password
                        <br>
                        <button class="btn btn-primary rounded-5"><a href="https://dinamikaus.com/utilities/10000.ForgotPassword/10100.ForgotPasswordReset.php?Token=$ResetTokenHash" class="btn btn-primary">https://dinamikaus.com/utilities/10000.ForgotPassword/10100.ForgotPasswordReset.php?Token=$ResetTokenHash</a></button>
                        <br>
                        <br>
                        Do not give this information to anyone.
                        <br>
                        <b>Please don't reply to this message.</b>
                        
                        END;

                        $mail->send();
                        // echo 'Message has been sent';
                    } catch (Exception $e) {
                        echo 'Message could not be sent. Mailer Error:' . $e->getMessage();
                    }
                } else {
                    echo    "Failed to send email";
                }
            } catch (Exception $e) {
                echo 'Message: ' . $e->getMessage();
            }
        }
        if ($stmt->affected_rows > 0) {
            echo    "Message sent, please check your inbox";
        } else {
            echo    "Failed to send email";
        }
        return true;
        $stmt->close();
    }

    public function sendEmailForgotPassword($Email)
    {
        global $conn;

        $mail   = new PHPMailer();

        $Token              = bin2hex(random_bytes(16));
        $ResetTokenHash     = hash("sha256", $Token);
        $ResetTokenExpired  = date("Y-m-d H:i:s", time() + 60 * 60 * 24);

        if (empty($Email)) {
            throw new Exception("Error Processing Request");
        } else {
            try {
                $query  = "UPDATE tbl_user SET 
                    ResetTokenHash = ?, 
                    ResetTokenExpired = ? 
                    WHERE Email = ?";
                $stmt   = $conn->prepare($query);
                $stmt->bind_param("sss", $ResetTokenHash, $ResetTokenExpired, $Email);
                $stmt->execute();

                $query      = "SELECT a.UserID, a.FullName, b.Email FROM tbl_profile a 
                                LEFT OUTER JOIN tbl_user b ON a.UserID = b.UserID 
                                WHERE b.Email = '$Email'";
                $sql        = mysqli_query($conn, $query);
                $result     = mysqli_fetch_array($sql);

                $UserID     = $result['UserID'];
                $FullName   = $result['FullName'];
                $Email      = $result['Email'];

                $query  = "INSERT INTO tbl_eventlog (EventLogTimeStamp, EventLogUser, EventLogData) 
                                VALUES (NOW(), ?, '" . $FullName . " Request Reset Password')";
                $stmt   = $conn->prepare($query);
                $stmt->bind_param("s", $FullName);
                $stmt->execute();

                if ($stmt->affected_rows > 0) {
                    try {
                        //Server settings
                        // $mail->SMTPDebug    = SMTP::DEBUG_SERVER;                    // Enable verbose debug output
                        $mail->isSMTP();                                                // Send using SMTP
                        $mail->Host         = 'mail.dinamikaus.com';                    // Set the SMTP server to send through
                        $mail->SMTPAuth     = true;                                     // Enable SMTP authentication
                        $mail->Username     = 'noreply@dinamikaus.com';                 // SMTP username
                        $mail->Password     = 'skpEn@FE(;8B';                           // SMTP password
                        $mail->SMTPSecure   = PHPMailer::ENCRYPTION_SMTPS;              // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                        $mail->Port         = 465;                                      // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

                        //Recipients
                        $mail->setFrom('noreply@dinamikaus.com', 'noreply');
                        $mail->addAddress($Email);                                      // Add a recipient

                        // Content
                        $mail->isHTML(true);                                            // Set email format to HTML
                        $mail->Subject      = 'Reset Password';
                        $mail->Body         = <<<END
            
                        Please click the following link to reset your password
                        <br>
                        <button class="btn btn-primary rounded-5"><a href="https://dinamikaus.com/utilities/10000.ForgotPassword/10100.ForgotPasswordReset.php?Token=$ResetTokenHash" class="btn btn-primary">https://dinamikaus.com/utilities/10000.ForgotPassword/10100.ForgotPasswordReset.php?Token=$ResetTokenHash</a></button>
                        <br>
                        <br>
                        Do not give this information to anyone.
                        <br>
                        <b>Please don't reply to this message.</b>
                        
                        END;

                        $mail->send();
                        // echo 'Message has been sent';
                    } catch (Exception $e) {
                        echo 'Message could not be sent. Mailer Error:' . $e->getMessage();
                    }
                } else {
                    echo    "Failed to send email";
                }

                $stmt->close();
            } catch (Exception $e) {
                echo 'Message: ' . $e->getMessage();
            }
        }

        echo    "<script>
                    alert('Message sent, please check your inbox');
                    document.location.href = '../../login.php';             
                </script>";

        return true;
    }

    public function getEmailForgotPassword($ResetTokenHash, $Password, $ConfirmPassword)
    {
        global $conn;

        if (empty($ResetTokenHash)) {
            throw new Exception("Error Processing Request");
        } else {
            try {

                $conn->begin_transaction();

                $query  = "SELECT * FROM tbl_user WHERE ResetTokenHash = ?";
                $stmt   = $conn->prepare($query);
                $stmt->bind_param("s", $ResetTokenHash);
                $stmt->execute();
                $result = $stmt->get_result();
                $row    = $result->fetch_assoc();

                if ($row['ResetTokenHash'] == null) {
                    echo    "<script>
                                alert('Token not found');
                            </script>";
                    die;
                }

                if (strtotime($row['ResetTokenExpired']) < time()) {
                    echo    "<script>
                                alert('Token expired');
                            </script>";
                    die;
                }

                if ($Password !== $ConfirmPassword) {
                    echo    "Password and Confirm Password not match";

                    return false;
                }

                $Password   = password_hash($Password, PASSWORD_BCRYPT);

                $query      = "UPDATE tbl_user SET 
                                Password = ?, 
                                ResetTokenHash = NULL,
                                ResetTokenExpired = NULL
                                WHERE UserID = ?";
                $stmt       = $conn->prepare($query);
                $stmt->bind_param("si", $Password, $row['UserID']);
                $stmt->execute();

                $query      = "SELECT a.UserID, a.FullName, b.Email FROM tbl_profile a 
                                LEFT OUTER JOIN tbl_user b ON a.UserID = b.UserID 
                                WHERE a.UserID = '$row[UserID]'";
                $sql        = mysqli_query($conn, $query);
                $result     = mysqli_fetch_array($sql);

                $UserID     = $result['UserID'];
                $FullName   = $result['FullName'];
                $Email      = $result['Email'];

                $query  = "INSERT INTO tbl_eventlog (EventLogTimeStamp, EventLogUser, EventLogData) 
                                VALUES (NOW(), ?, '" . $FullName . " Successfully reset password')";
                $stmt   = $conn->prepare($query);
                $stmt->bind_param("s", $FullName);
                $stmt->execute();

                if ($stmt->affected_rows > 0) {
                    $conn->commit();
                    echo    "<script>
                                alert('Password changed successfully');
                            </script>";
                } else {
                    echo    "<script>
                                alert('Failed to change password');
                            </script>";
                }

                $stmt->close();
            } catch (Exception $e) {
                echo 'Message: ' . $e->getMessage();
            }
        }
        echo    "<script>
                    alert('Password changed successfully. You can now login');
                    document.location.href = '../../login.php';             
                </script>";

        return true;
    }
}
