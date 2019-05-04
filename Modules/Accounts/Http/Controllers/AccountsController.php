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

  public function register(){
      // return $this->em->getRepository(CompanyCategory::class);
      return view('accounts::guest.register',[
          // 'categories' =>  $this->em->getRepository(CompanyCategory::class)->findAll()
      ]);
  }
  public function register_scholar(Request $request){
    $password = $request['password'];
    $email = $request['email'];
    $name = $request['name'];
    $s = new Scholar($email,$name,$password);
    try {
      $this->em->persist($s);
      $this->em->flush();
    } catch (\Exception $e) {
      // return $e->getMessage();
      return redirect()->back()->withErrors(['Email exists']);
    }
    return redirect()->back()->with(['message'=>'check your email for confirmation']);
  }
  public function logout(){
      Auth::logout();
      return redirect()->route('index');
  }
  public function login(){
      return view('accounts::guest.login');
  }
  public function login_submit(Request $request){
      if(Auth::attempt([
          'email' => $request['email'],
          'password' => $request['password']
      ])){
          return redirect()->route('index');
      }
      return redirect()->back();
  }
}
