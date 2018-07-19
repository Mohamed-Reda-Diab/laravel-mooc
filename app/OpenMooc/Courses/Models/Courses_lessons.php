<?php
/**
 * Created by PhpStorm.
 * User: mohamed
 * Date: 4/29/2018
 * Time: 2:21 AM
 */

namespace OpenMooc\Courses\Models;


use Illuminate\Database\Eloquent\Model;

class Courses_lessons extends Model
{
    protected $table='courses_lessons';
    protected  $primaryKey='lesson_id';
}