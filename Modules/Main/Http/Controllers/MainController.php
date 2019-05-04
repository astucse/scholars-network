<?php

namespace Modules\Main\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\DBAL\Exception\UniqueConstraintViolationException;

use Modules\Accounts\Entities\User;
use Modules\Accounts\Entities\Scholar;
use Modules\Accounts\Entities\Representative;
use Auth;

class MainController extends Controller
{
  protected $em;

  public function __construct(EntityManagerInterface $em)
  {
      $this->em = $em;
      $this->middleware('guest')->only(['index']);
  }

  public function index()
  {
      return view('main::index');
  }

}
