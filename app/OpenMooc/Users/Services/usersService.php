<?php
/**
 * Created by PhpStorm.
 * User: mohamed
 * Date: 4/29/2018
 * Time: 2:50 PM
 */

namespace OpenMooc\Users\Services;


use OpenMooc\Users\Repositories\usersRepository;
use Validator;
use OpenMooc\Service;

class usersService extends  Service
{
public function addUser($request){
    $rules=
    [
        'username'=>'required|unique',
        'name'=>'required|unique',
        'email'=>'required|email',
        'password'=>'required',
        'active'=>'required'


    ] ;
    $validator=Validator::make($request->all(),$rules);
    if($validator->fails()){
       $this->setErrors($validator->errors()->all());
       return false;
    }
    $userRepository=new usersRepository();
    if($userRepository->addUser($request->all()))
        return true;
    $this->setErrors('Error');
    return false;
}
public  function updateUser($request){
    $rules=[
        'name'           => 'required|min:3|max:20',
        'username'       => 'required|min:5|max:20',
        'password'       => 'required|min:6|max:20',
        'email'          => 'required|email',

        'about'          => 'required|max:500',
        'user_group'     => 'required|integer',
        'active'         => 'required|boolean',

    ];
   $validator=Validator::make($request->all(),$rules);
    if($validator->fails()){
        $this->setErrors($validator->errors()->all());
        return false;
    }
    $userRepository=new usersRepository();
    if($userRepository->updateUser($request->all())){
        return true;
    }
    $this->setErrors('Error');
    return false;
}
public  function updatePassword($request){
    $rules=[
        'password'=>'required|min:6|max:20'
    ];
    $validator=Validator::make($request->all(),$rules);
    if($validator->fails()){
       $this->setErrors($validator->errors()->all());
        return false;
    }
    $userRepository=new usersRepository();
    if($userRepository->updatePass($request->all()))
        return true;
    $this->setErrors('Error');
    return false;

}
public function  deleteUser($id){
    $user=new usersRepository();
    if($user->deleteUser($id))
        return true;
    $this->setErrors('Error :- this user not found');
    return false;
}
public  function getAllUsers(){
    $users=new  usersRepository();
    return $users->getAllUsers();


}
public function getUserById($id){
    $user=new usersRepository();
    return $user->getUserById($id);
}
public  function getUsersByStatus($status){
    $usersRepository=new usersRepository();
    return $usersRepository->getUsersByStatus($status);


}
public function getUserByGroup($userGroupId){
    $users=new usersRepository();
    return $users->getUserByGroup($userGroupId);
}
public function searchUser($key){
    $user=new usersRepository();
    return $user->searchUser($key);
}
}