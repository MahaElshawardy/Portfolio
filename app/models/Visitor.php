<?php 
include_once __DIR__ ."\..\database\config.php";
include_once __DIR__ ."\..\database\operations.php";

class Visitor extends config implements operations{
    private $Visitor_ID;
    private $Ip_Adresses;
    private $Server_Name;
    private $User_Agent;
    private $Signature;

    /**
     * Get the value of Visitor_ID
     */ 
    public function getVisitor_ID()
    {
        return $this->Visitor_ID;
    }

    /**
     * Set the value of Visitor_ID
     *
     * @return  self
     */ 
    public function setVisitor_ID($Visitor_ID)
    {
        $this->Visitor_ID = $Visitor_ID;

        return $this;
    }

    /**
     * Get the value of Ip_Adresses
     */ 
    public function getIp_Adresses()
    {
        return $this->Ip_Adresses;
    }

    /**
     * Set the value of Ip_Adresses
     *
     * @return  self
     */ 
    public function setIp_Adresses($Ip_Adresses)
    {
        $this->Ip_Adresses = $Ip_Adresses;

        return $this;
    }

    
    /**
     * Get the value of Server_Name
     */ 
    public function getServer_Name()
    {
        return $this->Server_Name;
    }

    /**
     * Set the value of Server_Name
     *
     * @return  self
     */ 
    public function setServer_Name($Server_Name)
    {
        $this->Server_Name = $Server_Name;

        return $this;
    }

    /**
     * Get the value of User_Agent
     */ 
    public function getUser_Agent()
    {
        return $this->User_Agent;
    }

    /**
     * Set the value of User_Agent
     *
     * @return  self
     */ 
    public function setUser_Agent($User_Agent)
    {
        $this->User_Agent = $User_Agent;

        return $this;
    }

    /**
     * Get the value of Signature
     */ 
    public function getSignature()
    {
        return $this->Signature;
    }

    /**
     * Set the value of Signature
     *
     * @return  self
     */ 
    public function setSignature($Signature)
    {
        $this->Signature = $Signature;

        return $this;
    }
    public function create()
    {
        $query = "INSERT INTO `visitors`(
            `Ip_Adresses`, 
            `Server_Name`,
            `User_Agent`,
            `Signature`
            )
        VALUES(
            '$this->Ip_Adresses',
            '$this->Server_Name',
            '$this->User_Agent',
            '$this->Signature'
            )";
        return $this->runDML($query);
    }
    public function read()
    {
        $query = "SELECT
        COUNT(`Visitor_ID`) AS `visitor`
    FROM
        `visitors`";
        return $this->runDQL($query);
    }
    public function update()
    {
        # code...
    }
    public function delete()
    {
        # code...
    }

}