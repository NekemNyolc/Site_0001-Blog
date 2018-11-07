<?php

class Blog
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
     * Select blog posts -------------------------------------------------------
     */
    public function GetAllPost()
    {
        $this->result = $this->conn->query("
            SELECT blogs.`b_title`, 
                   blogs.`b_content`, 
                   blogs.`b_date`, 
                   games.`g_name`, 
                   users.`u_username`, 
                   blogs.`b_tags` 
            FROM blogs 
            INNER JOIN games ON blogs.`b_game_id`=games.`g_id`
            INNER JOIN users ON blogs.`b_author_id`=users.`u_id`
            ORDER BY blogs.`b_date`
        ");

        $post = array(array());

        // var_dump($this->result);

        if ($this->result->num_rows > 0)
        {
            $i = 0;
            while ($this->row = $this->result->fetch_assoc()) // or fetch_array
            {
                // Success
                $post[$i] = array($this->row['b_title'],
                                  $this->row['b_content'],
                                  $this->row['b_date'],
                                  $this->row['g_name'],
                                  $this->row['u_username'],
                                  $this->row['b_tags']);
                $i++;
            }
        }
        else
        {
            // Fail
            header("Location: index.php?errorpage=fail_bloglist");
            exit();
        }

        return $post;
    }

    public function GetPosts($gameName, $userName, $tags, $order)
    {
        $condition = "WHERE ";

        if ($gameName != "")
        {
            $condition = $condition . "games.`g_name`='" . $gameName . "' AND ";
        }
        if ($userName != "")
        {
            $condition = $condition .  "users.`u_username` LIKE '%" . $userName . "%' AND ";
        }

        if ($gameName == "" && $userName == "")
        {
            $condition = "";
        }
        else
        {
            // Cut the " AND " at the end of the $condition string
            $condition = substr($condition, 0, -5);
        }

        if ($order == "date_new")
        {
            $order = "blogs.`b_date` DESC";
        }
        elseif ($order == "date_old")
        {
            $order = "blogs.`b_date` ASC";
        }
        else
        {
            header("Location: index.php?errorpage");
            exit();
        }

        $this->result = $this->conn->query("
            SELECT blogs.`b_title`, 
                   blogs.`b_content`, 
                   blogs.`b_date`, 
                   games.`g_name`, 
                   users.`u_username`, 
                   blogs.`b_tags` 
            FROM blogs 
            INNER JOIN games ON blogs.`b_game_id`=games.`g_id`
            INNER JOIN users ON blogs.`b_author_id`=users.`u_id`
            ".$condition."
            ORDER BY ".$order."
        ");

        $post = array(array());

        if ($this->result->num_rows > 0)
        {
            $i = 0;
            while ($this->row = $this->result->fetch_assoc()) // or fetch_array
            {
                // Success
                $post[$i] = array($this->row['b_title'],
                                  $this->row['b_content'],
                                  $this->row['b_date'],
                                  $this->row['g_name'],
                                  $this->row['u_username'],
                                  $this->row['b_tags']);
                $i++;
            }
        }
        else
        {
            // Fail
            return NULL;
        }

        return $post;
    }

    /**
     * Other functions ---------------------------------------------------------
     */
    public function SubmitPost($title,
                               $content,
                               $tags,
                               $game)
    {
        $gameId = $this->GetGameId($game);
        $userId = $this->GetUserId($_SESSION['username']);

        $this->sql = "
            INSERT INTO `blogs`
                (`b_title`, 
                 `b_content`, 
                 `b_game_id`, 
                 `b_author_id`, 
                 `b_tags`) 
            VALUES ('".$title."',
                    '".$content."',
                    ".$gameId.",
                    ".$userId.",
                    '".$tags."')
        ";

        if ($this->conn->query($this->sql) === TRUE)
        {
            // Success
            header("Location: index.php?errorpage=success");
            exit();
        }
        else
        {
            // Fail
            header("Location: index.php?errorpage=fail_post");
            exit();
            // echo $gameId . ", " . $userId;
        }
    }

    /**
     * Private Getters ---------------------------------------------------------
     */
    private function GetGameId($game)
    {
        $this->result = $this->conn->query("
            SELECT * 
            FROM `games` 
            WHERE `g_name`='".$game."'
        ");

        if ($this->result->num_rows > 0)
        {
            while ($this->row = $this->result->fetch_assoc())
            {
                // Success
                return $this->row['g_id'];
            }
        }
        else
        {
            // Fail
            header("Location: index.php?errorpage");
            exit();
        }
    }

    private function GetUserId($username)
    {
        $this->result = $this->conn->query("
            SELECT * 
            FROM `users` 
            WHERE `u_username`='".$username."'
        ");

        if ($this->result->num_rows > 0)
        {
            while ($this->row = $this->result->fetch_assoc())
            {
                // Success
                return $this->row['u_id'];
            }
        }
        else
        {
            // Fail
            header("Location: index.php?errorpage");
            exit();
        }
    }

}

################################################################################
#
#                                   Uses
#
# .\controllers\controller_user.php
#

?>