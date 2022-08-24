<?php
include_once __DIR__ . "\..\database\config.php";
include_once __DIR__ . "\..\database\operations.php";

class Contact extends config implements operations{
    private $Contact_ID;
    private $Name;
    private $Phone;
    private $Email;
    private $Massage;
    private $Created_at;

    /**
     * Get the value of Contact_ID
     */ 
    public function getContact_ID()
    {
        return $this->Contact_ID;
    }

    /**
     * Set the value of Contact_ID
     *
     * @return  self
     */ 
    public function setContact_ID($Contact_ID)
    {
        $this->Contact_ID = $Contact_ID;

        return $this;
    }

    /**
     * Get the value of Name
     */ 
    public function getName()
    {
        return $this->Name;
    }

    /**
     * Set the value of Name
     *
     * @return  self
     */ 
    public function setName($Name)
    {
        $this->Name = $Name;

        return $this;
    }

    /**
     * Get the value of Phone
     */ 
    public function getPhone()
    {
        return $this->Phone;
    }

    /**
     * Set the value of Phone
     *
     * @return  self
     */ 
    public function setPhone($Phone)
    {
        $this->Phone = $Phone;

        return $this;
    }

    /**
     * Get the value of Email
     */ 
    public function getEmail()
    {
        return $this->Email;
    }

    /**
     * Set the value of Email
     *
     * @return  self
     */ 
    public function setEmail($Email)
    {
        $this->Email = $Email;

        return $this;
    }

    /**
     * Get the value of Massage
     */ 
    public function getMassage()
    {
        return $this->Massage;
    }

    /**
     * Set the value of Massage
     *
     * @return  self
     */ 
    public function setMassage($Massage)
    {
        $this->Massage = $Massage;

        return $this;
    }

    /**
     * Get the value of Created_at
     */ 
    public function getCreated_at()
    {
        return $this->Created_at;
    }

    /**
     * Set the value of Created_at
     *
     * @return  self
     */ 
    public function setCreated_at($Created_at)
    {
        $this->Created_at = $Created_at;

        return $this;
    }
    
    public function create()
    {
        $query = "INSERT INTO `contacts`(
            `Name`,
            `Phone`,
            `Email`,
            `Massage`
        )
        VALUES(
            '$this->Name',
            '$this->Phone',
            '$this->Email',
            '$this->Massage'
        )";
        return $this->runDML($query);
    }
    public function read()
    {
        $query = "SELECT
        *
    FROM
        `contacts`";
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