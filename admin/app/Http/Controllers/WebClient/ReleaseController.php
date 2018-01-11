<?php

namespace App\Http\Controllers\WebClient;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Release;
use App\Post;
use App\PostCategory;
use App\Category;
use DB;

class ReleaseController extends Controller
{
	public function __construct(Post $mPost, Category $mCategory, PostCategory $mPostCat, Release $mRelease){
		$this->mPost = $mPost;
		$this->mCategory = $mCategory;
		$this->mPostCat = $mPostCat;
    $this->mRelease = $mRelease;
	}
  public function postOfRelease($id){
    $arPosts = DB::table('posts')->where('id_release_number','=',$id)->get();
    $release_number = $this->mRelease->getItem($id);
    return view('client.release.postOfRelease',compact('arPosts','release_number','id'));
  }

  public function loadmorePostOfRealease(Request $request){
    $current_page = $request->current_page;
    $id = $request->id; //id_release_number
    $arPosts = DB::table('posts')->where('id_release_number','=',$id)->get();
    $totalRecord = count($arPosts);
    $row_count = 4;
    $totalPage = ceil($totalRecord/$row_count);
    $current_page += 1;
    $offset = ($current_page - 1) * $row_count;
    $arPostsLoad = DB::table('posts')->where('id_release_number','=',$id)->skip($offset)->take(4)->get();
    echo '<div class="loadmore-'.$current_page.'">';
    foreach ($arPostsLoad as $post) {
      $picture = $post->thumbnail_path;
      $picUrl = asset('storage/imageDefault/'.$picture);
      $title = $post->title;
      $date = strtotime($post->time_begin);
      $slug = $post->slug;
      $id_post = $post->id_post;
      $urlDetail = route('WebClientEndUserDetail',['slug'=>$slug,'id'=> $id_post]);
      echo '<div class="media customize">
              <div class="media-left">
                <img class="media-object img-cat-mize" src="'.$picUrl.'" alt="Generic placeholder image">
              </div>
              <div class="media-body">
                <h5 class="mt-0">'.$title.'</h5>
                <span>'.format_date($post->time_begin).'</span>
                <div >
                  <a href="'.$urlDetail.'" class="label-free" >無料で読める</a>
                </div>
              </div>
            </div>';
    }
    if($current_page < $totalPage){
      echo '</div>
            <div class="loaibo">
            <a class="btn-loadmore" href="javascript:void(0)" onclick="loadmore('.$current_page.', '.$id.')"><i class="fa fa-plus"></i>もっと見る</a>
            </div>';
    }
  }
}
