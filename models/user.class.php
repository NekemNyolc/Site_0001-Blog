<?php

class User
{

    /**
     * Variables ---------------------------------------------------------------
     */
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "site_0001_-_blog";
    private $conn = "";
    private $result = "";
    private $row = "";
    private $sql = "";

    /**
     * Magic methods -----------------------------------------------------------
     */
    public function __construct()
    {
        $this->Connect();
    }

    public function __destruct()
    {
        $this->Disconnect();
    }

    /**
     * Connection --------------------------------------------------------------
     */
    private function Connect()
    {
        $this->conn = new mysqli(
            $this->servername,
            $this->username,
            $this->password,
            $this->dbname
        );

        if ($this->conn->connect_error)
        {
            echo "Connection error!";
        }
        else
        {
            // echo "Connection successful!";
        }

        $this->conn->set_charset("utf8");
    }

    private function Disconnect()
    {
        $this->conn->close();
    }

    /**
     * Basic functions ---------------------------------------------------------
     */
    public function LoginUser()
    {
        $password = sha1($_POST['input_password']);
        $secret = "kecskesajt";

        $this->result = $this->conn->query("
            SELECT * 
            FROM `users` 
            WHERE `u_email`='".$_POST['input_email']."' AND 
                  DECODE(`u_password`, '".$secret."')='".$password."'
        ");

        if ($this->result->num_rows > 0)
        {
            while ($this->row = $this->result->fetch_assoc())
            {
                // Successful login
                $_SESSION['username'] = $this->row['u_username'];
                header("Location: index.php?profile");
                exit();
            }
        }
        else
        {
            // Failed to login
            header("Location: index.php?errorpage=fail_password");
            exit();
            /*
            echo $_POST['input_email'] . ", " . 
                $_POST['input_password'] . ", " . 
                $password;
            */
        }
    }

    public function RegisterUser()
    {
        $password = sha1($_POST['input_password']);
        $secret = "kecskesajt";

        $this->sql = "
            INSERT INTO users (
                u_username, 
                u_email, 
                u_password,
                u_realname
            ) VALUES (
                '".$_POST['input_username']."',
                '".$_POST['input_email']."',
                ENCODE('".$password."', '".$secret."'),
                '".$_POST['input_realname']."'
        )";

        if ($this->conn->query($this->sql) === TRUE)
        {
            header("Location: index.php?site=login");
            exit();
        }
        else
        {
            header("Location: index.php?errorpage=fail_registration");
            exit();
            /*
            echo 
                $_POST['input_username'] . ", " . 
                $_POST['input_email'] . ", " . 
                $_POST['input_password'] . ", " . 
                $password . ", " . 
                $_POST['input_realname'];
            */
        }
    }

    /**
     * User data functions -----------------------------------------------------
     */
    public function SelectBasicData()
    {
        $this->result = $this->conn->query("
            SELECT `u_username`,
                   `u_email`,
                   `u_realname` 
            FROM `users` 
            WHERE `u_username`='".$_SESSION['username']."'
        ");

        if ($this->result->num_rows > 0)
        {
            while ($this->row = $this->result->fetch_assoc())
            {
                $userData = array(
                    "username"=>$this->row['u_username'], 
                    "email"=>$this->row['u_email'], 
                    "realname"=>$this->row['u_realname']
                );

                return $userData;
            }
        }
        else
        {
            header("Location: index.php?errorpage=fail_profile");
            exit();
        }
    }

    public function UpdateUserData(
        $username,
        $email,
        $realname,
        $passwordOld,
        $passwordNew,
        $modifyPass
    )
    {
        if ($modifyPass)
        {
            // If the password is updating too

            // Encrypting the password
            $secret = "kecskesajt";
            $passOldCode = sha1($passwordOld);
            $passNewCode = sha1($passwordNew);

            // Check if the old password is correct
            $this->result = $this->conn->query("
                SELECT * 
                FROM `users` 
                WHERE `u_username`='".$username."' AND 
                      DECODE(`u_password`, '".$secret."')='".$passOldCode."'
            ");

            if ($this->result->num_rows > 0)
            {
                // If the old password is correct
                // Updating the data
                $this->sql = "
                    UPDATE `users` 
                    SET `u_username`='".$username."',
                        `u_password`=ENCODE('".$passNewCode."', '".$secret."'),
                        `u_email`='".$email."',
                        `u_realname`='".$realname."' 
                    WHERE `u_username`='".$_SESSION['username']."'
                ";

                if ($this->conn->query($this->sql) === TRUE)
                {
                    // Success
                    $_SESSION['username'] = $username;
                    header("Location: index.php?errorpage=success");
                    exit();
                }
                else
                {
                    // Fail
                    header("Location: index.php?errorpage=fail_profile");
                    exit();
                    // echo "Error updating record: " . $this->conn->error;
                }
            }
            else
            {
                // Old password is incorrect
                header("Location: index.php?errorpage=fail_password_old");
                exit();
            }
        }
        else
        {
            // If the password isn't changing
            $this->sql = "
                UPDATE `users` 
                SET `u_username`='".$username."',
                    `u_email`='".$email."',
                    `u_realname`='".$realname."' 
                WHERE `u_username`='".$_SESSION['username']."'
            ";

            if ($this->conn->query($this->sql) === TRUE)
            {
                // Success
                $_SESSION['username'] = $username;
                header("Location: index.php?errorpage=success");
                exit();
            }
            else
            {
                // Failed
                header("Location: index.php?errorpage=fail_profile");
                exit();
                // echo "Error updating record: " . $this->conn->error;
            }
        }
    }

}

################################################################################
#
#                                   Uses
#
# .\controllers\controller_main.php
# .\controllers\controller_user.php
#

?>