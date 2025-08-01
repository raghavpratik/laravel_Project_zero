<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LittleFur | Dashboard</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
            overflow-x: hidden;
            background-color: #1A202C;
            /* The padding-bottom will be handled by the nav layout */
        }
        
        /* --- General Component Styles --- */
        .glass-effect {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 1.5rem;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card-hover {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .card-hover:hover {
            transform: translateY(-8px);
            box-shadow: 0 25px 50px rgba(0,0,0,0.2);
        }
        
        .neon-glow {
            box-shadow: 0 0 20px rgba(34, 197, 94, 0.3);
        }
        
        .text-shadow {
            text-shadow: 0 0 10px rgba(34, 197, 94, 0.7), 2px 2px 4px rgba(0,0,0,0.3);
        }

        .interactive-element {
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .interactive-element:hover {
            transform: scale(1.05);
            filter: brightness(1.1);
        }

        /* --- Page-Specific Animations --- */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fade-in { animation: fadeIn 1s ease-in-out; }

        /* Scroll-triggered animations for cards */
        .fade-in-scroll {
            opacity: 0;
            transform: translateY(50px);
            transition: opacity 0.8s ease-out, transform 0.8s ease-out;
        }
        .fade-in-scroll.is-visible {
            opacity: 1;
            transform: translateY(0);
        }
    </style>
</head>
<body class="bg-gray-900 text-white relative">
    
    @extends('layouts.nav')

    <main class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <header class="mb-12 animate-fade-in">
                <h1 class="text-4xl md:text-5xl font-bold text-white text-shadow">
                    Welcome to your Dashboard
                </h1>
                <p class="text-xl text-gray-400 mt-2">
                    Here's an overview of your pet's world.
                </p>
            </header>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

                <div class="glass-effect p-8 rounded-2xl card-hover fade-in-scroll">
                    <h2 class="text-2xl font-bold text-white mb-4">My Pets</h2>
                    <p class="text-gray-300 mb-6">Manage your pet's profile, health records, and more.</p>
                    <button class="w-full bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-4 rounded-lg transition-colors interactive-element">
                        View Pets
                    </button>
                </div>

                <div class="glass-effect p-8 rounded-2xl card-hover fade-in-scroll" style="animation-delay: 0.1s;">
                    <h2 class="text-2xl font-bold text-white mb-4">Appointments</h2>
                    <p class="text-gray-300 mb-6">Check your upcoming vet visits and grooming sessions.</p>
                    <button class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded-lg transition-colors interactive-element">
                        View Appointments
                    </button>
                </div>

                <div class="glass-effect p-8 rounded-2xl card-hover fade-in-scroll" style="animation-delay: 0.2s;">
                    <h2 class="text-2xl font-bold text-white mb-4">Community</h2>
                    <p class="text-gray-300 mb-6">You have 3 new messages in the pet owners forum.</p>
                    <button class="w-full bg-purple-600 hover:bg-purple-700 text-white font-bold py-3 px-4 rounded-lg transition-colors interactive-element">
                        Read Messages
                    </button>
                </div>

                </div>
        </div>
    </main>

    <footer class="bg-gray-900 text-gray-400 py-16 mt-12 border-t border-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <p class="text-gray-500 text-sm">&copy; 2025 LittleFur. All rights reserved.</p>
        </div>
    </footer>

    <script>
        // Page-specific JavaScript for dashboard animations
        document.addEventListener('DOMContentLoaded', () => {
            const fadeInElements = document.querySelectorAll('.fade-in-scroll');

            if (fadeInElements.length > 0) {
                const observer = new IntersectionObserver((entries, observer) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            entry.target.classList.add('is-visible');
                            observer.unobserve(entry.target);
                        }
                    });
                }, { threshold: 0.1 });

                fadeInElements.forEach(element => {
                    observer.observe(element);
                });
            }
        });
    </script>
</body>
</html>