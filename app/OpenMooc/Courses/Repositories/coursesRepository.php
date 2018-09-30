<?php
/**
 * Created by PhpStorm.
 * User: mohamed
 * Date: 4/29/2018
 * Time: 2:21 PM
 */

namespace OpenMooc\Courses\Repositories;
use Illuminate\Support\Facades\DB;
use OpenMooc\Courses\Models\Courses;
use OpenMooc\Repository;



class coursesRepository extends Repository
{

    public function createCourse($courseData){

        $course=new Courses();
        $course->course_name        =$courseData['title'];
        $course->course_category    =$courseData['category'];
        $course->course_instructor  =$courseData['instructor'];
        $course->course_description =$courseData['description'];
        $course->is_active          =$courseData['active'];

        if($course->save())
            return true;
        return false;



    }
    public  function getCourses(){
         $courses=DB::table('courses')
             ->leftjoin('courses_categories','courses_categories.category_id','=','courses.course_category')
             ->leftjoin('users','users.id','=','courses.course_instructor')
             ->select('courses.*','courses_categories.category_name','users.username')
             ->orderBy('course_id','DESC')
             ->get();
         return $courses;

    }

 public function getCourse($id){
        return Courses::find($id);
 }
 public  function getCoursesByCategory($id){
     $courses=DB::table('courses')
         ->leftjoin('courses_categories','courses_categories.category_id','=','courses.course_category')
         ->leftjoin('users','users.id','=','courses.course_instructor')
         ->select('courses.*','courses_categories.category_name','users.username')
         ->where('courses.course_category','=',$id)
         ->orderBy('course_id','DESC')
         ->get();
     return $courses;
}
    public  function getCoursesByInstructor($id){
        $courses=DB::table('courses')
            ->leftjoin('courses_categories','courses_categories.category_id','=','courses.course_category')
            ->leftjoin('users','users.id','=','courses.course_instructor')
            ->select('courses.*','courses_categories.category_name','users.username')
            ->where('courses.course_instructor','=',$id)
            ->orderBy('course_id','DESC')
            ->get();
        return $courses;
    }
    public function getCoursesByStatus($status){
        $courses=DB::table('courses')
            ->leftjoin('courses_categories','courses_categories.category_id','=','courses.course_category')
            ->leftjoin('users','users.id','=','courses.course_instructor')
            ->select('courses.*','courses_categories.category_name','users.username')
            ->where('courses.is_active','=',$status)
            ->orderBy('course_id','DESC')
            ->get();
        return $courses;
    }
public function getCoursesByStudentId($id){
   $courses=DB::table('courses_students')
       ->leftjoin('users','users.id','=','courses_students.student_id')
       ->leftjoin('courses','courses.course_id','=','courses_students.course_id')
       ->select('courses.*','users.username')
       ->where('courses_students.student_id','=',$id)
       ->get();
   return $courses;
}
public function searchCourses($key){
    $courses=DB::table('courses')
        ->leftjoin('courses_categories','courses_categories.category_id','=','courses.course_category')
        ->leftjoin('users','users.id','=','courses.course_instructor')
        ->select('courses.*','courses_categories.category_name','users.username')
        ->where('courses.course_name','like','%'.$key.'%')

        ->get();
    return $courses;
}
public function updateCourse($data){
        $course=Courses::find($data['course_id']);
        $course->course_name  =      $data['course_name'];
        $course->course_category =   $data['course_category'];
        $course->course_instructor=  $data['course_instructor'];
        $course->course_description= $data['course_description'];
        $course->course_cover =      $data['course_cover'];
        $course->is_active=          $data['active'];
        if($course->save())
            return true;
        return false;

}
public function deleteCourse($id){
        $course=Courses::find($id);
        if(!$course)
            return false;
        $course->delete();
        return true;


}
}