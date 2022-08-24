<?php
include_once __DIR__ . "\..\database\config.php";
include_once __DIR__ . "\..\database\operations.php";

class Subcategory extends config implements operations{
    private $Subcategory_ID ;
    private $Name ;
    private $Statue ;
    private $Created_at ;

    /**
     * Get the value of Subcategory_ID
     */ 
    public function getSubcategory_ID()
    {
        return $this->Subcategory_ID;
    }

    /**
     * Set the value of Subcategory_ID
     *
     * @return  self
     */ 
    public function setSubcategory_ID($Subcategory_ID)
    {
        $this->Subcategory_ID = $Subcategory_ID;

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
        # code...
    }
    public function read()
    {
        $query = "SELECT
        *
    FROM
        `subcategories`
    WHERE
        `Statue` ='$this->Statue'";
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
    public function getSubcategories()
    {
        $query = "SELECT
        *
    FROM
        `subcategories`
    ";
        return $this->runDQL($query);
    }
    // public function getProjectBySub()
    // {
    //     $query = "SELECT
    //     `projects`.`Projects_ID`,
    //     `projects`.`Name`,
    //     `images_projects`.`Name` AS `name_image`,
    //     `images_projects`.`Name2`,
    //     `images_projects`.`Name3`,
    //     `subcategories`.`Name` AS `name_sub`
    // FROM
    //     `projects`
    //     JOIN `images_projects` ON `images_projects`.`Project_ID`= `projects`.`Projects_ID`
    //     JOIN `subcategories` ON `subcategories`.`Subcategory_ID` = `projects`.`Subcategories_ID`
    // WHERE
    //     `subcategories`.`Statue` = '$this->Statue'
    //     AND 
    //     `subcategories`.`Name`= '$this->Name'
    //    ";
    //    print_r($query);die;
    //     return $this->runDQL($query);
    // }
}