<?php

namespace App\Http\Livewire\Query;

use App\Models\Query;
use Illuminate\Support\Collection;
use Livewire\Component;
use Livewire\WithPagination;

class Show extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.query.show')
            ->layout('layouts.app')
            ->with([
                'queries' => Query::paginate(10),
            ]);
    }
}
