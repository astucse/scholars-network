<?php

namespace Modules\Org\Entities;

use Doctrine\ORM\Mapping AS ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Modules\Accounts\Entities\User;
use Modules\Post\Entities\Post;

/**
 * @ORM\Entity
 * @ORM\Table(name="orgUniversities")
 */
class University
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", unique=True, length=30)
     */
    protected $name;

    /**
     * @ORM\Column(type="string", unique=True, length=30)
     */
    protected $code;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $is_registered;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $governmental;

    /**
     * One University has Many representatives.
     * @ORM\OneToMany(targetEntity="Modules\Accounts\Entities\Representative", mappedBy="university")
     */
    private $representatives;

    /**
     * One University has Many positions.
     * @ORM\OneToMany(targetEntity="Modules\Main\Entities\Position", mappedBy="university")
     */
    private $positions;


    /**
    * @param $name
    * @param $governmental
    */
    public function __construct($name,$governmental=true)
    {
      $this->name = $name;
      $this->governmental = $governmental;
      $this->is_registered = false;
    }

    public function isGovernmental(){
      return $this->governmental;
    }


}
