<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 16/09/2018
 * Time: 10:44 م
 */

namespace App\Http\Controllers;



use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use OpenMooc\Courses\Services\coursesLessonsService;
use OpenMooc\Courses\Services\coursesService;
use OpenMooc\Users\Services\usersService;


class coursesLessonsController extends Controller
{
 private  $coursesLessonsService;
 public function __construct()
 {
     $this->coursesLessonsService=new coursesLessonsService();
 }
 public function getCourseLesson($id){
     $lesson=$this->coursesLessonsService->getCourseLesson($id);
     if(count($lesson)>0)
         return view('getCourseLesson')
         ->with('lesson',$lesson);
     return 'not found';

 }
 public function  addLesson(){
     $courses=DB::table('courses')->get();
     $users=DB::table('users')->get();
     return view('addLesson')
         ->with('courses',$courses)
         ->with('users',$users);

 }
 public function processAddLesson(Request $request){
  if($this->coursesLessonsService->addLesson($request))
      return 'added';
  return $this->coursesLessonsService->errors();

 }
 public function updateLesson($id){
     $lesson=$this->coursesLessonsService->getCourseLesson($id);
     $instructors=new usersService();
     $courses=new coursesService();
     if($lesson)
               //get instructor from users table

         $ins=$instructors->getAllUsers();
               //get courses from courses table
         $cour=$courses->getCourses();
         return view('updateLesson')
             ->with('lesson',$lesson)
             ->with('instructors',$ins)
             ->with('courses',$cour);

 }
 public function processUpdateLesson(Request $request){
     if($this->coursesLessonsService->updateLesson($request))
         return 'Updated';
     return $this->coursesLessonsService->errors();

 }
 public function getAllLessons(){
     $lesson=$this->coursesLessonsService->getLessons();
     if(count($lesson)>0)
         return $lesson;
     return $this->coursesLessonsService->errors();
 }
public function getLessonsByCourse($id){
    $lessons=$this->coursesLessonsService->getLessonsByCourse($id);
     if(count($lessons)>0)
         return view('getLessonsByCourse')->with('lessons',$lessons);
     return $this->coursesLessonsService->errors();

}
    public function getLessonsByInstructor($id){
        $lessons=$this->coursesLessonsService->getLessonsByInstructor($id);
        if(count($lessons)>0)
            return view('getLessonsByInstructor')->with('lessons',$lessons);
        return $this->coursesLessonsService->errors();

    }
    public function searchLessons($keyword){
        $lessons=$this->coursesLessonsService->searchLessons($keyword);
        if(count($lessons)>0)
            return view('getLessonsByInstructor')->with('lessons',$lessons);
        return $this->coursesLessonsService->errors();
    }
    public function deleteLesson($id){
     $lesson=$this->coursesLessonsService->getCourseLesson($id);
     if($lesson){
        if( $this->coursesLessonsService->deleteLesson($id))
            return'deleted';

     }
     return $this->coursesLessonsService->errors();
    }

}