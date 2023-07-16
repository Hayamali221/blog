<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
   
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'title_en' => $this->title_en ?? '',
            'title_ar' => $this->title_ar ?? '',
            'description_en' => $this->description_en ?? '',
            'description_ar' => $this->description_ar ?? '',
            'write_by'=>$this->user->name??''
        ];
    }
}
