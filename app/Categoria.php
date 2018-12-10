<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $fillable = [
        'titulo',
        'status',
        'descricao'
    ];

    public function posts() {
        return $this->belongsToMany(Post::class, 'posts_categorias');
    }
}
