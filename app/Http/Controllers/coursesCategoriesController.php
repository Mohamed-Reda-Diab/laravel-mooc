<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 12/09/2018
 * Time: 06:38 م
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use OpenMooc\Courses\Models\Courses_categories;
use OpenMooc\Courses\Services\coursesCategoriesService;
use OpenMooc\Users\Models\User;

class coursesCategoriesController extends Controller
{
    private $coursesCategoriesService;

   public  function __construct()
   {
       $this->coursesCategoriesService=new coursesCategoriesService();
   }

   public  function addCourseCategory(){
      $users=User::all();
      return view('addCourseCategory')->with('users',$users);
   }
   public function processAddCourseCategory(Request $request ){
      if($this->coursesCategoriesService->AddCourseCategory($request))
       return'Done';

      return $this->coursesCategoriesService->errors();
   }
   public function updateCourseCategory($id){
      $courseCategory=Courses_categories::find($id);
       if(count($courseCategory)>0){
      $users=DB::table('users')->get();
      return view('updateCourseCategory')->with('category',$courseCategory)
          ->with('users',$users);
       }
   }
   public function processUpdateCourseCategory(Request $request){
      if($this->coursesCategoriesService->updateCourseCategory($request))
         return 'Updated';
      return $this->coursesCategoriesService->errors();
   }
   public function getCoursesCategories(){
       $categories=$this->coursesCategoriesService->getCoursesCategories();
       if(count($categories)>0)
           return view('getCoursesCategories')
               ->with('categories',$categories);
       return $this->coursesCategoriesService->errors();
   }
   public function getCourseCategoryById($id=0){
       $category=$this->coursesCategoriesService->getCourseCategoryById($id);
       if(count($category)>0)
           return view('getCourseCategoryById')
               ->with('category',$category);
       return $this->coursesCategoriesService->errors();
   }
   public function getCourseCategoryByStatus($active=0){
       $categories=$this->coursesCategoriesService->getCourseCategoryByStatus($active);
       if(count($categories)>0)
           return view('getCourseCategoryByStatus')
               ->with('categories',$categories);
       return $this->coursesCategoriesService->errors();

   }
   public function getCoursesCategoriesByCreatorId($cId=0){
       $categories=$this->coursesCategoriesService->getCoursesCategoriesByCreatorId($cId);
       if(count($categories)>0)
           return view('getCoursesCategoriesByCreatorId')
               ->with('categories',$categories);
       return $this->coursesCategoriesService->errors();
   }
 public function deleteCourseCategoryById($id=0){
      if ($this->coursesCategoriesService->deleteCourseCategoryById($id))
          return 'Deleted';
      return $this->coursesCategoriesService->errors();


 }
 public  function searchCourseCategory($keyword){
       $category=$this->coursesCategoriesService->searchCourseCategory($keyword);
       if(count($category)>0)
           return view('searchCourseCategory')
               ->with('category',$category);
       return $this->coursesCategoriesService->errors();
 }


}