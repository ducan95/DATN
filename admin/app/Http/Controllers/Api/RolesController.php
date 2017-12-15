<?php
namespace App\Http\Controllers\Api;
use WebService\Service\Roles\RolesService;
use Illuminate\Http\Request;
/**
 * Created by PhpStorm.
 * User: rikkei
 * Date: 14/12/2017
 * Time: 10:30
 */
class RolesController extends \App\Http\Controllers\WebApiController
{	
    public function actionList()
    {	
    	return RolesService::getInstance()->list();
    }

    public function actionFind($id)
    {
        return RolesService::getInstance()->find($id);
    }

    public function actionSave(Request $request)
    {   
    	$this->validate($request,[
            'name' => 'required |min:6 |max:32'
        ],[
            'name.required' => 'please enter an name',
            'name.min' => 'name min of 6 charactor',
            'name.max' => 'name maximum of 6 charactor',
        ]);

        return RolesService::getInstance()->save($request);
    }
    
    // TODO: Implement actionUpdate() method.
    public function actionUpdate(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'required |min:6 |max:32'
        ],[
            'name.required' => 'please enter an name',
            'name.min' => 'name min of 6 charactor',
            'name.max' => 'name maximum of 6 charactor',
        ]);
        
        return RolesService::getInstance()->postUpdate($request, $id);
    }
    public function actionDelete($id)
    {	
    	return RolesService::getInstance()->delete($id);

    }
    
}