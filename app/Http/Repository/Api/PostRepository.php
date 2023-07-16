<?php

namespace App\Http\Repository\Api;

use App\Models\Post;


class PostRepository
{
    public function get_posts(){
        $posts = Post::paginate(5);
       return $posts;

    }


    public function show_post($data){
        $post = Post::findOrFail($data);
       return $post;

    }

    public function create_post($data){
    

        $post = Post::create([
            'title_ar' => $data['title_ar'],
            'title_en' => $data['title_en'],
            'description_ar' => $data['description_ar'],
            'description_en' => $data['description_en'],
            'user_id' => $data['user_id']
        ]);
     return $post;

    }

     public function update_post($data,$id){


         $post = Post::where('id',$id)->first();
         $post->update([
            'title_ar' => $data['title_ar'],
             'title_en' => $data['title_en'],
             'description_ar' => $data['description_ar'],
             'description_en' => $data['description_en'],
             'user_id' => $data['user_id']
        ]);
    
      return $post;

     }
    public function delete_post($id){
        $post = Post::find($id);
        if(isset($post)){  
            $post->delete();
            return true; 
           }
           return false;
          }

    }



 

