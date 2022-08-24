<?php
include_once __DIR__ ."\..\database\config.php";
include_once __DIR__ ."\..\database\operations.php";

class Service extends config implements operations{
    private $Services_ID;
    private $Name;
    private $Desc;
    private $Image;
    private $Created_at;

    /**
     * Get the value of Services_ID
     */ 
    public function getServices_ID()
    {
        return $this->Services_ID;
    }

    /**
     * Set the value of Services_ID
     *
     * @return  self
     */ 
    public function setServices_ID($Services_ID)
    {
        $this->Services_ID = $Services_ID;

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
    public function create()
    {
        $query = "INSERT INTO `services`(
            `Name`,
            `Desc`,
            `Image`
        )
        VALUES(
            '$this->Name',
            '$this->Desc',
            '$this->Image'
        )";
        return $this->runDML($query);
    }
    public function read()
    {
        $query = "SELECT
        *
    FROM
        `services`";
        return $this->runDQL($query);
    }
    public function update()
    {
        $Image = NULL;
        if(!empty($this->Image)){
            $Image = " , Image = '$this->Image' ";
        }
        $query = "UPDATE
        `services`
    SET
        `Name` = '$this->Name',
        `Desc` = '$this->Desc'
        $Image
    WHERE
        `Services_ID`='$this->Services_ID'";
        // print_r($query);die;
        return $this->runDML($query);
    }
    public function delete()
    {
        $query = "DELETE
        FROM
            `services`
        WHERE
            `Services_ID`='$this->Services_ID'";
            // print_r($query);
        return $this->runDML($query);
    }
    public function searchOnId()
    {
        $query = "SELECT
        *
    FROM
        `services`
    WHERE
        `Services_ID`= '$this->Services_ID'";
        return $this->runDQL($query);
    }
    
}