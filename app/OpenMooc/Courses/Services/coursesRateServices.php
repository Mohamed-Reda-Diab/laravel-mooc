<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 25/09/2018
 * Time: 02:59 ص
 */

namespace OpenMooc\Courses\Services;

use Validator;
use OpenMooc\Courses\Repositories\coursesRateRepository;
use OpenMooc\Service;

class coursesRateServices extends Service
{
 private $coursesRateRepository;
 public function __construct()
 {
     $this->coursesRateRepository=new coursesRateRepository();
 }
 public function addRate($request){
     $rules = [
         'student_id'     => 'required|integer',
         'course_id'  => 'required|integer',
         'rate'   => 'required|integer',
         'rate_comment'   => 'required'
     ];

     $validator = Validator::make($request->all(),$rules);

     if($validator->fails())
     {
         $this->setErrors($validator->errors()->all());
         return false;
     }
     if($this->coursesRateRepository->addRate($request->all()))
         return true;
     $this->setErrors('error');
     return false;

 }
 public function getRate($id){
     $rate=$this->coursesRateRepository->getRate($id);
     if(count($rate)>0)
         return $rate;
     return false;
 }
 public function updateRate($request){
     $rules = [
         'rate_id'       =>'required|integer',
         'student_id'    => 'required|integer',
         'course_id'     => 'required|integer',
         'rate'          => 'required',
         'rate_comment'  => 'required|max:500'
     ];

     $validator = Validator::make($request->all(),$rules);

     if($validator->fails())
     {
         $this->setErrors($validator->errors()->all());
         return false;
     }
     if($this->coursesRateRepository->updateRate($request->all()))
         return true;
     $this->setErrors('error');
     return false;

 }
 public function getRates(){
     $rates=$this->coursesRateRepository->getRates();
     if(!$rates){
         $this->setErrors('error');
         return false;
     }
     return $rates;
 }
 public function getRatesByCourse($id){
     $rates=$this->coursesRateRepository->getRatesByCourseId($id);
     if(!$rates){
         $this->setErrors('error');
         return false;
     }
     return $rates;
 }
 public  function getAVGRateByCourseId($id){
     $AVG=$this->coursesRateRepository->getAVGRateByCourseId($id);
     if(!$AVG){
         $this->setErrors('error');
         return false;
     }
     return $AVG;
 }

}