<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Créer une nouvelle annonce') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('ads.store') }}" enctype="multipart/form-data" x-data="imageUploader()">
                        @csrf

                        <!-- Images -->
                        <div>
                            <x-input-label for="images" :value="__('Images')" />
                            <input @change="handleFileSelect" type="file" id="images" name="images[]" multiple class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-violet-50 file:text-violet-700 hover:file:bg-violet-100"/>
                            <div class="mt-4 grid grid-cols-2 md:grid-cols-4 gap-4" id="image-previews">
                                <template x-for="(image, index) in previews" :key="index">
                                    <div class="relative">
                                        <img :src="image.url" class="rounded-lg object-cover h-48 w-full">
                                        <button @click.prevent="removeImage(index)" class="absolute top-2 right-2 bg-red-500 text-white rounded-full p-1 w-6 h-6 flex items-center justify-center text-xs">X</button>
                                    </div>
                                </template>
                            </div>
                            <x-input-error :messages="$errors->get('images')" class="mt-2" />
                            <x-input-error :messages="$errors->get('images.*')" class="mt-2" />
                        </div>

                        <!-- Loading Indicator -->
                        <div x-show="isLoading" class="mt-4 flex items-center">
                            <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-gray-700" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                            <span>Analyse de l'image en cours...</span>
                        </div>

                        <!-- Title -->
                        <div class="mt-4">
                            <x-input-label for="title" :value="__('Titre')" />
                            <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required autofocus />
                            <x-input-error :messages="$errors->get('title')" class="mt-2" />
                        </div>

                        <!-- Description -->
                        <div class="mt-4">
                            <x-input-label for="description" :value="__('Description')" />
                            <textarea id="description" name="description" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" rows="5">{{ old('description') }}</textarea>
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>

                        <!-- Price -->
                        <div class="mt-4">
                            <x-input-label for="price" :value="__('Prix')" />
                            <x-text-input id="price" class="block mt-1 w-full" type="number" name="price" :value="old('price')" required />
                            <x-input-error :messages="$errors->get('price')" class="mt-2" />
                        </div>

                        <!-- Category -->
                        <div class="mt-4">
                            <x-input-label for="category" :value="__('Catégorie')" />
                            <select id="category" name="category" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                <option value="electronics">Électronique</option>
                                <option value="furniture">Mobilier</option>
                                <option value="clothing">Vêtements</option>
                                <option value="books">Livres</option>
                                <option value="other">Autre</option>
                            </select>
                            <x-input-error :messages="$errors->get('category')" class="mt-2" />
                        </div>

                        <!-- Condition -->
                        <div class="mt-4">
                            <x-input-label for="condition" :value="__('État')" />
                            <select id="condition" name="condition" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                <option value="new">Neuf</option>
                                <option value="like_new">Comme neuf</option>
                                <option value="good">Bon état</option>
                                <option value="used">Usé</option>
                            </select>
                            <x-input-error :messages="$errors->get('condition')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button>
                                {{ __('Publier') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        function imageUploader() {
            return {
                previews: [],
                isLoading: false,
                handleFileSelect(event) {
                    this.previews = []; // Reset previews on new selection
                    const files = event.target.files;
                    if (files.length === 0) return;

                    // Generate previews
                    for (let i = 0; i < files.length; i++) {
                        const reader = new FileReader();
                        reader.onload = (e) => {
                            this.previews.push({ url: e.target.result, file: files[i] });
                        };
                        reader.readAsDataURL(files[i]);
                    }

                    this.analyzeFirstImage(files[0]);
                },
                removeImage(index) {
                    this.previews.splice(index, 1);
                    // If the first image was removed, re-analyze the new first one or clear fields
                    if (index === 0) {
                        if (this.previews.length > 0) {
                            this.analyzeFirstImage(this.previews[0].file);
                        } else {
                            this.clearSuggestions();
                        }
                    }
                },
                analyzeFirstImage(file) {
                    this.isLoading = true;
                    const formData = new FormData();
                    formData.append('image', file);

                    fetch('{{ route('api.analyze-image') }}', {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Accept': 'application/json',
                        },
                        body: formData
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.error) {
                            console.error(data.error);
                            this.clearSuggestions();
                        } else {
                            document.getElementById('title').value = data.title || '';
                            document.getElementById('description').value = data.description || '';
                            // Try to select the category, fallback to 'other'
                            const categorySelect = document.getElementById('category');
                            const suggestedCategory = Array.from(categorySelect.options).find(opt => opt.text.toLowerCase() === data.category);
                            categorySelect.value = suggestedCategory ? suggestedCategory.value : 'other';
                        }
                    })
                    .catch(error => {
                        console.error('Error analyzing image:', error);
                        this.clearSuggestions();
                    })
                    .finally(() => {
                        this.isLoading = false;
                    });
                },
                clearSuggestions() {
                    document.getElementById('title').value = '';
                    document.getElementById('description').value = '';
                    document.getElementById('category').value = 'other';
                }
            }
        }
    </script>
</x-app-layout>
