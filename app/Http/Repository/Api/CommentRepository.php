<?php

namespace App\Http\Repository\Api;

use App\Models\Comment;


class CommentRepository
{
    public function get_comments(){
        $comments = Comment::paginate(5);
       return $comments;

    }


    public function show_comment($data){
        $comment = Comment::findOrFail($data);
       return $comment;

    }

    public function create_comment($data){
    

        $comment = Comment::create([
            'body' => $data['body'],
            'post_id' => $data['post_id'],
            'user_id' => $data['user_id']
        ]);
     return $comment;

    }

     public function update_comment($data,$id){


         $comment = Comment::where('id',$id)->first();
         $comment->update([
            'body' => $data['body'],
            'post_id' => $data['post_id'],
             'user_id' => $data['user_id']
        ]);
    
      return $comment;

     }
    public function delete_comment($id){

        $comment = Comment::find($id);
    
     if(isset($comment)){
         
      $comment->delete();
      return true; 
     }
     return false;
    }



 
}
