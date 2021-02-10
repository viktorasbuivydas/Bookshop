<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Book;
use App\Services\ImageService;
use Illuminate\Support\Str;
class BookController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index()
    {
        return view('book.index');
    }

    public function create()
    {
        return view('book.create');
    }

   
    public function store(Request $request)
    {
        $image_name = "";
        $imageService = new ImageService();
        if($request->hasFile('cover_image_url')){
            if($request->file('cover_image_url')->isValid()){
                $request->validate([
                    'title' => ['required', 'max:100'],
                    'description' => ['required', 'max:200'],
                    'conver_image_url' => ['file', 'image:mimes:jpeg, png, jpg', 'max:2048']
                ]);
                $image = $request->file('cover_image_url');
                $request->cover_image_url = Str::random(25);
                $folder = '\uploads\images\\';
                $filePath = $folder . $request->cover_image_url. '.' . $image->getClientOriginalExtension();
                $imageService->uploadOne($image, $folder, 'public', $request->cover_image_url);
                $request->cover_image_url =  $request->cover_image_url . '.' .$image->getClientOriginalExtension();
            }
        }
        $data = [
            'title' => $request->title,
            'cover_image_url' => $request->cover_image_url,
            'description' => $request->description,
        ];
        Auth::user()->books()->create(
            $data
        );
        return redirect()->route('book.create')->with('success', 'Book created successfully');
    }

   
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

   
    public function destroy($id)
    {
        //
    }
}
