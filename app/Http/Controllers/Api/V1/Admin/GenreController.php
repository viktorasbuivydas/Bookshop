<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Api\V1\Controller;
use App\Http\Requests\GenreRequest;
use App\Http\Resources\Admin\GenreResource;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use App\Models\Genre;

class GenreController extends Controller
{
    use ApiResponser;

    public function index()
    {
        return GenreResource::collection(Genre::paginate());
    }

    public function show(Genre $genre)
    {
        return new GenreResource($genre);
    }

    public function store(GenreRequest $request)
    {
        Genre::create($request->validated());
        return $this->success('Genre created successfully');
    }

    public function update(GenreRequest $request, Genre $genre)
    {
        $genre->save($request->validated());
        return $this->success('Genre updated successfully');
    }

    public function destroy(Genre $genre)
    {
        $genre->delete();
        return $this->success('Genre was deleted succesfully');
    }
}
