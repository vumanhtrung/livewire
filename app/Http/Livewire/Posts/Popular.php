<?php

namespace App\Http\Livewire\Posts;

use App\Models\Post;
use CyrildeWit\EloquentViewable\Support\Period;
use Livewire\Component;

class Popular extends Component
{
    public int $selectedDuration = 7;

    public array $periods = [
        1 => 'Today',
        7 => 'Last 7 days',
        14 => 'Last 14 days',
        28 => 'Last 28 days',
    ];

    public function getPostsProperty()
    {
        return Post::query()
            ->orderByViews('desc', Period::pastDays($this->selectedDuration))
            ->get();
    }

    public function render()
    {
        return view('livewire.posts.popular')->layout('layouts.app');
    }

}
