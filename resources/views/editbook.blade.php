@extends('layouts.sidebar')

@section('container')
    <div class="p-5 text-center text-2xl text-primary font-bold">
        Edit Buku
    </div>
    <form action="{{ route('editbook', $book->slug) }}" method="POST" enctype="multipart/form-data" class="mx-auto p-5">
        @csrf
        <div class="mb-5">
            <div class="mb-10">
                <img id="imagePreview" class="w-48 h-72 object-cover rounded-lg shadow-xl"
                    src="{{ asset('storage/image/' . $book->image) }}" alt="Preview">
            </div>
            <label class="block mb-2 text-sm font-medium text-primary">Image</label>
            <input type="file" name="image" id="imageInput" onchange="previewImage()"
                class="block w-full text-sm text-primary border border-primary rounded-lg cursor-pointer bg-white">
        </div>
        <div class="mb-5">
            <label class="block mb-2 text-sm font-medium text-primary">Title</label>
            <input type="text" name="title" value="{{ $book->title }}"
                class="bg-white text-primary text-sm font-semibold rounded-lg block w-full p-2.5" required>
        </div>
        <div class="mb-5">
            <label for="category_id" class="font-medium block mb-2 text-sm text-primary">Category</label>
            <select name="category_id" value="{{ $book->category }}" class="bg-white text-primary text-sm rounded-lg block w-full p-2.5" name="role_id">
                <option selected value="{{ $book->category_id }}">{{ $book->category->category_name }}</option>
                <option value="1">Fiksi</option>
                <option value="2">Non Fiksi</option>
                <option value="3">Novel</option>
                <option value="4">Pendidikan</option>
            </select>
        </div>
        <div class="mb-5">
            <label class="block mb-2 text-sm font-medium text-primary">Description</label>
            <textarea name="description" cols="30" rows="10"
                class="bg-white text-primary text-sm font-semibold rounded-lg block w-full p-2.5" required>{{ $book->description }}</textarea>
        </div>
        <div class="mb-5">
            <label class="block mb-2 text-sm font-medium text-primary">Stock</label>
            <input type="number" name="stock" value="{{ $book->stock }}"
                class="bg-white text-primary text-sm font-semibold rounded-lg block w-full p-2.5" required>
        </div>

        <button type="submit"
            class="text-white bg-primary font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center">Submit</button>
    </form>

    <script>
        function previewImage() {
            var input = document.getElementById('imageInput');
            var preview = document.getElementById('imagePreview');

            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
