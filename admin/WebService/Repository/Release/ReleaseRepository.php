<?php
namespace WebService\Repository\Release;
use WebService\Repository\Repository;
use App\Release;

/**
*
 */
class ReleaseRepository extends Repository
{

	public function find($dataReq = '') 
	{ 
    try {
      $query   = Release::where('is_deleted', '=', false); 
     /* $dataMol = ['name', 'image_release_path', 'image_header_path'];
      if (!empty($dataReq)) {
        foreach ($dataReq as $value) {
          if (isset($dataReq[$value])) {
            if (is_string($dataReq[$value])) {
            
            }
          }
        }
      }*/
      return $query->get();
    } catch(\Exception $e) {
      throw $e;
    }

  }

  public function findOne($id)
  {
    
  }

  public function save($request)
  {	
  
  }

	public function update($request, $id)
	{
	    
	}

  public function delete($id)
  {	
  	
  }

    


}