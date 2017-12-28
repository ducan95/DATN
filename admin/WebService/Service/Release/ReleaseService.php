<?php
namespace WebService\Service\Release;
use WebService\Repository\Release\ReleaseRepository;
use WebService\Service\Service;

/**
*
 */
class ReleaseService extends Service
{

  /**
   * Find release number
   * @param  [$request]
   * @return [$res]
   */
  public function find($request)
  {
    try {
      $dataReq = [];

      if (!empty($request->query('name'))) {
        $dataReq['name'] = $request->query('name');
      }
      if (!empty($request->query('image_release_path'))) {
        $dataReq['image_release_path'] = $request->query('image_release_path');
      }
      if (!empty($request->query('image_header_path'))) {
        $dataReq['image_header_path'] = $request->query('image_header_path');
      }

      $res['data'] = ReleaseRepository::getInstance()->find($dataReq);

    } catch(\Exception $e) {
      $res['errors']['msg'] = $e->getMessage();
      $res['errors']['status_code'] = 500;
    }

    return $res;
  }


  public function findOne($id)
  {
    // TODO: Implement findOne() method.
  }
  
  public function save($request)
  {
    // TODO: Implement save() method.
  }

  public function update($request , $id)
  {
    // TODO: Implement update() method.
  }

  public function delete($id)
  {
    // TODO: Implement delete() method.
  }

  
}