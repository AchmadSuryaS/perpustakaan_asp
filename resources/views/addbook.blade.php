@extends('layouts.sidebar')

@section('container')
    <div class="p-5 text-center text-2xl text-primary font-bold">
        Tambah Buku
    </div>
    <form action="/dashboard/book/addbook" method="POST" enctype="multipart/form-data" class="mx-auto p-5">
        @csrf
        <div class="mb-5">
            <label class="block mb-2 text-sm font-medium text-primary">Image</label>
            <input type="file" name="image"
                class="block w-full text-sm text-primary border border-primary rounded-lg cursor-pointer bg-white">
        </div>
        <div class="mb-5">
            <label class="block mb-2 text-sm font-medium text-primary">Title</label>
            <input type="text" name="title"
                class="bg-white text-primary text-sm font-semibold rounded-lg block w-full p-2.5" required>
        </div>
        <div class="mb-5">
                <label for="category_id" class="font-medium block mb-2 text-sm text-primary">Category</label>
                <select name="category_id"
                    class="bg-white text-primary text-sm rounded-lg block w-full p-2.5"
                    name="role_id">
                    <option selected>Select Category</option>
                    <option value="1">Fiksi</option>
                    <option value="2">Non Fiksi</option>
                    <option value="3">Novel</option>
                    <option value="4">Pendidikan</option>
                </select>
        </div>
        <div class="mb-5">
            <label class="block mb-2 text-sm font-medium text-primary">Description</label>
            <textarea name="description" cols="30" rows="10"
                class="bg-white text-primary text-sm font-semibold rounded-lg block w-full p-2.5" required></textarea>
        </div>
        <div class="mb-5">
            <label class="block mb-2 text-sm font-medium text-primary">Stock</label>
            <input type="number" name="stock"
                class="bg-white text-primary text-sm font-semibold rounded-lg block w-full p-2.5" required>
        </div>

        <button type="submit"
            class="text-white bg-primary font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center">Submit</button>
    </form>
@endsection
