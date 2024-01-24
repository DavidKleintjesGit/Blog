<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    use HasFactory;
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function category(): BelongsTo
    {
        return $this->BelongsTo(Category::class, 'category_id');
    }
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }
    public function scopeFilter($query, array $filters): void
    {
        $query->when($filters['search'] ?? false, function ($query, $searchTerm) {
            return $query->where(function ($query) use ($searchTerm) {
                $query->where('title', 'like', '%' . $searchTerm . '%')
                    ->orWhere('body', 'like', '%' . $searchTerm . '%');
            });
        })->when($filters['category'] ?? false, function ($query, $categorySlug) {
            return $query->whereHas('category', fn($query) => $query->where('slug', $categorySlug));
        })->when(($filters['author'] ?? false), function ($query, $username) {
            return $query->whereHas('author', fn($query) => $query->where('username', $username));
        });
    }
}
