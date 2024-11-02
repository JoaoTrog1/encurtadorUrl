<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lock extends Model 
{
    use HasFactory;

    protected $table = 'lock'; 

    protected $fillable = [
        'FkIdLink', 
        'FkIdCategory',
    ];

    public function category() {
        return $this->belongsTo(Category::class, 'FkIdCategory');
    }
 
    public function link()
    {
        return $this->belongsTo(Link::class, 'FkIdLink');
    }

    
    
}

