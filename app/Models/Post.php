<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    protected $table = 'posts';

    protected $fillable = [
        'user_id',
        'title',
        'content',
        'image_url'
    ];

    protected $primaryKey = 'id';
    protected $keyType = 'integer';

    protected $required = [
        'user_id',
        'title',
        'content',
    ];
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public $timestamps = false;


    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class, 'post_id', 'id');
        // hasMany(ModelRelacionado, clave_foránea, clave_local)
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

}
