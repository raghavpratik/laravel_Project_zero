<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<nav id="bottomNavBar" class="fixed bottom-5 inset-x-10 mx-auto glass-effect bg-gray-900/80 hover:bg-gray-900/90 rounded-full z-50">
    <div class="max-w-6xl mx-auto px-4 sm:px-5 lg:px-10">
        <div class="flex justify-between items-center h-full">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 bg-gradient-to-r from-pink-400 to-purple-400 rounded-full flex items-center justify-center">
                            <i class="fas fa-paw text-white text-lg"></i>
                        </div>
    <h1 class="text-3xl font-bold text-white text-shadow navbar-brand-text">
        <a href="/account/dashboard" class="text-white no-underline">
            LittleFur
        </a>
    </h1>
</div>

                </div>
            </div>
            <div class="hidden md:block">
                <div class="ml-10 flex items-baseline space-x-8">
                    <a href="/account/Adopt" class="text-gray-100 hover:text-white px-3 py-1 text-base font-medium transition-all hover:scale-110 interactive-element navbar-link-text">Adopt</a>
                    <a href="/account/Hospital" class="text-gray-100 hover:text-white px-3 py-1 text-base font-medium transition-all hover:scale-110 interactive-element navbar-link-text">Hospital</a>
                    <a href="/account/Shelter" class="text-gray-100 hover:text-white px-3 py-1 text-base font-medium transition-all hover:scale-110 interactive-element navbar-link-text">Shelter</a>
                    <a href="/account/Community" class="text-gray-100 hover:text-white px-3 py-1 text-base font-medium transition-all hover:scale-110 interactive-element navbar-link-text">Community</a>
                    <a href="/account/Contact" class="text-gray-100 hover:text-white px-3 py-1 text-base font-medium transition-all hover:scale-110 interactive-element navbar-link-text">Contact</a>
                    @auth
                        <a href="/account/dashboard" class="bg-green-600 hover:bg-green-700 text-white px-3 py-1 rounded-xl text-base font-semibold transition-all hover:scale-105 neon-glow interactive-element">My Account</a>
                    @else
                        <a href="/account/welcome" class="bg-green-600 hover:bg-green-700 text-white px-3 py-1 rounded-xl text-base font-semibold transition-all hover:scale-105 neon-glow interactive-element">Sign-up</a>
                    @endauth

                </div>
            </div>

            <button id="darkToggle" class="px-2 py-1 text-white border rounded
    hover:scale-110 transition duration-300 ease-in-out
    shadow-md dark:shadow-white/50 glow">
    🐩
</button>

            <button id="muteButton" class="bg-gray-700/50 hover:bg-gray-600/70 text-white p-3 rounded-full transition-all hover:scale-110 interactive-element">
                <svg id="speakerOnIcon" class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M3 9v6h4l5 5V4L7 9H3zm13.5 3c0-1.77-1.02-3.29-2.5-4.03v8.05c1.48-.73 2.5-2.25 2.5-4.02zM14 3.23v2.06c2.89.86 5 3.54 5 6.71s-2.11 5.85-5 6.71v2.06c4.01-.98 7-4.63 7-8.77s-2.99-7.79-7-8.77z"/>
                </svg>
                <svg id="speakerOffIcon" class="w-6 h-6 hidden" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M16.5 12c0-1.77-1.02-3.29-2.5-4.03v2.21l2.45 2.45c.03-.2.05-.41.05-.63zm2.5 0c0 .9-.23 1.73-.63 2.47l1.43 1.43c.73-1.04 1.2-2.31 1.2-3.9s-.47-2.86-1.2-3.9l-1.43 1.43c.4 1.24.63 2.57.63 3.9zm-4.5 0v.5l2 2v-2.5zm-3.5-6v12H6V6h4zM5 17c0 .55.45 1 1 1h.5l2 2v-2.5L11.5 14H12l-4-4-3 3.01V17z"/>
                </svg>
            </button>
        </div>
    </div>
</nav>