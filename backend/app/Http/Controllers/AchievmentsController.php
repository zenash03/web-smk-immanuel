<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AchievmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Achievement::orderByDesc('created_at')->get(), 200);
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
            'file' => 'required|mimes:jpeg,jpg,png',
            'tag' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'invalid field'], 422);
        }

        $file = $request->file('file')->store('images');
        $date = date('F d, Y');
        $author = Admin::where('token', $request->token)->first()->name;

        Achievement::create([
            'title' => $request->title,
            'content' => $request->content,
            'author' => $author,
            'image_url' => $file,
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
        $prestasi = Achievement::where('id', $id)->first();

        return response()->json($prestasi, 200);
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
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'content' => 'required',
            'tag' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'invalid field'], 422);
        }

        $achievment = Achievement::find($id);
        $date = date('F d, Y');
        $author = Admin::where('token', $request->token)->first()->name;

        if ($request->file) {
            $file = $request->file('file')->store('images');

            $achievment->update([
                'title' => $request->title,
                'content' => $request->content,
                'author' => $author,
                'image_url' => $file,
                'tag' => $request->tag,
                'date' => $date
            ]);
        } else {
            $achievment->update([
                'title' => $request->title,
                'content' => $request->content,
                'author' => $author,
                'tag' => $request->tag,
                'date' => $date
            ]);
        }

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
        Achievement::findOrFail($id)->delete();

        return response()->json(['message' => 'success'], 200);
    }
}
