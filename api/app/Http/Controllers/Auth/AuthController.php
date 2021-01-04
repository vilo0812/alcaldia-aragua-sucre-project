<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Repository\User\UserRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterUserRequest;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;
class AuthController extends Controller
{
	public function __construct(UserRepositoryInterface $repository)
    {
        $this->repository = $repository;
        $this->middleware('auth:api', ['except' => ['login','register']]);
    }
    public function register(RegisterUserRequest $request){
        $user = $this->repository->createOrUpdateFromRequest();
        return response()->json(
            [
        'message' => 'Usuario creado correctamente',
        'data' => new UserResource($user)
        ], 201);
    }
     public function login()
    { // funcion para crear el token eh iniciar session
        $credentials = request(['email', 'password']);
        $token = JWTAuth::attempt($credentials);
        return !$token ? response()->json(['error' => 'Not Autorization'],400) :
                         response()->json(['access_token' => $token,
                                  'user' => User::find(Auth::user()->id),
                                  'token_type' => 'bearer',],200);

    }
    public function logout()
    {// destruir session
        try {

        JWTAuth::parseToken()->invalidate();
        return response()->json(['mensaje' => 'session it is over ','confirmation' => true],200);

        } catch (JWTException $e) {

        return  response()->json(['mensaje' => $e, 'status' => 500],500);

        }

    }
    public function me(){
        return response()->json(Auth::user());
    }
    public function refresh(){
        $token = Auth::guard()->refresh();
        return response()->json(['access_token' => $token,
                                  'user' => User::find(Auth::user()->id),
                                  'token_type' => 'bearer',],200);
    }
}
