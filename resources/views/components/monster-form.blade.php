@props(['action', 'method'])

<form action="{{ $action }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if($method === 'PUT' || $method === 'PATCH')
        @method($method)
    @endif

    <div class="mb-4">
        <label for="monster_name" class="block text-sm text-gray-700">Name</label>
        <input
            type="text"
            name="monster_name"
            id="monster_name"
            value="{{ old('monster_name', $monster->monster_name ?? '') }}"
            required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
        @error('monster_name')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>
    <!-- In value, you need to have a fallback blank after ?? i.e. '' Otherwise it will ERROR -->
    
    <div class="mb-4">
        <label for="alignment" class="block text-sm text-gray-700">Alignment</label>
        <input
            type="text"
            name="alignment"
            id="alignment"
            value="{{ old('alignment', $monster->alignment ?? '') }}" 
            required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
        @error('alignment')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="challenge_rating" class="block text-sm text-gray-700">Challenge Rating</label>
        <input
            type="text"
            name="challenge_rating"
            id="challenge_rating"
            value="{{ old('challenge_rating', $monster->challenge_rating ?? '') }}" 
            required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
        @error('challenge_rating')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="armour_class" class="block text-sm text-gray-700">Armour Class</label>
        <input
            type="text"
            name="armour_class"
            id="armour_class"
            value="{{ old('armour_class', $monster->armour_class ?? '') }}" 
            required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
        @error('armour_class')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="description" class="block text-sm text-gray-700">Description</label>
        <input
            type="text"
            name="description"
            id="description"
            value="{{ old('description', $monster->description ?? '') }}" 
            required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
        @error('description')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="created_at" class="block text-sm text-gray-700">Created At</label>
        <input
            type="text"
            name="created_at"
            id="created_at"
            value="{{ old('created_at', $monster->created_at ?? '') }}" 
            required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
        @error('created_at')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="image_url" class="block text-sm font-medium text-gray-700">Image</label>
        <input
            type="file"
            name="image_url"
            id="image_url"
            {{ isset($monster) ? '' : 'required' }}
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"/>
        @error('image_url')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>
    
    @isset($monster->image_url)
        <div class="mb-4">
            <img src="{{ asset($monster->image_url) }}" alt="Monster Image" class="w-24 h-32 object-cover">
        </div>
    @endisset



    <div>
        <x-primary-button>
            {{ isset($monster) ? 'Update Monster' : 'Add Monster' }}
        </x-primary-button>
    </div>
</form>
