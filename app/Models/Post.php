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
        'excerpt',
        'category',
        'category_id',
        'updated_at'

    ];
    protected $casts = [
        'title'            => CleanHtml::class, // cleans both when getting and setting the value
        'body'    => CleanHtmlInput::class, // cleans when setting the value
    ];

//    TODO: The search broke due to the rich text editor, to fix this I need to have it search the rich text column. Need to do more research.
    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            $query->where('title', 'like', '%' . $search . '%')
                ->orwhere('body', 'like', '%' . $search . '%')
                ->orwhere('author', 'like', '%' . $search . '%');
        });
        $query->when($filters['category'] ?? false, function ($query, $search) {
            $query->where('category', 'like', '%' . $search . '%');

        });
    }

    protected $richTextFields = [
        'body',
        'title'
    ];
}
