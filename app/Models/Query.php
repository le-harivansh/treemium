<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Query extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name', 'email', 'tel', 'message', 'resolved_at',
    ];

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }
}
