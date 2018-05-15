<?php
namespace App\Http\Controllers\Api\src;
use WebService\Service\Comment\CommentService;
use Illuminate\Http\Request;
use Extention\ApiRequest;
use Extention\Api;
use App\Http\Controllers\Api\WebApiController as WebApiController; 

class CommentController extends WebApiController
{ 
    public function actionSave(Request $request){

    }
    public function actionUpdate(Request $request, $id){

    }
    public function actionDelete($id){

    }
    public function actionFind(Request $request){

    }
    public function actionFindOne($id){

    }
    public function getcomment(){
        $res =  CommentService::getInstance()->getAllComment();
        if(!isset($res['errors'])) {
        return Api::response([ 'data' => $res['data'], 'status_code' => 204]);
        }else {
        return Api::response([ 
            'is_success' => false,
            'status_code' => $res['errors']['status_code'],
            'errors' => $res['errors']['msg']
        ]);
        }
    }
    public function addcomment(Request $request){
        dd($request);die();
        $res =  CommentService::getInstance()->save($request);
        if(!isset($res['errors'])) {
        return Api::response([ 'data' => $res['data'], 'status_code' => 204]);
        }else {
        return Api::response([ 
            'is_success' => false,
            'status_code' => $res['errors']['status_code'],
            'errors' => $res['errors']['msg']
        ]);
        }

    }

}