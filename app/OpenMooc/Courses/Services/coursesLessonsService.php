<?php
namespace OpenMooc\Courses\Services;
use Validator;
use OpenMooc\Courses\Repositories\coursesLessonsRepository;
use OpenMooc\Service;




class coursesLessonsService extends Service{
private $coursesLessonsRepository;
public function __construct()
{
    $this->coursesLessonsRepository=new coursesLessonsRepository();
}
public function getCourseLesson($id){
    $lesson=$this->coursesLessonsRepository->getLesson($id);

        return $lesson;

}
public function addLesson($request){
    $rules = [
        'lesson_title'        => 'required|max:100',
        'lesson_course'       => 'required|integer',
        'lesson_instructor'   => 'required|integer',
        'lesson_description'  => 'required|max:1000',
        'lesson_video'        => 'required'
    ];
    $validator=Validator::make($request->all(),$rules);
    if($validator->fails()){
        $this->setErrors($validator->errors()->all());
        return false;
    }
    if($this->coursesLessonsRepository->addLesson($request->all()))
        return true;
    $this->setErrors('Error try again');
    return false;

}
public function updateLesson($request){
    $rules = [
        'lesson_title'        => 'required|max:100',
        'lesson_course'       => 'required|integer',
        'lesson_instructor'   => 'required|integer',
        'lesson_description'  => 'required|max:1000',
        'lesson_video'        => 'required'
    ];
    $validator=Validator::make($request->all(),$rules);
    if($validator->fails()){
        $this->setErrors($validator->errors()->all());
        return false;
    }
    if($this->coursesLessonsRepository->updateLesson($request->all()))
        return true;
    $this->setErrors('Error:-try again');
    return false;
}
public function getLessons(){
    $lessons=$this->coursesLessonsRepository->getLessons();
    if(!$lessons){
        $this->setErrors('error');
        return false;
    }
    return $lessons;



}
public function getLessonsByCourse($id){
    $lessons=$this->coursesLessonsRepository->getLessonsByCourse($id);
    if(!$lessons){
        $this->setErrors('not found');
        return false;
    }
    return $lessons;
}
public function getLessonsByInstructor($id){
    $lessons=$this->coursesLessonsRepository->getLessonsByInstructor($id);
    if(!$lessons){
        $this->setErrors('not found');
        return false;
    }
    return $lessons;
}
public function searchLessons($key){
    $lessons=$this->coursesLessonsRepository->searchLessons($key);
    if(!$lessons){
        $this->setErrors('not found');
        return false;
    }
    return $lessons;
}
public function deleteLesson($id){
    if($this->coursesLessonsRepository->deleteLesson($id))
        return true;
    $this->setErrors('not found');
    return false;
}
}