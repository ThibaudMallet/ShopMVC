<?php
namespace Oshop\Models;


class CoreModel
{
    /**
    * ID of the type
    *
    * @var int
    */
    protected $id;

    /**
    * name og the type
    *
    * @var string
    */
    protected $name;

    /**
    * Creation date
    *
    * @var string
    */
    protected $created_at;

    /**
    * Update date
    *
    * @var string
    */
    protected $updated_at;

    /**
    * Get iD of the type
    *
    * @return int
    */
    public function getId()
    {
    return $this->id;
    }

    /**
    * Get name og the type
    *
    * @return string
    */
    public function getName()
    {
    return $this->name;
    }

    /**
    * Get creation date
    *
    * @return string
    */
    public function getCreated_at()
    {
    return $this->created_at;
    }

    /**
    * Get updated date
    *
    * @return string
    */
    public function getUpdated_at()
    {
    return $this->updated_at;
    }
}