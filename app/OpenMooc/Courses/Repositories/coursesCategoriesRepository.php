<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 12/09/2018
 * Time: 06:36 م
 */

namespace OpenMooc\Courses\Repositories;

use Illuminate\Support\Facades\DB;
use OpenMooc\Courses\Models\Courses_categories;

use OpenMooc\Repository;

class coursesCategoriesRepository extends  Repository
{
public  function AddCourseCategory($data){
    $category=new Courses_categories();
    $category->category_name=  $data['category_name'];
    $category->created_by=     $data['created_by'];
    $category->is_active=      $data['active'];

    if($category->save())
        return true;
    return false;
}
public function updateCourseCategory($data){
    $category=Courses_categories::find($data['id']);
    $category->category_name= $data['category_name'];
    $category->created_by=    $data['created_by'];
    $category->is_active=     $data['active'];
    if($category->save())
        return true;
    return false;

}
public function getCoursesCategories(){
    return Courses_categories::orderBy('category_id','DESC')->get();

}
public function  getCourseCategoryById($id){
    $category=DB::table('Courses_categories')
        ->leftjoin('users','Courses_categories.created_by','=','users.id')
        ->select('Courses_categories.*','users.username')
        ->where('Courses_categories.category_id','=',$id)
        ->get();

        return $category;

}
public function getCourseCategoryByStatus($status){
    $categories=DB::table('Courses_categories')
        ->leftjoin('users','Courses_categories.created_by','=','users.id')
        ->select('Courses_categories.*','users.username')
        ->where('Courses_categories.is_active','=',$status)
        ->get();

    return $categories;
}
public  function  getCoursesCategoriesByCreatorId($cId){
    $categories=DB::table('Courses_categories')
        ->leftjoin('users','Courses_categories.created_by','=','users.id')
        ->select('Courses_categories.*','users.username')
        ->where('Courses_categories.created_by','=',$cId)
        ->get();

    return $categories;
}
public  function deleteCourseCategoryById($id){
    $category=Courses_categories::find($id);
    if(!$category)
    return false;
    $category->delete();
    return true;
}
public  function searchCourseCategory($keyword){
    $category=DB::table('Courses_categories')
        ->leftjoin('users','Courses_categories.created_by','=','users.id')
        ->select('Courses_categories.*','users.username')
        ->where('Courses_categories.category_name','like','%'.$keyword.'%')
        ->get();
    return $category;
}
}