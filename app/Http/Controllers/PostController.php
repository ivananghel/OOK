<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Post;
use App\Models\Like;
use Auth;
class PostController extends Controller
{
	public function Post()
	{
		$posts = Post::orderBy('created_at', 'desc')->get();

		foreach ($posts as &$value) {

			$value->countlike 		= Like::where(['like' => '1','post_id' => $value->id])->get()->count();
			$value->countdislike 	= Like::where(['like' => '0','post_id' => $value->id])->get()->count();
			$value ->btnlike 		= (Auth::user()->likes()->where('post_id', $value->id)->first() && Auth::user()->likes()->where('post_id', $value->id)->first()->like == 1 ? 'You like this post'  : 'Like');  
			$value->btnunlike 		= (Auth::user()->likes()->where('post_id', $value->id)->first() && Auth::user()->likes()->where('post_id', $value->id)->first()->like == 0 ? 'You don\'t like this post' : 'Dislike');
		}
		return view('post.index', ['post' => $posts]);
	}

	public function attachLink($id)
	{

		$post = Post::findOrFail($id);
		 return view('post.attach',[
            'post'          => $post,
        ]);

	}
	public function updateLink(Request $request, $id)
	{

		$input = $request->all();
		$post = Post::findOrFail($id);

		if(!self::identify_service($input['link'])){

			return response()->view('message.error',array('errors' => trans('Add link youtube')));
		}

		$youtube_url_keys = array('v','vi');
		// Try to get ID from url parameters
		$key_from_params = self::parse_url_for_params($input['link'], $youtube_url_keys);

		if ($key_from_params){
			$post->link_id = $key_from_params;
			$post->save();
			
		}else{
			return response()->view('message.error',array('errors' => trans('Erorr parse_url')));
		}  

		return response()->view('message.success', array('message' => trans('Save Link'),'redirect'=>'post' ));

	}


	private static function identify_service($url)
	{
		if (preg_match('%(?:https?:)?//(?:(?:www|m)\.)?(youtube(?:-nocookie)?\.com|youtu\.be)\/%i', $url)) {
			return true;
		}
		
		return false;
		
	}

	private static function parse_url_for_params($url, $target_params)
	{
		parse_str( parse_url( $url, PHP_URL_QUERY ), $my_array_of_params );
		foreach ($target_params as $target) {
			if (array_key_exists ($target, $my_array_of_params)) {
				return $my_array_of_params[$target];
			}
		}
		return null;
	}


	public function postLikePost(Request $request)
	{
		$post_id = $request['postId'];
		$is_like = $request['isLike'];
		$update = false;
		$delete = true;
		$post = Post::find($post_id);
		if (!$post) {
			return null;
		}
		$user = Auth::user();
		$like = $user->likes()->where('post_id', $post_id)->first();

		if ($like) {
			$update = true;
			if ($like->like == $is_like) {
				$like->delete();
				$countlike = Like::where(['like' => 1,'post_id' => $post_id])->get()->count();
				$countdislike = Like::where(['like' => 0,'post_id' => $post_id])->get()->count();
				$btnlike = (Auth::user()->likes()->where('post_id', $post_id)->first() && Auth::user()->likes()->where('post_id', $post_id)->first()->like == 1 ? 'You like this post'  : 'Like');  
				$btnunlike = (Auth::user()->likes()->where('post_id', $post_id)->first() && Auth::user()->likes()->where('post_id', $post_id)->first()->like == 0 ? 'You don\'t like this post' : 'Dislike');
				echo json_encode(['countlike'=> $countlike,'countdislike'=> $countdislike,'btnlike'=>$btnlike , 'btnunlike'=>$btnunlike]);
				return ;
			}
		} else {

			$like = new Like();
			
		}
		$like->like = $is_like;
		$like->user_id = $user->id;
		$like->post_id = $post->id;
		$update ? $like->update() : $like->save() ; 

		$countlike = Like::where(['like' => 1,'post_id' => $post_id])->get()->count();
		$countdislike = Like::where(['like' => 0,'post_id' => $post_id])->get()->count();
		$btnlike = (Auth::user()->likes()->where('post_id', $post_id)->first() && Auth::user()->likes()->where('post_id', $post_id)->first()->like == 1 ? 'You like this post'  : 'Like');  
		$btnunlike = (Auth::user()->likes()->where('post_id', $post_id)->first() && Auth::user()->likes()->where('post_id', $post_id)->first()->like == 0 ? 'You don\'t like this post' : 'Dislike');

		echo json_encode(['countlike'=> $countlike,'countdislike'=> $countdislike,'btnlike'=>$btnlike , 'btnunlike'=>$btnunlike]);
	}
}
