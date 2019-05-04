<?php

namespace Modules\Accounts\Entities;

use Doctrine\ORM\Mapping AS ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Modules\Accounts\Entities\User;
use Modules\Post\Entities\Post;

/**
 * @ORM\Entity
 * @ORM\Table(name="accountsRepresentative")
 */
class Representative extends User
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
    protected $phone_number;

    /**
     * @ORM\Column(type="string")
     */
    protected $position_name;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $is_admin;

    /**
     * Many Representatives have One University.
     * @ORM\ManyToOne(targetEntity="Modules\Org\Entities\University", inversedBy="representatives")
     * @ORM\JoinColumn(name="university_id", referencedColumnName="id", nullable=True)
     */
    private $university;

    /**
    * @param $firstname
    * @param $lastname
    * @param $email
    * @param $phone_number
    */
    public function __construct($email,$name,$password)
    {
        parent::__construct($email,$name,$password);
        // $this->phone_number = $phone_number;
    }


}
