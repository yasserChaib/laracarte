<?php

namespace App\Http\Controllers;

use App\comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($url)
    {
        if (base64_decode($url) == 'http://localhost:8000/page2') {
            $comments = comment::
            where('url',base64_decode($url))
            ->where('respondToId',null)
            ->orderBy('id')
            ->paginate(3);
            
            return $comments;
        }

        $comments = comment::
        where('url',base64_decode($url))
        ->where('respondToId',null)
        ->orderBy('id')
        ->get();
        
        return $comments;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'message' => 'required',
            'name' => 'required',
            'url' => 'required',
        ]);

        return comment::create([
            'respondToId' => request('respondToId'),
            'name'=> request('name'),
            'url'=> request('url'),
            'message'=> request('message')
        ])->setRelation('children', collect());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
