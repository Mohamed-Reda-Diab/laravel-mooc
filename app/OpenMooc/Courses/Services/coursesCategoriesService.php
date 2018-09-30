<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 12/09/2018
 * Time: 06:37 م
 */

namespace OpenMooc\Courses\Services;


use Validator;
use OpenMooc\Courses\Repositories\coursesCategoriesRepository;
use OpenMooc\Service;

class coursesCategoriesService extends  Service
{
    private  $courseCategoryRepository;
    public  function  __construct()
    {
        $this->courseCategoryRepository=new coursesCategoriesRepository();
    }
  public function AddCourseCategory($request){
      $rules = [
          'category_name' => 'required|unique:courses_categories|max:20',
          'created_by'    => 'required|integer',
          'active'     => 'required|boolean'
      ];

      $validator = Validator::make($request->all(),$rules);

      if($validator->fails())
      {
          $this->setErrors($validator->errors()->all());
          return false;
      }
        if($this->courseCategoryRepository->AddCourseCategory($request->all())){
            return true;
        }
        else{
        $this->setErrors('Error');
        return false;}
  }
  public  function updateCourseCategory($request){
      $rules = [
          'category_name' => 'required|max:20',
          'created_by'    => 'required',
          'active'     => 'required|boolean'
      ];
      $validator=Validator::make($request->all(),$rules);
      if($validator->fails()){
          $this->setErrors($validator->errors()->all());
          return false;
      }
      if($this->courseCategoryRepository->updateCourseCategory($request->all()))
          return true;
      $this->setErrors('Error:- not found');
      return false;
  }
  public  function  getCoursesCategories(){

        if(count($this->courseCategoryRepository->getCoursesCategories())>0)
            return $this->courseCategoryRepository->getCoursesCategories();
        $this->setErrors('Error:- not found');
        return false;
  }
  public  function getCourseCategoryById($id){
      if(count($this->courseCategoryRepository->getCourseCategoryById($id))>0)
          return $this->courseCategoryRepository->getCourseCategoryById($id);
      $this->setErrors('Error:- not found');
      return false;
  }
  public function getCourseCategoryByStatus($status){
      if(count($this->courseCategoryRepository->getCourseCategoryByStatus($status))>0)
          return $this->courseCategoryRepository->getCourseCategoryByStatus($status);
      $this->setErrors('Error:- not found');
      return false;
  }
  public function getCoursesCategoriesByCreatorId($cId){
        $categories=$this->courseCategoryRepository->getCoursesCategoriesByCreatorId($cId);
      if(count($categories)>0)
          return $categories;
      $this->setErrors('Error:- not found');
      return false;
  }
  public function deleteCourseCategoryById($id){
        if($this->courseCategoryRepository->deleteCourseCategoryById($id))
            return true;
        $this->setErrors('Error');
        return false;
  }
  public function searchCourseCategory($keyword){
        $category=$this->courseCategoryRepository->searchCourseCategory($keyword);
        if(count($category)>0)
            return $category;
        $this->setErrors('Error:- not found');
        return false;
  }

}