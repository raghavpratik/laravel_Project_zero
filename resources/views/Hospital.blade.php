<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LittleFur - Pet Clinics & Hospitals</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

        * {
            font-family: 'Poppins', sans-serif;
        }

        .blob-shape {
            clip-path: polygon(30% 0%, 70% 0%, 100% 30%, 100% 70%, 70% 100%, 30% 100%, 0% 70%, 0% 30%);
        }

        .rounded-blob {
            border-radius: 60% 40% 30% 70% / 60% 30% 70% 40%;
        }

        .gradient-bg {
            background: linear-gradient(135deg, #ffeef8 0%, #e8f4fd 100%);
        }

        .glass-effect {
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.8);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .floating {
            animation: float 3s ease-in-out infinite;
        }

        .bounce-hover:hover {
            animation: bounce 0.5s ease-in-out;
        }

        .pulse-glow {
            animation: pulse-glow 2s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }

        @keyframes bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-5px); }
        }

        @keyframes pulse-glow {
            0%, 100% { box-shadow: 0 0 20px rgba(255, 182, 193, 0.5); }
            50% { box-shadow: 0 0 30px rgba(255, 182, 193, 0.8); }
        }

        .scroll-container {
            scroll-snap-type: x mandatory;
            scroll-behavior: smooth;
        }

        .scroll-item {
            scroll-snap-align: start;
        }

        .wiggle:hover {
            animation: wiggle 0.5s ease-in-out;
        }

        @keyframes wiggle {
            0%, 100% { transform: rotate(0deg); }
            25% { transform: rotate(5deg); }
            75% { transform: rotate(-5deg); }
        }

        .custom-shape-1 {
            clip-path: polygon(25% 0%, 75% 0%, 100% 50%, 75% 100%, 25% 100%, 0% 50%);
        }

        .custom-shape-2 {
            clip-path: polygon(0% 20%, 60% 20%, 60% 0%, 100% 50%, 60% 100%, 60% 80%, 0% 80%);
        }

        .emergency-blink {
            animation: blink 1s infinite;
        }

        @keyframes blink {
            0%, 50% { opacity: 1; }
            51%, 100% { opacity: 0.3; }
        }
    </style>

{{-- </head>
<body class="bg-gradient-to-br from-pink-50 to-blue-50 min-h-screen"> --}}
    {{-- <header class="glass-effect fixed w-full z-50 top-0">
        <div class="container mx-auto px-4 py-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-2">
                    <div class="w-10 h-10 bg-gradient-to-r from-pink-400 to-purple-400 rounded-full flex items-center justify-center">
                        <i class="fas fa-paw text-white text-lg"></i> --}}
                    {{-- </div>
                    <h1 class="text-2xl font-bold text-gray-800">LittleFur</h1>
                </div> --}}
                {{-- <nav class="hidden md:flex space-x-6">
                    <a href="#" class="text-gray-600 hover:text-pink-500 transition-colors">Home</a>
                    <a href="#" class="text-pink-500 font-semibold">Clinics</a>
                    <a href="#" class="text-gray-600 hover:text-pink-500 transition-colors">Services</a>
                    <a href="#" class="text-gray-600 hover:text-pink-500 transition-colors">About</a>
                </nav> --}}
                {{-- <button class="bg-gradient-to-r from-pink-400 to-purple-400 text-white px-6 py-2 rounded-full hover:shadow-lg transition-all bounce-hover">
                    Sign In
                </button>
            </div>
        </div> --}}
    {{-- </header> --}}

    <section class="pt-24 pb-16 gradient-bg">
        <div class="container mx-auto px-4">
            <div class="flex flex-col lg:flex-row items-center">
                <div class="lg:w-1/2 text-center lg:text-left mb-8 lg:mb-0" data-aos="fade-right">
                    <h2 class="text-4xl lg:text-6xl font-bold text-gray-800 mb-6">
                        Care They Deserve, 
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-pink-500 to-purple-500">
                            Clinics You Can Trust
                        </span>
                    </h2>
                    <p class="text-xl text-gray-600 mb-8 leading-relaxed">
                        Connect with verified veterinary clinics and hospitals in your area. Book appointments, access medical records, and ensure your furry friends get the best care possible.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                        <button class="bg-gradient-to-r from-pink-500 to-purple-500 text-white px-8 py-4 rounded-full text-lg font-semibold hover:shadow-xl transition-all bounce-hover">
                            <i class="fas fa-search mr-2"></i>Find a Clinic
                        </button>
                        <button class="bg-white text-gray-700 px-8 py-4 rounded-full text-lg font-semibold hover:shadow-xl transition-all bounce-hover border-2 border-pink-200">
                            <i class="fas fa-calendar-check mr-2"></i>Book Now
                        </button>
                    </div>
                </div>
                <div class="lg:w-1/2 flex justify-center" data-aos="fade-left">
                    <div class="relative">
                        <div class="w-96 h-96 rounded-blob bg-gradient-to-br from-pink-200 to-purple-200 flex items-center justify-center floating">
                            <div class="text-center">
                                <div class="w-32 h-32 bg-white rounded-full flex items-center justify-center mb-4 mx-auto wiggle">
                                    <i class="fas fa-stethoscope text-6xl text-pink-500"></i>
                                </div>
                                <div class="flex justify-center space-x-4">
                                    <div class="w-16 h-16 bg-gradient-to-r from-orange-300 to-yellow-300 rounded-full flex items-center justify-center">
                                        <i class="fas fa-cat text-white text-2xl"></i>
                                    </div>
                                    <div class="w-16 h-16 bg-gradient-to-r from-blue-300 to-green-300 rounded-full flex items-center justify-center">
                                        <i class="fas fa-dog text-white text-2xl"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="absolute -top-4 -right-4 w-12 h-12 bg-yellow-300 rounded-full flex items-center justify-center floating" style="animation-delay: 0.5s;">
                            <i class="fas fa-heart text-red-500"></i>
                        </div>
                        <div class="absolute -bottom-4 -left-4 w-12 h-12 bg-green-300 rounded-full flex items-center justify-center floating" style="animation-delay: 1s;">
                            <i class="fas fa-shield-alt text-blue-500"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-16 bg-white" id="search-section">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12" data-aos="fade-up">
                <h3 class="text-3xl font-bold text-gray-800 mb-4">Find the Perfect Clinic</h3>
                <p class="text-gray-600 text-lg">Search by location, services, or clinic name</p>
            </div>

            <div class="max-w-4xl mx-auto mb-12" data-aos="fade-up" data-aos-delay="200">
                <div class="glass-effect rounded-2xl p-6">
                    <div class="flex flex-col lg:flex-row gap-4">
                        <div class="flex-1">
                            <div class="relative">
                                <input type="text" placeholder="Search clinics..." class="w-full px-6 py-4 rounded-xl border-2 border-pink-200 focus:border-pink-500 focus:outline-none text-lg">
                                <i class="fas fa-search absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                            </div>
                        </div>
                        <div class="flex flex-col sm:flex-row gap-4">
                            <select class="px-6 py-4 rounded-xl border-2 border-pink-200 focus:border-pink-500 focus:outline-none">
                                <option>All Services</option>
                                <option>Vaccination</option>
                                <option>Surgery</option>
                                <option>Emergency</option>
                                <option>Grooming</option>
                            </select>
                            <select class="px-6 py-4 rounded-xl border-2 border-pink-200 focus:border-pink-500 focus:outline-none">
                                <option>Distance</option>
                                <option>5 km</option>
                                <option>10 km</option>
                                <option>25 km</option>
                            </select>
                            <button class="bg-gradient-to-r from-pink-500 to-purple-500 text-white px-8 py-4 rounded-xl hover:shadow-lg transition-all bounce-hover">
                                Search
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="bg-white rounded-2xl shadow-lg p-6 hover:shadow-xl transition-all duration-300 bounce-hover custom-shape-1" data-aos="fade-up" data-aos-delay="300">
                    <div class="flex items-center justify-between mb-4">
                        <h4 class="text-xl font-semibold text-gray-800">PawCare Clinic</h4>
                        <div class="flex items-center text-green-500">
                            <div class="w-3 h-3 bg-green-500 rounded-full mr-2 pulse-glow"></div>
                            <span class="text-sm font-medium">Open</span>
                        </div>
                    </div>
                    <div class="mb-4">
                        <div class="flex items-center text-gray-600 mb-2">
                            <i class="fas fa-map-marker-alt mr-2 text-pink-500"></i>
                            <span>2.5 km away</span>
                        </div>
                        <div class="flex items-center text-yellow-400 mb-2">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <span class="text-gray-600 ml-2">4.9 (124 reviews)</span>
                        </div>
                    </div>
                    <div class="flex flex-wrap gap-2 mb-4">
                        <span class="bg-pink-100 text-pink-600 px-3 py-1 rounded-full text-sm">Vaccination</span>
                        <span class="bg-blue-100 text-blue-600 px-3 py-1 rounded-full text-sm">Surgery</span>
                        <span class="bg-green-100 text-green-600 px-3 py-1 rounded-full text-sm">Emergency</span>
                    </div>
                    <div class="flex gap-3">
                        <button class="flex-1 bg-gradient-to-r from-pink-500 to-purple-500 text-white py-3 rounded-xl hover:shadow-lg transition-all bounce-hover">
                            <i class="fas fa-calendar-check mr-2"></i>Book
                        </button>
                        <button class="flex-1 bg-gray-100 text-gray-700 py-3 rounded-xl hover:bg-gray-200 transition-all bounce-hover">
                            <i class="fas fa-phone mr-2"></i>Call
                        </button>
                    </div>
                </div>

                <div class="bg-white rounded-2xl shadow-lg p-6 hover:shadow-xl transition-all duration-300 bounce-hover rounded-blob" data-aos="fade-up" data-aos-delay="400">
                    <div class="flex items-center justify-between mb-4">
                        <h4 class="text-xl font-semibold text-gray-800">VetCare Plus</h4>
                        <div class="flex items-center text-orange-500">
                            <div class="w-3 h-3 bg-orange-500 rounded-full mr-2 pulse-glow"></div>
                            <span class="text-sm font-medium">Busy</span>
                        </div>
                    </div>
                    <div class="mb-4">
                        <div class="flex items-center text-gray-600 mb-2">
                            <i class="fas fa-map-marker-alt mr-2 text-pink-500"></i>
                            <span>4.2 km away</span>
                        </div>
                        <div class="flex items-center text-yellow-400 mb-2">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                            <span class="text-gray-600 ml-2">4.7 (89 reviews)</span>
                        </div>
                    </div>
                    <div class="flex flex-wrap gap-2 mb-4">
                        <span class="bg-purple-100 text-purple-600 px-3 py-1 rounded-full text-sm">Specialist</span>
                        <span class="bg-yellow-100 text-yellow-600 px-3 py-1 rounded-full text-sm">Grooming</span>
                        <span class="bg-red-100 text-red-600 px-3 py-1 rounded-full text-sm">24/7</span>
                    </div>
                    <div class="flex gap-3">
                        <button class="flex-1 bg-gradient-to-r from-pink-500 to-purple-500 text-white py-3 rounded-xl hover:shadow-lg transition-all bounce-hover">
                            <i class="fas fa-calendar-check mr-2"></i>Book
                        </button>
                        <button class="flex-1 bg-gray-100 text-gray-700 py-3 rounded-xl hover:bg-gray-200 transition-all bounce-hover">
                            <i class="fas fa-phone mr-2"></i>Call
                        </button>
                    </div>
                </div>

                <div class="bg-white rounded-2xl shadow-lg p-6 hover:shadow-xl transition-all duration-300 bounce-hover custom-shape-2" data-aos="fade-up" data-aos-delay="500">
                    <div class="flex items-center justify-between mb-4">
                        <h4 class="text-xl font-semibold text-gray-800">Animal Hospital</h4>
                        <div class="flex items-center text-red-500">
                            <div class="w-3 h-3 bg-red-500 rounded-full mr-2"></div>
                            <span class="text-sm font-medium">Closed</span>
                        </div>
                    </div>
                    <div class="mb-4">
                        <div class="flex items-center text-gray-600 mb-2">
                            <i class="fas fa-map-marker-alt mr-2 text-pink-500"></i>
                            <span>6.1 km away</span>
                        </div>
                        <div class="flex items-center text-yellow-400 mb-2">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <span class="text-gray-600 ml-2">5.0 (201 reviews)</span>
                        </div>
                    </div>
                    <div class="flex flex-wrap gap-2 mb-4">
                        <span class="bg-indigo-100 text-indigo-600 px-3 py-1 rounded-full text-sm">Full Service</span>
                        <span class="bg-teal-100 text-teal-600 px-3 py-1 rounded-full text-sm">Lab Tests</span>
                        <span class="bg-pink-100 text-pink-600 px-3 py-1 rounded-full text-sm">Imaging</span>
                    </div>
                    <div class="flex gap-3">
                        <button class="flex-1 bg-gradient-to-r from-pink-500 to-purple-500 text-white py-3 rounded-xl hover:shadow-lg transition-all bounce-hover">
                            <i class="fas fa-calendar-check mr-2"></i>Book
                        </button>
                        <button class="flex-1 bg-gray-100 text-gray-700 py-3 rounded-xl hover:bg-gray-200 transition-all bounce-hover">
                            <i class="fas fa-phone mr-2"></i>Call
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-16 bg-gradient-to-r from-pink-50 to-purple-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12" data-aos="fade-up">
                <h3 class="text-3xl font-bold text-gray-800 mb-4">Featured Clinics</h3>
                <p class="text-gray-600 text-lg">Top-rated veterinary clinics in your area</p>
            </div>

            <div class="overflow-x-auto scroll-container pb-4" data-aos="fade-up" data-aos-delay="200">
                <div class="flex space-x-6 w-max">
                    <div class="scroll-item bg-white rounded-2xl shadow-lg p-6 w-80 hover:shadow-xl transition-all duration-300 bounce-hover">
                        <div class="w-full h-48 bg-gradient-to-br from-pink-200 to-purple-200 rounded-xl mb-4 flex items-center justify-center">
                            <i class="fas fa-hospital text-6xl text-white"></i>
                        </div>
                        <h4 class="text-xl font-semibold text-gray-800 mb-2">Pet Paradise Clinic</h4>
                        <p class="text-gray-600 mb-4">Complete veterinary care with state-of-the-art facilities.</p>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center text-yellow-400">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <span class="text-gray-600 ml-2">5.0</span>
                            </div>
                            <button class="bg-gradient-to-r from-pink-500 to-purple-500 text-white px-6 py-2 rounded-full hover:shadow-lg transition-all bounce-hover">
                                Book Now
                            </button>
                        </div>
                    </div>

                    <div class="scroll-item bg-white rounded-2xl shadow-lg p-6 w-80 hover:shadow-xl transition-all duration-300 bounce-hover">
                        <div class="w-full h-48 bg-gradient-to-br from-blue-200 to-green-200 rounded-xl mb-4 flex items-center justify-center">
                            <i class="fas fa-user-md text-6xl text-white"></i>
                        </div>
                        <h4 class="text-xl font-semibold text-gray-800 mb-2">Caring Paws Veterinary</h4>
                        <p class="text-gray-600 mb-4">24/7 emergency care and specialized treatments.</p>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center text-yellow-400">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                                <span class="text-gray-600 ml-2">4.8</span>
                            </div>
                            <button class="bg-gradient-to-r from-pink-500 to-purple-500 text-white px-6 py-2 rounded-full hover:shadow-lg transition-all bounce-hover">
                                Book Now
                            </button>
                        </div>
                    </div>

                    <div class="scroll-item bg-white rounded-2xl shadow-lg p-6 w-80 hover:shadow-xl transition-all duration-300 bounce-hover">
                        <div class="w-full h-48 bg-gradient-to-br from-yellow-200 to-orange-200 rounded-xl mb-4 flex items-center justify-center">
                            <i class="fas fa-heartbeat text-6xl text-white"></i>
                        </div>
                        <h4 class="text-xl font-semibold text-gray-800 mb-2">Healthy Tails Clinic</h4>
                        <p class="text-gray-600 mb-4">Preventive care and wellness programs for all pets.</p>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center text-yellow-400">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <span class="text-gray-600 ml-2">4.9</span>
                            </div>
                            <button class="bg-gradient-to-r from-pink-500 to-purple-500 text-white px-6 py-2 rounded-full hover:shadow-lg transition-all bounce-hover">
                                Book Now
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <div class="text-center mb-12" data-aos="fade-up">
                    <h3 class="text-3xl font-bold text-gray-800 mb-4">Book an Appointment</h3>
                    <p class="text-gray-600 text-lg">Quick and easy online booking for your pet's care</p>
                </div>

                <div class="glass-effect rounded-2xl p-8" data-aos="fade-up" data-aos-delay="200">
                    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">Select Clinic</label>
                            <select class="w-full px-4 py-3 rounded-xl border-2 border-pink-200 focus:border-pink-500 focus:outline-none">
                                <option>Choose a clinic...</option>
                                <option>PawCare Clinic</option>
                                <option>VetCare Plus</option>
                                <option>Animal Hospital</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">Select Date</label>
                            <input type="date" class="w-full px-4 py-3 rounded-xl border-2 border-pink-200 focus:border-pink-500 focus:outline-none">
                        </div>
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">Select Time</label>
                            <select class="w-full px-4 py-3 rounded-xl border-2 border-pink-200 focus:border-pink-500 focus:outline-none">
                                <option>Choose time...</option>
                                <option>9:00 AM</option>
                                <option>10:30 AM</option>
                                <option>2:00 PM</option>
                                <option>4:30 PM</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-8">
                        <label class="block text-gray-700 font-medium mb-4">Services Needed</label>
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                            <label class="flex items-center space-x-3 p-3 rounded-xl border-2 border-gray-200 hover:border-pink-300 cursor-pointer transition-all">
                                <input type="checkbox" class="text-pink-500 rounded">
                                <span class="text-gray-700">Vaccination</span>
                            </label>
                            <label class="flex items-center space-x-3 p-3 rounded-xl border-2 border-gray-200 hover:border-pink-300 cursor-pointer transition-all">
                                <input type="checkbox" class="text-pink-500 rounded">
                                <span class="text-gray-700">Check-up</span>
                            </label>
                            <label class="flex items-center space-x-3 p-3 rounded-xl border-2 border-gray-200 hover:border-pink-300 cursor-pointer transition-all">
                                <input type="checkbox" class="text-pink-500 rounded">
                                <span class="text-gray-700">Emergency</span>
                            </label>
                            <label class="flex items-center space-x-3 p-3 rounded-xl border-2 border-gray-200 hover:border-pink-300 cursor-pointer transition-all">
                                <input type="checkbox" class="text-pink-500 rounded">
                                <span class="text-gray-700">Grooming</span>
                            </label>
                        </div>
                    </div>

                    <div class="text-center">
                        <button class="bg-gradient-to-r from-pink-500 to-purple-500 text-white px-12 py-4 rounded-full text-lg font-semibold hover:shadow-xl transition-all bounce-hover">
                            <i class="fas fa-calendar-check mr-2"></i>Book Appointment
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-16 bg-gradient-to-r from-blue-50 to-purple-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12" data-aos="fade-up">
                <h3 class="text-3xl font-bold text-gray-800 mb-4">Health Articles & Tips</h3>
                <p class="text-gray-600 text-lg">Stay informed with the latest pet health advice</p>
            </div>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="bg-white rounded-2xl shadow-lg p-6 hover:shadow-xl transition-all duration-300 bounce-hover" data-aos="fade-up" data-aos-delay="300">
                    <img src="https://via.placeholder.com/400x250" alt="Pet Nutrition" class="rounded-xl mb-4">
                    <h4 class="text-xl font-semibold text-gray-800 mb-2">Understanding Your Pet's Nutrition Needs</h4>
                    <p class="text-gray-600 text-sm mb-4">A guide to choosing the right food for a healthy and happy pet.</p>
                    <a href="#" class="text-pink-500 hover:text-purple-500 font-semibold flex items-center">
                        Read More <i class="fas fa-arrow-right ml-2 text-sm"></i>
                    </a>
                </div>
                <div class="bg-white rounded-2xl shadow-lg p-6 hover:shadow-xl transition-all duration-300 bounce-hover" data-aos="fade-up" data-aos-delay="400">
                    <img src="https://via.placeholder.com/400x250" alt="Common Pet Illnesses" class="rounded-xl mb-4">
                    <h4 class="text-xl font-semibold text-gray-800 mb-2">Common Illnesses in Cats and Dogs</h4>
                    <p class="text-gray-600 text-sm mb-4">Learn to recognize symptoms and when to seek veterinary help.</p>
                    <a href="#" class="text-pink-500 hover:text-purple-500 font-semibold flex items-center">
                        Read More <i class="fas fa-arrow-right ml-2 text-sm"></i>
                    </a>
                </div>
                <div class="bg-white rounded-2xl shadow-lg p-6 hover:shadow-xl transition-all duration-300 bounce-hover" data-aos="fade-up" data-aos-delay="500">
                    <img src="https://via.placeholder.com/400x250" alt="Preventive Care" class="rounded-xl mb-4">
                    <h4 class="text-xl font-semibold text-gray-800 mb-2">The Importance of Regular Vet Check-ups</h4>
                    <p class="text-gray-600 text-sm mb-4">Preventive care is key to a long and healthy life for your pet.</p>
                    <a href="#" class="text-pink-500 hover:text-purple-500 font-semibold flex items-center">
                        Read More <i class="fas fa-arrow-right ml-2 text-sm"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="py-16 bg-gradient-to-r from-red-100 to-pink-100">
        <div class="container mx-auto px-4 text-center">
            <div class="bg-white rounded-2xl shadow-xl p-8 max-w-3xl mx-auto glass-effect" data-aos="zoom-in">
                <div class="flex items-center justify-center mb-6">
                    <i class="fas fa-bell-on text-red-500 text-5xl emergency-blink mr-4"></i>
                    <h3 class="text-4xl font-bold text-gray-800">Pet Emergency?</h3>
                </div>
                <p class="text-xl text-gray-700 mb-8">
                    Our verified clinics offer 24/7 emergency services. Find immediate help for your pet.
                </p>
                <button class="bg-red-500 text-white px-10 py-5 rounded-full text-xl font-semibold hover:bg-red-600 hover:shadow-lg transition-all bounce-hover pulse-glow">
                    <i class="fas fa-phone-alt mr-3"></i>Call Emergency Vet Now
                </button>
            </div>
        </div>
    </section>

    <footer class="bg-gray-800 text-white py-12">
        <div class="container mx-auto px-4 grid grid-cols-1 md:grid-cols-4 gap-8">
            <div>
                <h3 class="text-2xl font-bold mb-4">LittleFur</h3>
                <p class="text-gray-400">Your trusted platform for pet health and wellness.</p>
            </div>
            <div>
                <h4 class="text-xl font-semibold mb-4">Quick Links</h4>
                <ul class="space-y-2">
                    <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Home</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Find Clinics</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Services</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition-colors">About Us</a></li>
                </ul>
            </div>
            <div>
                <h4 class="text-xl font-semibold mb-4">Services</h4>
                <ul class="space-y-2">
                    <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Vaccination</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Surgery</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Grooming</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Emergency Care</a></li>
                </ul>
            </div>
            <div>
                <h4 class="text-xl font-semibold mb-4">Contact Us</h4>
                <p class="text-gray-400 mb-2"><i class="fas fa-map-marker-alt mr-2"></i>123 Pet Lane, Animal City</p>
                <p class="text-gray-400 mb-2"><i class="fas fa-phone mr-2"></i>+1 (555) 123-4567</p>
                <p class="text-gray-400 mb-2"><i class="fas fa-envelope mr-2"></i>info@littlefur.com</p>
                <div class="flex space-x-4 mt-4">
                    <a href="#" class="text-gray-400 hover:text-white transition-colors"><i class="fab fa-facebook-f text-lg"></i></a>
                    <a href="#" class="text-gray-400 hover:text-white transition-colors"><i class="fab fa-twitter text-lg"></i></a>
                    <a href="#" class="text-gray-400 hover:text-white transition-colors"><i class="fab fa-instagram text-lg"></i></a>
                </div>
            </div>
        </div>
        <div class="container mx-auto px-4 text-center text-gray-500 mt-8 border-t border-gray-700 pt-8">
            &copy; 2024 LittleFur. All rights reserved.
        </div>
    </footer>

    <script>
        AOS.init({
            duration: 1000,
            once: true,
            mirror: false
        });

        // GSAP Animations (example, can be expanded)
        gsap.from(".hero-text", { duration: 1, y: 50, opacity: 0, ease: "power3.out", delay: 0.5 });
        gsap.from(".hero-image", { duration: 1, x: 50, opacity: 0, ease: "power3.out", delay: 0.8 });
    </script>
</body>

<body>
    {{-- This is where you include the nav.blade.php layout --}}
    @include('layouts.nav') {{-- Assuming nav.blade.php is in a 'layouts' directory --}}
    {{-- @yield('content') --}}
</body>

</html>