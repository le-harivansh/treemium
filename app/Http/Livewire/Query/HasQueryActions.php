<?php

namespace App\Http\Livewire\Query;

use App\Models\Query;

trait HasQueryActions
{
    public function markQueryAsResolved(int $queryId): void
    {
        $query = Query::withTrashed($queryId)->find($queryId);

        $query->update(['resolved_at' => now()]);
    }

    public function markQueryAsUnresolved(int $queryId): void
    {
        $query = Query::withTrashed($queryId)->find($queryId);

        $query->update(['resolved_at' => null]);
    }

    public function trashQuery(Query $query): void
    {
        $query->delete();
    }

    public function restoreQuery(int $queryId): void
    {
        Query::withTrashed()->find($queryId)->restore();
    }

    public function permanentlyDeleteQuery(int $queryId): void
    {
        Query::withTrashed()->find($queryId)->forceDelete();
    }
}
