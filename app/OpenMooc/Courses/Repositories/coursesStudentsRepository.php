<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 20/09/2018
 * Time: 03:23 ص
 */

namespace App\OpenMooc\Courses\Repositories;


use Illuminate\Support\Facades\DB;
use OpenMooc\Courses\Models\Courses_students;
use OpenMooc\Repository;

class coursesStudentsRepository extends Repository
{
 public function getCourseStudent($id){
     $courseStudent=Courses_students::find($id);
     if(!$courseStudent)
         return false;
     return $courseStudent;
 }
 public function addCourseStudent($subscribeData){
   $student=new Courses_students();
     $student->student_id      = $subscribeData['student_id'];
     $student->course_id       = $subscribeData['course_id'];
     $student->is_approved     = $subscribeData['is_approved'];
     if($student->save())
         return true;
     return false;
 }
 public function getCoursesStudents(){
     $subscribe = DB::table('courses_students')
         ->leftJoin('courses', 'courses_students.course_id', '=', 'courses.course_id')
         ->leftJoin('users', 'courses_students.student_id', '=', 'users.id')
         ->select('courses_students.*','courses.course_name','users.name')
         ->get();
     if(count($subscribe)>0)
         return $subscribe;
     return false;
 }
 public function unApprove($id){
     $unApprove=Courses_students::find($id);
     $unApprove->is_approved='0';
     if($unApprove->save())
         return true;
     return false;
 }
    public function approve($id){
        $approve=Courses_students::find($id);
        $approve->is_approved='1';
        if($approve->save())
            return true;
        return false;
    }
    public function getCoursesByStudent($id){
        $c = DB::table('courses_students')
            ->leftJoin('courses', 'courses_students.course_id', '=', 'courses.course_id')
            ->leftJoin('users', 'courses_students.student_id', '=', 'users.id')
            ->select('courses_students.*','courses.course_name','users.name')
            ->where('courses_students.student_id','=',$id)
            ->get();
        if(count($c)>0)
            return $c;
        return false;

    }
    public function getStudentsByCourse($id){
        $st = DB::table('courses_students')
            ->leftJoin('courses', 'courses_students.course_id', '=', 'courses.course_id')
            ->leftJoin('users', 'courses_students.student_id', '=', 'users.id')
            ->select('courses_students.*','courses.course_name','users.name')
            ->where('courses_students.course_id','=',$id)
            ->get();
        if(count($st)>0)
            return $st;
        return false;

    }
    public function getUnApproveStudent()
    {
        $subscribe = DB::table('courses_students')
            ->leftJoin('courses', 'courses_students.course_id', '=', 'courses.course_id')
            ->leftJoin('users', 'courses_students.student_id', '=', 'users.id')
            ->where('courses_students.is_approved','=','0')
            ->select('courses_students.*','courses.course_name','users.name')
            ->get();
        if(count($subscribe)>0)
            return $subscribe;
    }
    public function deleteSubscribe($id){
     $del=Courses_students::find($id);
     if($del->delete())
         return true;
     return false;
    }


}