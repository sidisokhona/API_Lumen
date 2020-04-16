<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

//-------------------------Utilisateur-----------------------------------

//Pour recuperer tous les utilisateurs
$router->get('/users', 'UserController@getUsers');

//Pour la mise a jour
$router->put('/users/{id}', 'UserController@updateUser');

//Pour créer un utilisateur
$router->post('/users', 'UserController@createUser');

//Pour recuperer un seul utilisateur
$router->get('/users/{id}', 'UserController@getUser');

//Pour supprimer un seul utilisateur
$router->delete('/users/{id}', 'UserController@deleteUser');

//-------------------------Mark-----------------------------------

//Pour recuperer tous les Markers
$router->get('/mark', 'MarkController@getMarks');

//Pour la mise a jour des Markers
$router->put('/mark/{id}', 'MarkController@updateMark');

//Pour créer un marker
$router->post('/mark', 'MarkController@createMark');

//Pour recuperer un seul marker
$router->get('/mark/{id}', 'MarkController@getMark');

//Pour supprimer un seul marker
$router->delete('/mark/{id}', 'MarkController@deleteMark');



//-------------------------Score-----------------------------------

//Pour recuperer tous les Scores
$router->get('/score', 'ScoreController@getScores');

//Pour la mise a jour d'un Score
$router->put('/score/{id}', 'ScoreController@updateScore');

//Pour créer un score
$router->post('/score', 'ScoreController@createScore');

//Pour recuperer un seul score
$router->get('/score/{id}', 'ScoreController@getScore');

//Pour supprimer un seul score
$router->delete('/score/{id}', 'ScoreController@deleteScore');


//----------------------------Authentification------------------------
$router->post('/login', 'UserController@authenticate');

$router->post('/register', 'UserController@register');


