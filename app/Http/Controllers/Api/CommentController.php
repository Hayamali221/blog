<?php

namespace App\Http\Controllers\Api;

use App\Traits\ApiTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CommentRequest;
use App\Http\Resources\Api\CommentResource;
use App\Http\Repository\Api\CommentRepository;

class CommentController extends Controller
{
    use ApiTrait;


    private CommentRepository $commentRepository;

    public function __construct(CommentRepository $commentRepository)
    {
        $this->commentRepository = $commentRepository;
    }
 
    public function index()
    {
        
        $elements=$this->commentRepository->get_comments(); 
       return $this->returnData('data',CommentResource::collection($elements) ,"Show Comments");
    }

   
    public function store(CommentRequest $request)
    {
        $element=$this->commentRepository->create_Comment($request);  
        return $this->returnData('data',new CommentResource($element) ,"Comment Created Success ");
    }

    public function show($id)
    {
        $element=$this->commentRepository->show_Comment($id);
       return $this->returnData('data',new CommentResource($element) ,"Show Comment");
    }

  
    public function update(CommentRequest $request,$id)
    {
        $element=$this->commentRepository->update_Comment($request,$id);  
       
        return $this->returnData('data',new CommentResource($element) ,"Comment Updated Success "); 
    }


    public function destroy($id)
    {
     $element= $this->commentRepository->delete_comment($id); 

      if($element ==true){
        return $this->returnSuccessMessage('data',"Comment Deleted Success ");  
    }else{
         return $this->returnSuccessMessage('data',"Comment Already Deleted");
      } 
      
    }
}
