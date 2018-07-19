<?php
/**
 * Created by PhpStorm.
 * User: mohamed
 * Date: 4/29/2018
 * Time: 1:48 AM
 */

namespace OpenMooc\Courses\Models;

use Illuminate\Database\Eloquent\Model;

class Courses_lessons_comments extends Model
{
protected  $table ='courses_lessons_comments';
protected  $primaryKey ='comment_id';
}