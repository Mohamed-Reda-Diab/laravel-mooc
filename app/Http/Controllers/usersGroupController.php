<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 27/08/2018
 * Time: 06:31 م
 */

namespace App\Http\Controllers;




use App\OpenMooc\Users\Services\usersGroupsService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class usersGroupController extends  Controller
{
 public  function addUserGroup(){
     return view('usersGroups');
 }
public function processAddUserGroup(Request $request){
    $userGroupService=new usersGroupsService();
    if($userGroupService->createUserGroup($request))
        return 'Done';
    return $userGroupService->errors();



}
public function getAllUsersGroups(){
     $usersGroupsService=new usersGroupsService();
     $uGroups=$usersGroupsService->getAllUsersGroups();
     return view('allUsersGroups')->with('uGroups',$uGroups);
}
public function updateUserGroup($id=0){
    $userGroup = \DB::table('users_groups')
        ->where('users_groups.group_id',$id)
        ->get();
    if (count($userGroup) > 0) {
       return view('updateUserGroup')->with('userGroups',$userGroup);

     }
     return 'No user group math this id';

}
public function processUpdateUserGroup(Request $request){
    $ugservice=new usersGroupsService();
    if($ugservice->updateUserGroup($request))
        return 'Done';
    return $ugservice->errors();


}
public function deleteUserGroup($id){
     $userGroupService=new usersGroupsService();
     if($userGroupService->deleteUserGroup($id))
         return 'Done';
     return $userGroupService->errors();
}
public  function getUserGroupById($id=0){
     $userGroupService=new usersGroupsService();
    $ug=$userGroupService->getUserGroupById($id);
    if(count($ug)>0)
        return view('userGroupById')->with('userGroupId',$ug);

    return $userGroupService->errors();

}


}