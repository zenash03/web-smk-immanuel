<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banner = Banner::where('active', 'y')->get();
        return response()->json($banner, 200);
    }

    public function adminView() 
    {
        return response()->json(Banner::all(), 200);
    }

    public function toggle(Request $request, $id) 
    {
        Banner::findOrFail($id)->update([
            'active' => $request->state
        ]);

        return response()->json(['message' => 'success'], 200);
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
            'file' => 'required'
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

        Banner::create([
            'title' => $request->title,
            'content' => $request->content,
            'image_url' => $url,
            'active' => 'y'
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
        $banner = Banner::where('id', $id)->first();

        return response()->json($banner, 200);
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
        $url = Banner::findOrFail($id)->image_url;

        if ($request->file) {
            $file = $request->file;
            $name = uniqid() . date('His') . '.' . $file->getClientOriginalExtension();
            $url = url('upload') . '/' . $name;
            
            $file->move(public_path() . '\upload', $name);
        }

        Banner::create([
            'title' => $request->title,
            'content' => $request->content,
            'image_url' => $url,
            'active' => 'y'
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
        Banner::findOrFail($id)->delete();

        return response()->json(['message' => 'success'], 200);
    }
}
