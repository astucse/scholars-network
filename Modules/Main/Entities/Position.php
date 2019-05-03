<?php

namespace Modules\Main\Entities;

use Doctrine\ORM\Mapping AS ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Modules\Accounts\Entities\User;
use Modules\Post\Entities\Post;

/**
 * @ORM\Entity
 * @ORM\Table(name="mainPositions")
 */
class Position
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     */
    protected $title;

    /**
     * @ORM\Column(type="string")
     */
    protected $detail;

    /**
     * @ORM\Column(type="string")
     * advisorship, instructor, seminar_presenter, other
     */
    protected $need_type;

    /**
     * @ORM\Column(type="date")
     */
    protected $application_deadline;

    /**
     * @ORM\Column(type="date")
     */
    protected $date_start;

    /**
     * @ORM\Column(type="date")
     */
    protected $date_finish;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $active;

    /**
     * Many Representatives have One University.
     * @ORM\ManyToOne(targetEntity="Modules\Org\Entities\University", inversedBy="positions")
     * @ORM\JoinColumn(name="university_id", referencedColumnName="id", nullable=True)
     */
    private $university;

    /**
     * Many Representatives have One University.
     * @ORM\ManyToOne(targetEntity="Modules\Org\Entities\Field", inversedBy="positions")
     * @ORM\JoinColumn(name="field_id", referencedColumnName="id", nullable=True)
     */
    private $field;


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


}
