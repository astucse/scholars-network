<?php

namespace Modules\Accounts\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\DBAL\Exception\UniqueConstraintViolationException;

use Modules\Accounts\Entities\User;
use Modules\Accounts\Entities\Scholar;
use Modules\Accounts\Entities\Representative;
use Auth;
class AccountsController extends Controller
{
  protected $em;

  public function __construct(EntityManagerInterface $em){
      $this->em = $em;
      // $this->middleware('auth')->except(['login','login_post','signin','signin_submit']);
      // $this->middleware('auth')->only(['index','profile']);
      // $this->middleware('guest')->only(['login','login_post','signin','signin_post','kkk','signin_company','signin_buyer']);
  }

  public function signin(){
      // return $this->em->getRepository(CompanyCategory::class);
      return view('accounts::guest.signin',[
          'categories' =>  $this->em->getRepository(CompanyCategory::class)->findAll()
      ]);
  }
  public function logout(){
      Auth::logout();
      return redirect()->route('index');
  }
  public function login(){
      return view('accounts::guest.login');
  }
  public function login_post(Request $request){
      if(Auth::attempt([
          'email' => $request['email'],
          'password' => $request['password']
      ])){
          return redirect()->route('index');
      }
      return redirect()->back();
  }
}
