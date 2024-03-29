<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Post;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{

    public function posts(): HasMany
    {
        return $this->HasMany(Post::class);
    }
}
