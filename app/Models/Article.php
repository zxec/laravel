<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body',
        'published_at',
        'user_id',
    ];

    protected $dates = ['published_at'];

    protected function scopePublished(Builder $query): void
    {
        $query->where('published_at', '<=', Carbon::now());
    }

    protected function scopeUnPublished(Builder $query): void
    {
        $query->where('published_at', '>', Carbon::now());
    }

    protected function publishedAt(): Attribute
    {
        return Attribute::make(
            get: fn ($date) => Carbon::parse($date)->toDateString(),
            set: fn ($date) => Carbon::createFromFormat('Y-m-d', $date),
        );
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
