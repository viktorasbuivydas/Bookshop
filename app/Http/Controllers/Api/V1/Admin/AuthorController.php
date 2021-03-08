<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Api\V1\Controller;
use App\Http\Resources\Admin\AuthorResource;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use App\Models\Author;

class AuthorController extends Controller
{
    use ApiResponser;

    public function index()
    {
        return AuthorResource::collection(Author::paginate());
    }

    public function show(Author $author)
    {
        return new AuthorResource($author);
    }

    public function store(Request $request)
    {
        $request->validate([
            'author' => ['required', 'min:4', 'max:20', 'unique:authors,author']
        ]);
        Author::create(['author' => $request->author]);
        return $this->success('Author created successfully');
    }

    public function update(Request $request, $author)
    {
        $request->validate([
            'author' => ['required', 'min:4', 'max:20', 'unique:authors,author']
        ]);
        $author->author = $request->author;
        $author->save();
        return $this->success('Author updated successfully');
    }

    public function destroy($author)
    {
        $author->delete();
        return $this->success('Author was deleted succesfully');
    }
}
