<?php

use App\Http\Controllers\Post\Comment\StoreCommentController;
use App\Http\Controllers\Post\Like\StoreLikeController;
use App\Http\Controllers\Post\ShowPostMainController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Main\IndexController;
use App\Http\Controllers\Post\IndexPostMainController;


use App\Http\Controllers\Personal\Comment\DeletePersonalCommentController;
use App\Http\Controllers\Personal\Comment\EditPersonalCommentController;
use App\Http\Controllers\Personal\Comment\UpdatePersonalCommentController;


use App\Http\Controllers\Personal\Comment\IndexPersonalCommentController;
use App\Http\Controllers\Personal\Liked\IndexPersonalLikedController;
use App\Http\Controllers\Personal\Liked\DeletePersonalLikedController;
use App\Http\Controllers\Personal\Main\IndexPersonalController;

use App\Http\Controllers\Admin\Main\IndexAdminController;
use App\Http\Controllers\Admin\Post\CreatePostController;
use App\Http\Controllers\Admin\Post\DeletePostController;
use App\Http\Controllers\Admin\Post\EditPostController;
use App\Http\Controllers\Admin\Post\IndexPostController;
use App\Http\Controllers\Admin\Post\ShowPostController;
use App\Http\Controllers\Admin\Post\StorePostController;
use App\Http\Controllers\Admin\Post\UpdatePostController;

use App\Http\Controllers\Admin\Category\IndexCategoryController;
use App\Http\Controllers\Admin\Category\CreateCategoryController;
use App\Http\Controllers\Admin\Category\StoreCategoryController;
use App\Http\Controllers\Admin\Category\ShowCategoryController;
use App\Http\Controllers\Admin\Category\EditCategoryController;
use App\Http\Controllers\Admin\Category\UpdateCategoryController;
use App\Http\Controllers\Admin\Category\DeleteCategoryController;

use App\Http\Controllers\Admin\Tag\CreateTagController;
use App\Http\Controllers\Admin\Tag\DeleteTagController;
use App\Http\Controllers\Admin\Tag\EditTagController;
use App\Http\Controllers\Admin\Tag\IndexTagController;
use App\Http\Controllers\Admin\Tag\ShowTagController;
use App\Http\Controllers\Admin\Tag\StoreTagController;
use App\Http\Controllers\Admin\Tag\UpdateTagController;

use App\Http\Controllers\Admin\User\CreateUserController;
use App\Http\Controllers\Admin\User\DeleteUserController;
use App\Http\Controllers\Admin\User\EditUserController;
use App\Http\Controllers\Admin\User\IndexUserController;
use App\Http\Controllers\Admin\User\ShowUserController;
use App\Http\Controllers\Admin\User\StoreUserController;
use App\Http\Controllers\Admin\User\UpdateUserController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['namespace' => 'Main'], function () {
    Route::get('/', [IndexController::class, 'index'])->name('main.index');
});
Route::group(['namespace' => 'Post', 'prefix' => 'posts'], function () {
    Route::get('/', [IndexPostMainController::class, 'index'])->name('post.index');
    Route::get('/{post}', [ShowPostMainController::class, 'index'])->name('post.show');

    Route::group(['namespace' => 'Comment', 'prefix' => '{post}/comments'], function () {
        Route::post('/', [StoreCommentController::class, 'index'])->name('post.comment.store');
    });

    Route::group(['namespace' => 'Like', 'prefix' => '{post}/likes'], function () {
        Route::post('/', [StoreLikeController::class, 'index'])->name('post.like.store');
    });
});
Route::group(['namespace' => 'Personal', 'prefix' => 'personal', 'middleware' => ['auth', 'verified']], function () {
    Route::group(['namespace' => 'Main', 'prefix' => 'main'], function () {
        Route::get('/', [IndexPersonalController::class, 'index'])->name('personal.main.index');
    });
    Route::group(['namespace' => 'Liked', 'prefix' => 'liked'], function () {
        Route::get('/', [IndexPersonalLikedController::class, 'index'])->name('personal.liked.index');
        Route::delete('/post', [DeletePersonalLikedController::class, 'index'])->name('personal.liked.delete');
    });
    Route::group(['namespace' => 'Comment', 'prefix' => 'comment'], function () {
        Route::get('/', [IndexPersonalCommentController::class, 'index'])->name('personal.comment.index');
        Route::get('/{comment}/edit', [EditPersonalCommentController::class, 'index'])->name('personal.comment.edit');
        Route::patch('/{comment}', [UpdatePersonalCommentController::class, 'index'])->name('personal.comment.update');
        Route::delete('/{comment}', [DeletePersonalCommentController::class, 'index'])->name('personal.comment.delete');
    });
});

Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['auth', 'admin', 'verified']], function () {
    Route::group(['namespace' => 'Main'], function () {
        Route::get('/', [IndexAdminController::class, 'index'])->name('admin.main.index');
    });

    Route::group(['namespace' => 'Post', 'prefix' => 'posts'], function () {
        Route::get('/', [IndexPostController::class, 'index'])->name('admin.post.index');
        Route::get('/create', [CreatePostController::class, 'index'])->name('admin.post.create');
        Route::post('/create', [StorePostController::class, 'index'])->name('admin.post.store');
        Route::get('/{post}', [ShowPostController::class, 'index'])->name('admin.post.show');
        Route::get('/{post}/edit', [EditPostController::class, 'index'])->name('admin.post.edit');
        Route::patch('/{post}', [UpdatePostController::class, 'index'])->name('admin.post.update');
        Route::delete('/{post}', [DeletePostController::class, 'index'])->name('admin.post.delete');
    });

    Route::group(['namespace' => 'Comment', 'prefix' => 'category'], function () {
        Route::get('/', [IndexCategoryController::class, 'index'])->name('admin.category.index');
        Route::get('/create', [CreateCategoryController::class, 'index'])->name('admin.category.create');
        Route::post('/create', [StoreCategoryController::class, 'index'])->name('admin.category.store');
        Route::get('/{category}', [ShowCategoryController::class, 'index'])->name('admin.category.show');
        Route::get('/{category}/edit', [EditCategoryController::class, 'index'])->name('admin.category.edit');
        Route::patch('/{category}', [UpdateCategoryController::class, 'index'])->name('admin.category.update');
        Route::delete('/{category}', [DeleteCategoryController::class, 'index'])->name('admin.category.delete');
    });

    Route::group(['namespace' => 'Tag', 'prefix' => 'tags'], function () {
        Route::get('/', [IndexTagController::class, 'index'])->name('admin.tag.index');
        Route::get('/create', [CreateTagController::class, 'index'])->name('admin.tag.create');
        Route::post('/create', [StoreTagController::class, 'index'])->name('admin.tag.store');
        Route::get('/{tag}', [ShowTagController::class, 'index'])->name('admin.tag.show');
        Route::get('/{tag}/edit', [EditTagController::class, 'index'])->name('admin.tag.edit');
        Route::patch('/{tag}', [UpdateTagController::class, 'index'])->name('admin.tag.update');
        Route::delete('/{tag}', [DeleteTagController::class, 'index'])->name('admin.tag.delete');
    });

    Route::group(['namespace' => 'User', 'prefix' => 'users'], function () {
        Route::get('/', [IndexUserController::class, 'index'])->name('admin.user.index');
        Route::get('/create', [CreateUserController::class, 'index'])->name('admin.user.create');
        Route::post('/create', [StoreUserController::class, 'index'])->name('admin.user.store');
        Route::get('/{user}', [ShowUserController::class, 'index'])->name('admin.user.show');
        Route::get('/{user}/edit', [EditUserController::class, 'index'])->name('admin.user.edit');
        Route::patch('/{user}', [UpdateUserController::class, 'index'])->name('admin.user.update');
        Route::delete('/{user}', [DeleteUserController::class, 'index'])->name('admin.user.delete');
    });
});

Auth::routes(['verify' => true]);
