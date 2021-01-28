<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    use HasFactory;

    protected $fillable = [
        'comentario',
    ];
    /**
     * @var mixed
     */
    private $idUsuario;
    /**
     * @var mixed
     */
    private $idPost;
    /**
     * @var mixed
     */
    private $comentario;

    public function post(){
        return $this->belongsTo(Post::class, 'idPost');
    }

    
}
