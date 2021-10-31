<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Link;
use Illuminate\Http\Request;
use App\Http\Resources\LinkResource;

class LinkController extends Controller
{
    public function index()
    {
        return LinkResource::collection(Link::all());
    }

    public function store(Request $request)
    {
        $link = Link::create($request->all());

        return new LinkResource($link);
    }

    public function show(Link $link)
    {
        return new LinkResource($link);
    }

    public function update(Link $link)
    {
        $data = [
            'times' => $link->times + 1
        ];

        $link->update($data);

        return new LinkResource($link);
    }

    public function destroy(Link $link)
    {
        $link->delete();

        return response()->json();
    }
}
