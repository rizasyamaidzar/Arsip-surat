<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    /** @use HasFactory<\Database\Factories\SuratFactory> */
    use HasFactory;
    protected $fillable = [
        'number',
        'title',
        'file',
        'category_id',
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
