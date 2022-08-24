<?php 
include_once __DIR__ ."\..\database\config.php";
include_once __DIR__ ."\..\database\operations.php";

class User extends config implements operations{
    private $User_ID ;
    private $Name ;
    private $Email ;
    private $Password ;
    private $Image;
    private $Position;

    /**
     * Get the value of User_ID
     */ 
    public function getUser_ID()
    {
        return $this->User_ID;
    }

    /**
     * Set the value of User_ID
     *
     * @return  self
     */ 
    public function setUser_ID($User_ID)
    {
        $this->User_ID = $User_ID;

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
     * Get the value of Password
     */ 
    public function getPassword()
    {
        return $this->Password;
    }

    /**
     * Set the value of Password
     *
     * @return  self
     */ 
    public function setPassword($Password)
    {
        $this->Password = sha1($Password);

        return $this;
    }
     /**
     * Get the value of Image
     */ 
    public function getImage()
    {
        return $this->Image;
    }

    /**
     * Set the value of Image
     *
     * @return  self
     */ 
    public function setImage($Image)
    {
        $this->Image = $Image;

        return $this;
    }
    /**
     * Get the value of Position
     */ 
    public function getPosition()
    {
        return $this->Position;
    }

    /**
     * Set the value of Position
     *
     * @return  self
     */ 
    public function setPosition($Position)
    {
        $this->Position = $Position;

        return $this;
    }
    public function create()
    {
        $query = "INSERT INTO `users`(
            `Name`,
            `Email`,
            `Password`,
            `Image`,
            `Position`
        )
        VALUES(
            '$this->Name',
            '$this->Email',
            '$this->Password',
            '$this->Image',
            '$this->Position'
        )";
        return $this->runDML($query);
    }
    public function read()
    {
        $query = "SELECT * FROM `users`";
        return $this->runDQL($query);
    }
    public function update()
    {
        $query = "UPDATE
        `users`
    SET
        `Position` = '$this->Position'
    WHERE
        `User_ID`='$this->User_ID'";
        return $this->runDML($query);
    }
    public function delete()
    {
        $query = "DELETE
        FROM
            `users`
        WHERE
            `User_ID` = '$this->User_ID'";
            // print_r($query);die;
            return $this->runDML($query);
    }
    public function login()
    {
        $query = "SELECT
        *
    FROM
        `users`
    WHERE
        `Email` = '$this->Email' AND `Password` = '$this->Password' ";
        return $this->runDQL($query);
    }
    public function getAdminById()
    {
        $query = "SELECT
        *
    FROM
        `users`
    WHERE
        `User_ID` = '$this->User_ID'";
        return $this->runDQL($query);
    }
    public function updatePasswordByEmail()
    {
        $query = "UPDATE
        `users`
    SET
        `Password` = '$this->Password'
    WHERE
        `User_ID` = '$this->User_ID'";
        return $this->runDML($query);
    }

}