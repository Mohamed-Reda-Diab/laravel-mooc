<?php
/**
 * Created by PhpStorm.
 * User: mohamed
 * Date: 4/29/2018
 * Time: 2:18 AM
 */

namespace OpenMooc\Courses\Models;


use Illuminate\Database\Eloquent\Model;

class Courses_categories extends Model
{
 protected $table='courses_categories';
 protected  $primaryKey='category_id';
}