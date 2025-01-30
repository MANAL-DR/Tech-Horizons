<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\NumeroController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VerifiedDashboard;
use App\Http\Controllers\EditorController;
use App\Http\Controllers\EditorProposalController;
use App\Http\Controllers\ArticleProposalController;
use App\Http\Controllers\ThemeController;
use App\Models\Numero;
use Illuminate\Auth\Events\Verified;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Contracts\Role;

Route::get('access', function () {
    return view('access');
})->name('access');

Route::get('/', [NumeroController::class, 'publicNum'])->name('home');
Route::get('/numeros', [NumeroController::class, 'allNum'])->name('numall');
Route::get('/numero/{id}',[NumeroController::class,'publicShow'])->name('publicShow');
Route::get('/numeros/{id}',[NumeroController::class,'publicShow'])->name('publicShow');


Route::get('/dashboard',[VerifiedDashboard::class,'verifyDashboard']
)->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/article/{id}',[ArticleController::class,'articleShow'])->name('articleShow');
Route::get('/articles', [ArticleController::class, 'articleall'])->name('articles');

Route::post('/article/{id}/rating',[ArticleController::class,'rating'])->name('rating');
Route::post('/article/{id}/comment',[ArticleController::class,'addComment'])->name('addcomment');

Route::get('/subscriber/create', [ArticleController::class, 'subscribercreate'])->name('article.create');
Route::get('/article/edit/{id}', [ArticleController::class, 'edit'])->name('article.edit');
Route::delete('/articles/{id}', [ArticleController::class, 'subscriberDestroy'])->name('article.destroy');
Route::put('/articles/{id}/update', [ArticleController::class, 'update'])->name('articles.update');
Route::post('/articles/store', [ArticleController::class, 'subscriberStore'])->name('article.store');

//subscribers
Route::get('/themes', [ThemeController::class, 'allThemes'])->name('themes');
Route::post('/themes/{id}/subscribe', [ThemeController::class, 'subscribe'])->name('theme.subscribe');
Route::post('/themes/{id}/unsubscribe', [ThemeController::class, 'unsubscribetheme'])->name('theme.unsubscribe');
Route::get('/Subscribedthemes', [ThemeController::class, 'allThemes'])->name('Subscribedthemes');
Route::get('/themes/articles', [ThemeController::class, 'allArticlesTheme'])->name('articlesTheme');



//Editor's routes 
Route::get('/subscribers',[EditorController::class,'displaySubscribers'])->name('subscribers');
Route::get('/managers',[EditorController::class,'displayManagers'])->name('managers');

Route::post('/delete',[EditorController::class,'deleteUser'])->name('deleteUser');
Route::post('/update',[EditorController::class,'updateUser'])->name('updateUser');

Route::post('/changeStatus',[EditorController::class,'changeStatus'])->name('changeStatus');

Route::get('/allnum',[EditorController::class,'showNumeros'])->name('allnum');

Route::get('/editor/proposals', [EditorProposalController::class,'index'])->name('editor.proposals.index');

Route::get('/newIssue',[EditorProposalController::class,'showSuggested']);
Route::post('/createIssue',[EditorProposalController::class,'createIssue'])->name('newIssue');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/responsible/dashboard', [ThemeController::class, 'dashboard'])->name('responsible.dashboard');

// 1️ Articles liés au thème du responsable connecté
Route::get('/responsible/articles', [ArticleController::class, 'index'])->name('responsible.articles');
Route::get('/responsible/articles/create', [ArticleController::class, 'create'])->name('responsible.articles.create');
Route::post('/responsible/articles', [ArticleController::class, 'store'])->name('responsible.articles.store');
Route::delete('/responsible/articles/{id}', [ArticleController::class, 'destroy'])->name('responsible.articles.destroy');

// 2️ Abonnés liés au thème du responsable connecté
Route::get('/responsible/subscribers', [ThemeController::class, 'showSubscribers'])->name('responsible.subscribers');
Route::delete('/responsible/subscribers/{user_id}', [ThemeController::class, 'unsubscribe'])->name('responsible.subscribers.unsubscribe');

// 3️ Propositions d’articles liées au thème du responsable connecté
Route::get('/responsible/proposals', [ArticleProposalController::class, 'index'])->name('responsible.proposals');
Route::patch('/responsible/proposals/{id}/approve', [ArticleProposalController::class, 'approve'])->name('responsible.proposals.approve');
Route::patch('/responsible/proposals/{id}/reject', [ArticleProposalController::class, 'reject'])->name('responsible.proposals.reject');
Route::patch('/responsible/proposals/{id}/propose', [ArticleProposalController::class, 'propose'])->name('responsible.proposals.propose');

// 4️ Statistiques dynamiques pour le responsable connecté
Route::get('/responsible/stats/{theme_id}', [ThemeController::class, 'showStatistics'])->name('responsible.stats');
Route::post('/responsible/stats/{theme_id}/update', [ThemeController::class, 'updateStatistics'])->name('responsible.stats.update');


// Route pour afficher les propositions à l'éditeur
Route::get('/editor/proposals', [EditorProposalController::class, 'index'])->name('editor.proposals.index');




require __DIR__.'/auth.php';
