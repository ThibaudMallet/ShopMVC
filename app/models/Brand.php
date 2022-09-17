<?php
namespace Oshop\Models;

use \Oshop\Utils\Database;
use PDO;

class Brand extends CoreModel
{

    /**
     * Set iD of the brand
     *
     * @param  int  $id  ID of the brand
     *
     * @return  self
     */ 
    public function setId(int $id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Set name of the brand
     *
     * @param  string  $name  name of the brand
     *
     * @return  self
     */ 
    public function setName(string $name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Set creation date
     *
     * @param  string  $created_at  Creation date
     *
     * @return  self
     */ 
    public function setCreated_at(string $created_at)
    {
        $this->created_at = $created_at;

        return $this;
    }

    /**
     * Set update date
     *
     * @param  string  $updated_at  Update date
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
            SELECT * FROM `brand`;
        ';

        // Recupere une connexion a la base de donnée
        $pdo = Database::getPDO();

        $pdoStatement = $pdo->query($sql);

        $results = $pdoStatement->fetchAll(PDO::FETCH_CLASS, '\Oshop\Models\Brand');

        return $results;
    }

    public function find(int $id)
    {
        $sql = '
            SELECT * FROM `brand` WHERE id = ' . $id . ';
        ';

        // Recupere une connexion a la base de donnée
        $pdo = Database::getPDO();

        $pdoStatement = $pdo->query($sql);

        $results = $pdoStatement->fetchObject('\Oshop\Models\Brand');

        return $results;
    }

}