<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'titulo',
        'status',
        'descricao',
        'imagem_capa'
    ];

    public function categorias() {
        return $this->belongsToMany(Categoria::class, 'posts_categorias');
    }
}
