<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 2020/1/10
 * Time: 上午 03:12
 */

namespace App\Services;

use App\Users as UserEloquent;

//use Hash;

class UserService
{
    public function create($postData)
    {
//        $postData['Password'] = bcrypt($postData['Password']);
        try {
            UserEloquent::create($postData);
            return "";
        } catch (Exception $e) {
            throw $e->getMessage();
        }
    }

    public function delete($postData)
    {
        $user = UserEloquent::find($postData['Account']);
        if ($user) {
            try {
                $user->delete();
                return "";
            } catch (Exception $e) {
                throw $e->getMessage();
            }
        } else {
            return "查無該帳號";
        }
    }

    public function change($postData)
    {
        $user = UserEloquent::find($postData['Account']);
        if ($user) {
            $user->Password = $postData['Password'];
            try {
                $user->save();
                return "";
            } catch (Exception $e) {
                throw $e->getMessage();
            }
        } else {
            return "查無該帳號";
        }
    }

    public function login($postData)
    {
        $user = UserEloquent::find($postData['Account']);
        if ($user) {
            if ($postData['Password'] == $user->Password) {
                return "";
            } else {
                return "帳號密碼不相符";
            }
        } else {
            return "查無該帳號";
        }
    }

}