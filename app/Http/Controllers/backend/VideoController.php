<?php

namespace App\Http\Controllers\backend;

use App\VideoImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VideoController extends Controller
{
    protected $data = [];
    /**
     * Create a new controller instance.
     *
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['title'] = 'Video';
        $videos = VideoImage::where('type', 'video')->get();
        return view('backpack::videos.video',compact('videos'))->with($this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $video = VideoImage::find($id);
        return response()->json($video);
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
        $this->validate($request ,[
            'url'  => 'required|url'
        ]);

        $video = VideoImage::find($id);

        $video->url = $request->url;
        $message = 'There was an error';
        if($video->save()){
            $message = 'Successfully updated!';
        }

        return redirect('admin/video')->with(['message' => $message]);

    }

}
