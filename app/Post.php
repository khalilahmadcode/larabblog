<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // Table Name
    protected $table  = 'posts'; 

    // Primary Key 
    public $primaryKey = 'id'; 

    // Time Stamp
    public $timeStamp = true; 

    protected $fillable = ['title', 'body']; 

    // Relationship with User
    public function user() {
        return $this->belongsTo('App\User'); 
    }
}
