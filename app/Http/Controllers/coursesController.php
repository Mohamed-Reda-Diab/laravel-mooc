<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 05/08/2018
 * Time: 01:12 ص
 */

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use OpenMooc\Courses\Models\Courses;
use OpenMooc\Courses\Services\coursesCategoriesService;
use OpenMooc\Courses\Services\coursesService;


use OpenMooc\Courses\Models\Courses_categories;
use OpenMooc\Users\Models\User;
use OpenMooc\Users\Services\usersService;


class coursesController extends Controller
{
    private  $coursesServer;
    public  function __construct()
    {
        $this->coursesServer=new coursesService();
    }

    public function addCourse(){
         $categories= Courses_categories::all();
      return view('course')
          ->with('categories',$categories);

     }
     public function  processAddCourse(Request $request){

     $coursesService=new coursesService();
     if($coursesService->createCourse($request))
         return 'Done';
      return   $coursesService->errors();
     }
     public  function getCourses(){

         $courses= $this->coursesServer->getCourses();

         return view('courses')
             ->with('coursesList',$courses);
     }
     public function getCourse($id){
        $course=$this->coursesServer->getCourse($id);
        if(count($course)>0)
            return view('getCourse')
                ->with('course',$course);
        return 'Error';
     }
     public  function getCoursesByCategory($id){
        $courses=$this->coursesServer->getCoursesByCategory($id);
        if(count($courses)>0)
            return view('getCoursesByCategory')
                ->with('courses',$courses);

     }
    public function getCoursesByInstructor($id){
        $courses=$this->coursesServer->getCoursesByInstructor($id);
        if(count($courses)>0)
            return view('getCoursesByInstructor')
                ->with('courses',$courses);
    }
    public function getCoursesByStatus($active){
        $courses=$this->coursesServer->getCoursesByStatus($active);
        if(count($courses)>0)
            return view('getCoursesByStatus')
                ->with('courses',$courses);
    }
    public function getCoursesByStudentId($id){
        $courses=$this->coursesServer->getCoursesByStudentId($id);
        if(count($courses)>0)
            return view('getCoursesByStatus')
                ->with('courses',$courses);
    }
    public function searchCourses($keyword){
        $courses=$this->coursesServer->searchCourses($keyword);
        if(count($courses)>0)
            return view('searchCourses')
                ->with('courses',$courses);
        return 'not found';

    }
    public function updateCourse($id){
             //get course data
        $course=$this->coursesServer->getCourse($id);
             //get users data
        $users=new usersService();
             //get categories data
        $coursesCategories=new coursesCategoriesService();
        if($course){
           $us= $users->getAllUsers();
           $catg=$coursesCategories->getCoursesCategories();
           return view('updateCourse')
               ->with('course',$course)
               ->with('users',$us)->with('categories',$catg);
        }
        return 'not found';

    }
 public function processUpdateCourse(Request $request){
   if($this->coursesServer->updateCourse($request))
       return 'updated';
   return $this->coursesServer->errors();
 }
 public function deleteCourse($id){
       $course= $this->coursesServer->getCourse($id);
       if($course)
           if($this->coursesServer->deleteCourse($id))
               return 'deleted';

           return $this->coursesServer->errors();

 }

}