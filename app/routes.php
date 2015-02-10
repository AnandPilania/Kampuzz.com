<?php
/*Event::listen('illuminate.query', function ($sql, $bindings, $time) {
// To get the full sql query with bindings inserted
$sql = str_replace(array('%', '?'), array('%%', '%s'), $sql);
$full_sql = vsprintf($sql, $bindings);
echo $full_sql . '<br>
';
});*/
Route::get('/', array('as' => 'home', 'uses' => 'HomeController@index'));
Route::get('fblogin/{auth?}',array('as'=>'fblogin','uses'=>'UserController@facebookLogin')) ;
Route::get('glogin/{auth?}',array('as'=>'glogin','uses'=>'UserController@googleLogin')) ;

// User Login and Reg
Route::get('user/register', array('as' => 'user.register', 'uses' => 'UserController@register'))->before('guest');
Route::get('user/login', array('as' => 'user.login', 'uses' => 'UserController@login'));
Route::post('user/auth', array('as' => 'user.auth', 'uses' => 'UserController@auth'));
Route::get('user/logout', array('as' => 'user.logout', 'uses' => 'UserController@logout'));
Route::get('user/activate/{email}/{verification_token}', array('as' => 'user.activate', 'uses' => 'UserController@activate'));
Route::post('user/set_password', array('as' => 'user.set_password', 'uses' => 'UserController@setPassword'));
Route::post('user/ask_question', array('as' => 'user.ask_question', 'uses' => 'UserController@ask_question'));

Route::group(array('before' => 'auth'), function ()
{
    Route::get('user/dashboard', array('as' => 'user.dashboard', 'uses' => 'UserController@dashboard'));
    Route::post('user/saveBookmark', array('as' => 'user.saveBookmark', 'uses' => 'UserController@saveBookmark'));
    Route::delete('user/deleteBookmark', array('as' => 'user.deleteBookmark', 'uses' => 'UserController@deleteBookmark'));
    Route::post('user/request_contact', array('as' => 'user.request_contact', 'uses' => 'UserController@contactInfo'));
    Route::post('user/request-brochure', array('as' => 'user.request_brochure', 'uses' => 'UserController@brochure'));
    Route::get('user/profile', array('as' => 'user.profile', 'uses' => 'UserController@profile'));
    Route::post('user/profile', array('as' => 'user.update', 'uses' => 'UserController@update'));

    Route::get('user/following/institutes', array('as' => 'user.following_institutes', 'uses' => 'UserController@shortlistInstitutes'));
    Route::get('user/following/courses', array('as' => 'user.following_courses', 'uses' => 'UserController@shortlistCourses'));
    Route::get('user/following/exams', array('as' => 'user.following_exams', 'uses' => 'UserController@shortlistExams'));
    Route::get('user/qna', array('as' => 'user.qna', 'uses' => 'UserController@qna'));

});

Route::resource('user', 'UserController',
    array('except' => array('create', 'index', 'destroy'))
);

// General App routes

Route::get('courses', array('as' => 'courses', 'uses' => 'CoursesController@allCourses'));

Route::get('courses/{id}-{slug?}/{parent_cat_id?}', array('as' => 'courses', 'uses' => 'CoursesController@index'));

Route::get('courses/detail/{id}-{slug?}', array('as' => 'courses.detail', 'uses' => 'CoursesController@detail'));

Route::get('college/{id}-{slug?}', array('as' => 'college', 'uses' => 'CollegeController@index'));

Route::get('exams', array('as' => 'exams.index', 'uses' => 'ExamController@index'));

Route::get('exams/category', array('as' => 'exam.categorylist', 'uses' => 'ExamController@categorylist'));

Route::get('exams/category/{id}-{slug?}', array('as' => 'exam.category', 'uses' => 'ExamController@category'));

Route::get('exams/{id}-{slug?}', array('as' => 'exam.detail', 'uses' => 'ExamController@detail'));

Route::get('products', array('as' => 'products.index', 'uses' => 'ProductController@index'));

Route::get('products/category', array('as' => 'products.categorylist', 'uses' => 'ProductController@categorylist'));

Route::get('products/category/{id}-{slug?}', array('as' => 'products.category', 'uses' => 'ProductController@category'));

Route::get('products/{id}-{slug?}', array('as' => 'products.detail', 'uses' => 'ProductController@detail'));

Route::get('articles', array('as' => 'articles', 'uses' => 'ArticleController@index'));

Route::get('articles/category', array('as' => 'articles.categorylist', 'uses' => 'ArticleController@categorylist'));

Route::get('articles/category/{id}-{slug?}', array('as' => 'articles.category', 'uses' => 'ArticleController@category'));

Route::get('articles/{id}-{slug?}', array('as' => 'articles.detail', 'uses' => 'ArticleController@detail'));

Route::get('abroad/courses/{country}/{id?}/{slug?}/{parent_cat_id?}', array('as' => 'courses.abroad', 'uses' => 'CoursesAbroadController@index'));

Route::get('abroad/course-detail/{country}/{id}-{slug?}', array('as' => 'courses.abroad.detail', 'uses' => 'CoursesAbroadController@detail'));

Route::get('abroad/college/{id?}-{slug?}', array('as' => 'college.abroad', 'uses' => 'CollegeAbroadController@index'));
