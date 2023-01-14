<?php

namespace App\Http\Livewire\Query;

use App\Models\Query;
use Livewire\Component;
use Livewire\WithPagination;

class Show extends Component
{
    use WithPagination;

    const SORT_ASCENDING = 'asc';

    const SORT_DESCENDING = 'desc';

    public string $searchString = '';

    public bool $showUnresolvedQueries = true;

    public bool $showResolvedQueries = false;

    public bool $showTrashedQueries = false;

    public string $sortDirection = self::SORT_DESCENDING;

    public $showCount = 10;

    public function toggleSortDirection(): void
    {
        $this->sortDirection = $this->sortDirection === self::SORT_ASCENDING ? self::SORT_DESCENDING : self::SORT_ASCENDING;
    }

    public function updatedSearchString(): void
    {
        $this->resetPage();
    }

    public function render()
    {
        $queries = Query::query();

        if ($this->showTrashedQueries) {
            $queries = $queries->withTrashed()->whereNotNull('deleted_at');
        }

        if ($this->showUnresolvedQueries) {
            $queries = $queries->orWhereNull('resolved_at');
        }

        if ($this->showResolvedQueries) {
            $queries = $queries->orWhereNotNull('resolved_at');
        }

        if (! $this->showTrashedQueries && ! $this->showUnresolvedQueries && ! $this->showResolvedQueries) {
            $queries = $queries->withTrashed();
        }

        if ($this->searchString) {
            $queries = $queries
                ->where('name', 'ILIKE', "%{$this->searchString}%")
                ->orWhere('email', 'ILIKE', "%{$this->searchString}%")
                ->orWhere('tel', 'ILIKE', "%{$this->searchString}%")
                ->orWhere('message', 'ILIKE', "%{$this->searchString}%");
        }

        return view('livewire.query.show')
            ->layout('layouts.app')
            ->with([
                'queries' => $queries->orderBy('created_at', $this->sortDirection)->paginate($this->showCount ?? 0),
            ]);
    }
}
