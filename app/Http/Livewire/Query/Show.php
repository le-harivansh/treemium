<?php

namespace App\Http\Livewire\Query;

use App\Mail\QueryReply;
use App\Models\Query;
use Illuminate\Support\Facades\Mail;
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

    public string $comment = '';

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
        Mail::to($this->query->email)->send(
            new QueryReply($this->query->name, $this->query->message, $this->reply)
        );

        $this->query->comments()->create([
            'administrator_id' => auth()->user()->id,
            'message' => "Replied: {$this->reply}",
        ]);

        $this->reply = '';
        $this->emitSelf('refreshComponent');
    }

    public function saveComment(): void
    {
        $this->query->comments()->create([
            'administrator_id' => auth()->user()->id,
            'message' => $this->comment,
        ]);

        $this->comment = '';
        $this->emitSelf('refreshComponent');
    }

    public function render()
    {
        return view('livewire.query.show')->layout('layouts.app');
    }
}
