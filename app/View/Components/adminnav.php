<?php

namespace App\View\Components;

use App\Models\Post;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class adminnav extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $queue = Post::latest()->withRichText('body')->filter(request(['search', 'category']))->where('approved', '=', false)->count();
        return view('components.adminnav', [
            'queue' => $queue,
        ]);
    }
}
