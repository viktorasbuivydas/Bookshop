<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Support\Facades\Cookie;

class IndexController extends Controller
{

    public function index()
    {
        $books = Book::with(['authors'])
            ->when(request('search'), function ($query) {
                $search = request('search');
                Cookie::queue('search', $search);
                $query->where('title', 'LIKE', "%{$search}%")
                ->orWhereHas('authors', function($query) use ($search){
                    $query->where('author', 'LIKE', "%{$search}%");
                });
            })
            ->isApproved()->latest()->simplePaginate(25);
        return view('welcome', compact('books'));
    }
}
