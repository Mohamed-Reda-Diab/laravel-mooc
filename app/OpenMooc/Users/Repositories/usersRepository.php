<?php

namespace OpenMooc\Users\Repositories;


use Illuminate\Support\Facades\DB;
use OpenMooc\Users\Models\User;

class usersRepository extends  \OpenMooc\Repository{
public function addUser($data){
    $user=new User();
    $user->username=$data['username'];
    $user->name=$data['name'];
    $user->email=$data['email'];
    $user->password=$data['password'];
    $user->about=$data['about'];
    $user->user_group=$data['user_group'];
    $user->is_active=$data['active'];

    if($user->save())
        return true;
    return false;

}
public  function updateUser($data){
  $user=User::find($data['id']);
    $user->username=$data['username'];
    $user->name=$data['name'];
    $user->email=$data['email'];
    $user->password=$data['password'];
    $user->about=$data['about'];
    $user->user_group=$data['user_group'];
    $user->is_active=$data['active'];
    if($user->save())
        return true;
    return false;
}
public  function  updatePass($pass){
    $user=User::find($pass['id']);
    $user->password=$pass['password'];
    if($user->save())
        return true;
    return false;
}
public  function deleteUser($id){
    $user=User::find($id);
    if(!$user)
        return false;
    $user->delete();
    return true;
}
public  function  getAllUsers(){
    return User::orderBy('id','DECS')->get();
}
public  function getUserById($id){
    return User::find($id);
}
    public  function getUsersByStatus($status){
        $users=DB::table('users')
            ->leftjoin('users_groups','users_groups.group_id','=','users.user_group')
            ->select('users.*','users_groups.group_name')
            ->where('is_active','=',$status)
            ->get();
        return $users;
    }
    public function  getUserByGroup($userGroupId){
      $users=DB::table('users')
          ->leftjoin('users_groups','users_groups.group_id','=','users.user_group')
          ->select('users.*','users_groups.group_name')
          ->where('users.user_group','=',$userGroupId)
          ->get();
      return $users;
    }
    public  function  searchUser($key){
        $user=DB::table('users')
            ->leftjoin('users_groups','users_groups.group_id','=','users.user_group')
            ->select('users.*','users_groups.group_name')
            ->where('users.name','like','%'.$key.'%')
            ->get();
        return $user;
    }


}