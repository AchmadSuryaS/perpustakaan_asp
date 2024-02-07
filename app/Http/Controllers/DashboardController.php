<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Book;
use App\Models\Rent;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        return view ('dashboard');
    }

    public function book(){
        $books = Book::paginate(5);

        return view('book', [
            'books' => $books
        ]);
    }

    public function rent(){
        $rents = Rent::paginate(5);

        return view('rent', [
        'rents' => $rents
    ]);
    }

    public function user(){
        $users = User::with('role')->paginate(5);

        return view ('user', [
            'users' => $users
        ]);
    }
    public function report(){
        $rents = Rent::whereNotNull('return_date')->get();

        return view('report', [
            'rents' => $rents
        ]);
    }

    public function pdf(){
        $rents = Rent::all();
 
        $pdf = Pdf::loadview('pdf',['rents'=>$rents]);
        return $pdf->download('laporan-peminjaman.pdf');
    }

}
