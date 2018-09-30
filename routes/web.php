<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('courses',function(){
 return \OpenMooc\Courses\Models\Courses::all();
});

Route::get('/', function () {
    return view('welcome');
});

//course table route
Route::get('add','coursesController@addCourse');
Route::post('add','coursesController@processAddCourse');
Route::get('courses','coursesController@getCourses');
Route::get('course/{id}','coursesController@getCourse');
Route::get('getCoursesByCategory/{id}','coursesController@getCoursesByCategory');
Route::get('getCoursesByInstructor/{id}','coursesController@getCoursesByInstructor');
Route::get('getCoursesByStatus/{status}','coursesController@getCoursesByStatus');
Route::get('getCoursesByStudentId/{id}','coursesController@getCoursesByStudentId');
Route::get('searchCourses/{key}','coursesController@searchCourses');
Route::get('updateCourse/{id}','coursesController@updateCourse');
Route::post('updateCourse','coursesController@processUpdateCourse');
Route::get('deleteCourse/{id}','coursesController@deleteCourse');
//course_lesson table route
Route::get('getLesson/{id}','coursesLessonsController@getCourseLesson');
Route::get('addLesson','coursesLessonsController@addLesson');
Route::post('addLesson','coursesLessonsController@processAddLesson');
Route::get('updateLesson/{id}','coursesLessonsController@updateLesson');
Route::post('updateLesson','coursesLessonsController@processUpdateLesson');
Route::get('getLessons','coursesLessonsController@getAllLessons');
Route::get('getLessonsByCourse/{id}','coursesLessonsController@getLessonsByCourse');
Route::get('getLessonsByInstructor/{id}','coursesLessonsController@getLessonsByInstructor');
Route::get('searchLessons/{key}','coursesLessonsController@searchLessons');
Route::get('deleteLesson/{id}','coursesLessonsController@deleteLesson');
//courses_students table Route
Route::get('getCourseStudent/{id}','coursesStudentsController@getCourseStudent');
Route::get('addCourseStudent','coursesStudentsController@addCourseStudent');
Route::post('addCourseStudent','coursesStudentsController@processAddCourseStudent');
Route::get('getCoursesStudents','coursesStudentsController@getCoursesStudents');
Route::get('approve/{id}','coursesStudentsController@approveSubscription');
Route::get('unApprove/{id}','coursesStudentsController@unApproveSubscription');
Route::get('getCoursesByStudent/{id}','coursesStudentsController@getCoursesByStudent');
Route::get('getStudentsByCourse/{id}','coursesStudentsController@getStudentsByCourse');
Route::get('getUnApproveStudent','coursesStudentsController@getUnApproveStudent');
Route::get('deleteSubscribe/{id}','coursesStudentsController@deleteSubscribe');

////UserGroup Table routes
Route::get('addusergroup','usersGroupController@addUserGroup');
Route::Post('addUserGroup','usersGroupController@processAddUserGroup');
Route::get('getallusersgroups','usersGroupController@getAllUsersGroups');
Route::get('updateUserGroup/{id}','usersGroupController@updateUserGroup');
Route::post('updateUserGroup','usersGroupController@processUpdateUserGroup');
Route::get('deleteUserGroup/{id}','usersGroupController@deleteUserGroup');
Route::get('getUserGroup/{id}','usersGroupController@getUserGroupById');
//users table routes
Route::get('addUser','usersController@addUser');
Route::post('addUser','usersController@processAddUser');
Route::get('updateUser/{id}','usersController@updateUser');
Route::post('UpdateUser','usersController@processUpdateUser');
Route::get('updatePass/{id}','usersController@updateUserPassword');
Route::post('updatePass','usersController@processUpdateUserPass');
Route::get('deleteUser/{id}','usersController@deleteUser');
Route::get('getAllUsers','usersController@getAllUsers');
Route::get('getUserById/{id}','usersController@getUserById');
Route::get('getUserByStatus/{status}','usersController@getUserByActiveStatus');
Route::get('getUserByGroup/{userGroupId}','usersController@getUserByGroup');
Route::get('searchUser/{key}','usersController@searchUser');
//courses_categories table
Route::get('addCourseCategory','coursesCategoriesController@addCourseCategory');
Route::post('addCourseCategory','coursesCategoriesController@processAddCourseCategory');
Route::get('updateCourseCategory/{id}','coursesCategoriesController@updateCourseCategory');
Route::post('UpdateCategory','coursesCategoriesController@processUpdateCourseCategory');
Route::get('getCategories','coursesCategoriesController@getCoursesCategories');
Route::get('getCourseCategoryById/{id}','coursesCategoriesController@getCourseCategoryById');
Route::get('getCourseCategoryByStatus/{status}','coursesCategoriesController@getCourseCategoryByStatus');
Route::get('getCoursesCategoriesByCreatorId/{cId}','coursesCategoriesController@getCoursesCategoriesByCreatorId');
Route::get('deleteCourseCategoryById/{id}','coursesCategoriesController@deleteCourseCategoryById');
Route::get('searchCourseCategory/{keyword}','coursesCategoriesController@searchCourseCategory');

//courses_lessons_comments table routes
Route::get('addComment','coursesLessonsCommentsController@addComment');
Route::post('addComment','coursesLessonsCommentsController@processAddComment');
Route::get('getComment/{id}','coursesLessonsCommentsController@getComment');
Route::get('getCommentsByLesson/{id}','coursesLessonsCommentsController@getCommentsByLesson');
Route::get('getComments','coursesLessonsCommentsController@getComments');
Route::get('getCommentsByCreator/{id}','coursesLessonsCommentsController@getCommentsByCreator');
Route::get('deleteComment/{id}','coursesLessonsCommentsController@deleteComment');
//courses rate table route
Route::get('addRate','coursesRateController@addRate');
Route::post('addRate','coursesRateController@processAddRate');
Route::get('getRate/{id}','coursesRateController@getRate');
route::get('updateRate/{id}','coursesRateController@updateRate');
route::post('updateRate','coursesRateController@processUpdate');
Route::get('getRates','coursesRateController@getRates');
Route::get('getRatesByCourse/{id}','coursesRateController@getRatesByCourse');
Route::get('getAvg/{id}','coursesRateController@getAVGRateByCourseId');

