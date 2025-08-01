<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adopt Your New Best Friend - LittleFur</title>

    {{-- Essential Libraries --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <style>
        /* Your custom CSS styles */
        @import url('https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap');

        * {
            font-family: 'Nunito', sans-serif;
        }

        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .gradient-text {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .blob-1 {
            clip-path: polygon(30% 0%, 70% 0%, 100% 30%, 100% 70%, 70% 100%, 30% 100%, 0% 70%, 0% 30%);
        }

        .blob-2 {
            clip-path: polygon(20% 0%, 80% 0%, 100% 20%, 100% 80%, 80% 100%, 20% 100%, 0% 80%, 0% 20%);
        }

        .blob-3 {
            clip-path: polygon(25% 0%, 75% 0%, 100% 25%, 100% 75%, 75% 100%, 25% 100%, 0% 75%, 0% 25%);
        }

        .heart-shape {
            clip-path: polygon(52% 12%, 61% 0%, 78% 0%, 100% 22%, 100% 40%, 52% 100%, 4% 40%, 4% 22%, 22% 0%, 39% 0%);
        }

        .star-shape {
            clip-path: polygon(50% 0%, 61% 35%, 98% 35%, 68% 57%, 79% 91%, 50% 70%, 21% 91%, 32% 57%, 2% 35%, 39% 35%);
        }

        .floating {
            animation: float 3s ease-in-out infinite;
        }

        .floating-delayed {
            animation: float 3s ease-in-out infinite;
            animation-delay: -1.5s;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }

        .bounce-soft {
            animation: bounce-soft 2s infinite;
        }

        @keyframes bounce-soft {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-5px); }
        }

        .wiggle:hover {
            animation: wiggle 0.5s ease-in-out;
        }

        @keyframes wiggle {
            0%, 100% { transform: rotate(0deg); }
            25% { transform: rotate(-3deg); }
            75% { transform: rotate(3deg); }
        }

        .paw-print {
            width: 20px;
            height: 20px;
            background: #ff6b9d;
            border-radius: 50%;
            position: relative;
            opacity: 0.6;
        }

        .paw-print::before {
            content: '';
            position: absolute;
            width: 8px;
            height: 12px;
            background: #ff6b9d;
            border-radius: 50%;
            top: -6px;
            left: -2px;
        }

        .paw-print::after {
            content: '';
            position: absolute;
            width: 8px;
            height: 12px;
            background: #ff6b9d;
            border-radius: 50%;
            top: -6px;
            right: -2px;
        }

        .scroll-container {
            scroll-snap-type: x mandatory;
            -webkit-overflow-scrolling: touch;
        }

        .scroll-item {
            scroll-snap-align: start;
            flex-shrink: 0;
        }

        .custom-shadow {
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        }

        .timeline-line {
            background: linear-gradient(to right, #ff6b9d, #4ecdc4, #45b7d1, #96ceb4);
            height: 4px;
            border-radius: 2px;
        }

        .masonry-grid {
            column-count: 3;
            column-gap: 1.5rem;
            column-fill: balance;
        }

        .masonry-item {
            break-inside: avoid;
            margin-bottom: 1.5rem;
        }

        @media (max-width: 768px) {
            .masonry-grid {
                column-count: 1;
            }
        }

        @media (min-width: 769px) and (max-width: 1024px) {
            .masonry-grid {
                column-count: 2;
            }
        }

        .sparkle {
            animation: sparkle 1.5s infinite;
        }

        @keyframes sparkle {
            0%, 100% { opacity: 0; transform: scale(0); }
            50% { opacity: 1; transform: scale(1); }
        }

        .pet-card:hover .sparkle {
            animation: sparkle 1.5s infinite;
        }

        .pet-card:hover img {
            transform: scale(1.05);
        }

        .pet-card img {
            transition: transform 0.3s ease;
        }

        .hero-pet {
            animation: tail-wag 2s infinite;
        }

        @keyframes tail-wag {
            0%, 100% { transform: rotate(-5deg); }
            50% { transform: rotate(5deg); }
        }

        .pulse-heart {
            animation: pulse-heart 2s infinite;
        }

        @keyframes pulse-heart {
            0% { transform: scale(1); }
            50% { transform: scale(1.1); }
            100% { transform: scale(1); }
        }
    </style>
</head>
<body class="bg-gradient-to-br from-purple-50 to-pink-50 overflow-x-hidden">

    <!-- Hero Section -->
    <section class="min-h-screen flex items-center justify-center relative overflow-hidden">
        <!-- Floating paw prints -->
        <div class="absolute inset-0 pointer-events-none">
            <div class="paw-print absolute top-20 left-10 floating"></div>
            <div class="paw-print absolute top-40 right-20 floating-delayed"></div>
            <div class="paw-print absolute bottom-40 left-20 floating"></div>
            <div class="paw-print absolute bottom-20 right-10 floating-delayed"></div>
        </div>

        <div class="container mx-auto px-6 text-center relative z-10">
            <div class="mb-8" data-aos="fade-up">
                <h1 class="text-5xl md:text-7xl font-bold gradient-text mb-4">
                    Adopt Your New
                </h1>
                <h1 class="text-5xl md:text-7xl font-bold text-pink-500 mb-6">
                    Best Friend
                </h1>
                <p class="text-xl md:text-2xl text-gray-600 mb-8 max-w-2xl mx-auto">
                    Give a loving home to adorable pets waiting for their forever family.
                    Every adoption saves a life and brings endless joy! 🐾
                </p>
            </div>

            <div class="flex flex-col sm:flex-row justify-center items-center space-y-4 sm:space-y-0 sm:space-x-8 mb-12" data-aos="fade-up" data-aos-delay="200">
                {{-- Changed to '#' as a placeholder since Laravel routes are not being used in this self-contained file. --}}
                <a href="#" class="bg-gradient-to-r from-pink-500 to-purple-600 text-white px-8 py-4 rounded-full text-xl font-bold shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-300 wiggle">
                    🐱 Browse Available Pets
                </a>
                <div class="w-32 h-32 bg-orange-200 rounded-full flex items-center justify-center hero-pet">
                    <span class="text-6xl">🐕</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Pets Carousel -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-6">
            <h2 class="text-4xl md:text-5xl font-bold text-center mb-12 gradient-text" data-aos="fade-up">
                Meet Our Featured Pets Ready for Adoption
            </h2>

            <div class="overflow-x-auto scroll-container pb-4" data-aos="fade-up" data-aos-delay="200">
                <div class="flex space-x-6 w-max">
                    <!-- Pet Card 1 -->
                    <div class="pet-card scroll-item w-80 bg-gradient-to-br from-pink-100 to-purple-100 rounded-3xl p-6 custom-shadow hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                        <div class="relative mb-4">
                            <div class="w-60 h-60 mx-auto blob-1 bg-gradient-to-br from-pink-200 to-purple-200 overflow-hidden">
                                <img src="https://images.unsplash.com/photo-1552053831-71594a27632d?w=300&h=300&fit=crop"
                                      alt="Luna - Available for adoption" class="w-full h-full object-cover">
                            </div>
                            <div class="absolute top-4 right-4 sparkle">✨</div>
                            <div class="absolute top-4 left-4 bg-green-500 text-white px-3 py-1 rounded-full text-sm font-bold">
                                Available
                            </div>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-800 mb-2">Luna</h3>
                        <p class="text-gray-600 mb-4">2 years old • Playful & Loving • Ready to Adopt</p>
                        {{-- Changed to '#' as a placeholder since Laravel routes are not being used in this self-contained file. --}}
                        <a href="#" class="block w-full bg-pink-500 text-white py-3 rounded-full font-semibold hover:bg-pink-600 transition-colors text-center">
                            💕 Adopt Luna
                        </a>
                    </div>

                    <!-- Pet Card 2 -->
                    <div class="pet-card scroll-item w-80 bg-gradient-to-br from-blue-100 to-teal-100 rounded-3xl p-6 custom-shadow hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                        <div class="relative mb-4">
                            <div class="w-60 h-60 mx-auto blob-2 bg-gradient-to-br from-blue-200 to-teal-200 overflow-hidden">
                                <img src="https://images.unsplash.com/photo-1587300003388-59208cc962cb?w=300&h=300&fit=crop"
                                      alt="Buddy - Available for adoption" class="w-full h-full object-cover">
                            </div>
                            <div class="absolute top-4 right-4 sparkle">✨</div>
                            <div class="absolute top-4 left-4 bg-green-500 text-white px-3 py-1 rounded-full text-sm font-bold">
                                Available
                            </div>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-800 mb-2">Buddy</h3>
                        <p class="text-gray-600 mb-4">3 years old • Energetic & Loyal • Ready to Adopt</p>
                        {{-- Changed to '#' as a placeholder since Laravel routes are not being used in this self-contained file. --}}
                        <a href="#" class="block w-full bg-blue-500 text-white py-3 rounded-full font-semibold hover:bg-blue-600 transition-colors text-center">
                            🐕 Adopt Buddy
                        </a>
                    </div>

                    <!-- Pet Card 3 -->
                    <div class="pet-card scroll-item w-80 bg-gradient-to-br from-green-100 to-emerald-100 rounded-3xl p-6 custom-shadow hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                        <div class="relative mb-4">
                            <div class="w-60 h-60 mx-auto blob-3 bg-gradient-to-br from-green-200 to-emerald-200 overflow-hidden">
                                <img src="https://images.unsplash.com/photo-1574231164645-d6f0e8553590?w=300&h=300&fit=crop"
                                      alt="Coco - Available for adoption" class="w-full h-full object-cover">
                            </div>
                            <div class="absolute top-4 right-4 sparkle">✨</div>
                            <div class="absolute top-4 left-4 bg-green-500 text-white px-3 py-1 rounded-full text-sm font-bold">
                                Available
                            </div>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-800 mb-2">Coco</h3>
                        <p class="text-gray-600 mb-4">1 year old • Gentle & Cuddly • Ready to Adopt</p>
                        {{-- Changed to '#' as a placeholder since Laravel routes are not being used in this self-contained file. --}}
                        <a href="#" class="block w-full bg-green-500 text-white py-3 rounded-full font-semibold hover:bg-green-600 transition-colors text-center">
                            🐰 Adopt Coco
                        </a>
                    </div>

                    <!-- Pet Card 4 -->
                    <div class="pet-card scroll-item w-80 bg-gradient-to-br from-yellow-100 to-orange-100 rounded-3xl p-6 custom-shadow hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                        <div class="relative mb-4">
                            <div class="w-60 h-60 mx-auto heart-shape bg-gradient-to-br from-yellow-200 to-orange-200 overflow-hidden">
                                <img src="https://images.unsplash.com/photo-1583337130417-3346a1be7dee?w=300&h=300&fit=crop"
                                      alt="Peanut - Available for adoption" class="w-full h-full object-cover">
                            </div>
                            <div class="absolute top-4 right-4 sparkle">✨</div>
                            <div class="absolute top-4 left-4 bg-green-500 text-white px-3 py-1 rounded-full text-sm font-bold">
                                Available
                            </div>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-800 mb-2">Peanut</h3>
                        <p class="text-gray-600 mb-4">6 months old • Tiny & Adorable • Ready to Adopt</p>
                        {{-- Changed to '#' as a placeholder since Laravel routes are not being used in this self-contained file. --}}
                        <a href="#" class="block w-full bg-yellow-500 text-white py-3 rounded-full font-semibold hover:bg-yellow-600 transition-colors text-center">
                            🐹 Adopt Peanut
                        </a>
                    </div>

                    <!-- Pet Card 5 -->
                    <div class="pet-card scroll-item w-80 bg-gradient-to-br from-purple-100 to-pink-100 rounded-3xl p-6 custom-shadow hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                        <div class="relative mb-4">
                            <div class="w-60 h-60 mx-auto star-shape bg-gradient-to-br from-purple-200 to-pink-200 overflow-hidden">
                                <img src="https://images.unsplash.com/photo-1548199973-03cce0bbc87b?w=300&h=300&fit=crop"
                                      alt="Mochi - Available for adoption" class="w-full h-full object-cover">
                            </div>
                            <div class="absolute top-4 right-4 sparkle">✨</div>
                            <div class="absolute top-4 left-4 bg-green-500 text-white px-3 py-1 rounded-full text-sm font-bold">
                                Available
                            </div>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-800 mb-2">Mochi</h3>
                        <p class="text-gray-600 mb-4">4 months old • Sweet & Playful • Ready to Adopt</p>
                        {{-- Changed to '#' as a placeholder since Laravel routes are not being used in this self-contained file. --}}
                        <a href="#" class="block w-full bg-purple-500 text-white py-3 rounded-full font-semibold hover:bg-purple-600 transition-colors text-center">
                            🐱 Adopt Mochi
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Adopt Section -->
    <section class="py-20 bg-gradient-to-br from-purple-50 to-pink-50">
        <div class="container mx-auto px-6">
            <h2 class="text-4xl md:text-5xl font-bold text-center mb-16 gradient-text" data-aos="fade-up">
                Why Choose Adoption?
            </h2>

            <div class="grid md:grid-cols-3 gap-8 max-w-6xl mx-auto">
                <div class="text-center" data-aos="fade-up" data-aos-delay="100">
                    <div class="w-32 h-32 bg-gradient-to-br from-pink-200 to-purple-200 rounded-full flex items-center justify-center mx-auto mb-6 bounce-soft">
                        <span class="text-5xl">🏠</span>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-4">Give a Forever Home</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Open your heart and home to a pet in need. Every adoption creates a beautiful bond
                        that enriches both your life and theirs with unconditional love.
                    </p>
                </div>

                <div class="text-center" data-aos="fade-up" data-aos-delay="200">
                    <div class="w-32 h-32 bg-gradient-to-br from-red-200 to-pink-200 rounded-full flex items-center justify-center mx-auto mb-6 bounce-soft pulse-heart">
                        <span class="text-5xl">❤️</span>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-4">Experience Pure Love</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Adopted pets are incredibly grateful and form deep bonds with their new families.
                        They bring joy, laughter, and companionship that will transform your daily life.
                    </p>
                </div>

                <div class="text-center" data-aos="fade-up" data-aos-delay="300">
                    <div class="w-32 h-32 bg-gradient-to-br from-blue-200 to-teal-200 rounded-full flex items-center justify-center mx-auto mb-6 bounce-soft">
                        <span class="text-5xl">🦸</span>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-4">Become a Pet Hero</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Your adoption directly saves a precious life and creates space for another animal in need.
                        Be the hero in their story and make a lasting impact on animal welfare.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Adoption Process Timeline -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-6">
            <h2 class="text-4xl md:text-5xl font-bold text-center mb-16 gradient-text" data-aos="fade-up">
                Your Adoption Journey
            </h2>

            <div class="max-w-5xl mx-auto">
                <div class="timeline-line mb-12" data-aos="fade-up"></div>

                <div class="grid md:grid-cols-4 gap-8">
                    <div class="text-center" data-aos="fade-up" data-aos-delay="100">
                        <div class="w-24 h-24 bg-gradient-to-br from-pink-400 to-purple-500 rounded-full flex items-center justify-center mx-auto mb-4 text-white text-2xl font-bold">
                            1
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 mb-2">Browse & Choose</h3>
                        <p class="text-gray-600">Explore our available pets and find your perfect match based on lifestyle and preferences</p>
                    </div>

                    <div class="text-center" data-aos="fade-up" data-aos-delay="200">
                        <div class="w-24 h-24 bg-gradient-to-br from-blue-400 to-teal-500 rounded-full flex items-center justify-center mx-auto mb-4 text-white text-2xl font-bold">
                            2
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 mb-2">Meet & Greet</h3>
                        <p class="text-gray-600">Schedule a visit to meet your potential new family member and see if it's a perfect fit</p>
                    </div>

                    <div class="text-center" data-aos="fade-up" data-aos-delay="300">
                        <div class="w-24 h-24 bg-gradient-to-br from-green-400 to-emerald-500 rounded-full flex items-center justify-center mx-auto mb-4 text-white text-2xl font-bold">
                            3
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 mb-2">Application Process</h3>
                        <p class="text-gray-600">Complete our simple adoption application and home check to ensure the best match</p>
                    </div>

                    <div class="text-center" data-aos="fade-up" data-aos-delay="400">
                        <div class="w-24 h-24 bg-gradient-to-br from-yellow-400 to-orange-500 rounded-full flex items-center justify-center mx-auto mb-4 text-white text-2xl font-bold">
                            4
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 mb-2">Welcome Home</h3>
                        <p class="text-gray-600">Finalize the adoption and welcome your new furry family member to their forever home</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Success Stories -->
    <section class="py-20 bg-gradient-to-br from-purple-50 to-pink-50">
        <div class="container mx-auto px-6">
            <h2 class="text-4xl md:text-5xl font-bold text-center mb-16 gradient-text" data-aos="fade-up">
                Successful Adoptions
            </h2>

            <div class="masonry-grid max-w-6xl mx-auto">
                <div class="masonry-item bg-white rounded-3xl p-6 custom-shadow" data-aos="fade-right">
                    <div class="w-full h-48 bg-gradient-to-br from-pink-200 to-purple-200 rounded-2xl overflow-hidden mb-4">
                        <img src="https://images.unsplash.com/photo-1601758228041-f3b2795255f1?w=400&h=300&fit=crop"
                              alt="Happy adoption story" class="w-full h-full object-cover">
                    </div>
                    <p class="text-gray-600 mb-4">"Max was the perfect addition to our family! The adoption process was smooth and the LittleFur team was incredibly supportive. He's brought so much joy to our home."</p>
                    <p class="font-semibold text-purple-600">- Sarah & Family</p>
                    <div class="mt-2 text-sm text-gray-500">✨ Adopted Max in March 2024</div>
                </div>

                <div class="masonry-item bg-white rounded-3xl p-6 custom-shadow" data-aos="fade-up">
                    <div class="w-full h-32 bg-gradient-to-br from-blue-200 to-teal-200 rounded-2xl overflow-hidden mb-4">
                        <img src="https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=400&h=200&fit=crop"
                              alt="Cat adoption success" class="w-full h-full object-cover">
                    </div>
                    <p class="text-gray-600 mb-4">"Bella is the sweetest cat ever! She purrs every morning and has made my apartment feel like home. Thank you LittleFur for this perfect match!"</p>
                    <p class="font-semibold text-blue-600">- Mike</p>
                    <div class="mt-2 text-sm text-gray-500">✨ Adopted Bella in February 2024</div>
                </div>

                <div class="masonry-item bg-white rounded-3xl p-6 custom-shadow" data-aos="fade-left">
                    <div class="w-full h-56 bg-gradient-to-br from-green-200 to-emerald-200 rounded-2xl overflow-hidden mb-4">
                        <img src="https://images.unsplash.com/photo-1560807707-8cc77767d783?w=400&h=350&fit=crop"
                              alt="Dog adoption success" class="w-full h-full object-cover">
                    </div>
                    <p class="text-gray-600 mb-4">"Adopting Charlie through LittleFur was the best decision ever! He's helped me stay active and made me so many new friends at the dog park. Couldn't be happier!"</p>
                    <p class="font-semibold text-green-600">- Emma</p>
                    <div class="mt-2 text-sm text-gray-500">✨ Adopted Charlie in January 2024</div>
                </div>

                <div class="masonry-item bg-white rounded-3xl p-6 custom-shadow" data-aos="fade-right">
                    <div class="w-full h-40 bg-gradient-to-br from-yellow-200 to-orange-200 rounded-2xl overflow-hidden mb-4">
                        <img src="https://images.unsplash.com/photo-1574158622682-e40e69881006?w=400&h=250&fit=crop"
                              alt="Successful pet adoption" class="w-full h-full object-cover">
                    </div>
                    <p class="text-gray-600 mb-4">"Luna is such a character! She follows me everywhere and has become my best friend. The adoption process was seamless and well-organized."</p>
                    <p class="font-semibold text-yellow-600">- Alex</p>
                    <div class="mt-2 text-sm text-gray-500">✨ Adopted Luna in December 2023</div>
                </div>

                <div class="masonry-item bg-white rounded-3xl p-6 custom-shadow" data-aos="fade-up">
                    <div class="w-full h-44 bg-gradient-to-br from-purple-200 to-pink-200 rounded-2xl overflow-hidden mb-4">
                        <img src="https://images.unsplash.com/photo-1583512603805-3cc6b41f3edb?w=400&h=275&fit=crop"
                              alt="Family pet adoption" class="w-full h-full object-cover">
                    </div>
                    <p class="text-gray-600 mb-4">"Our rescue dog Rocky has taught us so much about unconditional love. The kids adore him and LittleFur made sure we were all prepared for this wonderful journey!"</p>
                    <p class="font-semibold text-purple-600">- The Johnson Family</p>
                    <div class="mt-2 text-sm text-gray-500">✨ Adopted Rocky in November 2023</div>
                </div>
            </div>
        </div>
    </section>

    {{-- Initialize AOS and GSAP Animations --}}
    <script>
        // Initialize AOS
        AOS.init({
            duration: 1000,
            once: true,
        });

        // Register GSAP ScrollTrigger plugin
        gsap.registerPlugin(ScrollTrigger);

        // Hero section entrance animation
        gsap.from(".hero-text", {
            opacity: 0,
            y: 50,
            duration: 1,
            ease: "power3.out",
            stagger: 0.2,
            delay: 0.5
        });

        // Example ScrollTrigger animation for the first pet card
        gsap.from(".pet-card:nth-child(1)", {
            scrollTrigger: {
                trigger: ".pet-card:nth-child(1)",
                start: "top 80%", // When the top of the trigger hits 80% of the viewport
                toggleActions: "play none none none"
            },
            opacity: 0,
            y: 50,
            duration: 0.8,
            ease: "power3.out"
        });

        // You can add more ScrollTrigger animations for other sections or elements as needed
        // For example, for "Why Choose Adoption?" section
        gsap.from(".why-adopt-heading", {
            scrollTrigger: {
                trigger: ".why-adopt-heading",
                start: "top 75%",
                toggleActions: "play none none none"
            },
            opacity: 0,
            y: 50,
            duration: 1,
            ease: "power3.out"
        });
    </script>
</body>

<body>
    {{-- This is where you include the nav.blade.php layout --}}
    @include('layouts.nav') {{-- Assuming nav.blade.php is in a 'layouts' directory --}}
    {{-- @yield('content') --}}
</body>

</html>
