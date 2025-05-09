<?php
use App\Http\Controllers\Api\EventoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\InscricaoController;
use App\Http\Controllers\Api\PagamentoController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\PersonalAccessToken;

Route::prefix('v1')->group(function () {



    Route::get('/validate-token', function (Request $request) {
        $authorization = $request->header('Authorization');
        if (!$authorization || !str_starts_with($authorization, 'Bearer ')) {
            return response()->json(['valid' => false, 'error' => 'Token ausente'], 401);
        }
        $token = substr($authorization, 7);
        $accessToken = PersonalAccessToken::findToken($token);
        if (!$accessToken) {
            return response()->json(['valid' => false, 'error' => 'Token inválido'], 401);
        }
        $user = $accessToken->tokenable;
        Auth::login($user);
        return response()->json([
            'valid' => true,
            'user' => $user
        ]);
    });

    Route::post('/register', [UserController::class, 'register']);
    Route::post('/login', [UserController::class, 'login']);

    Route::get('/eventos', [EventoController::class, 'index']);
    Route::get('/eventos/{id}', [EventoController::class, 'show']);

    Route::get('/inscricoes', [InscricaoController::class, 'index']);
    Route::get('/inscricoes/{id}', [InscricaoController::class, 'show']);

    Route::get('/pagamentos', [PagamentoController::class, 'index']);
    Route::get('/pagamentos/{id}', [PagamentoController::class, 'show']);

    Route::get('/usuarios', [UserController::class, 'index']);
    Route::get('/usuarios/{id}', [UserController::class, 'show']);

    Route::middleware('auth:sanctum')->group(function () {
        Route::post('/eventos', [EventoController::class, 'store']);
        Route::put('/eventos/{id}', [EventoController::class, 'update']);
        Route::delete('/eventos/{id}', [EventoController::class, 'destroy']);

        Route::post('/inscricoes', [InscricaoController::class, 'store']);
        Route::put('/inscricoes/{id}', [InscricaoController::class, 'update']);
        Route::delete('/inscricoes/{id}', [InscricaoController::class, 'destroy']);

        Route::post('/pagamentos', [PagamentoController::class, 'store']);
        Route::put('/pagamentos/{id}', [PagamentoController::class, 'update']);
        Route::delete('/pagamentos/{id}', [PagamentoController::class, 'destroy']);

        Route::post('/usuarios', [UserController::class, 'store']);
        Route::put('/usuarios/{id}', [UserController::class, 'update']);
        Route::delete('/usuarios/{id}', [UserController::class, 'destroy']);
    });
});
