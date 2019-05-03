<?php

namespace Modules\Org\Entities;

use Doctrine\ORM\Mapping AS ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Modules\Accounts\Entities\User;
use Modules\Post\Entities\Post;

/**
 * @ORM\Entity
 * @ORM\Table(name="orgFields")
 */
class Field
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
     * One Field has Many positions.
     * @ORM\OneToMany(targetEntity="Modules\Main\Entities\Position", mappedBy="field")
     */
    private $positions;




    /**
    * @param $name
    * @param $governmental
    */
    public function __construct($name)
    {
      $this->name = $name;
    }


}
