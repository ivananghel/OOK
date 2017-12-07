<?php

namespace App\Api\V1\Controllers;

use App\Http\Controllers\Controller;
use App\Api\V1\Transformers\PostTransformer;
use App\Jobs\SendEmailRestorePasswordJob;
use App\Models\User;
use Dingo\Api\Routing\Helpers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Ramsey\Uuid\Uuid;
use App\Models\Post;
use App\Models\Like;

class PostController extends Controller {

    use Helpers;
	 public function post(){

		$post = Post::all();
		return $this->response->collection($post,new PostTransformer());

    }

    public function islike(Request $request)
    {
    	$input = $request->all();
    	$post_id = $input['postID'];
		$is_like = $input['isLike'];
		if(!in_array($is_like, array(0,1))){
    		 abort(403, 'Invalid Status');
    	}
		$update = false;
		$post = Post::find($post_id);
		if(!$post){
    		 abort(404, 'Invalid Post Id');
    	}
		$user = Auth::user();
		$like = $user->likes()->where('post_id', $post_id)->first();

		if ($like) {
			$update = true;
			if ($like->like == $is_like) {
				$like->delete();
				abort(200, 'Delete '. ($input['isLike'] == 1 ? 'Like' : 'Dislike') );
			}
		} else {
			$like = new Like();
		}

		$like->like = $is_like;
		$like->user_id = $user->id;
		$like->post_id = $post->id;
		$update ? $like->update() : $like->save() ;
		abort(200, 'Save ' . ($input['isLike'] == 1 ? 'Like' : 'Dislike'));

    }
    

}