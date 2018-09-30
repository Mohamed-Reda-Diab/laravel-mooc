<?php
/**
 * Created by PhpStorm.
 * User: mohamed
 * Date: 4/29/2018
 * Time: 2:34 PM
 */

namespace OpenMooc\Courses\Services;


use Validator;
use OpenMooc\Courses\Repositories\coursesRepository;
use OpenMooc\Service;

class coursesService extends  Service
{
    private $coursesRepository;

    public  function __construct()
    {
        $this->coursesRepository=new coursesRepository();
    }

    public function createCourse($request){

        $rules=[
            'title'       => 'required|min:3|max:255',
            'description' => 'required',
            'category'    => 'required',
            'active'      => 'required',
            'instructor'  => 'required',
            'active' => 'required'
        ];
        $validator=Validator::make($request->all(),$rules);
        if($validator->fails()){
             $this->setErrors($validator->errors()->all());
             return false;

        }

        if($this->coursesRepository->createCourse($request->all()))
          return true;
         $this->setErrors('Error saving to Database');
         return false;

    }
    public function  getCourses(){
        $coursesRepository=new coursesRepository();
       return $coursesRepository->getCourses();
    }
    public function getCourse($id){
        $course=$this->coursesRepository->getCourse($id);
            return $course;

    }
    public  function getCoursesByCategory($id){
        $courses=$this->coursesRepository->getCoursesByCategory($id);
        return $courses;
    }
    public  function getCoursesByInstructor($id){
        $courses=$this->coursesRepository->getCoursesByInstructor($id);
        return $courses;
    }
    public function getCoursesByStatus($active){
        $courses=$this->coursesRepository->getCoursesByStatus($active);
        return $courses;
    }
    public function getCoursesByStudentId($id){
        $courses=$this->coursesRepository->getCoursesByStudentId($id);
        return $courses;
    }
    public function searchCourses($key){
        $courses=$this->coursesRepository->searchCourses($key);
        if(!$courses){
            $this->setErrors('Not found');
            return false;
        }
        return $courses;
    }
    public function updateCourse($request){
        $rules=[
            'course_name'          => 'required|max:100',
            'course_category'      => 'required|integer',
            'course_instructor'    => 'required|integer',
            'course_description'   => 'required|max:1000',
            'active'               => 'required|boolean',
            'course_cover'         => 'required'
        ];
        $validator=Validator::make($request->all(),$rules);
        if($validator->fails()){
            $this->setErrors($validator->errors()->all());
            return false;
        }
      if(  $this->coursesRepository->updateCourse($request->all()))
          return true;
      $this->setErrors('Error');
      return false;

    }
    public function deleteCourse($id){
        if($this->coursesRepository->deleteCourse($id))
            return true;
        $this->setErrors('this id not found');
        return false;
    }


}