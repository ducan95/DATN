<?php
namespace App\Http\Controllers\Api;
use WebService\Service\User\UserService;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
/**
 * Created by PhpStorm.
 * User: rikkei
 * Date: 14/12/2017
 * Time: 10:30
 */
class UserController extends \App\Http\Controllers\WebApiController
{   
    public function actionList()
    {
        return UserService::getInstance()->list();
    }

    public function actionFind($id)
    {   
        return UserService::getInstance()->find($id);
    }

    public function actionSave(Request $request)
    {   
        $this->validate($request,[
            'username' => 'required',
            'password' => 'required',
            'email' => 'required | email  ',
            'id_role' => 'required',

        ]);

        return UserService::getInstance()->save($request);
    }

    public function actionUpdate(Request $request, $id)
    {   
        $this->validate($request,[
            'username' => 'required',
            'password' => 'required',
            'email' => 'required | email  ',
            'id_role' => 'required',

        ]);
        return UserService::getInstance()->update($request, $id);
    }
    public function actionDelete($id)
    {   
        return RolesService::getInstance()->delete($id);

    }
}