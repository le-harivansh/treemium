<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Queries') }}
    </h2>
</x-slot>

<div class="mt-8 mx-auto container flex flex-col space-y-8">
    <div class="flex flex-col space-y-4">
        @foreach($queries as $query)
            <article class="p-4 bg-white rounded-lg shadow-md">
                <p><span class="inline-block w-24 text-xs uppercase tracking-widest font-bold text-gray-600">{{ __('Name') }}:</span>{{ $query->name }}</p>
                <p><span class="inline-block w-24 text-xs uppercase tracking-widest font-bold text-gray-600">{{ __('Email') }}:</span>{{ $query->email }}</p>
                <p><span class="inline-block w-24 text-xs uppercase tracking-widest font-bold text-gray-600">{{ __('Tel.') }}:</span>{{ $query->tel }}</p>
                <div class="flex">
                    <p class="pt-1 w-24 text-xs uppercase tracking-widest font-bold text-gray-600">{{ __('Message') }}:</p>
                    <p class="align-middle">{{ $query->message }}</p>
                </div>
            </article>
        @endforeach
    </div>

    {{ $queries->links() }}
</div>
