<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Account - LittleFur</title>
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Google Fonts: Nunito -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&display=swap" rel="stylesheet">

    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Custom Styles & Tailwind Configuration -->
    <style>
        /* Extending Tailwind with custom styles */
        body {
            font-family: 'Nunito', sans-serif;
            scroll-behavior: smooth;
        }

        /* Custom styles for the toggle switch */
        .toggle-checkbox:checked {
            right: 0;
            border-color: #ec4899; /* pink-500 */
        }
        .toggle-checkbox:checked + .toggle-label {
            background-color: #ec4899; /* pink-500 */
        }
        
        /* Custom animation for fade-in */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .fade-in {
            animation: fadeIn 0.5s ease-out forwards;
        }

        /* Fix for input field labels */
        .form-input-container {
            position: relative;
        }
        .form-input-label {
            position: absolute;
            left: 0.75rem;
            top: 0.8rem;
            padding: 0 0.25rem;
            color: #6b7280;
            pointer-events: none;
            transition: all 0.2s ease;
            background-color: white;
        }
        .form-input:focus ~ .form-input-label,
        .form-input:not(:placeholder-shown) ~ .form-input-label {
            transform: translateY(-1.5rem) scale(0.8);
            color: #db2777;
        }
        .form-input {
            padding-top: 1rem;
        }

    </style>
    <script>
        // Custom color palette for Tailwind
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'brand-pink-light': '#FFF0F5', // Lavender Blush
                        'brand-pink': '#FBCFE8',       // Pink-200
                        'brand-pink-dark': '#DB2777',   // Pink-600
                        'brand-text': '#52525B',        // Zinc-600
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-brand-pink-light">

    <div id="app">
        <!-- Main Content Section -->
        <main class="container mx-auto p-4 md:p-8">
            <div class="fade-in">
                <!-- Page Title -->
                <h1 class="text-4xl font-extrabold text-brand-pink-dark mb-2">My Account</h1>
                <p class="text-brand-text mb-8">Manage your profile, pets, and bookings all in one place.</p>

                <!-- Main Grid Layout -->
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">

                    <!-- Left Column: User Profile -->
                    <div class="lg:col-span-4">
                        <div class="bg-white p-6 rounded-2xl shadow-lg transition-all duration-300 hover:shadow-xl">
                            <h2 class="text-2xl font-bold text-brand-pink-dark mb-6">User Profile</h2>
                            <div id="user-profile-card" class="flex flex-col items-center text-center">
                                <img src="https://placehold.co/128x128/FBCFE8/DB2777?text=U" alt="User Profile Picture" class="w-32 h-32 rounded-full border-4 border-brand-pink mb-4">
                                
                                <!-- Display View -->
                                <div id="profile-display-view" class="w-full">
                                    <h3 class="text-xl font-bold text-gray-800" data-field="name">Jessica Doe</h3>
                                    <p class="text-brand-text" data-field="email">jessica.doe@example.com</p>
                                    <p class="text-brand-text mb-6" data-field="phone">+1 (555) 123-4567</p>
                                </div>
                                
                                <!-- Edit View (Initially Hidden) -->
                                <div id="profile-edit-view" class="hidden w-full space-y-4">
                                    <input type="text" id="edit-name" class="w-full border-gray-300 rounded-lg p-2 text-center" value="Jessica Doe">
                                    <input type="email" id="edit-email" class="w-full border-gray-300 rounded-lg p-2 text-center" value="jessica.doe@example.com">
                                    <input type="tel" id="edit-phone" class="w-full border-gray-300 rounded-lg p-2 text-center" value="+1 (555) 123-4567">
                                </div>

                                <!-- Action Buttons -->
                                <div id="profile-actions" class="w-full">
                                    <button id="edit-profile-btn" class="w-full bg-brand-pink-dark text-white font-bold py-3 px-4 rounded-xl hover:bg-pink-700 transition-all duration-300 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-pink-500 focus:ring-opacity-50">
                                        <i class="fas fa-pencil-alt mr-2"></i>Edit Profile
                                    </button>
                                    <div id="edit-actions-container" class="hidden flex gap-4">
                                        <button id="save-profile-btn" class="w-full bg-green-500 text-white font-bold py-3 px-4 rounded-xl hover:bg-green-600 transition">Save</button>
                                        <button id="cancel-edit-btn" class="w-full bg-gray-400 text-white font-bold py-3 px-4 rounded-xl hover:bg-gray-500 transition">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Right Column: Pet Management -->
                    <div class="lg:col-span-8">
                        <!-- Section: Add New Pet -->
                        <div id="pet-form-section" class="bg-white p-6 rounded-2xl shadow-lg mb-8 transition-all duration-300 hover:shadow-xl">
                            <h2 id="form-title" class="text-2xl font-bold text-brand-pink-dark mb-6">Add a New Pet</h2>
                            <form id="pet-form" class="space-y-6">
                                <input type="hidden" id="pet-id">
                                
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <!-- Pet Name -->
                                    <div class="form-input-container">
                                        <input type="text" id="pet-name" placeholder=" " class="form-input mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:border-brand-pink-dark focus:ring focus:ring-brand-pink focus:ring-opacity-50 transition" required>
                                        <label for="pet-name" class="form-input-label">Pet Name</label>
                                    </div>
                                    
                                    <!-- Pet Type -->
                                    <div>
                                        <label for="pet-type" class="block text-sm font-medium text-brand-text">Pet Type</label>
                                        <select id="pet-type" class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:border-brand-pink-dark focus:ring focus:ring-brand-pink focus:ring-opacity-50 transition">
                                            <option>Dog</option>
                                            <option>Cat</option>
                                            <option>Rabbit</option>
                                            <option>Bird</option>
                                            <option>Hamster</option>
                                            <option>Turtle</option>
                                            <option>Other</option>
                                        </select>
                                    </div>

                                    <!-- Breed -->
                                    <div class="form-input-container">
                                        <input type="text" id="pet-breed" list="breed-suggestions" placeholder=" " class="form-input mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:border-brand-pink-dark focus:ring focus:ring-brand-pink focus:ring-opacity-50 transition">
                                        <label for="pet-breed" class="form-input-label">Breed</label>
                                        <datalist id="breed-suggestions"></datalist>
                                    </div>

                                    <!-- Pet Age -->
                                    <div class="form-input-container">
                                        <input type="number" id="pet-age" min="0" placeholder=" " class="form-input mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:border-brand-pink-dark focus:ring focus:ring-brand-pink focus:ring-opacity-50 transition">
                                        <label for="pet-age" class="form-input-label">Pet Age (years)</label>
                                    </div>
                                </div>

                                <!-- Special Needs -->
                                <div>
                                    <label for="special-needs" class="block text-sm font-medium text-brand-text">Special Needs or Allergies</label>
                                    <textarea id="special-needs" rows="3" placeholder="e.g., Allergic to peanuts, requires daily medication..." class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:border-brand-pink-dark focus:ring focus:ring-brand-pink focus:ring-opacity-50 transition"></textarea>
                                </div>

                                <!-- Vaccination Status -->
                                <div>
                                    <label class="block text-sm font-medium text-brand-text mb-2">Vaccination Status</label>
                                    <div class="flex items-center">
                                        <div class="relative inline-block w-12 mr-2 align-middle select-none transition duration-200 ease-in">
                                            <input type="checkbox" name="vaccinated" id="vaccinated-toggle" class="toggle-checkbox absolute block w-6 h-6 rounded-full bg-white border-4 appearance-none cursor-pointer"/>
                                            <label for="vaccinated-toggle" class="toggle-label block overflow-hidden h-6 rounded-full bg-gray-300 cursor-pointer"></label>
                                        </div>
                                        <span class="text-gray-700">Is your pet vaccinated?</span>
                                    </div>
                                </div>

                                <!-- Submit Button -->
                                <div class="text-right">
                                    <button type="button" id="cancel-pet-edit-btn" class="hidden inline-flex justify-center py-3 px-6 border border-gray-300 shadow-lg text-sm font-bold rounded-xl text-gray-700 bg-white hover:bg-gray-50 transition mr-4">
                                        Cancel
                                    </button>
                                    <button type="submit" class="inline-flex justify-center py-3 px-6 border border-transparent shadow-lg text-sm font-bold rounded-xl text-white bg-brand-pink-dark hover:bg-pink-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-pink-500 transition-all duration-300 transform hover:scale-105">
                                        <span id="form-submit-button-text">Add Pet</span>
                                    </button>
                                </div>
                            </form>
                        </div>

                        <!-- Section: My Pets (Card View) -->
                        <div>
                            <h2 class="text-2xl font-bold text-brand-pink-dark mb-6">My Pets</h2>
                            <div id="pets-list" class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Pet cards will be dynamically inserted here -->
                            </div>
                            <!-- Add new button -->
                            <div class="text-center mt-8">
                               <button id="add-another-pet-btn" class="py-3 px-6 font-bold rounded-xl text-brand-pink-dark bg-brand-pink hover:bg-pink-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-pink-500 transition-all duration-300">
                                   <i class="fas fa-plus mr-2"></i>Add Another Pet
                               </button>
                           </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function () {
        // --- DATA STORE ---
        let pets = [
            { id: 1, name: 'Fluffy', type: 'Cat', breed: 'Persian', age: '3', vaccinated: true, needs: 'Loves to be brushed daily.', gender: 'Female', icon: 'fa-venus' },
            { id: 2, name: 'Charlie', type: 'Dog', breed: 'Golden Retriever', age: '5', vaccinated: true, needs: 'Needs a long walk every morning.', gender: 'Male', icon: 'fa-mars' }
        ];

        const breedsData = {
            'Dog': ['Golden Retriever', 'Labrador', 'German Shepherd', 'Poodle', 'Beagle'],
            'Cat': ['Persian', 'Siamese', 'Maine Coon', 'Bengal', 'Sphynx'],
            'Rabbit': ['Holland Lop', 'Mini Rex', 'Netherland Dwarf'],
            'Bird': ['Parakeet', 'Cockatiel', 'Finch', 'Canary'],
            'Hamster': ['Syrian', 'Dwarf Campbell', 'Roborovski'],
            'Turtle': ['Red-Eared Slider', 'Painted Turtle', 'Box Turtle'],
            'Other': []
        };

        // --- DOM ELEMENTS ---
        const petForm = document.getElementById('pet-form');
        const petListContainer = document.getElementById('pets-list');
        const petTypeSelect = document.getElementById('pet-type');
        const breedSuggestions = document.getElementById('breed-suggestions');
        const formTitle = document.getElementById('form-title');
        const formSubmitButtonText = document.getElementById('form-submit-button-text');
        const cancelPetEditBtn = document.getElementById('cancel-pet-edit-btn');
        const hiddenPetId = document.getElementById('pet-id');
        const addAnotherPetBtn = document.getElementById('add-another-pet-btn');
        const petFormSection = document.getElementById('pet-form-section');

        // --- RENDER FUNCTION ---
        const renderPets = () => {
            petListContainer.innerHTML = '';
            pets.forEach(pet => {
                const petIcon = { 'Dog': 'fa-dog', 'Cat': 'fa-cat', 'Rabbit': 'fa-carrot', 'Bird': 'fa-dove', 'Hamster': 'fa-igloo', 'Turtle': 'fa-shield-alt' }[pet.type] || 'fa-paw';
                const petCardHTML = `
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
                        <div class="flex">
                            <img class="h-48 w-1/3 object-cover" src="https://placehold.co/400x400/FBCFE8/DB2777?text=${pet.name.charAt(0)}" alt="Pet Photo for ${pet.name}">
                            <div class="p-4 flex flex-col justify-between w-2/3">
                                <div>
                                    <div class="flex justify-between items-start">
                                        <h3 class="text-xl font-bold text-gray-800">${pet.name}</h3>
                                        <div class="flex space-x-2 text-brand-text">
                                            <a href="#" class="hover:text-brand-pink-dark edit-btn" data-id="${pet.id}" title="Edit"><i class="fas fa-edit"></i></a>
                                            <a href="#" class="hover:text-red-500 delete-btn" data-id="${pet.id}" title="Delete"><i class="fas fa-trash"></i></a>
                                        </div>
                                    </div>
                                    <p class="text-brand-text text-sm">${pet.breed}</p>
                                    <p class="text-brand-text text-sm">Age: ${pet.age} years</p>
                                </div>
                                <div class="flex items-center space-x-4 mt-4 text-sm text-brand-pink-dark">
                                    <span class="flex items-center" title="${pet.gender}"><i class="fas ${pet.icon} mr-1"></i> ${pet.gender}</span>
                                    ${pet.vaccinated ? `<span class="flex items-center" title="Vaccinated"><i class="fas fa-shield-alt mr-1"></i> Vaccinated</span>` : ''}
                                    <span class="flex items-center" title="${pet.type}"><i class="fas ${petIcon} mr-1"></i> ${pet.type}</span>
                                </div>
                            </div>
                        </div>
                    </div>`;
                petListContainer.insertAdjacentHTML('beforeend', petCardHTML);
            });
            addPetActionListeners();
        };
        
        // --- PET FORM LOGIC ---
        const resetPetForm = () => {
            petForm.reset();
            hiddenPetId.value = '';
            formTitle.innerText = 'Add a New Pet';
            formSubmitButtonText.innerText = 'Add Pet';
            cancelPetEditBtn.classList.add('hidden');
            // Manually trigger label check for cleared fields
            document.querySelectorAll('.form-input').forEach(input => {
                if (input.value === "") {
                    input.dispatchEvent(new Event('blur'));
                }
            });
        };

        petForm.addEventListener('submit', (e) => {
            e.preventDefault();
            const id = hiddenPetId.value;
            const genderRadio = document.querySelector('input[name="gender"]:checked') || { value: 'N/A', icon: 'fa-question-circle' };

            const petData = {
                name: document.getElementById('pet-name').value,
                type: document.getElementById('pet-type').value,
                breed: document.getElementById('pet-breed').value,
                age: document.getElementById('pet-age').value,
                vaccinated: document.getElementById('vaccinated-toggle').checked,
                needs: document.getElementById('special-needs').value,
                gender: genderRadio.value,
                icon: genderRadio.value === 'Male' ? 'fa-mars' : (genderRadio.value === 'Female' ? 'fa-venus' : 'fa-genderless')
            };

            if (id) { // Editing existing pet
                const petIndex = pets.findIndex(p => p.id == id);
                pets[petIndex] = { ...pets[petIndex], ...petData };
            } else { // Adding new pet
                petData.id = Date.now(); // Simple unique ID
                pets.push(petData);
            }

            renderPets();
            resetPetForm();
        });

        cancelPetEditBtn.addEventListener('click', resetPetForm);

        // --- PET CARD ACTIONS (EDIT/DELETE) ---
        const addPetActionListeners = () => {
            petListContainer.querySelectorAll('.edit-btn').forEach(btn => {
                btn.addEventListener('click', (e) => {
                    e.preventDefault();
                    const id = e.currentTarget.dataset.id;
                    const petToEdit = pets.find(p => p.id == id);

                    hiddenPetId.value = petToEdit.id;
                    document.getElementById('pet-name').value = petToEdit.name;
                    document.getElementById('pet-type').value = petToEdit.type;
                    updateBreedSuggestions();
                    document.getElementById('pet-breed').value = petToEdit.breed;
                    document.getElementById('pet-age').value = petToEdit.age;
                    document.getElementById('vaccinated-toggle').checked = petToEdit.vaccinated;
                    document.getElementById('special-needs').value = petToEdit.needs;
                    
                    formTitle.innerText = 'Edit Pet Details';
                    formSubmitButtonText.innerText = 'Save Changes';
                    cancelPetEditBtn.classList.remove('hidden');

                    petFormSection.scrollIntoView({ behavior: 'smooth' });
                    // Manually trigger focus/blur to move labels
                     document.querySelectorAll('.form-input').forEach(input => input.dispatchEvent(new Event('blur')));
                });
            });

            petListContainer.querySelectorAll('.delete-btn').forEach(btn => {
                btn.addEventListener('click', (e) => {
                    e.preventDefault();
                    if (confirm('Are you sure you want to delete this pet?')) {
                        const id = e.currentTarget.dataset.id;
                        pets = pets.filter(p => p.id != id);
                        renderPets();
                    }
                });
            });
        };
        
        // --- UTILITY & OTHER LISTENERS ---
        const updateBreedSuggestions = () => {
            const selectedType = petTypeSelect.value;
            const suggestions = breedsData[selectedType] || [];
            breedSuggestions.innerHTML = '';
            suggestions.forEach(breed => {
                const option = document.createElement('option');
                option.value = breed;
                breedSuggestions.appendChild(option);
            });
        };
        
        petTypeSelect.addEventListener('change', updateBreedSuggestions);

        addAnotherPetBtn.addEventListener('click', () => {
            resetPetForm();
            petFormSection.scrollIntoView({ behavior: 'smooth' });
        });
        
        // --- PROFILE EDIT LOGIC ---
        const editProfileBtn = document.getElementById('edit-profile-btn');
        const saveProfileBtn = document.getElementById('save-profile-btn');
        const cancelEditBtn = document.getElementById('cancel-edit-btn');
        const profileDisplayView = document.getElementById('profile-display-view');
        const profileEditView = document.getElementById('profile-edit-view');
        const editActionsContainer = document.getElementById('edit-actions-container');

        const toggleProfileEdit = (isEditing) => {
            profileDisplayView.classList.toggle('hidden', isEditing);
            profileEditView.classList.toggle('hidden', !isEditing);
            editProfileBtn.classList.toggle('hidden', isEditing);
            editActionsContainer.classList.toggle('hidden', !isEditing);
        };
        
        editProfileBtn.addEventListener('click', () => toggleProfileEdit(true));
        cancelEditBtn.addEventListener('click', () => toggleProfileEdit(false));

        saveProfileBtn.addEventListener('click', () => {
            const newName = document.getElementById('edit-name').value;
            const newEmail = document.getElementById('edit-email').value;
            const newPhone = document.getElementById('edit-phone').value;

            profileDisplayView.querySelector('[data-field="name"]').textContent = newName;
            profileDisplayView.querySelector('[data-field="email"]').textContent = newEmail;
            profileDisplayView.querySelector('[data-field="phone"]').textContent = newPhone;

            toggleProfileEdit(false);
        });

        // --- INITIALIZATION ---
        updateBreedSuggestions();
        renderPets();
    });
    </script>
</body>
</html>

{{-- git add . && git commit -m "message" && git push --}}
