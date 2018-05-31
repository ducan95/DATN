<?php

namespace WebService\Repository\Release;

use App\Release;
use WebService\Repository\Repository;
use DB;

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
      $query   = Release::where('id_release_number', '>', 0); 
      $dataMol = ['name', 'image_release_path'];
      
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
      $query = $query->orderBy('id_release_number', 'DESC'); 
      if(!empty($dataReq['paginate'])) {
        return $query->paginate($dataReq['paginate']); 
      }  

      return $query->paginate(5); 
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
      return Release::where('id_release_number', '=', $id)->first();
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
    try{
      $release = new Release();
      $release->fill([
        'name'               => $dataReq['name'],
        'image_release_path' => $dataReq['image_release_path']
      ]);
      $release->save() ;
      return $release;
    } catch(\Exception  $e) { 
      return $e->getMessage();
      throw  $e;  
    }
  }

  /**
   * [Update release number]
   * @param  [type] $dataReq [description]
   * @param  [type] $id      [description]
   * @return [type]          [description]
   */
	public function update($dataReq, $id)
	{
	 try {
    $release = Release::find($id);
    if (!empty($release)) {
      $release->fill([
        'name'               => $dataReq['name'],
        'image_release_path' => $dataReq['image_release_path']
      ]);

      $release->save();
      return $release;
    } else {
      return null;
    }

   } catch(\Exception $e) {
    throw $e;
   }
	}

  /**
   * [Delete release number]
   * @param  [type] $id [description]
   * @return [type]     [description]
   */
  public function delete($id)
  {	
  	try {
      if (!empty(Release::find($id))) {
        $release = Release::find($id);
        $release->delete();
      } else {
        return null;
      }
    } catch(\Exception $e) {
      throw $e;
    }
  }

  public function list(){
    try{
      return DB::table('release_numbers')->orderBy('id_release_number','DESC')->get();
    } catch(\Exception $e){
      throw $e;
    }
  }

  public function listOne($id){
    try{
      return Release::findOrFail($id);
    } catch(\Exception $e){
      throw $e;
    }
  }

  public function loadmoreRelease($offset, $row_count){
    try{
      $oItemsLoad = DB::table('release_numbers')->orderBy('id_release_number','DESC')->skip($offset)->take($row_count)->get();
      return $oItemsLoad;
    } catch(\Exception $e){
      throw $e;
    }
  }

  public function postOfRelease($id){
    try{
      $a=DB::table('posts')->where('id_release_number','=',$id)->where('is_acept','=',1)->where('deleted_at','=',null)->get();
      return $a;
    } catch(\Exception $e){
      throw $e;
    }
  }

  public function loadmorePostOfRelease($offset, $row_count, $id){
    try{
      $arPostsLoad = DB::table('posts')->skip($offset)->take($row_count)->where('is_acept','=',1)->where('deleted_at','=',null)->where('id_release_number','=',$id)->get();
      return $arPostsLoad;
    } catch(\Exception $e){
      throw $e;
    }
  }

  public  function release($value='')
  {
    # code...
  }
}