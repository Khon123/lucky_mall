<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Helpers\Language;
use App\Menu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use function response;

class MenuController extends Controller
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
    public function index(Request $request)
    {
        $this->data['title'] = 'Menu';

        Language::checkLang($request->lang);
        $lang = Language::getTitleLang();

        $this->data['menus'] = Menu::where('lang', $lang)->get();
        return view ('backpack::menus.menu', $this-> data);
    }

//    public function getToSubMenu(){
//        $menus = Menu::find([3,5]);
//        return response()->json($menus);
//    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $menus = Menu::find($id);
        return response()->json($menus);
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
            'name' =>  'required|min:3'
        ]);

        $menu = Menu::find($id);
        $menu->name = $request->name;
        $menu->save();

        return response()->json($menu);
    }
}
