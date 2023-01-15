<?php

namespace App\Http\Livewire\Query;

use App\Models\Query;
use Livewire\Component;

class Show extends Component
{
    use HasQueryActions {
        markQueryAsUnresolved as public markQueryAsUnresolvedAction;
        markQueryAsResolved as public markQueryAsResolvedAction;
        trashQuery as public trashQueryAction;
        restoreQuery as public restoreQueryAction;
        permanentlyDeleteQuery as public permanentlyDeleteQueryAction;
    }

    public int $queryId;

    public Query $query;

    public string $reply = '';

    protected $listeners = [
        'refreshComponent' => '$refresh',
    ];

    public function mount(): void
    {
        $this->query = Query::withTrashed()->find($this->queryId);
    }

    public function markQueryAsResolved(int $queryId): void
    {
        $this->markQueryAsResolvedAction($queryId);

        $this->emitSelf('refreshComponent');
    }

    public function markQueryAsUnresolved(int $queryId): void
    {
        $this->markQueryAsUnresolvedAction($queryId);

        $this->emitSelf('refreshComponent');
    }

    public function trashQuery(Query $query): void
    {
        $this->trashQueryAction($query);

        $this->emitSelf('refreshComponent');
    }

    public function restoreQuery(int $queryId): void
    {
        $this->restoreQueryAction($queryId);

        $this->emitSelf('refreshComponent');
    }

    public function permanentlyDeleteQuery(int $queryId)
    {
        $this->permanentlyDeleteQueryAction($queryId);

        return redirect()->route('query.index');
    }

    public function sendReply(): void
    {
        $this->reply = '';
    }

    public function render()
    {
        return view('livewire.query.show')->layout('layouts.app');
    }
}
