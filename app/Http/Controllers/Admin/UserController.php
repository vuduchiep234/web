<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/8/2018
 * Time: 7:20 PM
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Controllers\Requests\Admin\RegisterRequest;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public $successStatus = 200;
    private $service;

    public function __construct(UserService $service)
    {
        $this->service = $service;
    }

    /**
     * Login api
     * @return \Illuminate\Http\Response
     */
    public function login(){
        /**
         * @var User $user
         */
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){
            $user = Auth::user();
            $attributes = $user->getAttributes();
            $success['Information'] =  $attributes;
            $success['token'] =  $user->createToken('MyApp')-> accessToken;
            return response()->json(['success' => $success, 'user' => $user], $this-> successStatus);
        }
        else{
            return response()->json(['error'=>'Unauthorised'], 401);
        }
    }
    /**
     * Register api
     * @param RegisterRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(RegisterRequest $request)
    {
        /**
         * @var User $user
         */
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = $this->service->createNewModel($input);
        $success['token'] =  $user->createToken('MyApp')-> accessToken;
        $attributes = $user->getAttributes();
        $success['name'] =  $attributes['first_name'].' '.$attributes['last_name'];
        return response()->json(['success'=>$success], $this-> successStatus);
    }
}