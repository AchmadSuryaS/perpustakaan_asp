<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('addbook');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'image' => 'required|max:2048|mimes:png,jpg,jpeg',
            'title' => 'required|max:255',
            'category_id' => 'required',
            'description' => 'required',
            'stock' => 'required',
        ]);

        $imageBook = $request->file('image');
        $filename = date('Y-m-d') . $imageBook->getClientOriginalName();
        $path = 'image/' . $filename;

        Storage::disk('public')->put($path, file_get_contents($imageBook));

        $validateData['image'] = $filename;

        Book::create($validateData);

        return redirect('/dashboard/book')->with('addbook', 'Berhasil menambahkan buku');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($slug)
    {
        $book = Book::where('slug', $slug)->first();

        return view('editbook', [
            'book' => $book
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $slug)
    {
        $book = Book::where('slug', $slug)->first();

        $validateData = $request->validate([
            'image' => 'sometimes|max:2048|mimes:png,jpg,jpeg',
            'title' => 'required|max:255',
            'category_id' => 'required',
            'description' => 'required',
            'stock' => 'required',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image
            $imagePath = 'image/' . $book->image;
            Storage::disk('public')->delete($imagePath);

            // Save new image
            $newImage = $request->file('image');
            $filename = date('Y-m-d') . $newImage->getClientOriginalName();
            $path = 'image/' . $filename;
            Storage::disk('public')->put($path, file_get_contents($newImage));

            $validateData['image'] = $filename;
        }

        $book->update($validateData);

        return redirect('/dashboard/book')->with('updatebook', 'Berhasil memperbarui buku');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($slug)
    {
        $book = Book::where('slug', $slug)->first();

        $imagePath = 'image/' . $book->image;

        Storage::disk('public')->delete($imagePath);

        $book->delete();

        return redirect('/dashboard/book')->with('destroybook', 'Berhasil menghapus buku');
    }
}
