<?php
namespace WebService\Repository\Release;
use WebService\Repository\Repository;
use App\Release;

/**
 * Created by Quyen Luu.
 * Date: 28/12/2017
 * Time: 12:03
 */
class ReleaseRepository extends Repository
{
  /**
   * [ Find release number ]
   * @param  string $dataReq [description]
   * @return [type]          [description]
   */
	public function find($dataReq = '') 
	{ 
    try {
      $query   = Release::where('is_deleted', '=', false); 
      $dataMol = ['name', 'image_release_path', 'image_header_path'];
      
      if (!empty($dataReq)) {
        foreach ($dataReq as $value) {
          if (isset($dataReq[$value])) {
            if (is_string($dataReq[$value])) {
              $query = $query->where($value, 'LIKE', '%'.$dataReq[$value].'%' );
            } else {
              $query = $query->where($value, '=', $dataReq[$value] );
            }
          }
        }
      }

      if(!empty($dataReq['paginate'])) {
        return $query->paginate($dataReq['paginate']); 
      }

      return $query->get();

    } catch(\Exception $e) {
      throw $e;
    }

  }

  /**
   * [ Find one release number ]
   * @param  [type] $id [description]
   * @return [type]     [description]
   */
  public function findOne($id)
  {
    try {
      return Release::where('id_release', '=', $id)->where('is_deleted', '=', false)->first();
    } catch(\Exception $e) {
      throw $e;
    } 
  }

  /**
   * [ Add new release number ]
   * @param  [type] $dataReq [description]
   * @return [object]        [description]
   */
  public function save($dataReq)
  {	
    try {
      $release = new Release();
      $release->fill([
        'name'               => $dataReq['name'],
        'image_release_path' => $dataReq['image_release_path'],
        'image_header_path'  => $dataReq['image_header_path'],
        'is_deleted'         => false
      ]);
      $release->save();

      return $release;

    } catch(\Exception $e) {
      throw $e;
    }
  
  }

	public function update($request, $id)
	{
	    
	}

  public function delete($id)
  {	
  	
  }

    


}