<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 21/09/2018
 * Time: 06:29 ص
 */

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use OpenMooc\Courses\Services\coursesLessonsCommentsService;
use OpenMooc\Courses\Services\coursesLessonsService;
use OpenMooc\Users\Services\usersService;

class coursesLessonsCommentsController extends Controller
{
  private $coursesLessonsComments;
  public function __construct()
  {
      $this->coursesLessonsComments=new coursesLessonsCommentsService();
  }
    public function addComment()
    {
        $users = new usersService();
        $us=$users->getAllUsers();
        $lessons=new coursesLessonsService();
        $less=$lessons->getLessons();

        return view('addComment')
            ->with('users', $us)
            ->with('lessons', $less);
    }
    public function processAddComment(Request $request){
      if($this->coursesLessonsComments->addComment($request))
          return'added';
      return $this->coursesLessonsComments->errors();
    }
    public function getComment($id){
      $comment=$this->coursesLessonsComments->getComment($id);
      if(count($comment)>0)
          return $comment;
      return 'not found';

    }
    public function getCommentsByLesson($id){
        $comments=$this->coursesLessonsComments->getCommentsByLesson($id);
        if(count($comments)>0)
            return $comments;
        return 'not found';
    }
    public function getComments(){
        $comments=$this->coursesLessonsComments->getComments();
        if(count($comments)>0)
            return $comments;
        return 'not found';
    }
    public function getCommentsByCreator($id){
        $comments=$this->coursesLessonsComments->getCommentsByCreator($id);
        if(count($comments)>0)
            return $comments;
        return 'not found';
    }
  public function deleteComment($id){
      if($this->coursesLessonsComments->deleteComment($id))
          return 'deleted';
      return $this->coursesLessonsComments->errors();
  }

}