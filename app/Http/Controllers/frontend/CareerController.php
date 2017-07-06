<?php

namespace App\Http\Controllers\frontend;

use App\Career;
use App\CareerContent;
use App\Http\Controllers\Helpers\Language;
use App\Menu;
use App\Slider;
use App\VideoImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CareerController extends Controller
{
    protected $data = [];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->data['title'] = 'Career';

        Language::checkLang($request->lang);
        $lang = Language::getTitleLang();

        $this->data['menuHead'] = Menu::where('lang', $lang)->whereIn('alias', ['home', 'about-us', 'contact-us'])->get();
        $this->data['menuContents'] = Menu::where('lang', $lang)
            ->whereIn('alias', ['home', 'store-directory', 'event-promotion', 'common-area-information', 'career'])->get();

        $this->data['sliders'] = Slider::select('image')->take(3)->get();

        $this->data['videos'] = VideoImage::whereIn('id', [1,2])->get();
        $this->data['images'] = VideoImage::whereIn('id', [3,4,5])->get();

        $this->data['careerContents'] = CareerContent::where('lang', $lang)->get();

        $this->data['careers'] = Career::where([['lang', $lang], ['status', 'Enabled']])
            ->orderBy('created_at', 'desc')->get();

        return view('frontend.pages.career', $this->data);

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
