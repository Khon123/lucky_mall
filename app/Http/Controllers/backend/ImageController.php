<?php

namespace App\Http\Controllers\backend;

use App\MasterImage;
use App\VideoImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Image;
use function response;

class ImageController extends Controller
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
        $this->data['title'] = 'Image';

        $this->data['images'] = VideoImage::where('type', 'image')->orderBy('id', 'desc')->get();
        $this->data['masterImages'] = MasterImage::select('id','name')->orderBy('id', 'desc')->get();

        return view('backpack::images.image', $this->data);
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
        $masterImage = new MasterImageController();
        $masterImage->storeImage($request);

        return response()->json($masterImage);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function imageUpload(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $image = $request->file('file');
        $fileName = time() . $image->getClientOriginalName();
        $image->move(public_path('images/') , $fileName );

        $videoImage = new VideoImage();

        $videoImage->url = $fileName;
        $videoImage->type = "image";
        $videoImage->save();

        $masterImage = new MasterImage();

        $masterImage->name = $fileName;
        $masterImage->size = $image->getClientSize();
        $masterImage->extension = $image->getClientOriginalExtension();
        $masterImage->save();

        return response()->json($videoImage);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getImageUpload()
    {
        $videoImage = VideoImage::orderBy('created_at', 'desc')->first();
        return response()->json($videoImage);
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
    public function get($id)
    {
//        $masterImage = MasterImage::find($id);
//        return response()->json($masterImage);
        $masterImageCtrl = new MasterImageController();
        $getImage = $masterImageCtrl->getWithID($id);
        return response()->json($getImage);
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
        $this->validate($request, [
           'imageUse' =>  'required'
        ]);
        $videoImage = VideoImage::find($id);

        $videoImage->url = $request-> imageUse;

        $videoImage->save();

        return response()->json($videoImage);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }

    public function getLastMasterImage(){
        $materImageCtrl = new MasterImageController();
        $masterImage = $materImageCtrl->getLastRow();
        return response()->json($masterImage);
    }
}
