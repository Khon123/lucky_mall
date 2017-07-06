<?php

namespace App\Http\Controllers\backend;

use App\MasterImage;
use App\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use function magicSplit;
use function redirect;
use function response;

class SliderController extends Controller
{
    protected $data = [];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $this->data['title'] = 'Slider';

        $this->data['images'] = Slider:: orderBy('id', 'desc')->paginate(10);

        $masterImageController = new MasterImageController();
        $this->data['masterImages'] = $masterImageController->showAll();
//        $this->data['masterImages'] = MasterImage::orderBy('id', 'desc')->get();
        return view('backpack::sliders.slider', $this->data);
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
    public function store(Request $request){
        $this->validate($request, [
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $image = $request->file('file');
        $fileName = time() . $image->getClientOriginalName();
        $image->move(public_path('images/') , $fileName );

        $slider = new Slider();

        $slider->image = $fileName;
        $slider->save();

//        $masterImage = new MasterImage();
//
//        $masterImage->name = $fileName;
//        $masterImage->size = $image->getClientSize();
//        $masterImage->extension = $image->getClientOriginalExtension();
//        $masterImage->save();
        $materImage = new MasterImageController();
        $materImage->storeImage($request);

        return response()->json($slider);
    }

    /**
     * get image that just uploaded in slider table
     *
     */
    public function getJustImageUploaded(){
        $slider = Slider::orderBy('created_at', 'desc')->first();
        return response()->json($slider);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function uploadMasterImage(Request $request)
    {
        $masterImage = new MasterImageController();
        $masterImage->storeImage($request);
        return response()->json($masterImage);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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
        $slider = Slider::find($id);
        $slider->image = $request-> imageUse;
        $slider->save();

        return response()->json($slider);
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
