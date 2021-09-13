<?php

namespace App\Http\Controllers;

use App\Models\Headline;
use App\Models\News;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HeadlineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(News::where('headline', 'y')->orderBy('created_at')->first(), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'title' => 'required',
    //         'content' => 'required',
    //         'file' => 'required',
    //         'active' => 'required'
    //     ]);
    //     if ($validator->fails()) {
    //         return response()->json(['message' => 'invalid field'], 422);
    //     }

    //     $file = $request->file;
    //     $name = uniqid() . date('His') . '.' . $file->getClientOriginalExtension();
    //     $date = date('l, F Y');
    //     $url = url('upload') . '/' . $name;
    //     $author = User::where('token', $request->token)->first()->name;

    //     $file->move(public_path() . '\upload', $name);

    //     Headline::create([
    //         'title' => $request->title,
    //         'content' => $request->content,
    //         'author' => $author,
    //         'image_url' => $url,
    //         'active' => $request->active
    //     ]);

    //     return response()->json(['message' => 'success'], 200);
    // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     $headline = Headline::where('id', $id)->first();

    //     return response()->json($headline, 200);
    // }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, $id)
    // {
    //     $file = $request->file;
    //     $name = uniqid() . date('His') . '.' . $file->getClientOriginalExtension();
    //     $date = date('l, F Y');
    //     $url = url('upload') . '/' . $name;
    //     $author = User::where('token', $request->token)->first()->name;

    //     $file->move(public_path() . '\upload', $name);

    //     $headline = Headline::findOrFail($id);
    //     $headline->update([
    //         'title' => $request->title,
    //         'content' => $request->content,
    //         'author' => $author,
    //         'image_url' => $url,
    //         'active' => $request->active
    //     ]);

    //     return response()->json(['message' => 'success'], 200);
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    // {
    //     Headline::findOrFail($id)->delete();

    //     return response()->json(['message' => 'success'], 200);
    // }
}
