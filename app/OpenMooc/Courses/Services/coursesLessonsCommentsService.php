<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 21/09/2018
 * Time: 06:38 ص
 */

namespace OpenMooc\Courses\Services;

use Validator;
use OpenMooc\Courses\Repositories\coursesLessonsCommentsRepository;
use OpenMooc\Service;

class coursesLessonsCommentsService extends Service
{
    private $commentsRepository;
  public function __construct()
  {
      $this->commentsRepository=new coursesLessonsCommentsRepository();
  }
  public function addComment($request){
      $rules = [
          'comment'     => 'required',
          'created_by'  => 'required|integer',
          'lesson_id'   => 'required|integer'
      ];

      $validator = Validator::make($request->all(),$rules);

      if($validator->fails())
      {
          $this->setErrors($validator->errors()->all());
          return false;
      }

      if($this->commentsRepository->addComment($request->all()))
          return true;
      $this->setErrors('error');
      return false;
  }
  public function getComment($id){
      $comment=$this->commentsRepository->getComment($id);
      if(count($comment)>0)
          return $comment;
      return false;

  }
  public function getCommentsByLesson($id){
      $comments=$this->commentsRepository->getCommentsByLesson($id);
      if(count($comments)>0)
          return $comments;
      return false;


  }
    public function getComments(){
        $comments=$this->commentsRepository->getComments();
        if(count($comments)>0)
            return $comments;
        return false;

    }
    public function getCommentsByCreator($id){
        $comments=$this->commentsRepository->getCommentsByCreator($id);
        if(count($comments)>0)
            return $comments;
        return false;
    }
    public function deleteComment($id){
      if($this->commentsRepository->deleteComment($id))
          return true;
      $this->setErrors('not found');
      return false;
    }


}