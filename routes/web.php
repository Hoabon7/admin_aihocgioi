<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LevelController;
use Elasticsearch\ClientBuilder;

 Auth::routes(['register' => false]);  
 Route::middleware(['auth'])->group(function () {
     Route::group(['prefix' => '/admin'], function () {
          Route::get('/home', [App\Http\Controllers\HomeController::class, 'home'])->name('home');
          Route::get('profile',[HomeController::class,'profile'])->name('profile');
          Route::get('/logout', [HomeController::class,'logout']);
          Route::get('/book_action.html',[HomeController::class,'book_action']);
          Route::get('/content_action.html',[HomeController::class,'content_action']);
          Route::get('/level_action.html',[HomeController::class,'level_action']);
          Route::get('/lesson_action.html',[HomeController::class,'lesson_action']);
          Route::get('/chapter_action.html',[HomeController::class,'chapter_action']);
          Route::get('/editlevel/{id}',[HomeController::class,'editLevel']);
          Route::get('/editbook/{id}',[HomeController::class,'editBook']);
          Route::get('/editchapter/{id}',[HomeController::class,'editChapter']);
          Route::get('/editlesson/{id}',[HomeController::class,'editLesson']);
          Route::get('/editcontent/{id}',[HomeController::class,'editContent']);

          //edit content from level
          
          Route::get('/editlevelchaptercontent/{id}',[HomeController::class,'editLevelChapterContent']);
          Route::get('/getcontent/{id}',[HomeController::class,'getContent']);

          //update form
          Route::post('updatelevel',[HomeController::class,'updateLevel'])->name('updatelevel');
          Route::post('updatebook',[HomeController::class,'updateBook'])->name('updatebook');
          Route::post('updatechapter',[HomeController::class,'updateChapter'])->name('updatechapter');
          Route::post('updatelesson',[HomeController::class,'updateLesson'])->name('updatelesson');
          Route::post('updatecontent',[HomeController::class,'updateContent'])->name('updatecontent');
          
          //update form for each level
          Route::post('updatelevelchapterlessonandcontent',[HomeController::class,'updatelevelChapterLessonAndContent'])->name('updatelevelchapterlessonandcontent');

          //add form
          Route::post('addlevel',[HomeController::class,'addLevel'])->name('addlevel');
          //delete data
          Route::get('/deletelevel/{id}',[HomeController::class,'deleteLevel'])->name('deletelevel');

          //level
          Route::get('/level.html/{id}',[LevelController::class,'level_1']);
          

          //elasticsearch
          Route::get('/test/{name}',[HomeController::class,'testES']);//tim kiem
          Route::get('/addes',[HomeController::class,'addES']);

          //findContent

          Route::get('/filecontent',[LevelController::class,'findContent'])->name('filecontent');
     });
       
 });

 




  


