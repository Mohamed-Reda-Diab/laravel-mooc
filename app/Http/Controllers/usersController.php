<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 01/09/2018
 * Time: 07:28 م
 */

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use OpenMooc\Users\Models\User;
use OpenMooc\Users\Services\usersService;


class usersController extends Controller
{
  private $userServices;
  public function __construct()
  {
     $this->userServices=new usersService();
  }
  public  function addUser(){
  $user=DB::table('users_groups')->get();
  return view('addUser')->with('addUser',$user);

  }
  public function processAddUser(Request $request){
    if($this->userServices->addUser($request)){
        return 'Done';
    }
    return $this->userServices->errors();

  }
  public function updateUser($id=0){
     // $user=DB::table('users')->where('users.id','=',$id)->get();
      $users=new User();
      $user=$users->find($id);
      if(count($user)>0){
          $userGroup=DB::table('users_groups')->get();
          return view('updateUser')
                 ->with('updateUser',$user)
                 ->with('userGroup',$userGroup);
      }
  }
  public  function processUpdateUser(Request $request){
      if ($this->userServices->updateUser($request))
          return 'user updated';

      return $this->userServices->errors();
  }
  public  function  updateUserPassword($id=0){
      $users=new User();
      $user=$users->find($id);
      if(count($user)>0){
          return view('updateUserPass')
               ->with('user',$user);
      }
  }
  public function processUpdateUserPass(Request $request){

      if($this->userServices->updatePassword($request)){
          return 'Done';
      }
      return $this->userServices->errors();


  }
  public function deleteUser($id=0){
  if($this->userServices->deleteUser($id))
      return  'user deleted';
  return $this->userServices->errors();

  }
  public  function getAllUsers(){
  $users=$this->userServices->getAllUsers();
  if($users){
      return view('getAllUsers')->with('users',$users);
  }
  return 'Error';

}
public  function getUserById($id=0){
$user=$this->userServices->getUserById($id);
if(count($user)>0)
    return view('getUserById')->with('user',$user);
return 'Error:-not found';


}
public function getUserByActiveStatus($status){
 $users=$this->userServices->getUsersByStatus($status);
 if(count($users)>0)
     return view('getUserByActiveStatus')->with('users',$users);
 return 'Error:-not found';

}
public function getUserByGroup($userGroupId){
      $users=$this->userServices->getUserByGroup($userGroupId);
      if(count($users)>0){
          return view('getUserByGroup')->with('users',$users);
      }
      return 'Error: not found';
}

public function searchUser($keyword){
  $users=$this->userServices->searchUser($keyword);
  if(count($users)>0)
      return view('searchUser')->with('users',$users);
    return 'Error: no user match this key';
}


}