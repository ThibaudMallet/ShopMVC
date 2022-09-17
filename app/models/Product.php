<?php
namespace Oshop\Models;
use PDO;
use \Oshop\Utils\Database;

class Product extends CoreModel
{
    /**
     * description of the product
     *
     * @var string
     */
    private $description;

    /**
     * picture URL for the product
     *
     * @var string
     */
    private $picture;

    /**
     * price of the product
     *
     * @var float
     */
    private $price;

    /**
     * Rating of the product
     *
     * @var int
     */
    private $rate;

    /**
     * Status of the product
     *
     * @var int
     */
    private $status;

    /**
     * ID of linked brand
     *
     * @var int
     */
    private $brand_id;

    /**
     * ID of linked category
     *
     * @var int
     */
    private $category_id;

    /**
     * ID of linked type
     *
     * @var int
     */
    private $type_id;

    
    /**
     * Set id of the product
     *
     * @param  int  $id  id of the product
     *
     * @return  self
     */ 
    public function setId(int $id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Set name of the product
     *
     * @param  string  $name  name of the product
     *
     * @return  self
     */ 
    public function setName(string $name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get description of the product
     *
     * @return  string
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set description of the product
     *
     * @param  string  $description  description of the product
     *
     * @return  self
     */ 
    public function setDescription(string $description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get picture URL for the product
     *
     * @return  string
     */ 
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * Set picture URL for the product
     *
     * @param  string  $picture  picture URL for the product
     *
     * @return  self
     */ 
    public function setPicture(string $picture)
    {
        $this->picture = $picture;

        return $this;
    }

    /**
     * Get price of the product
     *
     * @return  float
     */ 
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set price of the product
     *
     * @param  float  $price  price of the product
     *
     * @return  self
     */ 
    public function setPrice(float $price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get rating of the product
     *
     * @return  int
     */ 
    public function getRate()
    {
        return $this->rate;
    }

    /**
     * Set rating of the product
     *
     * @param  int  $rate  Rating of the product
     *
     * @return  self
     */ 
    public function setRate(int $rate)
    {
        $this->rate = $rate;

        return $this;
    }

    /**
     * Get status of the product
     *
     * @return  int
     */ 
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set status of the product
     *
     * @param  int  $status  Status of the product
     *
     * @return  self
     */ 
    public function setStatus(int $status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Set created_at
     *
     * @param  string  $created_at  created_at
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
     * @param  string  $updated_at  updated_at
     *
     * @return  self
     */ 
    public function setUpdated_at(string $updated_at)
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    /**
     * Get iD of linked brand
     *
     * @return  int
     */ 
    public function getBrand_id()
    {
        return $this->brand_id;
    }

    /**
     * Set iD of linked brand
     *
     * @param  int  $brand_id  ID of linked brand
     *
     * @return  self
     */ 
    public function setBrand_id(int $brand_id)
    {
        $this->brand_id = $brand_id;

        return $this;
    }

    /**
     * Get iD of linked category
     *
     * @return  int
     */ 
    public function getCategory_id()
    {
        return $this->category_id;
    }

    /**
     * Set iD of linked category
     *
     * @param  int  $category_id  ID of linked category
     *
     * @return  self
     */ 
    public function setCategory_id(int $category_id)
    {
        $this->category_id = $category_id;

        return $this;
    }

    /**
     * Get iD of linked type
     *
     * @return  int
     */ 
    public function getType_id()
    {
        return $this->type_id;
    }

    /**
     * Set iD of linked type
     *
     * @param  int  $type_id  ID of linked type
     *
     * @return  self
     */ 
    public function setType_id(int $type_id)
    {
        $this->type_id = $type_id;

        return $this;
    }

    public function findAll()
    {
        $sql = '
            SELECT * FROM `product`;
        ';

        // Recupere une connexion a la base de donnée
        $pdo = Database::getPDO();

        $pdoStatement = $pdo->query($sql);

        $results = $pdoStatement->fetchAll(PDO::FETCH_CLASS, '\Oshop\Models\Product');

        return $results;
    }

    public function findAllByTypeId($typeId)
    {
        $sql = '
            SELECT product.*, type.name as type_name
            FROM `product`
            INNER JOIN type
            ON product.type_id = type.id
            WHERE type_id = ' . $typeId . ';
        ';
        // Recupere une connexion a la base de donnée
        $pdo = Database::getPDO();

        $pdoStatement = $pdo->query($sql);

        $results = $pdoStatement->fetchAll(PDO::FETCH_CLASS, '\Oshop\Models\Product');

        return $results;
    }

    public function findAllByCategoryId($categoryId)
    {
        $sql = '
            SELECT product.*, type.name as type_name
            FROM `product`
            INNER JOIN type
            ON product.type_id = type.id
            WHERE category_id = ' . $categoryId . ';
        ';
        // Recupere une connexion a la base de donnée
        $pdo = Database::getPDO();

        $pdoStatement = $pdo->query($sql);

        $results = $pdoStatement->fetchAll(PDO::FETCH_CLASS, '\Oshop\Models\Product');

        return $results;
    }

    public function findAllByBrandId($brandId)
    {
        $sql = '
            SELECT product.*, type.name as type_name
            FROM `product`
            INNER JOIN type
            ON product.type_id = type.id
            WHERE brand_id = ' . $brandId . ';
        ';
        // Recupere une connexion a la base de donnée
        $pdo = Database::getPDO();

        $pdoStatement = $pdo->query($sql);

        $results = $pdoStatement->fetchAll(PDO::FETCH_CLASS, '\Oshop\Models\Product');

        return $results;
    }

    public function findWithForeign(int $id)
    {
        $sql = '
            SELECT product.*, category.name as category_name, type.name as type_name, brand.name as brand_name
            FROM `product`
            INNER JOIN category
            ON product.category_id = category.id
            INNER JOIN type
            ON product.type_id = type.id
            INNER JOIN brand
            ON product.brand_id = brand.id
            WHERE product.id = ' . $id . ';
        ';

        // Recupere une connexion a la base de donnée
        $pdo = Database::getPDO();

        $pdoStatement = $pdo->query($sql);

        $results = $pdoStatement->fetchObject('\Oshop\Models\Product');

        return $results;
    }

    public function find(int $id)
    {
        $sql = '
            SELECT *
            FROM `product`
            WHERE id = ' . $id . ';
        ';

        // Recupere une connexion a la base de donnée
        $pdo = Database::getPDO();

        $pdoStatement = $pdo->query($sql);

        $results = $pdoStatement->fetchObject('\Oshop\Models\Product');

        return $results;
    }
}