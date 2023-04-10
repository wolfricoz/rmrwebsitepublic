<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Mews\Purifier\Casts\CleanHtml;
use Mews\Purifier\Casts\CleanHtmlInput;
use Tonysm\RichTextLaravel\Models\Traits\HasRichText;

class Post extends Model
{
    use HasFactory;
    use HasRichText;

    protected $fillable = [
        'id',
        'user_id',
        'title',
        'author',
        'body',
        'bodysearch',
        'excerpt',
        'category',
        'category_id',
        'updated_at',
        'approved'

    ];
    protected $casts = [
        'body'    => CleanHtmlInput::class, // cleans when setting the value
    ];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            $query->where(fn($query)=>
            $query->where('title', 'like', '%' . $search . '%')
                ->orwhere('bodysearch', 'like', '%' . $search . '%')
                ->orwhere('author', 'like', '%' . $search . '%')
            );

        });
        $query->when($filters['category'] ?? false, function ($query, $search) {
            $query->where('category', 'like', '%' . $search . '%');

        });
    }

    protected $richTextFields = [
        'body',
    ];
}
