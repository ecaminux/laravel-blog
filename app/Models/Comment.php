<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    protected $table = 'comments';
    protected $fillable = [
        'post_id',
        'user_id',
        'content'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public $timestamps = false;


    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class, 'post_id', 'id');
        // belongsTo(ModelRelacionado, clave_foránea, clave_local)
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
        // belongsTo(ModelRelacionado, clave_foránea, clave_local)
    }

}
