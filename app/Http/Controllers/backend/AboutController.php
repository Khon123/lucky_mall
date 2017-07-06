<?php

namespace App\Http\Controllers\backend;

use App\About;
use App\Http\Controllers\Helpers\Language;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Lang;
use function response;

class AboutController extends Controller
{
    protected $data = [];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(Request $request)
    {
        $this->data['title'] = "About";
        Language::checkLang($request->lang);
        $lang = Language::getTitleLang();

        $masterImageController = new MasterImageController();//create object
        $this->data['masterImages'] = $masterImageController->showAll();
        $this->data['abouts'] = About::where('lang', $lang)->get();

        return view ('backpack::abouts.about', $this->data);
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
        //
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
        $about = About::find($id);
        return response()->json($about);
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
        $about = About::find($id);

        if($request->description ){
            $about->description = $request->description;
            $about->updated_at = Carbon::now();
            $about->save();
        }
        if($request->image!=null){
            $about->image = $request->image;
            $about->updated_at = Carbon::now();
            $about->save();

            DB::table('abouts')->where('id' ,'=', $id+1)->update(['image' => $request->image]);
        }
        return response()->json($about);
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
