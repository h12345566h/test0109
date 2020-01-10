<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserService;
use Auth;
use Validator;

class UserController extends Controller
{
    public function __construct()
    {
        $this->userService = new UserService();
    }

    //region 註冊
    public function create(Request $request)
    {
        $postData = $request->all();
        $objValidator = Validator::make(
            $postData,
            [
                'Account' => 'required|unique:users|max:50',
                'Password' => 'required|max:50'
            ],
            [
                'Account.*' => '輸入帳號不符合規定',
                'Password.*' => '輸入密碼不符合規定'
            ]
        );

        $resultData['Code']=0;
        $resultData['Message']="";

        if ($objValidator->fails()){
            $resultData['Message']=$objValidator->errors()->first();
            $result['IsOK'] =false;
            $resultData['Result']=$result;
            return response()->json($resultData, 400, [], JSON_UNESCAPED_UNICODE);
        }

        $serviceResult = $this->userService->create($postData);

        if ($serviceResult==""){
            $result['IsOK'] =true;
            $resultData['Result']=$result;
            return response()->json($resultData, 200, [], JSON_UNESCAPED_UNICODE);
        }else{
            $result['IsOK']=false;
            $resultData['Result']=$result;
            $resultData['Message']=$serviceResult;
            return response()->json($resultData, 400, [], JSON_UNESCAPED_UNICODE);
        }
    }
    //endregion


    //region 刪除user
    public function delete(Request $request)
    {
        $postData = $request->all();
        $objValidator = Validator::make(
            $postData,
            [
                'Account' => 'required|max:50'
            ],
            [
                'Account.*' => '輸入帳號不符合規定'
            ]
        );
        $resultData['Code']=0;
        $resultData['Message']="";

        if ($objValidator->fails()){
            $resultData['Message']=$objValidator->errors()->first();
            $result['IsOK'] =false;
            $resultData['Result']=$result;
            return response()->json($resultData, 400, [], JSON_UNESCAPED_UNICODE);
        }

        $serviceResult = $this->userService->delete($postData);

        if ($serviceResult==""){
            $result['IsOK'] =true;
            $resultData['Result']=$result;
            return response()->json($resultData, 200, [], JSON_UNESCAPED_UNICODE);
        }else{
            $result['IsOK']=false;
            $resultData['Result']=$result;
            $resultData['Message']=$serviceResult;
            return response()->json($resultData, 400, [], JSON_UNESCAPED_UNICODE);
        }
    }
    //endregion


    //region 修改
    public function change(Request $request)
    {
        $postData = $request->all();
        $objValidator = Validator::make(
            $postData,
            [
                'Account' => 'required|max:50',
                'Password' => 'required|max:50'
            ],
            [
                'Account.*' => '輸入帳號不符合規定',
                'Password.*' => '輸入密碼不符合規定'
            ]
        );

        $resultData['Code']=0;
        $resultData['Message']="";

        if ($objValidator->fails()){
            $resultData['Message']=$objValidator->errors()->first();
            $result['IsOK'] =false;
            $resultData['Result']=$result;
            return response()->json($resultData, 400, [], JSON_UNESCAPED_UNICODE);
        }

        $serviceResult = $this->userService->change($postData);

        if ($serviceResult==""){
            $result['IsOK'] =true;
            $resultData['Result']=$result;
            return response()->json($resultData, 200, [], JSON_UNESCAPED_UNICODE);
        }else{
            $result['IsOK']=false;
            $resultData['Result']=$result;
            $resultData['Message']=$serviceResult;
            return response()->json($resultData, 400, [], JSON_UNESCAPED_UNICODE);
        }
    }
    //endregion

    //region 登入
    public function login(Request $request)
    {
        $postData = $request->all();
        $objValidator = Validator::make(
            $postData,
            [
                'Account' => 'required|max:50',
                'Password' => 'required|max:50'
            ],
            [
                'Account.*' => '輸入帳號不符合規定',
                'Password.*' => '輸入密碼不符合規定'
            ]
        );

        $resultData['Code']=0;
        $resultData['Message']="";
        $resultData['Result']=null;

        if ($objValidator->fails()){
            $resultData['Code']=2;
            $resultData['Message']=$objValidator->errors()->first();
            return response()->json($resultData, 400, [], JSON_UNESCAPED_UNICODE);
        }

        $serviceResult = $this->userService->login($postData);

        if ($serviceResult==""){
            return response()->json($resultData, 200, [], JSON_UNESCAPED_UNICODE);
        }else{
            $resultData['Code']=2;
            $resultData['Message']=$serviceResult;
            return response()->json($resultData, 400, [], JSON_UNESCAPED_UNICODE);
        }
    }
    //endregion

}
