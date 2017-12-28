<?php
namespace App\Http\Controllers\Api\src;
use WebService\Service\Roles\RolesService;
use Illuminate\Http\Request;
use Extention\ApiRequest;
use Extention\Api;
use App\Http\Controllers\Api\WebApiController as WebApiController; 
/**
 * Created by PhpStorm.
 * User: rikkei
 * Date: 14/12/2017
 * Time: 10:30
 */
class RolesController extends WebApiController
{	
  
  // public function actionList()
  // {	
  //   return RolesService::getInstance()->list();
  // }


  /**
   * search Role by keyword
   *
   * @param  Request $request
   * @return Response
   */  
  public function actionFind( Request $request )
  { 
    $res = RolesService::getInstance()->find($request); 
    if (!isset($res['errors'])) {
      return Api::response([ 'data' => $res['data']]);
    } else {
      return Api::response([ 
        'is_success'  => false,
        'status_code' => $res['errors']['status_code'],
        'errors'      => $res['errors']['msg']
      ]);
    }
  }

  public function actionFindOne($id)
  {
    return RolesService::getInstance()->findOne($id);
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