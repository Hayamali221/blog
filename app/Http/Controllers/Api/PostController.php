<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use App\Traits\ApiTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\PostRequest;
use App\Http\Resources\Api\PostResource;
use App\Http\Repository\Api\PostRepository;
use App\Http\Requests\Api\CreatePostRequest;
use App\Http\Requests\Api\UpdatePostRequest;

class PostController extends Controller
{
    use ApiTrait;


    private PostRepository $postRepository;

    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }
 
    public function index()
    {
        
        $elements=$this->postRepository->get_posts(); 
       return $this->returnData('data',PostResource::collection($elements) ,"Show Posts");
    }

   
    public function store(PostRequest $request)
    {
        $element=$this->postRepository->create_post($request);  
        return $this->returnData('data',new PostResource($element) ,"Post Created Success ");
    }

    public function show($id)
    {
        $element=$this->postRepository->show_post($id);
       return $this->returnData('data',new PostResource($element) ,"Show Post");
    }

  
    public function update(PostRequest $request,$id)
    {
        $element=$this->postRepository->update_post($request,$id);  
       
        return $this->returnData('data',new PostResource($element) ,"Post Updated Success "); 
    }


    public function destroy($id)
    {
        $element=$this->postRepository->delete_post($id); 
        if($element ==true){
            return $this->returnSuccessMessage('data',"Post Deleted Success ");
        }else{
             return $this->returnSuccessMessage('data',"Post Already Deleted");
          } 
       
    }
}
