<?php
namespace Oshop\Models;

use PDO;
use \Oshop\Utils\Database;

class Category extends CoreModel
{
    
    /**
     * Description of category
     *
     * @var string
     */
    private $subtitle;
    /**
     * URL of category picture
     *
     * @var string
     */
    private $picture;
    /**
     * Home order of category, 0 = hidden
     *
     * @var int
     */
    private $home_order;

    /**
     * Set iD of category
     *
     * @param  int  $id  ID of category
     *
     * @return  self
     */ 
    public function setId(int $id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Set name of catgory
     *
     * @param  string  $name  Name of catgory
     *
     * @return  self
     */ 
    public function setName(string $name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get description of category
     *
     * @return  string
     */ 
    public function getSubtitle()
    {
        return $this->subtitle;
    }

    /**
     * Set description of category
     *
     * @param  string  $subtitle  Description of category
     *
     * @return  self
     */ 
    public function setSubtitle(string $subtitle)
    {
        $this->subtitle = $subtitle;

        return $this;
    }

    /**
     * Get uRL of category picture
     *
     * @return  string
     */ 
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * Set uRL of category picture
     *
     * @param  string  $picture  URL of category picture
     *
     * @return  self
     */ 
    public function setPicture(string $picture)
    {
        $this->picture = $picture;

        return $this;
    }

    /**
     * Get home order of category, 0 = hidden
     *
     * @return  int
     */ 
    public function getHome_order()
    {
        return $this->home_order;
    }

    /**
     * Set home order of category, 0 = hidden
     *
     * @param  int  $home_order  Home order of category, 0 = hidden
     *
     * @return  self
     */ 
    public function setHome_order(int $home_order)
    {
        $this->home_order = $home_order;

        return $this;
    }

    /**
     * Set created_at
     *
     * @param  string  $created_at  Created_at
     *
     * @return  self
     */ 
    public function setCreated_at(string $created_at)
    {
        $this->created_at = $created_at;

        return $this;
    }

    /**
     * Set updated_at
     *
     * @param  string  $updated_at  Updated_at
     *
     * @return  self
     */ 
    public function setUpdated_at(string $updated_at)
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    public function findAll()
    {
        $sql = '
            SELECT * FROM `category`;
        ';

        // Recupere une connexion a la base de donnée
        $pdo = Database::getPDO();

        $pdoStatement = $pdo->query($sql);

        $results = $pdoStatement->fetchAll(PDO::FETCH_CLASS, '\OShop\Models\Category');

        return $results;
    }

    public function findHomeCategories()
    {
        $sql = '
            SELECT *
            FROM `category`
            WHERE home_order != 0
            ORDER BY home_order ASC;
        ';

        // Recupere une connexion a la base de donnée
        $pdo = Database::getPDO();

        $pdoStatement = $pdo->query($sql);

        $results = $pdoStatement->fetchAll(PDO::FETCH_CLASS, '\OShop\Models\Category');

        return $results;
    }

    public function find(int $id)
    {
        $sql = '
            SELECT * FROM `category` WHERE id = ' . $id . ';
        ';

        // Recupere une connexion a la base de donnée
        $pdo = Database::getPDO();

        $pdoStatement = $pdo->query($sql);

        $results = $pdoStatement->fetchObject('\OShop\Models\Category');

        return $results;
    }
}