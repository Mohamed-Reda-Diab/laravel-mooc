<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 20/09/2018
 * Time: 03:22 ص
 */

namespace OpenMooc\Courses\Services;

use Validator;
use App\OpenMooc\Courses\Repositories\coursesStudentsRepository;
use OpenMooc\Service;


class coursesStudentsService extends Service
{
    private $coursesStudentsRepository;
    public function __construct()
    {
        $this->coursesStudentsRepository=new coursesStudentsRepository();
    }
    public function getCourseStudent($id){
       $cStudent= $this->coursesStudentsRepository->getCourseStudent($id);
        if(count($cStudent)>0)
            return $cStudent;
        $this->setErrors('nit found');
        return false;
    }
    public function addCourseStudent($request){
        $rules = [
            'student_id'  => 'required|integer',
            'course_id'   => 'required|integer',
            'is_approved' => 'required|boolean'
        ];

        $validator = Validator::make($request->all(),$rules);

        if($validator->fails())
        {
            $this->setError($validator->errors()->all());
            return false;
        }
      if($this->coursesStudentsRepository->addCourseStudent($request->all()))
          return true;
      return $this->setErrors('error');
    }
    public function getCoursesStudents(){
        $cStudents= $this->coursesStudentsRepository->getCoursesStudents();
        if(count($cStudents)>0)
            return $cStudents;
        $this->setErrors('nit found');
        return false;
    }
    public function approve($id){
        if($this->coursesStudentsRepository->approve($id))
            return true;
        $this->setErrors('error not found');
        return false;
    }
    public function unApprove($id){
        if($this->coursesStudentsRepository->unApprove($id))
            return true;
        $this->setErrors('error not found');
        return false;
    }
    public function getCoursesByStudent($id){
        $courses= $this->coursesStudentsRepository->getCoursesByStudent($id);
        return $courses;
    }
    public function getStudentsByCourse($id){
        $students= $this->coursesStudentsRepository->getStudentsByCourse($id);
        return $students;
    }
    public function getUnApprovedS(){
        $subscribe=$this->coursesStudentsRepository->getUnApproveStudent();
        if(count($subscribe)>0)
            return $subscribe;
        $this->setErrors('not found');
        return false;
    }
    public function deleteSubscribe($id){
        if($this->coursesStudentsRepository->deleteSubscribe($id))
            return true;
        $this->setErrors('error:- not found');
        return false;
    }

}