<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table='posts';
    public $timestamps = true;
    protected $fillable=['title_en','title_ar','description_ar','description_en','user_id'];
 

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
    

}
