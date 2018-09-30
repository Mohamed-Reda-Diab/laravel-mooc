<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 20/09/2018
 * Time: 03:21 ص
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use OpenMooc\Courses\Services\coursesService;
use OpenMooc\Courses\Services\coursesStudentsService;
use OpenMooc\Users\Services\usersService;

class coursesStudentsController extends Controller
{
    private $coursesStudentsService;
    public function __construct()
    {
        $this->coursesStudentsService=new coursesStudentsService();
    }
    public function getCourseStudent($id){
        $cStudent=$this->coursesStudentsService->getCourseStudent($id);
        if(count($cStudent)>0)
            return $cStudent;
        return $this->coursesStudentsService->errors();

    }
    public function addCourseStudent(){
        $courses=new coursesService();
        $users=new usersService();
        $cour=$courses->getCourses();
        $urs=$users->getAllUsers();
        return view('addCourseStudent')

            ->with('courses',$cour)
            ->with('users',$urs);
    }
  public function processAddCourseStudent(Request $request){
        if($this->coursesStudentsService->addCourseStudent($request))
            return 'added';
        return $this->coursesStudentsService->errors();

  }
  public function getCoursesStudents(){
      $cStudents=$this->coursesStudentsService->getCoursesStudents();
      if(count($cStudents)>0)
          return view('getCoursesStudents')
              ->with('subscriptions',$cStudents);
      return $this->coursesStudentsService->errors();
  }
    public function approveSubscription($id)
    {

        return $this->coursesStudentsService->approve($id)
                                          ? 'subscription approved'
                                         : $this->coursesStudentsService->errors();
    }
    public function unApproveSubscription($id)
    {

        return $this->coursesStudentsService->unApprove($id) == true
            ? 'subscription un approved'
            : $this->coursesStudentsService->errors();
    }
    public function getCoursesByStudent($id_student){
        $courses=$this->coursesStudentsService->getCoursesByStudent($id_student);
        if(count($courses)>0)
            return $courses;
        return $this->coursesStudentsService->errors();
    }
    public function getStudentsByCourse($id_course){
        $Students=$this->coursesStudentsService->getStudentsByCourse($id_course);
        if(count($Students)>0)
            return $Students;
        return $this->coursesStudentsService->errors();
    }
    public function getUnApproveStudent(){
        $subscribe=$this->coursesStudentsService->getUnApprovedS();
        if(count($subscribe)>0)
            return $subscribe;
        return $this->coursesStudentsService->errors();
    }

    public function deleteSubscribe($id){
     $subscribe=$this->coursesStudentsService->getCourseStudent($id);
     if(!$subscribe)
         return 'not found';
     if($this->coursesStudentsService->deleteSubscribe($id))
         return 'deleted';

    }
}