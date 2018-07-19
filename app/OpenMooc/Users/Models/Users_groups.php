<?php
/**
 * Created by PhpStorm.
 * User: mohamed
 * Date: 4/29/2018
 * Time: 3:00 AM
 */

namespace OpenMooc\Users\Models;


use Illuminate\Database\Eloquent\Model;

class users_groups extends Model
{
    protected $table='users_groups';
    protected  $primaryKey='group_id';
}