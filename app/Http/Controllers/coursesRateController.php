<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 25/09/2018
 * Time: 02:52 ص
 */

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use OpenMooc\Courses\Services\coursesRateServices;
use OpenMooc\Courses\Services\coursesService;
use OpenMooc\Users\Services\usersService;

class coursesRateController extends Controller
{
  private $coursesRateServices;
  public function __construct()
  {
      $this->coursesRateServices=new coursesRateServices();
  }
  public function addRate(){

          $users = new usersService();
          $us=$users->getAllUsers();
          $courses=new coursesService();
          $cour=$courses->getCourses();

          return view('addRate')
              ->with('users', $us)
              ->with('courses', $cour);

  }
  public function processAddRate(Request $request){
      if($this->coursesRateServices->addRate($request))
          return 'added';
      return $this->coursesRateServices->errors();

  }
  public function getRate($id){
      $rate=$this->coursesRateServices->getRate($id);
      if(!$rate )
          return 'not found';
      return $rate;
  }
  public function updateRate($id){
      $rate=$this->coursesRateServices->getRate($id);
      $users=new usersService();
      $courses=new coursesService();
      if(!$rate)
          return 'not found';
      $allUsers=$users->getAllUsers();
      $allCourses=$courses->getCourses();
      return view('updateRate')
          ->with('rate',$rate)
          ->with('users',$allUsers)
          ->with('courses',$allCourses);
  }
  public function processUpdate(Request $request){
      if($this->coursesRateServices->updateRate($request))
          return 'updated';
      return $this->coursesRateServices->errors();

  }
  public function getRates(){
      $rates=$this->coursesRateServices->getRates();
      if(count($rates)>0)
          return $rates;
      return $this->coursesRateServices->errors();

  }
  public function getRatesByCourse($id){
      $rates=$this->coursesRateServices->getRatesByCourse($id);
      if(count($rates)>0)
          return $rates;
      return $this->coursesRateServices->errors();

  }
  public function getAVGRateByCourseId($id){
      $average=$this->coursesRateServices->getAVGRateByCourseId($id);
      if(count($average)>0)
          return $average;
      return $this->coursesRateServices->errors();

  }

}