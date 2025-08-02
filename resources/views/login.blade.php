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
        
        /* Style for validation errors */
        .error-border {
            border-color: #ef4444; /* Tailwind red-500 */
        }
        .error-border:focus {
            border-color: #ef4444;
            box-shadow: 0 0 0 3px rgba(239, 68, 68, 0.5);
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

        #three-canvas {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 0; /* Behind the login form */
        }

        @keyframes bounce-slow {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }
        .animate-bounce-slow {
            animation: bounce-slow 3s infinite ease-in-out;
        }
    </style>
</head>
<body>
    <!-- 3D Canvas will be injected here by Three.js -->
    <canvas id="three-canvas"></canvas>

    <div class="login-container">
        <div class="mb-6">
            <i class="fas fa-paw text-emerald-500 text-5xl mb-3 animate-bounce-slow"></i>
            <h2 class="text-3xl font-bold text-gray-800 mb-2">Welcome Back!</h2>
            <p class="text-gray-600">Log in to continue your journey.</p>
        </div>
        
        <!-- Laravel Session Messages -->
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                {{ session('error') }}
            </div>
        @endif

        <!-- Login Form -->
        <form action="{{ route('account.authenticate') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="email" class="block text-left text-gray-700 text-sm font-medium mb-2">Email</label>
                <input type="email" id="email" name="email" placeholder="your@email.com" value="{{ old('email') }}"
                       class="shadow-sm appearance-none border rounded-lg w-full py-3 px-4 text-gray-700 leading-tight focus:ring-emerald-300 focus:border-emerald-300 transition duration-300 ease-in-out @error('email') error-border @enderror">
                @error('email')
                    <p class="text-red-500 text-xs text-left mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="password" class="block text-left text-gray-700 text-sm font-medium mb-2">Password</label>
                <input type="password" id="password" name="password" placeholder="••••••••"
                       class="shadow-sm appearance-none border rounded-lg w-full py-3 px-4 text-gray-700 mb-3 leading-tight focus:ring-emerald-300 focus:border-emerald-300 transition duration-300 ease-in-out @error('password') error-border @enderror">
                @error('password')
                    <p class="text-red-500 text-xs text-left mt-1">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit"
                    class="btn-primary w-full py-3 px-4 rounded-lg text-white font-semibold text-lg hover:shadow-lg focus:outline-none focus:ring-4 focus:ring-emerald-300 focus:ring-opacity-75">
                Login
            </button>
        </form>

        <p class="mt-6 text-gray-600 text-sm">
            Don't have an account?
            <a href="{{ route('register') }}" class="font-semibold text-emerald-600 hover:text-emerald-800 transition duration-200 ease-in-out">Sign Up</a>
        </p>
    </div>

    <!-- Three.js CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
    <script>
        // Three.js Setup (same as your provided code)
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

            // --- START: FIX ---
            // Create a group to hold all parts of the bone
            bone = new THREE.Group();
            const boneMaterial = new THREE.MeshPhongMaterial({ color: 0xf5deb3, shininess: 30 }); // Bone color (wheat)

            // Main shaft of the bone (using CylinderGeometry)
            const boneShaftGeometry = new THREE.CylinderGeometry(0.4, 0.4, 2.5, 32); // topRadius, bottomRadius, height, radialSegments
            const boneShaft = new THREE.Mesh(boneShaftGeometry, boneMaterial);
            bone.add(boneShaft);

            // Ends of the bone
            const boneEndGeometry = new THREE.SphereGeometry(0.6, 32, 32);
            const boneEnd1 = new THREE.Mesh(boneEndGeometry, boneMaterial);
            boneEnd1.position.y = 1.25; // Position at the top of the cylinder
            bone.add(boneEnd1);

            const boneEnd2 = new THREE.Mesh(boneEndGeometry, boneMaterial);
            boneEnd2.position.y = -1.25; // Position at the bottom of the cylinder
            bone.add(boneEnd2);
            
            bone.position.set(-3, 2, 0);
            bone.rotation.z = Math.PI / 4;
            scene.add(bone);
            // --- END: FIX ---

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

        window.onload = function() {
            initThreeJS();
            animate();
        };
    </script>
</body>
</html>
