<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Helpers\Language;
use App\ImageSubMenu;
use App\Menu;
use App\Slider;
use App\SubMenu;
use App\VideoImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use function response;

class EventPromotionController extends Controller
{
    protected $data =[];


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->data['title'] = 'Event-Promotion';

        Language::checkLang($request->lang);

        $lang = Language::getTitleLang();

        $this->data['menuHead'] = Menu::where('lang', $lang)
            ->whereIn('alias', ['home', 'about-us', 'contact-us'])->get();
        $this->data['menuContents'] = Menu::where('lang', $lang)
            ->whereIn('alias', ['home', 'store-directory', 'event-promotion', 'common-area-information', 'career'])->get();

        $this->data['sliders'] = Slider::select('image')->take(3)->get();

        $this->data['videos'] = VideoImage::whereIn('id', [1,2])->get();
        $this->data['images'] = VideoImage::whereIn('id', [3,4,5])->get();

        $this->data['sub_menus'] = SubMenu::where([['lang', $lang], ['status', 'Enabled']])
            ->whereIn('menu_id', [5,6])->get();

        $this->data['image_sub_menus'] = ImageSubMenu::where([['lang', $lang], ['status', 'Enabled']])
            ->whereIn('menu_id', [5,6])->get();

        return view('frontend.pages.event-promotion', $this->data);
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
