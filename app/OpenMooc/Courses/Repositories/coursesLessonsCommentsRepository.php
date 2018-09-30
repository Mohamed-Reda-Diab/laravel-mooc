<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 21/09/2018
 * Time: 06:37 ص
 */

namespace OpenMooc\Courses\Repositories;


use Illuminate\Support\Facades\DB;
use OpenMooc\Courses\Models\Courses_lessons_comments;
use OpenMooc\Repository;

class coursesLessonsCommentsRepository extends Repository
{
 public function addComment($data){
    $comment=new Courses_lessons_comments();
     $comment->comment    = $data['comment'];
     $comment->created_by = $data['created_by'];
     $comment->lesson_id  = $data['lesson_id'];
     if($comment->save())
         return true;
     return false;
 }
 public function getComment($id){
     $comment=Courses_lessons_comments::find($id);
     if(!$comment)
         return false;
     return $comment;
 }
 public function getCommentsByLesson($id){
     $comments = DB::table('courses_lessons_comments')
         ->leftJoin('users', 'courses_lessons_comments.created_by', '=', 'users.id')
         ->leftJoin('courses_lessons', 'courses_lessons.lesson_id', '=', 'courses_lessons_comments.lesson_id')
         ->select('courses_lessons_comments.*','users.name','courses_lessons.lesson_title')
         ->where('courses_lessons_comments.lesson_id','=',$id)
         ->get();
     if(count($comments)>0)
         return $comments;
 }
    public function getComments(){
        $comments = DB::table('courses_lessons_comments')
            ->leftJoin('users', 'courses_lessons_comments.created_by', '=', 'users.id')
            ->leftJoin('courses_lessons', 'courses_lessons.lesson_id', '=', 'courses_lessons_comments.lesson_id')
            ->select('courses_lessons_comments.*','users.name','courses_lessons.lesson_title')

            ->get();
        if(count($comments)>0)
            return $comments;
    }
    public function getCommentsByCreator($id){
        $comments = DB::table('courses_lessons_comments')
            ->leftJoin('users', 'courses_lessons_comments.created_by', '=', 'users.id')
            ->leftJoin('courses_lessons', 'courses_lessons.lesson_id', '=', 'courses_lessons_comments.lesson_id')
            ->select('courses_lessons_comments.*','users.name','courses_lessons.lesson_title')
            ->where('courses_lessons_comments.created_by','=',$id)
            ->get();
        if(count($comments)>0)
            return $comments;
    }
    public function deleteComment($id){
     $comment=Courses_lessons_comments::find($id);
     if(!$comment)
         return false;
     $comment->delete();
     return true;
    }


}