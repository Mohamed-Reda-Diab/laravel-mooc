<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 28/08/2018
 * Time: 10:53 ص
 */

namespace App\OpenMooc\Users\Services;


use OpenMooc\Users\Repositories\usersGroupsRepository;
use Validator;
use OpenMooc\Service;

class usersGroupsService extends  Service
{
 public function createUserGroup($request){
   $rules=[
       'group_name'=>'required'
   ];
   $validator=Validator::make($request->all(),$rules);
   if($validator->fails()){
       $this->setErrors($validator->errors()->all());
       return false;
   }
   $userGroupRepository=new usersGroupsRepository();
    if($userGroupRepository->createUserGroup($request->all()))
        return true;
    $this->setErrors('Error');
    return false;

 }

 public  function  getAllUsersGroups(){
     $userGroupRepository=new usersGroupsRepository();
     return $userGroupRepository->getAllUsersGroups();
 }
 public function updateUserGroup($request){
     $rules=[
         'group_name' => 'required|unique:users_groups|alpha',
         'group_id'=> 'required'
     ];
     $validator=Validator::make($request->all(),$rules);
     if($validator->fails()){
        $this->setErrors($validator->errors()->all());
        return false;
     }
     $userGroupRepository=new usersGroupsRepository();
     if($userGroupRepository->updateUserGroup($request->all()))
         return true;
     $this->setErrors('Error');
     return false;

     

 }
 public function deleteUserGroup($id){
     $userGroupRepository=new usersGroupsRepository();
     if($userGroupRepository->deleteUserGroup($id)){
         return true;
     }
       $this->setErrors("Error (No id like $id)");
     return false;
 }
 public  function getUserGroupById($id){
     $userGroupRepository=new usersGroupsRepository();
     $ug=$userGroupRepository->getUserGroupById($id);
     if($ug)
         return $ug;
     $this->setErrors('no id like'.$id);
     return false;


 }

}