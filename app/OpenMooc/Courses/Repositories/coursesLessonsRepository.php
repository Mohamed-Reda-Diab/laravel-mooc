<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 16/09/2018
 * Time: 10:46 م
 */

namespace OpenMooc\Courses\Repositories;


use Illuminate\Support\Facades\DB;
use OpenMooc\Courses\Models\Courses_lessons;
use OpenMooc\Repository;

class coursesLessonsRepository extends Repository
{
public function getLesson($id){
    return Courses_lessons::find($id);
}
public  function addLesson($lessonData){
    $lesson=new Courses_lessons();
    $lesson->lesson_title       = $lessonData['lesson_title'];
    $lesson->lesson_course      = $lessonData['lesson_course'];
    $lesson->lesson_instructor  = $lessonData['lesson_instructor'];
    $lesson->lesson_description = $lessonData['lesson_description'];
    $lesson->lesson_video       = $lessonData['lesson_video'];
    if($lesson->save())
        return true;
    return false;

}
public function updateLesson($lessonData){
    $lesson=Courses_lessons::find($lessonData['lesson_id']);
    $lesson->lesson_title       = $lessonData['lesson_title'];
    $lesson->lesson_course      = $lessonData['lesson_course'];
    $lesson->lesson_instructor  = $lessonData['lesson_instructor'];
    $lesson->lesson_description = $lessonData['lesson_description'];
    $lesson->lesson_video       = $lessonData['lesson_video'];
    if($lesson->save())
        return true;
    return false;

}
public function getLessons(){
    $lessons=DB::table('courses_lessons')
        ->leftjoin('courses','courses.course_id','=','courses_lessons.lesson_course')
        ->leftjoin('users','users.id','=','courses_lessons.lesson_instructor')
        ->select('courses_lessons.*','courses.course_name','users.username')
        ->orderby('courses_lessons.lesson_id','DESC')
        ->get();
    if($lessons)
        return $lessons;
    return false;
}
public function getLessonsByCourse($id){
    $lessons=DB::table('courses_lessons')
        ->leftjoin('courses','courses.course_id','=','courses_lessons.lesson_course')
        ->leftjoin('users','users.id','=','courses_lessons.lesson_instructor')
        ->select('courses_lessons.*','courses.course_name','users.username')
        ->where('courses_lessons.lesson_course','=',$id)
        ->orderby('courses_lessons.lesson_id','DESC')
        ->get();
    if($lessons)
        return $lessons;
    return false;
}
public function getLessonsByInstructor($id){
    $lessons=DB::table('courses_lessons')
        ->leftjoin('courses','courses.course_id','=','courses_lessons.lesson_course')
        ->leftjoin('users','users.id','=','courses_lessons.lesson_instructor')
        ->select('courses_lessons.*','courses.course_name','users.username')
        ->where('courses_lessons.lesson_instructor','=',$id)
        ->orderby('courses_lessons.lesson_id','DESC')
        ->get();
    if($lessons)
        return $lessons;
    return false;
}
public function searchLessons($key){
    $lessons=DB::table('courses_lessons')
        ->leftjoin('courses','courses.course_id','=','courses_lessons.lesson_course')
        ->leftjoin('users','users.id','=','courses_lessons.lesson_instructor')
        ->select('courses_lessons.*','courses.course_name','users.username')
        ->where('courses_lessons.lesson_title','like','%'.$key.'%')

        ->get();
    if($lessons)
        return $lessons;
    return false;
}
public function deleteLesson($id){
    $lesson=Courses_lessons::find($id);
    if(!$lesson)
        return false;
    $lesson->delete();
    return true;
}
}