{{-- {{-- 

  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    
    <title>London</title>
    <link rel="icon" href="https://sites.read.cv/api/favicon/WrkWs0PyathOpa0bvnN57z4p7G73.ico">
    <meta property="og:image" content="https://res.cloudinary.com/read-cv/image/upload/v1/1/siteBuilder/DxlZwGtHZsQ72Hf089rHJYaVKd12/zx1tg5h6s-thumbnail-8a04c7e1-4468-4f83-b765-be63e6d247b9.jpg?_a=DATAdtfiZAA0"/>
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="description" content="How to use this template:

1\. Be sure to have one or more contact link on your Read.cv profile. This template won&#39;t work without one.

2\. When your profile is set up, click install on this template and open it in your dashboard.

3\. Open your new site from the dashboard and personalize the site settings (title, description, thumbnail).

Need help modifying this template? Message me on [Discord in our #sites-beta channel](https://discord.gg/jWCTuJ5B).

\---

Editors note: As can happen sources and citations for designs can get muddled in memory, and I realized after the fact that the inspiration for this template clearly came from [Natalie Almosa](https://read.cv/nut)&#39;s [personal site](https://www.nataliealmosa.ca/). Natalie was ultra gracious and happy to have us keep this template around though so a big thank you and all the credit to Natalie on this one!

London is a fun link-in-bio template which displays your social links in a phsyical pile. Toss them around your browser, it&#39;s super fun!

Make sure you have your contact section of your profile filled out to get the most out of this template — the more links you have the more fun the layout will be.

This template supports light and dark mode, with easy to tweak css variables to control color and typography.

The content in this demo is provided by designer and investor [Soleio](https://read.cv/soleio), give him shout if you&#39;re building something cool!"/>
    <meta property="og:title" content="London"/>
    <meta property="og:description" content="How to use this template:

1\. Be sure to have one or more contact link on your Read.cv profile. This template won&#39;t work without one.

2\. When your profile is set up, click install on this template and open it in your dashboard.

3\. Open your new site from the dashboard and personalize the site settings (title, description, thumbnail).

Need help modifying this template? Message me on [Discord in our #sites-beta channel](https://discord.gg/jWCTuJ5B).

\---

Editors note: As can happen sources and citations for designs can get muddled in memory, and I realized after the fact that the inspiration for this template clearly came from [Natalie Almosa](https://read.cv/nut)&#39;s [personal site](https://www.nataliealmosa.ca/). Natalie was ultra gracious and happy to have us keep this template around though so a big thank you and all the credit to Natalie on this one!

London is a fun link-in-bio template which displays your social links in a phsyical pile. Toss them around your browser, it&#39;s super fun!

Make sure you have your contact section of your profile filled out to get the most out of this template — the more links you have the more fun the layout will be.

This template supports light and dark mode, with easy to tweak css variables to control color and typography.

The content in this demo is provided by designer and investor [Soleio](https://read.cv/soleio), give him shout if you&#39;re building something cool!"/>
    
  
    <script src='https://sites.read.cv/scripts/watermark.js' defer></script>
    
  <script>
class CVMediaObject {
  constructor(props) {
    this.url = props.url;
    this.width = props.width;
    this.height = props.height;
  }

  toString() { return this.url; }
}

var mediaFiles = {};
mediaFiles[''] = new CVMediaObject({ url: '' });


globalThis.cv = Object.assign(globalThis.cv || {}, {
  media: function (filename) {
    return mediaFiles[filename] || mediaFiles[''];
  },
});
  </script>
  
    
  <script>
globalThis.__cvRuntimeData = Object.assign(globalThis.__cvRuntimeData || {}, {"uid":"WrkWs0PyathOpa0bvnN57z4p7G73"});
  </script>
  
    
    <script src='https://sites.read.cv/api/user/WrkWs0PyathOpa0bvnN57z4p7G73.js' defer></script>
    <script src='https://res.cloudinary.com/read-cv/raw/upload/v1/1/siteBuilder/DxlZwGtHZsQ72Hf089rHJYaVKd12/site-bundle-1733461986826.js?_a=DATAdtfiZAA0' defer></script>
    <link rel="stylesheet" type="text/css" href="https://res.cloudinary.com/read-cv/raw/upload/v1/1/siteBuilder/DxlZwGtHZsQ72Hf089rHJYaVKd12/site-bundle-1733461986827.css?_a=DATAdtfiZAA0" />
    <style>
      :root {
  --font-size: max(6vmax, 28.8px);
  --padding: max(4vmax, 19.2px);
  --backgroundColor: white;
  --textColor: black;
}

@media (prefers-color-scheme: dark) {
  :root {
    --backgroundColor: black;
    --textColor: white;
  }
}

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body, html {
  position: relative;
  width: 100%;
  height: 100%;
  overflow: hidden;
}

body {
  font-family: 'Inter Variable', sans-serif;
  font-size: var(--font-size);
  line-height: 1.1;
  color: var(--textColor);
  background-color: var(--backgroundColor);
  -webkit-font-smoothing: antialiased;
  -webkit-tap-highlight-color: transparent;
  text-size-adjust: none;
  user-select: none;
  position: relative;
}

.about {
  padding: var(--padding);
}

.about h1 {
  font-size: var(--font-size);
  font-weight: 600;
}

.byline {
  text-wrap: balance;
  font-weight: 600;
}

.links {
  position: absolute;
  inset: 0;
  z-index: 1;
  display: flex;
  flex-direction: row;
  align-content: flex-end;
  align-items: flex-end;
  flex-wrap: wrap;
}

.link {
  background-color: var(--textColor);
  color: var(--backgroundColor);
  border-radius: 100vw;
  line-height: 1.6;
  width: fit-content;
  height: fit-content;
  display: block;
}

body.dragging .link {
  cursor: -webkit-grabbing;
}

body.dragging .link a {
  pointer-events: none;
}

.link a {
  color: inherit;
  text-decoration: none;
  padding: 0 var(--padding);
  border: none;
  outline: none;
  display: block;
  touch-action: manipulation !important;
  cursor: pointer;
  font-weight: 600;
  white-space: nowrap;
}

.clock {
  width: max(20dvmax, 96px);
  aspect-ratio: 1/1;
  box-shadow: 0 0 0 max(0.5dvmax, 1px) var(--textColor) inset;
  border-radius: 50%;
  background-color: var(--backgroundColor);
  position: relative;
  cursor: -webkit-grab;
}

.clock:active {
  cursor: -webkit-grabbing;
}

.clockPiece {
  position: absolute;
  inset: max(0.5dvmax, 1px);
}

.clockPiece svg {
  width: 100%;
  height: 100%;
  display: block;
}

    </style>
  </head>
  <body>
    <div id="root">
    </div>
  </body>
  </html> --}}


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact - LittleFur</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        
        .floating-paw {
            animation: float 6s ease-in-out infinite;
        }
        
        .floating-paw:nth-child(2) {
            animation-delay: 2s;
        }
        
        .floating-paw:nth-child(3) {
            animation-delay: 4s;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); opacity: 0.03; }
            50% { transform: translateY(-20px) rotate(180deg); opacity: 0.08; }
        }
        
        .hover-underline {
            position: relative;
            transition: all 0.3s ease;
        }
        
        .hover-underline::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -4px;
            left: 50%;
            background-color: #000;
            transition: all 0.3s ease;
            transform: translateX(-50%);
        }
        
        .hover-underline:hover::after {
            width: 100%;
        }
        
        .hover-arrow {
            transition: transform 0.3s ease;
        }
        
        .hover-arrow:hover {
            transform: translateX(4px);
        }
        
        .contact-item {
            transition: all 0.3s ease;
        }
        
        .contact-item:hover {
            transform: translateY(-2px);
        }
    </style>
</head>
<body class="bg-white min-h-screen relative overflow-x-hidden">
    
    <!-- Floating Paw Print Background Animation -->
    <div class="fixed inset-0 pointer-events-none">
        <div class="floating-paw absolute top-20 left-10 text-6xl">🐾</div>
        <div class="floating-paw absolute top-40 right-20 text-4xl">🐾</div>
        <div class="floating-paw absolute bottom-32 left-1/4 text-5xl">🐾</div>
        <div class="floating-paw absolute bottom-20 right-10 text-3xl">🐾</div>
        <div class="floating-paw absolute top-1/2 left-20 text-4xl">🐾</div>
        <div class="floating-paw absolute top-1/3 right-1/3 text-5xl">🐾</div>
    </div>

    <!-- Main Content -->
    <div class="relative z-10 flex flex-col items-center justify-center min-h-screen px-4 py-16">
        
        <!-- Main Heading -->
        <div class="text-center mb-12 md:mb-16">
            <h1 class="text-6xl md:text-8xl lg:text-9xl font-black text-black tracking-tight mb-8">
                Contact
            </h1>
            
            <!-- Subheading with Dividers -->
            <div class="text-xl md:text-2xl lg:text-3xl font-medium text-black tracking-wide">
                <span class="hover-underline inline-block">LittleFur Community</span>
                <span class="mx-4 md:mx-6 text-gray-400">×</span>
                <span class="hover-underline inline-block">Support</span>
                <span class="mx-4 md:mx-6 text-gray-400">×</span>
                <span class="hover-underline inline-block">Press</span>
            </div>
        </div>

        <!-- Contact Options -->
        <div class="w-full max-w-2xl space-y-8 md:space-y-10">
            
            <!-- Email -->
            <div class="contact-item text-center">
                <a href="mailto:support@littlefur.com" class="group inline-flex items-center justify-center space-x-4 text-lg md:text-xl lg:text-2xl font-medium text-black hover:text-gray-700 transition-colors">
                    <span class="text-2xl md:text-3xl">📧</span>
                    <span class="hover-underline">support@littlefur.com</span>
                    <span class="hover-arrow opacity-0 group-hover:opacity-100 text-xl">→</span>
                </a>
            </div>

            <!-- Instagram -->
            <div class="contact-item text-center">
                <a href="https://instagram.com/littlefur.pets" target="_blank" rel="noopener noreferrer" class="group inline-flex items-center justify-center space-x-4 text-lg md:text-xl lg:text-2xl font-medium text-black hover:text-gray-700 transition-colors">
                    <span class="text-2xl md:text-3xl">🐾</span>
                    <span class="hover-underline">@littlefur.pets</span>
                    <span class="hover-arrow opacity-0 group-hover:opacity-100 text-xl">→</span>
                </a>
            </div>

            <!-- Press Kit -->
            <div class="contact-item text-center">
                <a href="/press-kit.pdf" download class="group inline-flex items-center justify-center space-x-4 text-lg md:text-xl lg:text-2xl font-medium text-black hover:text-gray-700 transition-colors">
                    <span class="text-2xl md:text-3xl">📰</span>
                    <span class="hover-underline">Press Kit: Download PDF</span>
                    <span class="hover-arrow opacity-0 group-hover:opacity-100 text-xl">→</span>
                </a>
            </div>

        </div>

        <!-- Optional Footer Divider -->
        <div class="mt-16 md:mt-20 text-center">
            <div class="w-24 h-px bg-gray-300 mx-auto"></div>
        </div>

    </div>

    <!-- Mobile Optimization Script -->
    <script>
        // Ensure proper mobile viewport handling
        function adjustMobileLayout() {
            const isMobile = window.innerWidth < 768;
            const heading = document.querySelector('h1');
            const subheading = document.querySelector('.text-xl');
            
            if (isMobile) {
                // Additional mobile-specific adjustments can be added here
                document.body.style.fontSize = '16px';
            }
        }
        
        // Run on load and resize
        window.addEventListener('load', adjustMobileLayout);
        window.addEventListener('resize', adjustMobileLayout);
    </script>

</body>

<body>
    {{-- This is where you include the nav.blade.php layout --}}
    @include('layouts.nav') {{-- Assuming nav.blade.php is in a 'layouts' directory --}}
    {{-- @yield('content') --}}
</body>

</html>