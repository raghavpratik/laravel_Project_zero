<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Find Trusted Shelters - LittleFur</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap');
        
        * {
            font-family: 'Nunito', sans-serif;
        }
        
        .blob-shape {
            border-radius: 60% 40% 30% 70% / 60% 30% 70% 40%;
            animation: blob-morph 8s ease-in-out infinite;
        }
        
        @keyframes blob-morph {
            0%, 100% { border-radius: 60% 40% 30% 70% / 60% 30% 70% 40%; }
            50% { border-radius: 30% 60% 70% 40% / 50% 60% 30% 60%; }
        }
        
        .cloud-shape {
            border-radius: 50px 50px 50px 5px / 50px 50px 5px 50px;
        }
        
        .wiggle {
            animation: wiggle 2s ease-in-out infinite;
        }
        
        @keyframes wiggle {
            0%, 100% { transform: rotate(0deg); }
            25% { transform: rotate(1deg); }
            75% { transform: rotate(-1deg); }
        }
        
        .bounce-soft {
            animation: bounce-soft 3s ease-in-out infinite;
        }
        
        @keyframes bounce-soft {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }
        
        .paw-trail {
            position: absolute;
            width: 20px;
            height: 20px;
            background: rgba(255, 182, 193, 0.6);
            border-radius: 50% 50% 50% 0;
            transform: rotate(45deg);
            animation: paw-fade 2s ease-out forwards;
        }
        
        @keyframes paw-fade {
            0% { opacity: 1; transform: rotate(45deg) scale(1); }
            100% { opacity: 0; transform: rotate(45deg) scale(0.5); }
        }
        
        .star-rating {
            color: #FFD700;
        }
        
        .gradient-bg {
            background: linear-gradient(135deg, #FFE4E1, #E6E6FA, #F0F8FF);
        }
        
        .shelter-card {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            transition: all 0.3s ease;
        }
        
        .shelter-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }
        
        .floating-icon {
            animation: float 3s ease-in-out infinite;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-15px); }
        }
        
        .count-up {
            font-weight: 800;
            color: #FF69B4;
        }
        
        .scroll-snap-x {
            scroll-snap-type: x mandatory;
        }
        
        .scroll-snap-item {
            scroll-snap-align: start;
        }
    </style>
</head>
<body class="gradient-bg min-h-screen">
    <!-- Hero Section -->
    <section class="relative overflow-hidden py-20 px-4">
        <div class="container mx-auto text-center">
            <div class="wiggle inline-block mb-6">
                <i class="fas fa-home text-6xl text-pink-400"></i>
            </div>
            <h1 class="text-5xl md:text-7xl font-bold text-gray-800 mb-6" data-aos="fade-up">
                Find Trusted Shelters, <span class="text-pink-500">Change Lives</span>
            </h1>
            <p class="text-xl text-gray-600 mb-8 max-w-2xl mx-auto" data-aos="fade-up" data-aos-delay="200">
                LittleFur works with verified shelters across the country to help loving animals find their forever homes. Every shelter is carefully vetted to ensure the best care for our furry friends.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center" data-aos="fade-up" data-aos-delay="400">
                <button class="bg-pink-500 hover:bg-pink-600 text-white px-8 py-4 rounded-full text-lg font-semibold transition-all duration-300 transform hover:scale-105 shadow-lg">
                    <i class="fas fa-search mr-2"></i>Browse Shelters
                </button>
                <button class="bg-purple-500 hover:bg-purple-600 text-white px-8 py-4 rounded-full text-lg font-semibold transition-all duration-300 transform hover:scale-105 shadow-lg">
                    <i class="fas fa-plus mr-2"></i>Register Your Shelter
                </button>
            </div>
        </div>
        
        <!-- Floating Animation Elements -->
        <div class="absolute top-20 left-10 bounce-soft">
            <i class="fas fa-paw text-3xl text-pink-300 opacity-60"></i>
        </div>
        <div class="absolute bottom-20 right-10 bounce-soft" style="animation-delay: 1s;">
            <i class="fas fa-heart text-3xl text-purple-300 opacity-60"></i>
        </div>
    </section>

    <!-- Search & Filter Section -->
    <section class="py-16 px-4">
        <div class="container mx-auto">
            <div class="max-w-4xl mx-auto">
                <div class="bg-white rounded-3xl shadow-xl p-8 mb-12" data-aos="fade-up">
                    <h2 class="text-3xl font-bold text-gray-800 mb-6 text-center">
                        <i class="fas fa-search text-pink-500 mr-2"></i>
                        Find Your Perfect Shelter
                    </h2>
                    
                    <!-- Search Bar -->
                    <div class="relative mb-6">
                        <input type="text" placeholder="Search by shelter name, location, or rating..." 
                               class="w-full px-6 py-4 rounded-2xl border-2 border-pink-200 focus:border-pink-500 focus:outline-none text-lg">
                        <button class="absolute right-3 top-3 bg-pink-500 hover:bg-pink-600 text-white px-6 py-2 rounded-xl transition-colors">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                    
                    <!-- Filters -->
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                        <button class="filter-btn bg-purple-100 hover:bg-purple-200 text-purple-700 px-4 py-2 rounded-xl transition-colors">
                            <i class="fas fa-shield-alt mr-2"></i>Verified Only
                        </button>
                        <button class="filter-btn bg-blue-100 hover:bg-blue-200 text-blue-700 px-4 py-2 rounded-xl transition-colors">
                            <i class="fas fa-dog mr-2"></i>Pet Types
                        </button>
                        <button class="filter-btn bg-green-100 hover:bg-green-200 text-green-700 px-4 py-2 rounded-xl transition-colors">
                            <i class="fas fa-clock mr-2"></i>Open Now
                        </button>
                        <button class="filter-btn bg-orange-100 hover:bg-orange-200 text-orange-700 px-4 py-2 rounded-xl transition-colors">
                            <i class="fas fa-map-marker-alt mr-2"></i>Distance
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Shelters Carousel -->
    <section class="py-16 px-4">
        <div class="container mx-auto">
            <h2 class="text-4xl font-bold text-center mb-12 text-gray-800" data-aos="fade-up">
                <i class="fas fa-star text-yellow-500 mr-2"></i>
                Featured Shelters
            </h2>
            
            <div class="overflow-x-auto scroll-snap-x pb-4">
                <div class="flex space-x-6 w-max">
                    <!-- Featured Shelter Card 1 -->
                    <div class="shelter-card rounded-3xl p-6 w-80 scroll-snap-item" data-aos="fade-right">
                        <div class="blob-shape bg-gradient-to-br from-pink-200 to-purple-200 h-48 mb-4 overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1601758228041-f3b2795255f1?w=300&h=200&fit=crop" 
                                 alt="Shelter" class="w-full h-full object-cover">
                        </div>
                        <div class="flex items-center mb-3">
                            <div class="w-12 h-12 bg-pink-500 rounded-full flex items-center justify-center mr-3">
                                <i class="fas fa-heart text-white"></i>
                            </div>
                            <div>
                                <h3 class="font-bold text-lg text-gray-800">Paws & Hearts Shelter</h3>
                                <div class="flex items-center">
                                    <div class="star-rating text-sm mr-2">★★★★★</div>
                                    <span class="bg-green-100 text-green-700 px-2 py-1 rounded-full text-xs font-semibold">Verified</span>
                                </div>
                            </div>
                        </div>
                        <p class="text-gray-600 text-sm mb-4 italic">"Every pet deserves a second chance at happiness"</p>
                        <button class="w-full bg-gradient-to-r from-pink-500 to-purple-500 text-white py-3 rounded-xl font-semibold hover:shadow-lg transition-all">
                            View Profile
                        </button>
                    </div>
                    
                    <!-- Featured Shelter Card 2 -->
                    <div class="shelter-card rounded-3xl p-6 w-80 scroll-snap-item" data-aos="fade-right" data-aos-delay="200">
                        <div class="cloud-shape bg-gradient-to-br from-blue-200 to-green-200 h-48 mb-4 overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1583337130417-3346a1be7dee?w=300&h=200&fit=crop" 
                                 alt="Shelter" class="w-full h-full object-cover">
                        </div>
                        <div class="flex items-center mb-3">
                            <div class="w-12 h-12 bg-blue-500 rounded-full flex items-center justify-center mr-3">
                                <i class="fas fa-home text-white"></i>
                            </div>
                            <div>
                                <h3 class="font-bold text-lg text-gray-800">Safe Haven Animal Rescue</h3>
                                <div class="flex items-center">
                                    <div class="star-rating text-sm mr-2">★★★★★</div>
                                    <span class="bg-green-100 text-green-700 px-2 py-1 rounded-full text-xs font-semibold">Verified</span>
                                </div>
                            </div>
                        </div>
                        <p class="text-gray-600 text-sm mb-4 italic">"Building bridges between pets and families"</p>
                        <button class="w-full bg-gradient-to-r from-blue-500 to-green-500 text-white py-3 rounded-xl font-semibold hover:shadow-lg transition-all">
                            View Profile
                        </button>
                    </div>
                    
                    <!-- Featured Shelter Card 3 -->
                    <div class="shelter-card rounded-3xl p-6 w-80 scroll-snap-item" data-aos="fade-right" data-aos-delay="400">
                        <div class="blob-shape bg-gradient-to-br from-yellow-200 to-orange-200 h-48 mb-4 overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1548767797-d8c844163c4c?w=300&h=200&fit=crop" 
                                 alt="Shelter" class="w-full h-full object-cover">
                        </div>
                        <div class="flex items-center mb-3">
                            <div class="w-12 h-12 bg-yellow-500 rounded-full flex items-center justify-center mr-3">
                                <i class="fas fa-sun text-white"></i>
                            </div>
                            <div>
                                <h3 class="font-bold text-lg text-gray-800">Sunshine Pet Sanctuary</h3>
                                <div class="flex items-center">
                                    <div class="star-rating text-sm mr-2">★★★★★</div>
                                    <span class="bg-green-100 text-green-700 px-2 py-1 rounded-full text-xs font-semibold">Verified</span>
                                </div>
                            </div>
                        </div>
                        <p class="text-gray-600 text-sm mb-4 italic">"Where every day is a new beginning"</p>
                        <button class="w-full bg-gradient-to-r from-yellow-500 to-orange-500 text-white py-3 rounded-xl font-semibold hover:shadow-lg transition-all">
                            View Profile
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Shelter Profiles Grid -->
    <section class="py-16 px-4">
        <div class="container mx-auto">
            <h2 class="text-4xl font-bold text-center mb-12 text-gray-800" data-aos="fade-up">
                <i class="fas fa-map-marker-alt text-pink-500 mr-2"></i>
                Local Shelters Near You
            </h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Shelter Profile 1 -->
                <div class="shelter-card rounded-3xl p-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="flex items-center mb-4">
                        <div class="w-16 h-16 bg-pink-500 rounded-full flex items-center justify-center mr-4">
                            <i class="fas fa-paw text-white text-xl"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-lg text-gray-800">Happy Tails Rescue</h3>
                            <p class="text-gray-600 text-sm">
                                <i class="fas fa-map-marker-alt mr-1"></i>
                                123 Main St, Springfield
                            </p>
                            <div class="star-rating text-sm">★★★★☆</div>
                        </div>
                    </div>
                    <p class="text-gray-600 text-sm mb-4">Dedicated to finding loving homes for abandoned pets. We provide medical care, training, and lots of love.</p>
                    
                    <!-- Featured Pets -->
                    <div class="mb-4">
                        <p class="text-sm font-semibold text-gray-700 mb-2">Featured Pets:</p>
                        <div class="flex space-x-2">
                            <div class="w-12 h-12 bg-gradient-to-br from-pink-300 to-purple-300 rounded-full overflow-hidden">
                                <img src="https://images.unsplash.com/photo-1552053831-71594a27632d?w=50&h=50&fit=crop" 
                                     alt="Pet" class="w-full h-full object-cover">
                            </div>
                            <div class="w-12 h-12 bg-gradient-to-br from-blue-300 to-green-300 rounded-full overflow-hidden">
                                <img src="https://images.unsplash.com/photo-1574158622682-e40e69881006?w=50&h=50&fit=crop" 
                                     alt="Pet" class="w-full h-full object-cover">
                            </div>
                            <div class="w-12 h-12 bg-gradient-to-br from-yellow-300 to-orange-300 rounded-full overflow-hidden">
                                <img src="https://images.unsplash.com/photo-1583337130417-3346a1be7dee?w=50&h=50&fit=crop" 
                                     alt="Pet" class="w-full h-full object-cover">
                            </div>
                        </div>
                    </div>
                    
                    <div class="flex space-x-2">
                        <button class="flex-1 bg-pink-500 hover:bg-pink-600 text-white py-2 px-4 rounded-xl text-sm font-semibold transition-colors">
                            <i class="fas fa-eye mr-1"></i>View Profile
                        </button>
                        <button class="flex-1 bg-gray-200 hover:bg-gray-300 text-gray-700 py-2 px-4 rounded-xl text-sm font-semibold transition-colors">
                            <i class="fas fa-phone mr-1"></i>Contact
                        </button>
                    </div>
                </div>
                
                <!-- Shelter Profile 2 -->
                <div class="shelter-card rounded-3xl p-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="flex items-center mb-4">
                        <div class="w-16 h-16 bg-blue-500 rounded-full flex items-center justify-center mr-4">
                            <i class="fas fa-heart text-white text-xl"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-lg text-gray-800">Furry Friends Forever</h3>
                            <p class="text-gray-600 text-sm">
                                <i class="fas fa-map-marker-alt mr-1"></i>
                                456 Oak Ave, Riverside
                            </p>
                            <div class="star-rating text-sm">★★★★★</div>
                        </div>
                    </div>
                    <p class="text-gray-600 text-sm mb-4">A no-kill shelter focusing on rehabilitation and socialization. We believe every pet deserves a chance.</p>
                    
                    <!-- Featured Pets -->
                    <div class="mb-4">
                        <p class="text-sm font-semibold text-gray-700 mb-2">Featured Pets:</p>
                        <div class="flex space-x-2">
                            <div class="w-12 h-12 bg-gradient-to-br from-green-300 to-blue-300 rounded-full overflow-hidden">
                                <img src="https://images.unsplash.com/photo-1596492784531-6e4eb5ea9993?w=50&h=50&fit=crop" 
                                     alt="Pet" class="w-full h-full object-cover">
                            </div>
                            <div class="w-12 h-12 bg-gradient-to-br from-purple-300 to-pink-300 rounded-full overflow-hidden">
                                <img src="https://images.unsplash.com/photo-1548767797-d8c844163c4c?w=50&h=50&fit=crop" 
                                     alt="Pet" class="w-full h-full object-cover">
                            </div>
                            <div class="w-12 h-12 bg-gradient-to-br from-orange-300 to-red-300 rounded-full overflow-hidden">
                                <img src="https://images.unsplash.com/photo-1601758228041-f3b2795255f1?w=50&h=50&fit=crop" 
                                     alt="Pet" class="w-full h-full object-cover">
                            </div>
                        </div>
                    </div>
                    
                    <div class="flex space-x-2">
                        <button class="flex-1 bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-xl text-sm font-semibold transition-colors">
                            <i class="fas fa-eye mr-1"></i>View Profile
                        </button>
                        <button class="flex-1 bg-gray-200 hover:bg-gray-300 text-gray-700 py-2 px-4 rounded-xl text-sm font-semibold transition-colors">
                            <i class="fas fa-phone mr-1"></i>Contact
                        </button>
                    </div>
                </div>
                
                <!-- Shelter Profile 3 -->
                <div class="shelter-card rounded-3xl p-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="flex items-center mb-4">
                        <div class="w-16 h-16 bg-green-500 rounded-full flex items-center justify-center mr-4">
                            <i class="fas fa-leaf text-white text-xl"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-lg text-gray-800">Nature's Haven</h3>
                            <p class="text-gray-600 text-sm">
                                <i class="fas fa-map-marker-alt mr-1"></i>
                                789 Pine Dr, Greenfield
                            </p>
                            <div class="star-rating text-sm">★★★★☆</div>
                        </div>
                    </div>
                    <p class="text-gray-600 text-sm mb-4">Eco-friendly shelter with spacious outdoor areas. We focus on natural healing and wellness for all our animals.</p>
                    
                    <!-- Featured Pets -->
                    <div class="mb-4">
                        <p class="text-sm font-semibold text-gray-700 mb-2">Featured Pets:</p>
                        <div class="flex space-x-2">
                            <div class="w-12 h-12 bg-gradient-to-br from-teal-300 to-cyan-300 rounded-full overflow-hidden">
                                <img src="https://images.unsplash.com/photo-1583337130417-3346a1be7dee?w=50&h=50&fit=crop" 
                                     alt="Pet" class="w-full h-full object-cover">
                            </div>
                            <div class="w-12 h-12 bg-gradient-to-br from-lime-300 to-green-300 rounded-full overflow-hidden">
                                <img src="https://images.unsplash.com/photo-1574158622682-e40e69881006?w=50&h=50&fit=crop" 
                                     alt="Pet" class="w-full h-full object-cover">
                            </div>
                            <div class="w-12 h-12 bg-gradient-to-br from-emerald-300 to-teal-300 rounded-full overflow-hidden">
                                <img src="https://images.unsplash.com/photo-1552053831-71594a27632d?w=50&h=50&fit=crop" 
                                     alt="Pet" class="w-full h-full object-cover">
                            </div>
                        </div>
                    </div>
                    
                    <div class="flex space-x-2">
                        <button class="flex-1 bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded-xl text-sm font-semibold transition-colors">
                            <i class="fas fa-eye mr-1"></i>View Profile
                        </button>
                        <button class="flex-1 bg-gray-200 hover:bg-gray-300 text-gray-700 py-2 px-4 rounded-xl text-sm font-semibold transition-colors">
                            <i class="fas fa-phone mr-1"></i>Contact
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Shelter Registration Banner -->
    <section class="py-16 px-4">
        <div class="container mx-auto">
            <div class="bg-gradient-to-r from-purple-500 to-pink-500 rounded-3xl p-12 text-center relative overflow-hidden" data-aos="fade-up">
                <div class="floating-icon absolute top-6 right-6 text-white text-4xl">
                    <i class="fas fa-home"></i>
                </div>
                <div class="floating-icon absolute bottom-6 left-6 text-white text-3xl" style="animation-delay: 1s;">
                    <i class="fas fa-paw"></i>
                </div>
                
                <h2 class="text-4xl font-bold text-white mb-4">Run a Shelter?</h2>
                <p class="text-xl text-white mb-8 max-w-2xl mx-auto">
                    Join LittleFur and reach more pet lovers in your community. Our platform helps you showcase your animals and connect with potential adopters.
                </p>
                <button class="bg-white text-purple-600 px-8 py-4 rounded-full text-lg font-semibold hover:bg-gray-100 transition-colors transform hover:scale-105">
                    <i class="fas fa-plus mr-2"></i>Register Your Shelter
                </button>
            </div>
        </div>
    </section>

    <!-- Success Metrics -->
    <section class="py-16 px-4">
        <div class="container mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
                <div class="bg-white rounded-3xl p-8 shadow-lg" data-aos="fade-up">
                    <div class="text-6xl mb-4">
                        <i class="fas fa-paw text-pink-500 bounce-soft"></i>
                    </div>
                    <div class="count-up text-4xl font-bold mb-2" data-count="500">0</div>
                    <p class="text-gray-600 font-semibold">Animals Adopted</p>
                </div>
                
                <div class="bg-white rounded-3xl p-8 shadow-lg" data-aos="fade-up" data-aos-delay="200">
                    <div class="text-6xl mb-4">
                        <i class="fas fa-home text-purple-500 bounce-soft" style="animation-delay: 0.5s;"></i>
                    </div>
                    <div class="count-up text-4xl font-bold mb-2" data-count="120">0</div>
                    <p class="text-gray-600 font-semibold">Verified Shelters</p>
                </div>
                
                <div class="bg-white rounded-3xl p-8 shadow-lg" data-aos="fade-up" data-aos-delay="400">
                    <div class="text-6xl mb-4">
                        <i class="fas fa-heart text-red-500 bounce-soft" style="animation-delay: 1s;"></i>
                    </div>
                    <div class="count-up text-4xl font-bold mb-2" data-count="1000000">0</div>
                    <p class="text-gray-600 font-semibold">Happy Pet Owners</p>
                </div>
            </div>
        </div>
    </section>

    <script>
        // Initialize AOS
        AOS.init({
            duration: 1000,
            once: true
        });

        // Counter animation
        function animateCounter(element) {
            const target = parseInt(element.getAttribute('data-count'));
            const duration = 2000;
            const increment = target / (duration / 16);
            let current = 0;
            
            const timer = setInterval(() => {
                current += increment;
                if (current >= target) {
                    element.textContent = target.toLocaleString() + '+';
                    clearInterval(timer);
                } else {
                    element.textContent = Math.floor(current).toLocaleString();
                }
            }, 16);
        }

        // Trigger counter animation when elements are in view
        const counterElements = document.querySelectorAll('.count-up');
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting && !entry.target.classList.contains('animated')) {
                    entry.target.classList.add('animated');
                    animateCounter(entry.target);
                }
            });
        });

        counterElements.forEach(element => {
            observer.observe(element);
        });

        // Paw trail effect on mouse move
        document.addEventListener('mousemove', (e) => {
            if (Math.random() < 0.1) { // Only create trails occasionally
                const paw = document.createElement('div');
                paw.className = 'paw-trail';
                paw.style.left = e.clientX + 'px';
                paw.style.top = e.clientY + 'px';
                document.body.appendChild(paw);
                
                setTimeout(() => {
                    paw.remove();
                }, 2000);
            }
        });

        // Shelter card hover effects
        const shelterCards = document.querySelectorAll('.shelter-card');
        shelterCards.forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-10px) scale(1.02)';
                this.style.boxShadow = '0 25px 50px rgba(0, 0, 0, 0.15)';
            });
            
            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0) scale(1)';
                this.style.boxShadow = '0 10px 30px rgba(0, 0, 0, 0.1)';
            });
        });

        // Filter button interactions
        const filterButtons = document.querySelectorAll('.filter-btn');
        filterButtons.forEach(button => {
            button.addEventListener('click', function() {
                // Toggle active state
                this.classList.toggle('active');
                
                // Add a little bounce animation
                this.style.transform = 'scale(0.95)';
                setTimeout(() => {
                    this.style.transform = 'scale(1)';
                }, 100);
            });
        });

        // Smooth scroll for carousel
        const carousel = document.querySelector('.overflow-x-auto');
        if (carousel) {
            carousel.addEventListener('wheel', (e) => {
                if (e.deltaY !== 0) {
                    e.preventDefault();
                    carousel.scrollLeft += e.deltaY;
                }
            });
        }

        // Add some interactive elements
        document.addEventListener('DOMContentLoaded', function() {
            // Animate floating icons with GSAP
            gsap.to('.floating-icon', {
                y: -20,
                duration: 2,
                repeat: -1,
                yoyo: true,
                ease: "power2.inOut",
                stagger: 0.5
            });

            // Add parallax effect to hero section
            window.addEventListener('scroll', () => {
                const scrolled = window.pageYOffset;
                const parallaxElements = document.querySelectorAll('.bounce-soft');
                
                parallaxElements.forEach(element => {
                    const speed = 0.5;
                    element.style.transform = `translateY(${scrolled * speed}px)`;
                });
            });

            // Add click handlers for CTA buttons
            document.querySelectorAll('button').forEach(button => {
                button.addEventListener('click', function(e) {
                    // Add ripple effect
                    const ripple = document.createElement('span');
                    const rect = this.getBoundingClientRect();
                    const size = Math.max(rect.width, rect.height);
                    const x = e.clientX - rect.left - size / 2;
                    const y = e.clientY - rect.top - size / 2;
                    
                    ripple.style.width = ripple.style.height = size + 'px';
                    ripple.style.left = x + 'px';
                    ripple.style.top = y + 'px';
                    ripple.classList.add('ripple');
                    
                    this.appendChild(ripple);
                    
                    setTimeout(() => {
                        ripple.remove();
                    }, 600);
                });
            });
        });

        // Add CSS for ripple effect
        const style = document.createElement('style');
        style.textContent = `
            button {
                position: relative;
                overflow: hidden;
            }
            
            .ripple {
                position: absolute;
                border-radius: 50%;
                background: rgba(255, 255, 255, 0.6);
                transform: scale(0);
                animation: ripple-animation 0.6s linear;
                pointer-events: none;
            }
            
            @keyframes ripple-animation {
                to {
                    transform: scale(4);
                    opacity: 0;
                }
            }
            
            .filter-btn.active {
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                color: white;
                transform: scale(1.05);
            }
        `;
        document.head.appendChild(style);
    </script>
</body>

<body>
    {{-- This is where you include the nav.blade.php layout --}}
    @include('layouts.nav') {{-- Assuming nav.blade.php is in a 'layouts' directory --}}
    {{-- @yield('content') --}}
</body>

</html>