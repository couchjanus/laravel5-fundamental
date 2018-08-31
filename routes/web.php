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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/vue', function () {
    return view('home.vue');
});

Route::get('/vue/news', function () {
    $results =  \App\Post::all();
    return $results;
});
 
Route::get('/news', function () {
    return view('home.news');
});

Route::get('/list', function () {
    return view('home.index');
})->name('bloglist');

Route::get('/vue/posts', 'PostsController@list')->name('blogposts');

Route::get('blog', ['uses' => 'PostsController@index', 'as' => 'blog']);

Route::get('blog/{slug}', 'PostsController@showBySlug')->name('blog.show');

Route::get('blog/{id}', ['uses' => 'PostsController@show', 'as' => 'blog.showById']);


Route::get('admin', ['uses' => 'Admin\DashboardController@index', 'as' => 'admin']);
Route::resource('posts', 'Admin\PostsController'); 
Route::resource('categories', 'Admin\CategoriesController'); 
Route::resource('tags', 'Admin\TagsController'); 

Route::resource('users', 'Admin\UsersController');

Route::get('/trashed', 'Admin\UsersController@indexTrashed')->name('users.trashed');
Route::post('/restore/{id}', 'Admin\UsersController@restore')->name('users.restore');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


// Route::get('profile/{username}', [
//     'as'   => '{username}',
//     'uses' => 'ProfileController@show',
//     ]
// );


Route::group(
    [
        'middleware' => ['auth', 'currentUser']], function () {
            Route::get(
                'profile/{username}', [
                    'as'   => '{username}',
                    'uses' => 'ProfileController@show',
                    ]
            );
        }
);


Route::get(
    '/email', 
    function () {
        return new App\Mail\ContactEmail('Hello Mail!');
    }
);


Route::get('contact', 'ContactController@create')->name('contact.create');
Route::post('contact', 'ContactController@store')->name('contact.store');

Route::get('/verify/token/{token}', 'Auth\VerificationController@verify')->name('auth.verify'); 
Route::get('/verify/resend', 'Auth\VerificationController@resend')->name('auth.verify.resend');


// Socialite Register Routes
Route::get('social/{provider}', 'Auth\SocialController@redirect')->name('social.redirect');
Route::get('social/{provider}/callback', 'Auth\SocialController@handle')->name('social.handle');
