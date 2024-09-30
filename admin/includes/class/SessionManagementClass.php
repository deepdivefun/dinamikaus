<?php
require_once('ConnectionClass.php');

class SessionManagement
{
    private $conn;

    public function __construct()
    {
        global $conn;
        $this->conn = $conn;

        return $this->conn;
    }

    public function userLogin($Username, $Password)
    {
        global $conn;
        global $_COOKIE;
        global $_SESSION;

        if (isset($_COOKIE["ID"]) and isset($_COOKIE["Key"])) {
            $UserID     = $_COOKIE["ID"];
            $Username   = $_COOKIE["Key"];

            $query  = "SELECT Username FROM tbl_user WHERE UserID = ?";
            $stmt   = $conn->prepare($query);
            $stmt->bind_param("i", $UserID);
            $stmt->execute();
            $result = $stmt->get_result();
            $row    = $result->fetch_assoc();

            // Cek Cookie And Username
            if ($Username === hash('sha256', $row["Username"])) {
                $_SESSION["Login"] = true;
            }
        }

        // Check Login
        $query  = "SELECT * FROM tbl_user WHERE Username = ?";
        $stmt   = $conn->prepare($query);
        $stmt->bind_param("s", $Username);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows === 1) {
            $row    = $result->fetch_array();

            // Check Password
            if (password_verify($Password, $row['Password'])) {

                // Set Session
                session_start([
                    // 'cache_expire' => 180,
                    // 'cache_limiter' => 'nocache',
                    // 'cookie_domain' => '',
                    'cookie_httponly' => true,
                    'cookie_lifetime' => 1800,
                    // 'cookie_path' => '/',
                    // 'cookie_samesite' => 'Strict',
                    // 'cookie_secure'   => true,
                    // 'gc_divisor' => 100,
                    // 'gc_maxlifetime' => 1440,
                    // 'gc_probability' => true,
                    // 'lazy_write' => true,
                    'name' => 'SWD_Website',
                    // 'read_and_close' => false,
                    // 'referer_check' => '',
                    // 'save_handler' => 'files',
                    // 'save_path' => '',
                    // 'serialize_handler' => 'php',
                    // 'sid_bits_per_character' => 4,
                    // 'sid_length' => 32,
                    // 'trans_sid_hosts' => $_SERVER['HTTP_HOST'],
                    // 'trans_sid_tags' => 'a=href,area=href,frame=src,form=',
                    // 'use_cookies' => true,
                    // 'use_only_cookies' => true,
                    // 'use_strict_mode' => false,
                    // 'use_trans_sid' => false,
                ]);
                $_SESSION['Login']              = TRUE;
                $_SESSION['UserID']             = $row['UserID'];
                $_SESSION['StatusID']           = $row['StatusID'];
                $_SESSION['RoleID']             = $row['RoleID'];
                $_SESSION['Username']           = $row['Username'];
                $_SESSION['Email']              = $row['Email'];
                $_SESSION['FullName']           = $row['FullName'];

                if ($_SESSION['StatusID'] == 1) {
                    header('Location: admin/1000.Home/1000.Home.php');
                    exit();
                } else {
                    echo    "<script>
                                alert('Username or Password is wrong!');
                                document.location.href = 'index.php';
                            </script>";
                }

                if (isset($_POST['Remember'])) {
                    setcookie('ID', hash('sha256', $row['UserID']), time() + 120, '/', null, null, true);
                    setcookie('Key', hash('sha256', $row['Username']), time() + 120, '/', null, null, true);
                }
            } else {
                echo    "<script>
                            alert('Username or Password is wrong!');
                            document.location.href = 'index.php';
                        </script>";
            }
        } else {
            echo    "<script>
                        alert('Username or Password is wrong!');
                        document.location.href = 'index.php';
                    </script>";

            session_start([
                // 'cache_expire' => 180,
                // 'cache_limiter' => 'nocache',
                // 'cookie_domain' => '',
                'cookie_httponly' => true,
                'cookie_lifetime' => 1800,
                // 'cookie_path' => '/',
                // 'cookie_samesite' => 'Strict',
                // 'cookie_secure'   => true,
                // 'gc_divisor' => 100,
                // 'gc_maxlifetime' => 1440,
                // 'gc_probability' => true,
                // 'lazy_write' => true,
                'name' => 'SWD_Website',
                // 'read_and_close' => false,
                // 'referer_check' => '',
                // 'save_handler' => 'files',
                // 'save_path' => '',
                // 'serialize_handler' => 'php',
                // 'sid_bits_per_character' => 4,
                // 'sid_length' => 32,
                // 'trans_sid_hosts' => $_SERVER['HTTP_HOST'],
                // 'trans_sid_tags' => 'a=href,area=href,frame=src,form=',
                // 'use_cookies' => true,
                // 'use_only_cookies' => true,
                // 'use_strict_mode' => false,
                // 'use_trans_sid' => false,
            ]);
            $_SESSION = [];
            session_unset();
            session_destroy();

            setcookie('ID', '', time() - 1800);
            setcookie('Key', '', time() - 1800);

            header('Location: index.php');

            $stmt->close();
        }
    }
}
