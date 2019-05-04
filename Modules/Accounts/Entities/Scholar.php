<?php

namespace Modules\Accounts\Entities;

use Doctrine\ORM\Mapping AS ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Modules\Accounts\Entities\User;
use Modules\Post\Entities\Post;

/**
 * @ORM\Entity
 * @ORM\Table(name="accountsScholars")
 */
class Scholar extends User
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;


    /**
     * @ORM\Column(type="string", nullable=True)
     */
    protected $phone_number;

    /**
     * @ORM\Column(type="string", nullable=True)
     */
    protected $location_country;

    /**
     * @ORM\Column(type="string", length=30, nullable=True)
     */
    protected $linkedin_url;

    /**
     * One Product has One Shipment.
     * @ORM\OneToOne(targetEntity="User", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * @var User
     */
    private $user;

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
