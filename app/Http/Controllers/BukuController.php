<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Book;

class BukuController extends Controller
{
    public function welcome()
    {
        $books = Book::paginate(5);

        return view('welcome', [
            'books' => $books,
            'title' => 'Home',
        ]);
    }

    public function index(Request $request)
    {
        $keyword = $request->input('keyword');

        $query = Book::query();

        if ($keyword) {
            $query->where('title', 'LIKE', "%$keyword%");
        }

        $books = $query->paginate(12);

        $categories = Category::all();

        return view('buku', [
            'books' => $books,
            'keyword' => $keyword,
            'title' => 'Buku',
            'categories' => $categories,
        ]);
    }

    public function resetSearch()
    {
        return redirect('buku');
    }

    public function filterbook(Request $request)
    {
        $categoryId = $request->input('category');

        // Jika category dipilih, ambil buku sesuai kategori, jika tidak, ambil semua buku
        $books = ($categoryId) ? Book::where('category_id', $categoryId)->paginate(12) : Book::paginate(12);

        // Ambil semua kategori untuk menampilkan dalam dropdown
        $categories = Category::all();

        return view('buku', [
            'books' => $books,
            'categories' => $categories,
            'keyword' => null, 
            'title' => 'Buku'
        ]);
    }


    public function detail($slug)
    {
        $books = Book::where('slug', $slug)->first();

        return view('detail', [
            'books' => $books,
            'title' => 'Detail'
        ]);
    }
}
