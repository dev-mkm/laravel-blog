<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Comment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['post_id', 'user_id', 'reply_id', 'content'];

    /**
     * Get the writer of the comment.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the post.
     */
    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }

    /**
     * Get the comment's replies.
     */
    public function replies(): HasMany
    {
        return $this->hasMany(Comment::class, 'reply_id');
    }

    /**
     * Get the comment's parent.
     */
    public function parent(): BelongsTo
    {
        return $this->belongsTo(Comment::class, 'reply_id')->withDefault();
    }

    /**
     * Scope a query to only include main components.
     */
    public function scopeMain(Builder $query): void
    {
        $query->where('reply_id', null);
    }
}
