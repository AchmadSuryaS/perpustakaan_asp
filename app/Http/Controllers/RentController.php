<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Rent;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store($title){

    $book = Book::where('title', $title)->firstOrFail();
    $user = User::find(Auth::id());

    if ($user->rents()->where('status', 'Rent')->count() > 0) {
        return back()->with('limit', 'Maaf, Anda hanya bisa meminjam satu buku pada saat ini.');
    }

    if ($book->stock > 0) {

        $rent = new Rent();
        $rent->book_id = $book->id;
        $rent->user_id = $user->id;
        $rent->rent_date = now();
        $rent->status = 'Rent'; 

        $rent->save();

        $book->decrement('stock');

        return back()->with('rent', 'Buku berhasil dipinjam!');
    } else {
        return back()->with('stock', 'Maaf, Buku tidak tersedia.');
    }
}


    /**
     * Display the specified resource.
     */
    public function show(Rent $rent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rent $rent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($rentId)
    {
        $rent = Rent::findOrFail($rentId);

        $rent->update(['status' => 'Return', 'return_date' => now()]);
    
        $book = Book::where('id', $rent->book_id)->first();
        
        $book->increment('stock');

        return back()->with('return', 'Buku berhasil dikembalikan.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($rentId)
    {
        //
    }

    public function reject($rentId){
        $rent = Rent::findOrFail($rentId);

        $rent->update(['status' => 'Reject']);

        $book = Book::where('id', $rent->book_id)->first();

        $book->increment('stock');

        return back()->with('reject', 'Buku berhasil ditolak.');
    }
}
