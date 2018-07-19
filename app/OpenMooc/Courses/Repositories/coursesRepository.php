<?php
/**
 * Created by PhpStorm.
 * User: mohamed
 * Date: 4/29/2018
 * Time: 2:21 PM
 */

namespace OpenMooc\Courses\Repositories;
use OpenMooc\Courses\Models\Courses;
use OpenMooc\Repository;



class coursesRepository extends Repository
{

    public function createCourse(){

        $course=new Courses();
        $course->save();

    }

}