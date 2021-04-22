<div class="inline-block mr-5 relative">
    <input class="text-gray-700 border focus:outline-none rounded-full px-2 py-1 w-56" placeholder="Recherche" 
    wire:model='query'
    wire:keydown.arrow-down.prevent = 'incrementIndex'
    wire:keydown.arrow-up.prevent = 'decrementIndex' >
<svg class="w-5 h-5 text-green-500 absolute top-0 right-0 mt-1.5 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
    <path d="M9 9a2 2 0 114 0 2 2 0 01-4 0z" />
    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a4 4 0 00-3.446 6.032l-2.261 2.26a1 1 0 101.414 1.415l2.261-2.261A4 4 0 1011 5z" clip-rule="evenodd" />
</svg>

    <div class="absolute w-56 bg-gray-100 rounded mt-2">
        @if (strlen($query) > 2)
            <div>
                @if (count($jobs) >0)
                @foreach ($jobs as $index => $job )
                    <p class="p-1 text-center {{ $index == $selectedIndex ? 'text-green-400' : 'text-green-800'}}">{{ $job->title }}</p>         
                @endforeach
                @else
                    <p class="p-1 text-center">0 resultats pour "{{ $query }}"</p>
                @endif
            </div>
        @endif
    </div>   
</div>


