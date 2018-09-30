<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 28/08/2018
 * Time: 10:49 ص
 */

namespace OpenMooc\Users\Repositories;



use OpenMooc\Repository;
use OpenMooc\Users\Models\users_groups;

class usersGroupsRepository extends  Repository
{
    public function createUserGroup($userGroup){
      $usergroup=new users_groups();
      $usergroup->group_name=$userGroup['group_name'];
      if($usergroup->save())
          return true;
      return false;
    }

    public  function  getAllUsersGroups(){
       return users_groups::orderBy('group_id','DECS')->get();

    }
 public  function updateUserGroup($data){
        $userGroup=users_groups::find($data['group_id']);
        $userGroup->group_name=$data['group_name'];
        if($userGroup->save())
            return true;
        return false;


 }
 public  function  deleteUserGroup($id){
        $userGroup=users_groups::find($id);
        if(!$userGroup)
            return false;
        $userGroup->delete();
        return true;
 }
 public  function getUserGroupById($id){
        return users_groups::find($id);

}
}