<?php
include_once __DIR__ ."\..\database\config.php";
include_once __DIR__ ."\..\database\operations.php";

class Project extends config implements operations {
    private $Projects_ID;
    private $Name;
    private $Desc;
    private $Information;
    private $Clint;
    private $Location;
    private $Surface_Area;
    private $Statue;
    private $User_ID;
    private $Year_Completed;
    private $Created_at;
    private $Subcategories_ID ;

    /**
     * Get the value of Projects_ID
     */ 
    public function getProjects_ID()
    {
        return $this->Projects_ID;
    }

    /**
     * Set the value of Projects_ID
     *
     * @return  self
     */ 
    public function setProjects_ID($Projects_ID)
    {
        $this->Projects_ID = $Projects_ID;

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
     * Get the value of Desc
     */ 
    public function getDesc()
    {
        return $this->Desc;
    }

    /**
     * Set the value of Desc
     *
     * @return  self
     */ 
    public function setDesc($Desc)
    {
        $this->Desc = $Desc;

        return $this;
    }

    /**
     * Get the value of Information
     */ 
    public function getInformation()
    {
        return $this->Information;
    }

    /**
     * Set the value of Information
     *
     * @return  self
     */ 
    public function setInformation($Information)
    {
        $this->Information = $Information;

        return $this;
    }

    /**
     * Get the value of Clint
     */ 
    public function getClint()
    {
        return $this->Clint;
    }

    /**
     * Set the value of Clint
     *
     * @return  self
     */ 
    public function setClint($Clint)
    {
        $this->Clint = $Clint;

        return $this;
    }

    /**
     * Get the value of Location
     */ 
    public function getLocation()
    {
        return $this->Location;
    }

    /**
     * Set the value of Location
     *
     * @return  self
     */ 
    public function setLocation($Location)
    {
        $this->Location = $Location;

        return $this;
    }

    /**
     * Get the value of Surface_Area
     */ 
    public function getSurface_Area()
    {
        return $this->Surface_Area;
    }

    /**
     * Set the value of Surface_Area
     *
     * @return  self
     */ 
    public function setSurface_Area($Surface_Area)
    {
        $this->Surface_Area = $Surface_Area;

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
     * Get the value of Year_Completed
     */ 
    public function getYear_Completed()
    {
        return $this->Year_Completed;
    }

    /**
     * Set the value of Year_Completed
     *
     * @return  self
     */ 
    public function setYear_Completed($Year_Completed)
    {
        $this->Year_Completed = $Year_Completed;

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
     * Get the value of Subcategories_ID
     */ 
    public function getSubcategories_ID()
    {
        return $this->Subcategories_ID;
    }

    /**
     * Set the value of Subcategories_ID
     *
     * @return  self
     */ 
    public function setSubcategories_ID($Subcategories_ID)
    {
        $this->Subcategories_ID = $Subcategories_ID;

        return $this;
    }

    public function create()
    {
        $query = "INSERT INTO `projects`(
            `Name`,
            `Desc`,
            
            `Clint`,
            `Location`,
            `Surface_Area`,
            `User_ID`,
            `Year_Completed`,
            `Subcategories_ID`
        )
        VALUES(
            '$this->Name',
            '$this->Desc',
            '$this->Clint',
            '$this->Location',
            '$this->Surface_Area',
            '$this->User_ID',
            '$this->Year_Completed',
            '$this->Subcategories_ID'
        )";
        return $this->runDML($query);
    }
    public function read()
    {
        $query = "SELECT * FROM `projects`";
        // print_r($query);die;
        return $this->runDQL($query);
    }
    public function update()
    {
        $query = "UPDATE
        `projects`
    SET
        `Name` = '$this->Name',
        `Desc` = '$this->Desc',
        `Information` = '$this->Information',
        `Clint` = '$this->Clint',
        `Location` = '$this->Location',
        `Surface_Area` = '$this->Surface_Area',
        `Statue` = '$this->Statue',
        `Year_Completed` = '$this->Year_Completed',
        `Subcategories_ID` = '$this->Subcategories_ID'
    WHERE
        `Projects_ID`= '$this->Projects_ID'
    ";
    return $this->runDML($query);
    }
    public function delete()
    {
        $query = "DELETE
        FROM
            `projects`
        WHERE
            `Projects_ID`= '$this->Projects_ID'";
        return $this->runDML($query);
    }
    public function  searchOnId()
    {
        $query = "SELECT
        *
    FROM
        `projects`
    WHERE
        `Projects_ID` = '$this->Projects_ID'";
        // print_r($query);die;
        return $this->runDQL($query);
    }
    public function getLastProject()
    {
        $query="SELECT
        `Projects_ID`
    FROM
        `projects`
    WHERE
        `Projects_ID` 
        ORDER BY
        `Projects_ID` DESC LIMIT 1";
        return $this->runDQL($query);
    }
    public function projectByStatue()
    {
        $query ="SELECT
        `projects`.*,
        `images_projects`.`Name` AS `name_image`,
        `images_projects`.`Name2`,
        `images_projects`.`Name3`,
        `images_projects`.`Statue`
    FROM
        `projects`
        LEFT JOIN `images_projects` ON `images_projects`.`Project_ID` = `projects`.`Projects_ID` 
    WHERE
        `projects`.`Statue` = '$this->Statue' LIMIT 3";
        // print_r($query);die;
        return $this->runDQL($query);
    }
    public function getProjectBySub()
    {
        $query = "SELECT
        `projects`.`Projects_ID`,
        `projects`.`Name`,
        `images_projects`.`Name` AS `name_image`,
        `images_projects`.`Name2`,
        `images_projects`.`Name3`,
        `subcategories`.`Name` AS `name_sub`
    FROM
        `projects`
        JOIN `images_projects` ON `images_projects`.`Project_ID`= `projects`.`Projects_ID`
        JOIN `subcategories` ON `subcategories`.`Subcategory_ID` = `projects`.`Subcategories_ID`
    WHERE
        `projects`.`Statue` = '$this->Statue'
       ";
        return $this->runDQL($query);
    }
    public function getProjectDetails()
    {
        $query ="SELECT
        `projects`.*,
        `images_projects`.`Name` AS `name_image`,
        `images_projects`.`Name2`,
        `images_projects`.`Name3`,
        `images_projects`.`Statue`
    FROM
        `projects`
        LEFT JOIN `images_projects` ON `images_projects`.`Project_ID` = `projects`.`Projects_ID`
    WHERE
    `Projects_ID` = '$this->Projects_ID'";
    return $this->runDQL($query);
    }
}