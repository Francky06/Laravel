<header class="flex items-center justify-between bg-green-500 p-4">
    <div class="text-white hover:text-black">Works</div>
    <nav>
        <a href="{{ route('jobs.index') }}" class="hover:text-white mr-4">Missions</a>
        @guest
            <a href="{{ route('login') }}" class="hover:text-white mr-4">Se connecter</a>
            <a href="{{ route('register') }}" class="hover:text-white">S'enregistrer</a>
        @else
            <a href="{{ route('home') }}" class="hover:text-white mr-4">Dashboard</a>  
            <a href="{{ route('logout') }}" class="hover:text-white" 
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Se déconnecter</a>
            <form action="{{ route('logout')}}" method="POST" id="logout-form" style="display: none;">@csrf</form>
        @endguest
    </nav>
</header>