<?php
include_once __DIR__ . "\..\database\config.php";
include_once __DIR__ . "\..\database\operations.php";

class Banner extends config implements operations{
    private $Banner_ID;
    private $Info;
    private $Info2;
    private $Image;
    private $Created_at;

    /**
     * Get the value of Banner_ID
     */ 
    public function getBanner_ID()
    {
        return $this->Banner_ID;
    }

    /**
     * Set the value of Banner_ID
     *
     * @return  self
     */ 
    public function setBanner_ID($Banner_ID)
    {
        $this->Banner_ID = $Banner_ID;

        return $this;
    }

    /**
     * Get the value of Info
     */ 
    public function getInfo()
    {
        return $this->Info;
    }

    /**
     * Set the value of Info
     *
     * @return  self
     */ 
    public function setInfo($Info)
    {
        $this->Info = $Info;

        return $this;
    }

    /**
     * Get the value of Info2
     */ 
    public function getInfo2()
    {
        return $this->Info2;
    }

    /**
     * Set the value of Info2
     *
     * @return  self
     */ 
    public function setInfo2($Info2)
    {
        $this->Info2 = $Info2;

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
    public function create()
    {
        $query = "INSERT INTO `banners`(
            `Info`,
            `Info2`,
            `Image`
        )
        VALUES(
            '$this->Info',
            '$this->Info2',
            '$this->Image'
        )";
        // print_r($query);die;
        return $this->runDML($query);
    }
    public function read()
    {
        $query = "SELECT
        *
    FROM
        `banners`";
        return $this->runDQL($query);
    }
    public function update()
    {
        $Image = NULL;
        if(!empty($this->Image)){
            $Image = " , Image = '$this->Image' ";
        }
        $query ="UPDATE
        `banners`
    SET
        `Info` = '$this->Info',
        `Info2` = '$this->Info2'
        $Image
    WHERE
        `Banner_ID` = '$this->Banner_ID'";
        // print_r($query);die;
        return $this->runDML($query);
    }
    public function delete()
    {
        $query = "DELETE
        FROM
            `banners`
        WHERE
            `Banner_ID`='$this->Banner_ID'";
            return $this->runDML($query);
    }
    public function searchOnId()
    {
        $query = "SELECT
        *
    FROM
        `banners`
    WHERE
        `Banner_ID`= '$this->Banner_ID'";
        return $this->runDQL($query);
    }
    
}