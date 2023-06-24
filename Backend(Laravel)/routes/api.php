<?php

use App\Http\Controllers\Api\AdvtController;
use App\Http\Controllers\Api\UsersController;
use App\Http\Controllers\Api\AdvtUserController;
use App\Http\Controllers\Api\CarController;
use App\Http\Controllers\Api\CommentsController;
use App\Http\Controllers\Api\PassengerController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ParticipantsController;
use App\Http\Controllers\SecondAdvtController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MessageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResources([
    'advt' => AdvtController::class
]);

// UserController
Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UsersController::class, 'auth']);
Route::post('/getUser', [UsersController::class, 'getUser']);
Route::post('/restraction', [UsersController::class, 'restraction']);
Route::post('/rating', [UsersController::class, 'userRating']);
Route::post('/getRating', [UsersController::class, 'getUserRating']);
Route::post('/getRests', [UsersController::class, 'getRests']);
Route::post('/editPhoto', [UserController::class, 'updatePhoto']);
Route::post('/updateUser', [UserController::class, 'updateUser']);
Route::post('/updateDateUser', [UserController::class, 'updateDateUser']);
Route::post('/updateInventory', [UserController::class, 'updateInventory']);

// AdvtController
Route::post('/getAdvt', [AdvtUserController::class, 'show']);
Route::post('/deleteAdvt', [AdvtUserController::class, 'delete']);
Route::post('/editAdvt', [AdvtUserController::class, 'edit']);

Route::get('/getDateAdvts', [SecondAdvtController::class, 'indexDate']);
Route::post('/getMyParticipation', [SecondAdvtController::class, 'myAdvts']);
Route::post('/allMyParticipation', [SecondAdvtController::class, 'myParticipation']);

// CommentController
Route::post('/addComment', [CommentsController::class, 'store']);
Route::post('/deleteComment', [CommentsController::class, 'delete']);

// CarController
Route::post('/addCar', [CarController::class, 'store']);
Route::post('/indexCar', [CarController::class, 'index']);

// PassengerController
Route::post('/siteInCar', [PassengerController::class, 'store']);
Route::post('/getOutOfTheCar', [PassengerController::class, 'delete']);
Route::post('/passengers', [PassengerController::class, 'outputPassengers']);

// Events
Route::get('/allEvents', [EventsController::class, 'index']);
Route::post('/addEvent', [EventsController::class, 'store']);
Route::get('/event/{id}', [EventsController::class, 'show']);
Route::post('/myEvents', [EventsController::class, 'myEvents']);
Route::get('/getNotConfirmedEvents', [EventsController::class, 'notConfirmedEvents']);
Route::post('/confirmedEvent', [EventsController::class, 'confirmedEvent']);
Route::post('/deleteEvent', [EventsController::class, 'delete']);

// Participant
Route::post('/allParticipants', [ParticipantsController::class, 'index']);
Route::post('/addParticipant', [ParticipantsController::class, 'store']);
Route::post('/deleteParticipant', [ParticipantsController::class, 'delete']);
Route::post('/foundParticipant',[ParticipantsController::class, 'found']);

//Notification
Route::get('/allNot/{id}', [NotificationController::class, 'index']);
Route::get('/allUnreadNot/{id}', [NotificationController::class, 'indexUnread']);
Route::post('/addNot', [NotificationController::class, 'store']);
Route::get('/deleteNot/{id}', [NotificationController::class, 'delete']);
Route::post('/updateStatusNot',[NotificationController::class, 'updateStatus']);

// Message
Route::post('/getMessages', [MessageController::class, 'getMessages']);
Route::post('/addMessage', [MessageController::class, 'addMessage']);
Route::post('/deleteMessage', [MessageController::class, 'delete']);
