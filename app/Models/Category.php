<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'category'; 

    protected $fillable = [
        'image',
        'text',
    ];

    public function locks() {
        return $this->hasMany(Lock::class, 'FkIdCategory'); 
    }


}
