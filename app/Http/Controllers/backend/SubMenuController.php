<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Helpers\Language;
use App\Menu;
use App\SubMenu;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Lang;
use function response;

class SubMenuController extends Controller
{
    protected $data = [];

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
        $this->data['title'] = "SubMenu";

        Language::checkLang($request->lang);
        $lang = Language::getTitleLang();

        $this->data['menus'] = Menu::find([3,5]);
        $this->data['subMenus'] = SubMenu::where('lang', $lang)->orderBy('id', 'desc')->get();

        return view('vendor.backpack.base.sub-menus.sub-menu',$this->data);
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

        $listLang = config('app.locales');
        $id_table = SubMenu::max('id_table')+1;
        $alias    = str_slug($request->name , "-");

        foreach ($listLang as $key => $value){
            $subMenu = new SubMenu();

            $subMenu->menu_id  = $request->menu_id;
            if($key == 'kh'){
                $subMenu->menu_id  = $request->menu_id+1;
            }
            $subMenu->id_table = $id_table;
            $subMenu->name     = $request->name;
            $subMenu->alias    = $alias;
            if($request->status != null){
                $subMenu->status   = $request->status;
            }
            $subMenu->lang     = $key;

            $subMenu->save();
            $subMenuResponses[] = $subMenu;
        }
        return response()->json($subMenuResponses);
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
        $subMenu = SubMenu::find($id);
        return response()->json($subMenu);
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
        $subMenu = SubMenu::find($id);
        if($request->menu_id !=null){
            $subMenu->menu_id = $request->menu_id;
            DB::table('sub_menus')->where('id' ,'=', $id+1)->update(['menu_id' => $request->menu_id + 1]);
        }
        $subMenu->name = $request->name;
        $subMenu->status = $request->status;
        $subMenu->updated_at = Carbon::now();

        $subMenu->save();

        return response()->json($subMenu);
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


    public function getSubMenu($id){
        $subMenu = SubMenu::where('menu_id', $id)->get();
        return response()->json($subMenu);
    }
}
