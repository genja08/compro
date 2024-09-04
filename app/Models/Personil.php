<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personil extends Model
{
    use HasFactory;
    protected $table = 'personil';
    protected $guarded = ['id'];

    public function gambar()
    {
        return asset('storage/' . $this->gambar);
    }
}
