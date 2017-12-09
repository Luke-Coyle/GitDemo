<?php
use Illuminate\Support\Facades\Input;
use App\Post;

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

Route::get('/', 'PagesController@welcome');
Route::get('/login', 'PagesController@login');
Route::get('/register', 'PagesController@register');

Route::get('/subjects', 'PagesController@subjects');
Route::get('/profile', 'PagesController@profile');


Route::get('/english', 'PagesController@english');
Route::get('/maths', 'PagesController@maths');
Route::get('/computerscience', 'PagesController@computerscience');

Route::get('/cs210', 'PostsController@cs210');
Route::get('/cs320', 'PostsController@cs320');
Route::get('/cs357', 'PostsController@cs357');

Route::get('/en101', 'PostsController@en101');
Route::get('/en203', 'PostsController@en203');
Route::get('/en260', 'PostsController@en260');

Route::get('/mt103', 'PostsController@mt103');
Route::get('/mt201', 'PostsController@mt201');
Route::get('/mt212', 'PostsController@mt212');

Route::get('/home', 'PagesController@profile');

Route::resource('posts','PostsController'); //Namespaced under posts url   -- posts/create--- posts/update --- etc

Auth::routes();

Route::resource('comments', 'CommentsController');
Route::post('comments/{post_id}', ['uses' => 'CommentsController@store', 'as' => 'comments.store']);





// Password reset link request routes...
/*Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');
*/

// Password reset routes...
/*Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');
*/

Route::get('/home', 'HomeController@index')->name('home');
Route::get('users/logout','Auth\LoginController@userLogout')->name('user.logout');

//Password reset routes
Route::get('password/reset/{token?}', 'Auth\PasswordController@showResetForm')->name('password.reset'); //Step 1 and 3
Route::post('password/email', 'Auth\PasswordController@sendResetLinkEmail');	  //Step 2
Route::post('password/reset', 'Auth\PasswordController@reset');					        //Step 4


Route::get('/verifyemail/{token}', 'Auth\RegisterController@verify');

Route::prefix('admin')->group(function(){

  Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
  Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
  Route::get('/', 'AdminController@index')->name('admin');  // POSSIBLY INCORRECT

  Route::get('logout','Auth\AdminLoginController@logout')->name('admin.logout');

    // Password reset routes
  Route::post('/password/email', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
  Route::get('/password/reset', 'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
  Route::post('/password/reset', 'Auth\AdminResetPasswordController@reset');
  Route::get('/password/reset/{token}', 'Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');
});

Route::any('/search',function(){
  $q = Input::get ( 'q' );
  $posts = Post::where('title','LIKE','%'.$q.'%')->orWhere('body','LIKE','%'.$q.'%')->orWhere('module','LIKE','%'.$q.'%')->get();
  if(count($posts) > 0)
      return view('results')->withDetails($posts)->withQuery ( $q );
  else return view ('results')->withMessage('No Details found. Try to search again !');
});