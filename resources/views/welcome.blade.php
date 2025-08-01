<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LittleFur | Your Complete Pet Services Platform</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
            overflow-x: hidden;
            background-color: #1A202C; /* Darker background for contrast */
            /* REMOVED: padding-bottom: 100px; */
        }
        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        .hero-gradient {
            background: linear-gradient(135deg, #059669 0%, #0d9488 50%, #0f766e 100%);
            position: relative;
        }
        .card-hover {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .card-hover:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: 0 25px 50px rgba(0,0,0,0.2);
        }
        .animate-fade-in {
            animation: fadeIn 1s ease-in-out;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .floating-animation {
            animation: float 8s ease-in-out infinite;
        }
        @keyframes float {
            0%, 100% { transform: translateY(0px) rotateY(0deg); }
            25% { transform: translateY(-15px) rotateY(5deg); }
            50% { transform: translateY(-10px) rotateY(0deg); }
            75% { transform: translateY(-20px) rotateY(-5deg); }
        }
        .pulse-dot {
            animation: pulse 2s infinite;
        }
        @keyframes pulse {
            0%, 100% { transform: scale(1); opacity: 1; }
            50% { transform: scale(1.2); opacity: 0.7; }
        }
        .parallax-element {
            transform-style: preserve-3d;
            will-change: transform; /* Optimize for animation */
        }
        .tilt-card {
            perspective: 1000px;
        }
        .tilt-card-inner {
            transition: transform 0.3s;
            transform-style: preserve-3d;
        }
        .tilt-card:hover .tilt-card-inner {
            transform: rotateY(10deg) rotateX(5deg);
        }
        .glass-effect {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 1.5rem;
        }
        .neon-glow {
            box-shadow: 0 0 20px rgba(34, 197, 94, 0.3); /* Green glow */
        }
        /* Enhanced text-shadow for a glowing effect */
        .text-shadow {
            text-shadow: 0 0 10px rgba(34, 197, 94, 0.7), /* Green glow */
                         0 0 20px rgba(13, 148, 136, 0.5), /* Teal glow */
                         2px 2px 4px rgba(0,0,0,0.3); /* Base shadow */
        }
        /* Existing hero-content, now hero-text-content, needs to be above the video */
        .hero-content {
            position: relative;
            z-index: 2; /* Ensures content is above video and overlay */
        }

        /* New styles for background video */
        .hero-video-section {
            position: relative; /* Establish positioning context for video */
            min-height: 100vh; /* Changed to 100vh to ensure all content is visible */
            overflow: hidden; /* Hide any video overflow */
            /* The pt-24 pb-20 classes from Tailwind will add padding */
        }

        .background-video {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover; /* Ensures video covers the area without distortion */
            z-index: -1; /* Puts video behind other content */
            filter: blur(8px); /* Increased blur for background video */
        }


        .feature-card-3d {
            transform-style: preserve-3d;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .feature-card-3d:hover {
            transform: translateZ(20px) rotateY(5deg);
        }
        .scroll-indicator {
            position: absolute;
            bottom: 30px;
            left: 50%;
            transform: translateX(-50%);
            animation: bounce 2s infinite;
        }
        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% { transform: translateX(-50%) translateY(0); }
            40% { transform: translateX(-50%) translateY(-10px); }
            60% { transform: translateX(-50%) translateY(-5px); }
        }
        .interactive-element {
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .interactive-element:hover {
            transform: scale(1.05);
            filter: brightness(1.1);
        }

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

        /* Custom styles for horizontal scrolling feature cards */
        .horizontal-scroll-container {
            display: flex; /* Use flexbox for horizontal layout */
            overflow-x: auto; /* Enable horizontal scrolling */
            -webkit-overflow-scrolling: touch; /* Smooth scrolling on iOS */
            scroll-snap-type: x mandatory; /* Snap to items */
            padding-bottom: 20px; /* Add some padding for scrollbar if visible */
            gap: 3rem; /* Tailwind equivalent of gap-12 */
            /* Hide scrollbar for various browsers */
            scrollbar-width: none; /* Firefox */
            -ms-overflow-style: none;  /* IE and Edge */
        }

        .horizontal-scroll-container::-webkit-scrollbar {
            display: none; /* Chrome, Safari, Opera */
        }

        .horizontal-scroll-container > div { /* Target the direct children (feature cards) */
            flex: 0 0 auto; /* Prevent shrinking and growing, maintain content width */
            scroll-snap-align: start; /* Snap to the start of each item */
            width: 350px; /* Example fixed width for each card, adjust as needed */
            /* Ensure responsiveness for smaller screens */
            @media (max-width: 768px) {
                width: 80%; /* Make cards take up more width on small screens */
            }
            @media (min-width: 769px) and (max-width: 1024px) {
                width: 45%; /* Adjust for tablet sizes */
            }
        }
        body {
    font-family: "Inter", sans-serif;
    /* You might already have a background, but if not, consider adding one */
    /* background-color: #1a202c; */
    margin: 0;
    overflow-x: hidden; /* Prevent horizontal scrollbar on the body */
}

.marquee-wrapper {
    overflow: hidden; /* Hides content that overflows horizontally */
    white-space: nowrap; /* Ensures all child elements stay on a single line */
    box-shadow: inset 0 0 10px rgba(0, 0, 0, 0.5); /* Inner shadow for depth */
    border-radius: 1rem; /* Rounded corners for the wrapper */
    padding: 1rem 0; /* Vertical padding */
}

.marquee-content-container {
    display: inline-flex; /* Arranges items horizontally */
    animation: scroll-left 30s linear infinite; /* Apply the animation */
    padding-right: 20px; /* Small padding to prevent abrupt end if content is too tight */
}

.marquee-item {
    flex-shrink: 0; /* Prevents items from shrinking */
    width: 250px; /* Fixed width for each item */
    margin-right: 2rem; /* Spacing between items */
    display: flex; /* Use flex to center content inside the item */
    align-items: center;
    justify-content: center;
}

/* Keyframe animation for continuous horizontal scrolling */
@keyframes scroll-left {
    0% {
        transform: translateX(0); /* Start at original position */
    }
    100% {
        transform: translateX(-50%);
    }
}

/* Styling for the glass effect and 3D card */
.glass-effect {
    background: rgba(255, 255, 255, 0.1); /* Semi-transparent white */
    backdrop-filter: blur(10px); /* Blur effect */
    border: 1px solid rgba(255, 255, 255, 0.2); /* Light border */
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Subtle shadow */
    transition: transform 0.3s ease, box-shadow 0.3s ease; /* Smooth transitions */
}

.interactive-element:hover {
    transform: translateY(-5px) scale(1.02); /* Slight lift and scale on hover */
    box-shadow: 0 8px 12px rgba(0, 0, 0, 0.2); /* Enhanced shadow on hover */
}

/* Responsive adjustments for marquee items */
@media (max-width: 640px) {
    .marquee-item {
        width: 180px; /* Smaller width for mobile */
        margin-right: 1.5rem;
    }
    .marquee-content-container {
        animation-duration: 20s; /* Faster scroll on smaller screens */
    }
}
/* Custom CSS for the horizontal scroll container */
.horizontal-scroll-container {
    display: flex; /* Arranges the cards horizontally */
    overflow-x: auto; /* Enables horizontal scrolling when content overflows */
    -webkit-overflow-scrolling: touch; /* Improves scrolling performance on iOS */
    padding-bottom: 1rem; /* Adds some space below the scrollbar if it appears */
    gap: 2rem; /* Adds space between the cards */
    padding-left: 1rem;
    padding-right: 1rem;
}

/* Style for individual feature cards within the scroll container */
.horizontal-scroll-container > div {
    flex-shrink: 0; /* Prevents cards from shrinking, maintaining their width */
    width: 350px; /* Example fixed width for each card. Adjust as needed. */
}

.horizontal-scroll-container::-webkit-scrollbar {
    height: 8px;
}

.horizontal-scroll-container::-webkit-scrollbar-track {
    background: rgba(255, 255, 255, 0.1);
    border-radius: 10px;
}

.horizontal-scroll-container::-webkit-scrollbar-thumb {
    background: rgba(255, 255, 255, 0.3);
    border-radius: 10px;
}

.horizontal-scroll-container::-webkit-scrollbar-thumb:hover {
    background: rgba(255, 255, 255, 0.5);
}

.card-hover:hover .glass-effect {
    transform: translateY(-5px);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
}

    </style>
</head>
<body class="bg-gray-900 text-white relative">
    
    @extends('layouts.nav')

    <div class="bg-gradient-to-r from-green-600 to-teal-600 text-white py-4 mt-0">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-center">
                <div class="flex items-center space-x-3">
                    <div class="w-3 h-3 bg-yellow-400 rounded-full pulse-dot"></div>
                    <span class="text-lg font-medium">🐾 New Feature: Virtual Pet Training Sessions Now Available – Connect with certified trainers online!</span>
                </div>
            </div>
        </div>
    </div>

    <section class="pt-24 pb-20 relative overflow-hidden hero-video-section min-h-[100vh]">
        <video autoplay muted loop class="background-video">
            <source src="{{ asset('video/myvideo.mp4') }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
        <div class="absolute inset-0 bg-gray-800 opacity-50"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 hero-content">
            <div class="text-center animate-fade-in">
                <h1 class="text-6xl md:text-8xl font-bold mb-8 text-shadow parallax-element" data-parallax-speed="0.1">
                    Your pet's world, <span class="text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-teal-400">connected.</span>
                </h1>
                <p class="text-2xl md:text-3xl text-gray-200 mb-10 max-w-5xl mx-auto text-shadow parallax-element" data-parallax-speed="0.05">
                    Your complete pet services platform connecting you with adoption, healthcare, training, and everything in between
                </p>
                <div class="flex flex-wrap items-center justify-center gap-6 mb-16 fade-in-scroll">
                    <span class="bg-green-600/30 text-green-300 px-6 py-3 rounded-full text-lg font-semibold glass-effect interactive-element">🐕 Adoption</span>
                    <span class="bg-blue-600/30 text-blue-300 px-6 py-3 rounded-full text-lg font-semibold glass-effect interactive-element">🏥 Healthcare</span>
                    <span class="bg-purple-600/30 text-purple-300 px-6 py-3 rounded-full text-lg font-semibold glass-effect interactive-element">🎓 Training</span>
                    <span class="bg-orange-600/30 text-orange-300 px-6 py-3 rounded-full text-lg font-semibold glass-effect interactive-element">🛒 Supplies</span>
                    <span class="bg-pink-600/30 text-pink-300 px-6 py-3 rounded-full text-lg font-semibold glass-effect interactive-element">👥 Community</span>
                </div>
                <div class="flex flex-col sm:flex-row gap-6 justify-center fade-in-scroll">
                    <button class="bg-green-600 hover:bg-green-700 text-white px-12 py-6 rounded-xl text-xl font-bold transition-all hover:scale-105 neon-glow interactive-element">
                        Find Your Pet
                    </button>
                    <button class="glass-effect text-white px-12 py-6 rounded-xl text-xl font-bold transition-all hover:scale-105 interactive-element">
                        Browse Services
                    </button>
                </div>
            </div>
            <div class="mt-20 floating-animation fade-in-scroll">
                <div class="glass-effect rounded-2xl p-12 border-2 border-green-500/30 tilt-card">
                    <div class="tilt-card-inner">
                        <div class="bg-gradient-to-br from-green-600 to-teal-600 h-80 rounded-xl flex items-center justify-center relative overflow-hidden">
                            <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/10 to-transparent animate-pulse"></div>
                            <div class="text-center relative z-10">
                                <div class="w-20 h-20 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-6 interactive-element">
                                    <svg class="w-10 h-10 text-white" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/>
                                    </svg>
                                </div>
                                <h3 class="text-white text-2xl font-bold mb-3">Pet Services Dashboard</h3>
                                <p class="text-green-100 text-lg">Find, connect, and care for your pets</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="scroll-indicator">
            <div class="w-6 h-10 border-2 border-white rounded-full flex justify-center">
                <div class="w-1 h-3 bg-white rounded-full mt-2 animate-bounce"></div>
            </div>
        </div>
    </section>

    <section class="py-20 bg-gray-800/50 backdrop-blur-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16 fade-in-scroll">
                <h3 class="text-gray-300 text-lg font-semibold uppercase tracking-wider">Trusted by local shelters and pet businesses</h3>
            </div>
            <div class="marquee-wrapper">
                <div class="marquee-content-container">
                    <div class="marquee-item text-center feature-card-3d"><div class="glass-effect h-16 rounded-xl flex items-center justify-center interactive-element"><span class="text-white font-bold text-lg">🏠 Happy Tails</span></div></div>
                    <div class="marquee-item text-center feature-card-3d"><div class="glass-effect h-16 rounded-xl flex items-center justify-center interactive-element"><span class="text-white font-bold text-lg">🏥 PetCare Clinic</span></div></div>
                    <div class="marquee-item text-center feature-card-3d"><div class="glass-effect h-16 rounded-xl flex items-center justify-center interactive-element"><span class="text-white font-bold text-lg">🎓 Paws Academy</span></div></div>
                    <div class="marquee-item text-center feature-card-3d"><div class="glass-effect h-16 rounded-xl flex items-center justify-center interactive-element"><span class="text-white font-bold text-lg">🛒 Pet Paradise</span></div></div>
                    <div class="marquee-item text-center feature-card-3d"><div class="glass-effect h-16 rounded-xl flex items-center justify-center interactive-element"><span class="text-white font-bold text-lg">✂️ Furry Friends</span></div></div>
                    <div class="marquee-item text-center feature-card-3d"><div class="glass-effect h-16 rounded-xl flex items-center justify-center interactive-element"><span class="text-white font-bold text-lg">🐾 Loving Paws</span></div></div>
                    <div class="marquee-item text-center feature-card-3d"><div class="glass-effect h-16 rounded-xl flex items-center justify-center interactive-element"><span class="text-white font-bold text-lg">🏠 Happy Tails</span></div></div>
                    <div class="marquee-item text-center feature-card-3d"><div class="glass-effect h-16 rounded-xl flex items-center justify-center interactive-element"><span class="text-white font-bold text-lg">🏥 PetCare Clinic</span></div></div>
                    <div class="marquee-item text-center feature-card-3d"><div class="glass-effect h-16 rounded-xl flex items-center justify-center interactive-element"><span class="text-white font-bold text-lg">🎓 Paws Academy</span></div></div>
                    <div class="marquee-item text-center feature-card-3d"><div class="glass-effect h-16 rounded-xl flex items-center justify-center interactive-element"><span class="text-white font-bold text-lg">🛒 Pet Paradise</span></div></div>
                    <div class="marquee-item text-center feature-card-3d"><div class="glass-effect h-16 rounded-xl flex items-center justify-center interactive-element"><span class="text-white font-bold text-lg">✂️ Furry Friends</span></div></div>
                    <div class="marquee-item text-center feature-card-3d"><div class="glass-effect h-16 rounded-xl flex items-center justify-center interactive-element"><span class="text-white font-bold text-lg">🐾 Loving Paws</span></div></div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-24 bg-gray-900 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-20 fade-in-scroll">
                <h2 class="text-5xl font-bold mb-6 text-shadow">Why Choose LittleFur?</h2>
                <p class="text-xl text-gray-300 max-w-3xl mx-auto">Experience the future of pet care with our innovative platform</p>
            </div>
            <div class="horizontal-scroll-container">
                <div class="text-center card-hover feature-card-3d fade-in-scroll">
                    <div class="glass-effect rounded-2xl p-8 h-full"><div class="bg-green-600/20 w-20 h-20 rounded-2xl flex items-center justify-center mx-auto mb-8 interactive-element"><svg class="w-10 h-10 text-green-400" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg></div><h3 class="text-2xl font-bold mb-6">Find Your Perfect Pet</h3><p class="text-gray-300 text-lg">Browse hundreds of pets available for adoption from verified shelters. Find your new best friend with detailed profiles and health records.</p></div>
                </div>
                <div class="text-center card-hover feature-card-3d fade-in-scroll">
                    <div class="glass-effect rounded-2xl p-8 h-full"><div class="bg-blue-600/20 w-20 h-20 rounded-2xl flex items-center justify-center mx-auto mb-8 interactive-element"><svg class="w-10 h-10 text-blue-400" fill="currentColor" viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg></div><h3 class="text-2xl font-bold mb-6">Connect with Local Services</h3><p class="text-gray-300 text-lg">Find trusted veterinarians, trainers, groomers, and pet stores in your area. Read reviews and book appointments directly through our platform.</p></div>
                </div>
                <div class="text-center card-hover feature-card-3d fade-in-scroll">
                    <div class="glass-effect rounded-2xl p-8 h-full"><div class="bg-purple-600/20 w-20 h-20 rounded-2xl flex items-center justify-center mx-auto mb-8 interactive-element"><svg class="w-10 h-10 text-purple-400" fill="currentColor" viewBox="0 0 24 24"><path d="M20 2H4c-1.1 0-2 .9-2 2v18l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm-2 12H6v-2h12v2zm0-3H6V9h12v2zm0-3H6V6h12v2z"/></svg></div><h3 class="text-2xl font-bold mb-6">Join Our Community</h3><p class="text-gray-300 text-lg">Connect with fellow pet owners, share experiences, ask questions, and get advice from our supportive community of pet lovers.</p></div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-24 bg-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-20 fade-in-scroll">
                <h2 class="text-5xl md:text-6xl font-bold mb-8 text-shadow">Complete <span class="text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-teal-400">pet care</span> solutions</h2>
                <p class="text-xl text-gray-300 max-w-4xl mx-auto">From finding your perfect companion to comprehensive care, LittleFur connects you with everything your pet needs to live their best life.</p>
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                <div>
                    <h3 class="text-3xl font-bold mb-8 fade-in-scroll">Everything in one place</h3>
                    <div class="space-y-8">
                        <div class="flex items-start space-x-6 card-hover fade-in-scroll"><div class="w-16 h-16 bg-gradient-to-br from-green-500 to-teal-500 rounded-full flex items-center justify-center interactive-element"><span class="text-white text-2xl">🐕</span></div><div><h4 class="font-bold text-xl mb-2">Pet Adoption</h4><p class="text-gray-400 text-lg">Find your perfect companion from verified shelters</p></div></div>
                        <div class="flex items-start space-x-6 card-hover fade-in-scroll"><div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-cyan-500 rounded-full flex items-center justify-center interactive-element"><span class="text-white text-2xl">🏥</span></div><div><h4 class="font-bold text-xl mb-2">Healthcare Services</h4><p class="text-gray-400 text-lg">Connect with veterinarians and health specialists</p></div></div>
                        <div class="flex items-start space-x-6 card-hover fade-in-scroll"><div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-pink-500 rounded-full flex items-center justify-center interactive-element"><span class="text-white text-2xl">🎓</span></div><div><h4 class="font-bold text-xl mb-2">Training & Education</h4><p class="text-gray-400 text-lg">Professional training and educational resources</p></div></div>
                        <div class="flex items-start space-x-6 card-hover fade-in-scroll"><div class="w-16 h-16 bg-gradient-to-br from-orange-500 to-red-500 rounded-full flex items-center justify-center interactive-element"><span class="text-white text-2xl">🛒</span></div><div><h4 class="font-bold text-xl mb-2">Supplies & Grooming</h4><p class="text-gray-400 text-lg">Everything your pet needs for health and happiness</p></div></div>
                    </div>
                </div>
                <div class="glass-effect rounded-2xl p-10 border-2 border-gray-600 tilt-card fade-in-scroll">
                    <div class="tilt-card-inner">
                        <div class="space-y-8">
                            <div class="flex items-start space-x-6"><div class="w-16 h-16 bg-gradient-to-br from-green-500 to-teal-500 rounded-full flex-shrink-0 flex items-center justify-center interactive-element"><span class="text-white text-2xl">🐾</span></div><div class="bg-gray-600/50 rounded-xl p-6 flex-1"><p class="text-lg font-semibold mb-3">Max - Golden Retriever</p><p class="text-gray-300 mb-2">3 years old • Vaccinated • Great with kids</p><p class="text-sm text-gray-400">Available for adoption at Happy Tails Shelter</p></div></div>
                            <div class="flex items-start space-x-6"><div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-cyan-500 rounded-full flex-shrink-0 flex items-center justify-center interactive-element"><span class="text-white text-2xl">🏥</span></div><div class="bg-gray-600/50 rounded-xl p-6 flex-1"><p class="text-lg font-semibold mb-3">Dr. Sarah Johnson</p><p class="text-gray-300 mb-2">Veterinarian • 4.9★ Rating</p><p class="text-sm text-gray-400">Available for appointments this week</p></div></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-24 bg-gradient-to-r from-blue-600 via-purple-600 to-pink-600 relative overflow-hidden">
        <div class="absolute inset-0 bg-black/20"></div>
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10 fade-in-scroll">
            <h2 class="text-5xl md:text-6xl font-bold mb-8 text-shadow">Ready to find your perfect pet?</h2>
            <p class="text-2xl mb-12 text-blue-100">Join thousands of happy pet owners who found their companions through LittleFur</p>
            <div class="flex flex-col sm:flex-row gap-6 justify-center">
                <button class="bg-white text-blue-600 px-12 py-6 rounded-xl text-xl font-bold hover:bg-gray-100 transition-all hover:scale-105 neon-glow interactive-element">Start Your Search</button>
                <button class="glass-effect text-white px-12 py-6 rounded-xl text-xl font-bold transition-all hover:scale-105 interactive-element">Browse Services</button>
            </div>
        </div>
    </section>

    <footer class="bg-gray-900 text-gray-400 py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-4 gap-12">
            <div class="col-span-1 md:col-span-1"><div class="flex items-center space-x-3 mb-6"><div class="w-10 h-10 bg-gradient-to-br from-green-500 to-teal-500 rounded-full flex items-center justify-center neon-glow"><svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2c-2.76 0-5 2.24-5 5s2.24 5 5 5 5-2.24 5-5-2.24-5-5-5zm-3 13c-2.21 0-4 1.79-4 4s1.79 4 4 4 4-1.79 4-4-1.79-4-4-4zm6 0c-2.21 0-4 1.79-4 4s1.79 4 4 4 4-1.79 4-4-1.79-4-4-4z"/></svg></div><h3 class="text-2xl font-bold text-white text-shadow">LittleFur</h3></div><p class="text-gray-400 text-lg mb-4">Your complete pet services platform.</p><p class="text-gray-500 text-sm">&copy; 2025 LittleFur. All rights reserved.</p></div>
            <div class="col-span-1 md:col-span-1"><h4 class="text-xl font-bold text-white mb-6">Quick Links</h4><ul class="space-y-3"><li><a href="Adopt" class="text-gray-400 hover:text-white transition-colors duration-300">Adopt a Pet</a></li><li><a href="Hospital" class="text-gray-400 hover:text-white transition-colors duration-300">Pet Hospitals</a></li><li><a href="Shelter" class="text-gray-400 hover:text-white transition-colors duration-300">Shelters</a></li><li><a href="Community" class="text-gray-400 hover:text-white transition-colors duration-300">Community Forum</a></li><li><a href="Contact" class="text-gray-400 hover:text-white transition-colors duration-300">Contact Us</a></li><li><a href="Shelter" class="text-gray-400 hover:text-white transition-colors duration-300">Shelters</a></li></ul></div>
            <div class="col-span-1 md:col-span-1"><h4 class="text-xl font-bold text-white mb-6">Services</h4><ul class="space-y-3"><li><a href="#" class="text-gray-400 hover:text-white transition-colors duration-300">Pet Training</a></li><li><a href="#" class="text-gray-400 hover:text-white transition-colors duration-300">Grooming</a></li><li><a href="#" class="text-gray-400 hover:text-white transition-colors duration-300">Pet Supplies</a></li><li><a href="#" class="text-gray-400 hover:text-white transition-colors duration-300">Virtual Consultations</a></li><li><a href="#" class="text-gray-400 hover:text-white transition-colors duration-300">Emergency Care</a></li></ul></div>
            <div class="col-span-1 md:col-span-1"><h4 class="text-xl font-bold text-white mb-6">Stay Connected</h4><p class="text-gray-400 mb-4">Follow us on social media for updates and pet tips!</p><div class="flex space-x-6"><a href="#" class="text-gray-400 hover:text-white transition-colors duration-300"><svg class="w-7 h-7" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33V22C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" /></svg></a><a href="#" class="text-gray-400 hover:text-white transition-colors duration-300"><svg class="w-7 h-7" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.002 3.797.048.843.04 1.15.138 1.504.237.664.189 1.154.462 1.612.92.458.459.722.942.91 1.6.098.354.197.661.237 1.503.046 1.014.048 1.371.048 3.797v.001c0 2.43-.002 2.784-.048 3.797-.04.844-.138 1.15-.237 1.504-.189.664-.462 1.154-.92 1.612-.459.458-.942.722-1.6.91-.354.098-.661.197-1.503.237-1.014.046-1.371.048-3.797.048h-.001c-2.43 0-2.784-.002-3.797-.048-.843-.04-1.15-.138-1.504-.237-.664-.189-1.154-.462-1.612-.92-.458-.459-.722-.942-.91-1.6-.098-.354-.197-.661-.237-1.503-.046-1.014-.048-1.371-.048-3.797v-.001c0-2.43.002-2.784.048-3.797.04-.843.138-.115.237-1.504.189-.664.462-1.154.92-1.612.459-.458.942.722 1.6-.91.354-.098.661-.197 1.503-.237 1.014-.046 1.371-.048 3.797-.048zm0 1.637c-3.284 0-3.743.015-4.778.064-.95.045-1.4.24-1.717.34-.67.215-1.16.59-1.575 1.005-.415.415-.79 1.005-1.005 1.575-.1.317-.294.767-.34 1.717-.049 1.035-.064 1.494-.064 4.778 0 3.284.015 3.743.064 4.778.045.95.24 1.4.34 1.717.215.67.59 1.16 1.005 1.575.415.415 1.005.79 1.575 1.005.317.1.767.294 1.717.34 1.035.049 1.494.064 4.778.064s3.743-.015 4.778-.064c.95-.045 1.4-.24 1.717-.34.67-.215 1.16-.59 1.575-1.005.415-.415-1.005-.79-1.575-1.005-.317-.1-.767-.294-1.717-.34-1.035-.049-1.494-.064-4.778-.064zM12 6.865a5.135 5.135 0 100 10.27 5.135 5.135 0 000-10.27zm0 1.637a3.5 3.5 0 110 7 3.5 3.5 0 010-7z" clip-rule="evenodd" /></svg></a><a href="#" class="text-gray-400 hover:text-white transition-colors duration-300"><svg class="w-7 h-7" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.007-.532A8.318 8.318 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.073 4.073 0 01.8 10.42c-.004.05-.004.1-.004.15 0 4.445 3.17 8.138 7.368 8.995a4.075 4.075 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.077a11.616 11.616 0 006.29 2.174z" /></svg></a></div></div>
        </div>
    </footer>

    <script>
        // JavaScript for scroll-triggered animations (fade-in-scroll)
        document.addEventListener('DOMContentLoaded', () => {
            const fadeInElements = document.querySelectorAll('.fade-in-scroll');

            // --- Scroll Animation Logic ---
            const observerOptions = {
                root: null, // Use the viewport as the root
                rootMargin: '0px',
                threshold: 0.1 // Trigger when 10% of the element is visible
            };

            const observer = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('is-visible');
                        observer.unobserve(entry.target); // Stop observing once visible
                    }
                });
            }, observerOptions);

            fadeInElements.forEach(element => {
                observer.observe(element);
            });
            
            // --- ALL NAVIGATION AND SOUND JAVASCRIPT HAS BEEN REMOVED. ---
            // The nav.blade.php file will now handle all of that logic.
        });
    </script>
</body>
</html>

{{-- git add . && git commit -m "message" && git push --}}
