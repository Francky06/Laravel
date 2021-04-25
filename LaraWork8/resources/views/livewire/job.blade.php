    <div>
       <div class="px-3 py-5 mb-5 mt-5 shadow-sm hover:shadow-md rounded border border-gray-300">
           <div class="flex justify-between">
               <h2 class="text-xl font-bold text-green-700">{{ $job->title}}</h2>
                <button class="w-5 h-5 text-gray-400 focus:outline-none"
                wire:click="addLike">
                <svg xmlns="http://www.w3.org/2000/svg" fill="{{ $job->isLiked() ? 'teal' : 'none'}}" viewBox="0 0 24 24" stroke="teal">
                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                </svg>
                </button>
           </div>
            
            <p class="text-md text-gray-800">{{ $job->description}}</p>
            <div class="flex items-center">
                <span class="h-2 w-2 bg-green-300 rounded-full mr-1 mt-1"></span>
                <a href="#" class="hover:text-green-500">Consulter la mission</a>
            </div>
            <span class="text-sm text-gray-600"> {{ number_format($job->price / 100, 2, ',', ' ') }} €</span>
        </div> 
    </div>