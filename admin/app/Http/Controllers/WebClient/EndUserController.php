<?php

namespace App\Http\Controllers\WebClient;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Category;
use App\PostCategory;
use App\Release;
use DB;
class EndUserController extends Controller
{
	public function __construct(Post $mPost, Category $mCategory, PostCategory $mPostCat, Release $mRelease){
		$this->mPost = $mPost;
		$this->mCategory = $mCategory;
		$this->mPostCat = $mPostCat;
    $this->mRelease = $mRelease;
	}

  public function index(){
  	return view('client.index');
  }

  public function cat($slug,$id){ //truyen id cua danh muc tin
  	$arPosts =	DB::table('post_category')->join('posts', function($join) {
                  $join->on('posts.id_post', '=', 'post_category.id_post');  })
                ->join('categories', function($join) {
                  $join->on('post_category.id_category', '=', 'categories.id_category');  })->where('post_category.id_category','=',$id)->select('categories.id_category', 'posts.id_post','content','thumbnail_path','title','time_begin')->get();
                /*dd($arPosts);
                die();*/
    $cat = $this->mCategory->getItem($id);
  	return view('client.category.index', compact('arPosts','id','cat'));
  }

  public function loadmore(Request $request){
    $current_page = $request->current_page;
    $id = $request->id;
    $arPosts = DB::table('post_category')->join('posts', function($join) {
                  $join->on('posts.id_post', '=', 'post_category.id_post');  })
                ->join('categories', function($join) {
                  $join->on('post_category.id_category', '=', 'categories.id_category');  })->where('post_category.id_category','=',$id)->select('categories.id_category', 'posts.id_post','content','thumbnail_path','title','time_begin','posts.slug')->get();
    $totalRecord = count($arPosts);
    $row_count = 4;
    $totalPage = ceil($totalRecord/$row_count);
    $current_page += 1;
    $offset = ($current_page - 1) * $row_count;
    $arPostsLoad = DB::table('post_category')->join('posts', function($join) {
                  $join->on('posts.id_post', '=', 'post_category.id_post');  })
                ->join('categories', function($join) {
                  $join->on('post_category.id_category', '=', 'categories.id_category');  })->where('post_category.id_category','=',$id)->select('categories.id_category', 'posts.id_post','content','thumbnail_path','title','time_begin','posts.slug')->skip($offset)->take(4)->get();
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

  public function detail($slug, $id = 0){
    $oItem = $this->mPost->getItem($id);
    $id_post =  $oItem->id_post;
    $arCatFirst = DB::table('post_category')->where('id_post','=',$id_post)->select('id_category')->take(1)->get();
    $id_cat =0;
    foreach ($arCatFirst as $value) {
      $id_cat = $value->id_category;
      break;
    }
    $arFourPostsOfCat = DB::table('post_category')->join('posts', function($join) {
                  $join->on('posts.id_post', '=', 'post_category.id_post');  })
                ->join('categories', function($join) {
                  $join->on('post_category.id_category', '=', 'categories.id_category');  })->where('post_category.id_category','=',$id_cat)->select('categories.id_category', 'posts.id_post','content','thumbnail_path','title','time_begin','posts.slug')->skip(0)->take(4)->get();
    return view('client.detail', compact('oItem','id_cat','arFourPostsOfCat'));
  }

  public function release(){
    $oItems = DB::table('release_numbers')->get();
    return view('client.release.index',compact('oItems'));
  }

  public function loadmoreRelease(Request $request){
    $current_page = $request->current_page;
    $oItems = DB::table('release_numbers')->get();
    $totalRecord = count($oItems);
    $row_count = 6;
    $totalPage = ceil($totalRecord/$row_count);
    $current_page += 1;
    $offset = ($current_page - 1) * $row_count;
    $oItemsLoad = DB::table('release_numbers')->skip($offset)->take(6)->get();
    echo '<div class="loadmore-'.$current_page.'">';
    if(isset($oItemsLoad)){
      foreach($oItemsLoad as $oItem){
        $picture = $oItem->image_release_path;
        $picUrl = asset('storage/imageDefault/'.$picture);
        $id_release_number = $oItem->id_release_number;
        $url = route('WebClientReleasePostOfRelease',['id'=>$id_release_number]);
        echo 
          '<div class="col-md-4 col-sm-4 col-lg-4 col-xs-6">';
          echo '<div class="custom-list-item">';
            echo '<a href="'.$url.'" class="link-gray">';
              echo '<div class="custom-list-item-thumbnail large" style="background-image:'; echo "url('".$picUrl."');"; echo 'height: 261.842px;">;';
                echo '<img src="https://s3-ap-northeast-1.amazonaws.com/cdn.friday.kodansha.ne.jp/media/2017/12/27/cover2017-12-27-3_s.jpg" class="hidden">';
              echo '</div>
              <span class="text-limit">Ngày tháng</span>
            </a>
          </div>
        </div>';
      }
      if($current_page < $totalPage){
        echo 
          '</div>
          <div class="loaibo col-md-12 col-sm-12 col-lg-12 col-xs-12">
            <a class="btn-loadmore" href="javascript:void(0)" onclick="loadmore('. $current_page.')"><i class="fa fa-plus"></i>もっと見る</a>
          </div>';
      }
    }
  }

  public function postOfRelease($id){
    $arPosts = DB::table('posts')->where('id_release_number','=',$id)->get();
    $release_number = $this->mRelease->getItem($id);
    return view('client.release.postOfRelease',compact('arPosts','release_number'));
  }
}
