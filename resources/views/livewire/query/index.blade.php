<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Queries') }}
    </h2>
</x-slot>

<main class="mx-auto container mt-8 flex flex-col space-y-8">
    <div class="flex space-x-6 items-center">
        <input type="text" placeholder="Search..." wire:model="searchString"
               class="flex-1 rounded-lg border-slate-500 focus:ring-1">

        <div class="flex space-x-2">
            <label for="show-unresolved-queries"
                   class="{{ $showUnresolvedQueries ? 'bg-blue-500 text-white' : '' }} cursor-pointer p-2 rounded-lg">
                <input type="checkbox" id="show-unresolved-queries" class="hidden" wire:model="showUnresolvedQueries">
                {{ __('Unresolved') }}
            </label>
            <label for="show-resolved-queries"
                   class="{{ $showResolvedQueries ? 'bg-blue-500 text-white' : '' }} cursor-pointer p-2 rounded-lg">
                <input type="checkbox" id="show-resolved-queries" class="hidden" wire:model="showResolvedQueries">
                {{ __('Resolved') }}
            </label>
            <label for="show-trashed-queries"
                   class="{{ $showTrashedQueries ? 'bg-blue-500 text-white' : '' }} cursor-pointer p-2 rounded-lg">
                <input type="checkbox" id="show-trashed-queries" class="hidden" wire:model="showTrashedQueries">
                {{ __('Trashed') }}
            </label>
        </div>

        <button title="{{ __('Sort in ' . ($sortDirection === 'asc' ? 'descending' : 'ascending') . ' order') }}"
                wire:click="toggleSortDirection">
            @if($sortDirection === 'asc')
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                     stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 13.5L12 21m0 0l-7.5-7.5M12 21V3"/>
                </svg>
            @else
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                     stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 10.5L12 3m0 0l7.5 7.5M12 3v18"/>
                </svg>
            @endif
        </button>

        <label for="show-count">
            <input type="number" id="show-count" wire:model="showCount"
                   class="w-16 rounded-lg border-slate-500 focus:ring-1">
        </label>
    </div>
    <div class="flex flex-col space-y-8">
        <div class="flex flex-col space-y-4">
            @foreach($queries as $query)
                <article class="p-4 bg-white rounded-lg shadow-md" wire:key="{{ $query->id }}">
                    <div class="flex justify-between">
                        <p><span class="inline-block w-24 text-xs uppercase tracking-widest font-bold text-gray-600">{{ __('Name') }}:</span>{{ $query->name }}
                        </p>
                        <p class="text-xs text-gray-500">{{ $query->created_at->toDayDateTimeString() }}</p>
                    </div>
                    <p><span class="inline-block w-24 text-xs uppercase tracking-widest font-bold text-gray-600">{{ __('Email') }}:</span>{{ $query->email }}
                    </p>
                    <p><span class="inline-block w-24 text-xs uppercase tracking-widest font-bold text-gray-600">{{ __('Tel.') }}:</span>{{ $query->tel }}
                    </p>
                    <div class="flex">
                        <p class="shrink-0 pt-1 w-24 text-xs uppercase tracking-widest font-bold text-gray-600">{{ __('Message') }}
                            :</p>
                        <p class="align-middle">{{ $query->message }}</p>
                    </div>
                    <div class="flex justify-end space-x-4">
                        <a href="{{ route('query.show', ['queryId' => $query->id]) }}" title="{{ __('View') }}" class="text-gray-400 hover:text-blue-600">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                 stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z"/>
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                        </a>
                        @if($query->resolved_at)
                            <button title="{{ __('Mark as unresolved') }}" class="text-gray-400 hover:text-yellow-500"
                                    wire:click="markQueryAsUnresolved({{ $query->id }})">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </button>
                        @else
                            <button title="{{ __('Mark as resolved') }}" class="text-gray-400 hover:text-green-600"
                                    wire:click="markQueryAsResolved({{ $query->id }})">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke-width="1.5"
                                     stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </button>
                        @endif
                        @if($query->deleted_at)
                            <button title="{{ __('Restore') }}" class="text-gray-400 hover:text-green-500"
                                    wire:click="restoreQuery({{ $query->id }})">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M9 15L3 9m0 0l6-6M3 9h12a6 6 0 010 12h-3"/>
                                </svg>
                            </button>
                        @endif
                        <button title="{{ $query->deleted_at ? __('Delete') : __('Trash') }}"
                                class="{{ $query->deleted_at ? 'text-red-600' : 'text-gray-400 hover:text-red-600' }}"
                                @if($query->deleted_at)
                                    wire:click="permanentlyDeleteQuery({{ $query->id }})"
                                @else
                                    wire:click="trashQuery({{ $query }})"
                            @endif
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                 stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"/>
                            </svg>
                        </button>
                    </div>
                </article>
            @endforeach
        </div>

        {{ $queries->links() }}
    </div>
</main>
