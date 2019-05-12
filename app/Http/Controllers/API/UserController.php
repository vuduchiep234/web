<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/7/2018
 * Time: 6:48 PM
 */

namespace App\Http\Controllers\API;

use App\Decorators\Account\ChangePasswordDecorator;
use App\Decorators\Account\LoginDecorator;
use App\Decorators\Account\RegisterDecorator;
use App\Decorators\Message;
use App\Http\Controllers\Requests\API\User\UserChangePasswordRequest;
use App\Http\Controllers\Requests\API\User\UserGetRequest;
use App\Http\Controllers\Requests\API\User\UserLoginRequest;
use App\Http\Controllers\Requests\API\User\UserLogoutRequest;
use App\Http\Controllers\Requests\API\User\UserPatchRequest;
use App\Http\Controllers\Requests\API\User\UserPostRequest;
use App\Http\Controllers\Requests\API\User\UserRegisterRequest;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends APIController
{
    public function __construct(UserService $service)
    {
        parent::__construct($service);
    }

    public function get(UserGetRequest $request, ?int $id = null)
    {
        return parent::_get($request, $id);
    }

    public function post(UserPostRequest $request)
    {
        return parent::_post($request);
    }

    public function patch(UserPatchRequest $request, ?int $id = null)
    {
        return parent::_patch($request, $id);
    }

    public function delete($id)
    {
        return parent::_delete($id);
    }

    public function getAll(UserGetRequest $request)
    {
        return parent::_getAll($request);
    }

    public function register(UserRegisterRequest $request)
    {
        /**
         * @var UserService $userService
         */
        $userService = $this->getService();
        $registerDecorator = new RegisterDecorator($userService);
        $newUser =  $registerDecorator->createNewModel($request->all());
        if ($newUser == null) {
            return response([
                'Message' => 'Register failed'
            ], 200);
        }
        $request->session()->put('user_id', $newUser['id']);
        return response([
            'Message' => 'Register successfully',
            'User' => $newUser
        ], 200);
    }

    public function login(UserLoginRequest $request)
    {
        /**
         * @var UserService $userService
         */
        $userService = $this->getService();
        $registerDecorator = new LoginDecorator($userService);
        $user = $registerDecorator->getModel($request->all(), 0);
        if ($user == null) {
            return response([
                'Message' => 'Invalid username or password'
            ],200);
        }
        $request->session()->put('user_id', $user['id']);
        return response([
            'Message' => 'Login successfully',
            'User' => $user
        ], 200);
    }

    public function logout(UserLogoutRequest $request)
    {
        $userId = $request->get('user_id');
        $sessionUserId = $request->session()->get('user_id');

        if ($sessionUserId == null || strcasecmp($sessionUserId, $userId) != 0) {
            return response(['Invalid request'], 403);
        }

        $request->session()->flush();
        return response([
            'Message' => 'Logout successfully',
        ], 200);
    }

    public function getSessionData(Request $request) {
        $userId = $request->session()->get('user_id');
        if ($userId != null) {
            return response([
                'State' => true,
                'user_id' => $userId
            ], 200);
        }
        return response([
            'State' => false,
        ], 200);
    }

    public function changePassword(UserChangePasswordRequest $request)
    {
        /**
         * @var UserService $userService
         */
        $userService = $this->getService();
        $userId = $request->session()->get('user_id');
        if ($userId != null) {
            $enhancedService = new ChangePasswordDecorator($userService);
            $checker = $enhancedService->updateModel($request->all(), 0);
            if ($checker == false) {
                /**
                 * @var Message $enhancedService
                 */
                return response([
                    'Message' => $enhancedService->getMessage(),
                ], 403);
            } else {
                return response([
                    'Message' => 'Change password successfully',
                ], 200);
            }

        } else {
            return response([
                'Message' => 'Please login first',
            ], 403);
        }


    }
}