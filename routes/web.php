<?php
use App\system;
use App\category;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    $data['systemdata'] = system::find(1);
    $data['categories'] = Category::with('newss')->get();
    $_SESSION['setting'] = $data['systemdata'];
    return view('frontend.index', $data);
})->name('userdashboard');




Route::view('/login','frontend.login.login')->name('login');
Route::view('/registerUser','frontend.login.register')->name('registerUser');
// Route::view('/userdetails','frontend.login.userdetails')->name('userdetails');

// Route::view('master','backend.layout.master')->name('master');
// Route::view('create','backend.category.create')->name('create');
// Route::get('/news.category}','newscontroller@index')->name('category.view');


Route::group(['prefix' =>'admin','middleware' => ['auth']], function () {
    //Register User
    Route::post('/registerAdmin','usercontroller@signup')->name('admin.register');
    Route::view('/registerAdmin','backend.login.register')->name('registerAdmin');
    //Login User
    Route::post('/loggin','usercontroller@signin')->name('user.login');
    Route::view('/login','backend.login.login')->name('admin.login');  
    //Dashboard
    Route::get('/dashboard','newscontroller@dashboard')->name('dashboard');
    //System Setting
    Route::post('system-setting','systemcontroller@systemdata')->name('systemform');
//  Route::view('system.setting','backend.systeminfo')->name('system.setting');
    //Category Display
    Route::get('/system.display','systemcontroller@displaysystemData')->name('system.display');
   //Category Create
    Route::post('/category-data','categorycontroller@categorydata')->name('category.data');
    Route::view('/category','backend.category.create')->name('category');
   //Category Display
    Route::get('/admin.display','categorycontroller@displayData')->name('admin.display');
   //Category Edit
    Route::get('/edit/{id}','categorycontroller@edit')->name('admin_edit');
   //Category Update
    Route::post('/update/{id}','categorycontroller@update')->name('admin.update');
   //Delete Category
    Route::get('/delete/{id}','categorycontroller@delete')->name('admin.delete');

   //News Create
    Route::get('/formcreate','newscontroller@displayData')->name('formcreate');
    Route::post('News-data','newscontroller@newscreate')->name('news.data');
    //Display Data
    Route::get('/display.news','newscontroller@displaynews')->name('display.news');
    //Display User News Data
    Route::get('/user.news','newscontroller@usernews')->name('user.news');
    //News Edit
    Route::get('/editnews/{id}','newscontroller@editnews')->name('news.edit');
    //News Update
    Route::post('/updatenews/{id}','newscontroller@updatenews')->name('news.update');
    //Display Category
    Route::get('/display.cate','newscontroller@displayData')->name('display.cate');
    //Delete News
    Route::get('/deletenews/{id}','newscontroller@deletenews')->name('delete.news');
    //Comment Manage
    Route::get('/comment.news','commentcontroller@commentdisp')->name('display.comment');
    //Delete Comment 
    Route::get('/commentdelete/{id}','commentcontroller@deleteComment')->name('delete.comment');
    //User Manage
    Route::get('/user.manage','usercontroller@userDisplay')->name('display.users');
    //Delete User
    Route::get('/userdelete/{id}','usercontroller@deleteUser')->name('delete.user');
});

Route::group(['prefix' =>'user','middleware' => ['auth']], function (){  
    //logout
    Route::get('/loggin','usercontroller@logout')->name('userlogout');
    //newsdetails
    Route::get('news-details/{id}','newscontroller@newsdetails')->name('news.details');
    //Comment
    Route::post('/commentuser','commentcontroller@commentinsert')->name('comment.user');
    //News Create
    Route::get('/newscreate','newscontroller@catData')->name('newscreate');
    Route::post('News-data','newscontroller@newscreate')->name('news.data');
    //User details
    Route::get('/userdetails/{id}','usercontroller@userdetails')->name('user.details');
    //About Us details
    Route::get('/Systemdetails','systemcontroller@systemdetails')->name('system.details');
    

});


//Register User
Route::post('/registerUser','usercontroller@signup')->name('user.register');
Route::view('/registerUser','frontend.login.register')->name('registerUser');
 //Login User
 Route::post('/loggin','usercontroller@signin')->name('user.login');
 Route::view('/login','frontend.login.login')->name('login');  
 //Search
 Route::get('/posts/search', 'newscontroller@search')->name('posts.search');

