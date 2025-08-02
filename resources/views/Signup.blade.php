<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pawsome Login - Your Pet's Best Friend</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Inter Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Custom CSS for animations and background */
        body {
            font-family: 'Inter', sans-serif;
            overflow: hidden; /* Prevent scrollbar from 3D canvas */
            background: linear-gradient(135deg, #a7e9af 0%, #7ed957 100%); /* Greenish gradient */
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            position: relative;
        }

        /* Background animation for a subtle glow/pulsate */
        body::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle at center, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
            animation: backgroundGlow 15s infinite alternate ease-in-out;
            z-index: 0;
        }

        @keyframes backgroundGlow {
            0% { transform: scale(1); opacity: 0.8; }
            100% { transform: scale(1.2); opacity: 1; }
        }

        .login-container {
            position: relative;
            z-index: 10; /* Ensure it's above the 3D canvas */
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
            padding: 2.5rem;
            max-width: 400px;
            width: 90%;
            text-align: center;
            border: 1px solid rgba(255, 255, 255, 0.3);
            animation: fadeIn 1s ease-out forwards;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        input[type="email"],
        input[type="password"] {
            transition: all 0.3s ease-in-out;
            border: 1px solid #d1d5db;
            outline: none;
        }

        input[type="email"]:focus,
        input[type="password"]:focus {
            border-color: #6ee7b7; /* Tailwind emerald-300 */
            box-shadow: 0 0 0 3px rgba(110, 231, 183, 0.5); /* Emerald glow */
        }

        .btn-primary {
            background-color: #10b981; /* Tailwind emerald-500 */
            transition: all 0.2s ease-in-out;
            transform: scale(1);
            position: relative;
            overflow: hidden;
            border: none;
            outline: none;
        }

        .btn-primary:hover {
            background-color: #059669; /* Tailwind emerald-600 */
            transform: scale(1.02);
            box-shadow: 0 0 15px rgba(16, 185, 129, 0.6); /* Glow effect on hover */
        }

        .btn-primary:active {
            transform: scale(0.98); /* Pop effect on click */
        }

        /* Wobble animation for error or attention */
        .wobble {
            animation: wobble 0.8s ease-in-out;
        }

        @keyframes wobble {
            0%, 100% { transform: translateX(0%); }
            15% { transform: translateX(-5%); }
            30% { transform: translateX(5%); }
            45% { transform: translateX(-3%); }
            60% { transform: translateX(3%); }
            75% { transform: translateX(-1%); }
        }

        /* Pop animation for button click */
        @keyframes pop-animation {
            0% { transform: scale(1); }
            50% { transform: scale(1.03); }
            100% { transform: scale(1); }
        }

        .pop-animation {
            animation: pop-animation 0.3s ease-out;
        }

        /* 3D Canvas Styling */
        #three-canvas {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 0; /* Behind the login form */
        }

        /* Custom bounce for paw icon */
        @keyframes bounce-slow {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }
        .animate-bounce-slow {
            animation: bounce-slow 3s infinite ease-in-out;
        }

        /* Responsive adjustments */
        @media (max-width: 640px) {
            .login-container {
                padding: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <!-- 3D Canvas will be injected here by Three.js -->
    <canvas id="three-canvas"></canvas>

    <div class="login-container">
        <div class="mb-6">
            <i class="fas fa-paw text-emerald-500 text-5xl mb-3 animate-bounce-slow"></i>
            <h2 class="text-3xl font-bold text-gray-800 mb-2">Welcome Back, Pet Lover!</h2>
            <p class="text-gray-600">Log in to manage your furry friends.</p>
        </div>

        <form action="#" method="POST" id="loginForm">
            <div class="mb-4">
                <label for="email" class="block text-left text-gray-700 text-sm font-medium mb-2">Email or Username</label>
                <input type="email" id="email" name="email" placeholder="your@email.com" required
                       class="shadow-sm appearance-none border rounded-lg w-full py-3 px-4 text-gray-700 leading-tight focus:ring-emerald-300 focus:border-emerald-300 transition duration-300 ease-in-out">
            </div>
            <div class="mb-6">
                <label for="password" class="block text-left text-gray-700 text-sm font-medium mb-2">Password</label>
                <input type="password" id="password" name="password" placeholder="••••••••" required
                       class="shadow-sm appearance-none border rounded-lg w-full py-3 px-4 text-gray-700 mb-3 leading-tight focus:ring-emerald-300 focus:border-emerald-300 transition duration-300 ease-in-out">
                <a href="#" class="text-sm text-emerald-600 hover:text-emerald-800 transition duration-200 ease-in-out">Forgot Password?</a>
            </div>
            <button type="submit" id="loginButton"
                    class="btn-primary w-full py-3 px-4 rounded-lg text-white font-semibold text-lg hover:shadow-lg focus:outline-none focus:ring-4 focus:ring-emerald-300 focus:ring-opacity-75">
                Login
            </button>
        </form>

        <div class="relative flex py-5 items-center">
            <div class="flex-grow border-t border-gray-300"></div>
            <span class="flex-shrink mx-4 text-gray-500">Or</span>
            <div class="flex-grow border-t border-gray-300"></div>
        </div>

        <button id="googleSignIn"
                class="w-full py-3 px-4 rounded-lg bg-white border border-gray-300 text-gray-700 font-semibold text-lg flex items-center justify-center space-x-2 hover:bg-gray-50 transition duration-200 ease-in-out shadow-sm hover:shadow-md">
            <i class="fab fa-google text-xl"></i>
            <span>Sign in with Google</span>
        </button>

        <p class="mt-6 text-gray-600 text-sm">
            Don't have an account?
            <a href="#" class="text-emerald-600 hover:text-emerald-800 transition duration-200 ease-in-out">Sign Up</a>
        </p>
    </div>

    <!-- Three.js CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
    <script>
        // Three.js Setup
        let scene, camera, renderer, bone, pawGroup;
        let mouseX = 0, mouseY = 0;

        function initThreeJS() {
            // Scene
            scene = new THREE.Scene();
            scene.background = null; // Transparent background to show CSS gradient

            // Camera
            camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
            camera.position.z = 5;

            // Renderer
            renderer = new THREE.WebGLRenderer({ canvas: document.getElementById('three-canvas'), antialias: true, alpha: true });
            renderer.setSize(window.innerWidth, window.innerHeight);
            renderer.setPixelRatio(window.devicePixelRatio);

            // Lighting
            const ambientLight = new THREE.AmbientLight(0xffffff, 0.8);
            scene.add(ambientLight);
            const directionalLight = new THREE.DirectionalLight(0xffffff, 0.6);
            directionalLight.position.set(0, 1, 1);
            scene.add(directionalLight);

            // Create a more "real" 3D Bone
            const boneMaterial = new THREE.MeshPhongMaterial({ color: 0xf5deb3, shininess: 30 }); // Bone color (wheat)

            // Main shaft of the bone (using CapsuleGeometry for smoother ends)
            const boneShaftGeometry = new THREE.CapsuleGeometry(0.4, 2.5, 4, 8); // radius, length, capSegments, radialSegments
            const boneShaft = new THREE.Mesh(boneShaftGeometry, boneMaterial);

            // Ends of the bone (more pronounced)
            const boneEndGeometry = new THREE.SphereGeometry(0.6, 32, 32);
            const boneEnd1 = new THREE.Mesh(boneEndGeometry, boneMaterial);
            boneEnd1.position.y = 1.25 + 0.4; // Position correctly relative to shaft length and radius
            boneShaft.add(boneEnd1); // Attach to shaft

            const boneEnd2 = new THREE.Mesh(boneEndGeometry, boneMaterial);
            boneEnd2.position.y = -(1.25 + 0.4); // Position correctly
            boneShaft.add(boneEnd2); // Attach to shaft

            bone = boneShaft; // Assign the main shaft (which now contains the ends) to 'bone'
            bone.position.set(-3, 2, 0);
            bone.rotation.z = Math.PI / 4;
            scene.add(bone);

            // Create 3D Paw Print (stylized)
            pawGroup = new THREE.Group();
            const pawMaterial = new THREE.MeshPhongMaterial({ color: 0x8d6e63, shininess: 20 }); // Brownish color

            // Main pad (flattened sphere)
            const mainPad = new THREE.SphereGeometry(0.8, 32, 32);
            mainPad.applyMatrix4(new THREE.Matrix4().makeScale(1, 0.6, 1)); // Flatten
            const mainPadMesh = new THREE.Mesh(mainPad, pawMaterial);
            pawGroup.add(mainPadMesh);

            // Toes (flattened small spheres)
            const toeGeometry = new THREE.SphereGeometry(0.3, 16, 16);
            toeGeometry.applyMatrix4(new THREE.Matrix4().makeScale(1, 0.8, 1)); // Slightly flatten

            const toe1 = new THREE.Mesh(toeGeometry, pawMaterial);
            toe1.position.set(0.7, 0.5, 0);
            pawGroup.add(toe1);

            const toe2 = new THREE.Mesh(toeGeometry, pawMaterial);
            toe2.position.set(-0.7, 0.5, 0);
            pawGroup.add(toe2);

            const toe3 = new THREE.Mesh(toeGeometry, pawMaterial);
            toe3.position.set(0.3, 1.2, 0);
            pawGroup.add(toe3);

            const toe4 = new THREE.Mesh(toeGeometry, pawMaterial);
            toe4.position.set(-0.3, 1.2, 0);
            pawGroup.add(toe4);

            pawGroup.position.set(3, -2, 0);
            pawGroup.rotation.z = -Math.PI / 8;
            scene.add(pawGroup);

            // Handle window resize
            window.addEventListener('resize', onWindowResize, false);
            // Mouse interaction for camera movement
            document.addEventListener('mousemove', onDocumentMouseMove, false);
        }

        function onWindowResize() {
            camera.aspect = window.innerWidth / window.innerHeight;
            camera.updateProjectionMatrix();
            renderer.setSize(window.innerWidth, window.innerHeight);
        }

        function onDocumentMouseMove(event) {
            mouseX = (event.clientX / window.innerWidth) * 2 - 1;
            mouseY = - (event.clientY / window.innerHeight) * 2 + 1;
        }

        function animate() {
            requestAnimationFrame(animate);

            // Animate bone
            if (bone) {
                bone.rotation.x += 0.005;
                bone.rotation.y += 0.005;
                bone.position.y = 2 + Math.sin(Date.now() * 0.001) * 0.5; // Subtle float
            }

            // Animate paw group
            if (pawGroup) {
                pawGroup.rotation.y += 0.003;
                pawGroup.rotation.z += 0.003;
                pawGroup.position.x = 3 + Math.cos(Date.now() * 0.0015) * 0.5; // Subtle float
            }

            // Camera subtle movement based on mouse
            camera.position.x += (mouseX * 0.5 - camera.position.x) * 0.05;
            camera.position.y += (mouseY * 0.5 - camera.position.y) * 0.05;
            camera.lookAt(scene.position);

            renderer.render(scene, camera);
        }

        // Initialize Three.js on window load
        window.onload = function() {
            initThreeJS();
            animate(); // Start the animation loop
        };


        // Frontend Interactivity and Animations
        document.addEventListener('DOMContentLoaded', () => {
            const loginForm = document.getElementById('loginForm');
            const emailInput = document.getElementById('email');
            const passwordInput = document.getElementById('password');
            const loginButton = document.getElementById('loginButton');
            const googleSignInButton = document.getElementById('googleSignIn');

            // Add wobble effect on invalid input and handle form submission
            loginForm.addEventListener('submit', (event) => {
                event.preventDefault(); // Prevent default submission

                let isValid = true;
                // Basic email validation
                if (!emailInput.value.includes('@') || emailInput.value.length < 5) {
                    emailInput.classList.add('wobble');
                    emailInput.focus();
                    isValid = false;
                } else {
                    emailInput.classList.remove('wobble');
                }

                // Basic password validation
                if (passwordInput.value.length < 6) {
                    passwordInput.classList.add('wobble');
                    if (isValid) passwordInput.focus(); // Focus only if email is valid
                    isValid = false;
                } else {
                    passwordInput.classList.remove('wobble');
                }

                if (isValid) {
                    // Simulate loading state
                    loginButton.textContent = 'Logging in...';
                    loginButton.disabled = true;
                    loginButton.classList.add('opacity-70', 'cursor-not-allowed');

                    setTimeout(() => {
                        loginButton.textContent = 'Login';
                        loginButton.disabled = false;
                        loginButton.classList.remove('opacity-70', 'cursor-not-allowed');
                        loginButton.classList.add('pop-animation'); // Add pop effect on successful submission
                        setTimeout(() => {
                            loginButton.classList.remove('pop-animation');
                        }, 300);
                        console.log('Form submitted successfully (simulated)!');
                        // In a real application, you would send data to server here
                        // loginForm.submit();
                    }, 1500); // Simulate network request
                } else {
                    // Remove wobble after animation completes for re-triggering
                    setTimeout(() => {
                        emailInput.classList.remove('wobble');
                        passwordInput.classList.remove('wobble');
                    }, 800);
                }
            });

            // Google Sign-in button click handler
            googleSignInButton.addEventListener('click', () => {
                googleSignInButton.classList.add('pop-animation');
                setTimeout(() => {
                    googleSignInButton.classList.remove('pop-animation');
                    console.log('Simulating Google Sign-in...');
                    // In a real application, you would initiate Google OAuth flow here
                }, 300);
            });

            // Remove wobble on input focus
            emailInput.addEventListener('focus', () => emailInput.classList.remove('wobble'));
            passwordInput.addEventListener('focus', () => passwordInput.classList.remove('wobble'));
        });
    </script>
</body>

<body>
    {{-- This is where you include the nav.blade.php layout --}}
    @include('layouts.nav') {{-- Assuming nav.blade.php is in a 'layouts' directory --}}
    {{-- @yield('content') --}}
</body>

</html>
