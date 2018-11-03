<?php

class Game
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
     * Other functions ---------------------------------------------------------
     */
    public function GetGameList()
    {
    	$this->result = $this->conn->query("
    		SELECT * FROM `games`
    	");

    	$games = array();

    	if ($this->result->num_rows > 0)
    	{
    		while ($this->row = $this->result->fetch_assoc())
    		{
    			$games[] = $this->row['g_name'];
    		}
    		return $games;
    	}
    	else
    	{
    		// No games found
    		header("Location: index.php?errorpage=fail_gamelist");
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