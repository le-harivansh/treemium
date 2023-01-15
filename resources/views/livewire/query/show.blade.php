<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Query') }} #{{ $query->id }}
    </h2>
</x-slot>

<main class="mx-auto container mt-8 flex flex-col space-y-8" x-data="{ showReplySection: false, reply: @entangle('reply') }">
    <article class="p-4 flex flex-col space-y-6 bg-white rounded-lg shadow-lg">
        <p><span class="inline-block w-24 text-xs uppercase tracking-widest font-bold text-gray-600">{{ __('Name') }}:</span>{{ $query->name }}</p>
        <p><span class="inline-block w-24 text-xs uppercase tracking-widest font-bold text-gray-600">{{ __('E-mail') }}:</span>{{ $query->email }}</p>
        <p><span class="inline-block w-24 text-xs uppercase tracking-widest font-bold text-gray-600">{{ __('Telephone') }}:</span>{{ $query->tel }}</p>
        <div class="flex"><p class="shrink-0 w-24 text-xs uppercase tracking-widest font-bold text-gray-600">{{ __('Message') }}:</p>{{ $query->message }}</div>
    </article>

    <div class="flex justify-end space-x-6">
        <button type="button" class="text-gray-400 hover:text-indigo-500" @click="showReplySection = true">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 15l6-6m0 0l-6-6m6 6H9a6 6 0 000 12h3" />
            </svg>
        </button>
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

    <div class="p-2 flex flex-col space-y-4 bg-white rounded-lg shadow-lg" x-show="showReplySection" x-cloak>
        <textarea cols="30" rows="5" placeholder="{{ __('Write your reply here...') }}" class="rounded-lg focus:ring-1" wire:model="reply"></textarea>
        <div class="flex justify-end">
            <button type="button" wire:click="sendReply" class="px-6 py-2 rounded-lg text-white" :class="[ !reply ? 'bg-indigo-300' : 'bg-indigo-500' ]" :disabled="!reply">{{ __('Send') }}</button>
        </div>
    </div>
</main>
