<?php

namespace App\Api\V1\Transformers;

use Carbon\Carbon;
use App\Models\Post;
use League\Fractal\TransformerAbstract;

class PostTransformer extends TransformerAbstract {

    public function transform(Post $post){
   

        return [
        		'id' => (int) $post->id,
				'name' => (string) $post->name,
				'body' => (string)  $post->body,
               
        ];

    }

}