<?php
include_once __DIR__ . "\..\database\config.php";
include_once __DIR__ . "\..\database\operations.php";

class Image_Project extends config implements operations{
    private $Image_Projects_ID ;
    private $Name ;
    private $Name2 ;
    private $Name3 ;
    private $Statue ;
    private $Project_ID ;
    private $User_ID ;
    private $Created_at ;

    /**
     * Get the value of Image_Projects_ID
     */ 
    public function getImage_Projects_ID()
    {
        return $this->Image_Projects_ID;
    }

    /**
     * Set the value of Image_Projects_ID
     *
     * @return  self
     */ 
    public function setImage_Projects_ID($Image_Projects_ID)
    {
        $this->Image_Projects_ID = $Image_Projects_ID;

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
     * Get the value of Name2
     */ 
    public function getName2()
    {
        return $this->Name2;
    }

    /**
     * Set the value of Name2
     *
     * @return  self
     */ 
    public function setName2($Name2)
    {
        $this->Name2 = $Name2;

        return $this;
    }

    /**
     * Get the value of Name3
     */ 
    public function getName3()
    {
        return $this->Name3;
    }

    /**
     * Set the value of Name3
     *
     * @return  self
     */ 
    public function setName3($Name3)
    {
        $this->Name3 = $Name3;

        return $this;
    }

    /**
     * Get the value of Project_ID
     */ 
    public function getProject_ID()
    {
        return $this->Project_ID;
    }

    /**
     * Set the value of Project_ID
     *
     * @return  self
     */ 
    public function setProject_ID($Project_ID)
    {
        $this->Project_ID = $Project_ID;

        return $this;
    }

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
    
    /**
     * Get the value of Statue
     */ 
    public function getStatue()
    {
        return $this->Statue;
    }

    /**
     * Set the value of Statue
     *
     * @return  self
     */ 
    public function setStatue($Statue)
    {
        $this->Statue = $Statue;

        return $this;
    }

    public function create()
    {
        $query ="INSERT INTO `images_projects`(
            `Name`,
            `Name2`,
            `Name3`,
            `Project_ID`,
            `User_ID`
        )
        VALUES(
            '$this->Name',
            '$this->Name2',
            '$this->Name3',
            '$this->Project_ID',
            '$this->User_ID'
        )";
        // print_r($query);die;
        return $this->runDML($query);
    }
    public function read()
    {
        $query ="SELECT
        `images_projects`.*,
        `projects`.`Name` AS `name_projects`,
        `users`.`Name` AS `name_users`
    FROM
        `images_projects`
        JOIN `projects` ON `projects`.`Projects_ID` =`images_projects`.`Project_ID`
        LEFT JOIN `users` ON `users`.`User_ID` = `images_projects`.`User_ID`";
        return $this->runDQL($query);
    }
    public function update()
    {
        $Statue = NULL;
        if(!empty($this->Statue)){
            $Statue = "Statue = '$this->Statue' ";
        }
        $Name = NULL;
        if(!empty($this->Name)){
            $Name = " , Name = '$this->Name' ";
        }
        $Name2 = NULL;
        if(!empty($this->Name2)){
            $Name2 = " , Name2 = '$this->Name2' ";
        }
        $Name3 = NULL;
        if(!empty($this->Name3)){
            $Name3 = " , Name3 = '$this->Name3' ";
        }
        $query = "UPDATE
        `images_projects`
    SET
        $Statue
        $Name 
        $Name2 
        $Name3
    WHERE
        `Image_Projects_ID` = '$this->Image_Projects_ID'";
        // print_r($query);die;
        return $this->runDML($query);
    }
    public function delete()
    {
        $query ="DELETE
        FROM
        `images_projects`
        WHERE
        `Image_Projects_ID` = '$this->Image_Projects_ID'";
        return $this->runDML($query);
    }
    public function searchOnId()
    {
        $query ="SELECT
        `Image_Projects_ID`,
        `Name`,
        `Name2`,
        `Name3`,
        `Statue`
    FROM
        `images_projects`
    WHERE
       `Image_Projects_ID` = '$this->Image_Projects_ID'";
        return $this->runDQL($query);
    }

    
}