<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Api\V1\Controller;
use App\Http\Requests\AuthorRequest;
use App\Http\Resources\Admin\AuthorResource;
use App\Traits\ApiResponser;
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

    public function store(AuthorRequest $request)
    {
        Author::create($request->validated());
        return $this->success('Author created successfully');
    }

    public function update(AuthorRequest $request, Author $author)
    {
        $author->save($request->validated());
        return $this->success('Author updated successfully');
    }

    public function destroy(Author $author)
    {
        $author->delete();
        return $this->success('Author was deleted succesfully');
    }
}
