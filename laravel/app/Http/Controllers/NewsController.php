<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(News::all(), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'content' => 'required',
            'file' => 'required',
            'tag' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['message' => 'invalid field'], 422);
        }

        $file = $request->file;
        $name = uniqid() . date('His') . '.' . $file->getClientOriginalExtension();
        $date = date('l, F Y');
        $url = url('upload') . '/' . $name;
        $author = User::where('token', $request->token)->first()->name;

        $file->move(public_path() . '\upload', $name);

        News::create([
            'title' => $request->title,
            'content' => $request->content,
            'author' => $author,
            'image_url' => $url,
            'tag' => $request->tag,
            'date' => $date
        ]);

        return response()->json(['message' => 'success'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $news = News::where('id', $id)->first();

        return response()->json($news, 200);
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
        $url = News::findOrFail($id)->image_url;
        $date = date('l, F Y');
        $author = User::where('token', $request->token)->first()->name;

        if ($request->file) {
            $file = $request->file;
            $name = uniqid() . date('His') . '.' . $file->getClientOriginalExtension();
            $url = url('upload') . '/' . $name;
            
            $file->move(public_path() . '\upload', $name);
        }
        
        $news = News::findOrFail($id);
        $news->update([
            'title' => $request->title,
            'content' => $request->content,
            'author' => $author,
            'image_url' => $url,
            'tag' => $request->tag,
            'date' => $date
        ]);

        return response()->json(['message' => 'success'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        News::findOrFail($id)->delete();

        return response()->json(['message' => 'success'], 200);
    }
}
