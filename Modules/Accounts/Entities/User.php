<?php

namespace Modules\Accounts\Entities;

use Doctrine\ORM\Mapping AS ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Auth\Authenticatable;


/**
 * @ORM\Entity
 * @ORM\Table(name="accountsUsers")
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="discr", type="string")
 * @ORM\DiscriminatorMap({"user" = "User", "scholar"="Scholar", "representative" = "Representative"})
 */
abstract class User implements Authenticatable
{
    use \LaravelDoctrine\ORM\Auth\Authenticatable;
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\Column(type="string",length=35)
     */
    protected $name;

    /**
     * @ORM\Column(type="string",length=35,unique=true)
     */
    protected $email;

    /**
     * @ORM\Column(type="string")
     */
    protected $password;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $email_verified;

    /**
    * @param $email
    */
    public function __construct($email,$name,$password)
    {
        $this->email = $email;
        $this->password = Hash::make($password);
        $this->name = $name;
        $this->email_verified = false;
    }

    public function getId(){
        return $this->id;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getName(){
        return $this->name;
    }
    public function EmailVerified(){
        $this->email_verified = true;
    }
    public function getFakeId(){
        return encrypt($this->id);
    }

    abstract public function identity();


}
