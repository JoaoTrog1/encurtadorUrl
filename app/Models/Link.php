<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    use HasFactory;

    protected $table = 'link';

    protected $fillable = ['link', 'description'];

    public function locks() {
        return $this->hasMany(Lock::class, 'FkIdLink'); // A chave estrangeira no modelo Lock
    }
}

