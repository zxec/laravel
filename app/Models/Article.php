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
        'published_at'
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
            set: fn ($date) => Carbon::createFromFormat('Y-m-d', $date),
        );
    }
}
