<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 25/09/2018
 * Time: 03:22 ص
 */

namespace OpenMooc\Courses\Repositories;

use Illuminate\Support\Facades\DB;
use OpenMooc\Courses\Models\Courses_rate;
use OpenMooc\Repository;

class coursesRateRepository extends Repository
{
     //add rate
    public function addRate($rateData)
    {
        $rates = new Courses_rate();
        $rates->student_id   = $rateData['student_id'];
        $rates->course_id    = $rateData['course_id'];
        $rates->rate         = $rateData['rate'];
        $rates->rate_comment = $rateData['rate_comment'];
        if($rates->save()){
            return true;
        }else{
            return false;
        }
    }

    //get rate by id
    public function getRate($id)
    {
        return Courses_rate::find($id);
    }

    // get course rates
    public function getRates()
    {
        $rate = DB::table('courses_rate')
            ->leftJoin('courses', 'courses_rate.course_id', '=', 'courses.course_id')
            ->leftJoin('users', 'courses_rate.student_id', '=', 'users.id')
            ->select('courses_rate.*','courses.course_name','users.name')
            ->get();
        if(count($rate)>0)
            return $rate;
    }

    // get course rates by course id
    public function getRatesByCourseId($id)
    {
        $rates = DB::table('courses_rate')


            ->leftJoin('courses', 'courses_rate.course_id', '=', 'courses.course_id')
            ->leftJoin('users', 'courses_rate.student_id', '=', 'users.id')
            ->select('courses_rate.*','courses.course_name','users.name')
            ->where('courses_rate.course_id','=',$id)
            ->get();
        if(count($rates)>0)
            return $rates;
    }

    //update rate ( comment )
    public function updateRate($Data)
    {
        $rate = Courses_rate::find($Data['rate_id']);

        $rate->rate = $Data['rate'];
        $rate->rate_comment = $Data['rate_comment'];

        if($rate->save()){
            return true;
        }else{
            return false;
        }
    }

    //delete rate
    public function deleteRate($id)
    {
        $rate = CoursesRate::find($id);
        if(!$rate){
            return 'rate not found';
        }else{
            $rate->delete();
            return true;
        }
    }

    // get Average rate
    public function getAVGRateByCourseId($CourseId)
    {
        $avg = DB::table('courses_rate')
            ->where('course_id', $CourseId)
            ->avg('courses_rate.rate');
        return $avg;
    }
}