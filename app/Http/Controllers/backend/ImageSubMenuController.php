<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Helpers\Language;
use App\ImageSubMenu;
use App\Menu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Lang;
use function image_type_to_extension;
use function response;

class ImageSubMenuController extends Controller
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
        $this->data['title'] = 'Image-Menu';

        Language::checkLang($request->lang);
        $lang = Language::getTitleLang();

        $this->data['menus'] = Menu::find([3,5]);

        $masterImageController = new MasterImageController();//create object
        $this->data['masterImages'] = $masterImageController->showAll();

        $this->data['images'] = ImageSubMenu::where('lang', $lang)->orderBy('id', 'desc')->paginate(12);

        return view('vendor.backpack.base.image-sub-menus.image-sub-menu', $this->data);
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
        $id_table = ImageSubMenu::max('id_table')+1;

        foreach ($listLang as $key => $value){
            $imageSubMenu = new ImageSubMenu();

            $imageSubMenu->id_table = $id_table;

            $imageSubMenu->menu_id = $request->menu_id;
            $imageSubMenu->sub_menu_id = $request->sub_menu_id;
            if($key=='kh'){
                $imageSubMenu->menu_id = $request->menu_id+1;
                $imageSubMenu->sub_menu_id = $request->sub_menu_id+1;
            }
            $imageSubMenu->image = $request->image;
            $imageSubMenu->caption = $request->caption;
            $imageSubMenu->status = $request->status;
            $imageSubMenu->lang = $key;

            $imageSubMenu->save();

            $imageSubMenuResponses[] = $imageSubMenu;

        }
        return response()->json($imageSubMenuResponses);


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
        $imageSubMenu = ImageSubMenu::find($id);
        return response()->json($imageSubMenu);
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
        $imageSubMenu = ImageSubMenu::find($id);

        if($request->menu_id != null or $request->sub_menu_id != null or $request->image != null or $request->status){

            $imageSubMenu->menu_id = $request->menu_id;
            $imageSubMenu->sub_menu_id = $request->sub_menu_id;
            $imageSubMenu->image = $request->image;
            $imageSubMenu->status = $request->status;

            DB::table('image_sub_menus')->where('id' ,'=', $id+1)->update(['menu_id' => $request->menu_id + 1]);
            DB::table('image_sub_menus')->where('id' ,'=', $id+1)->update(['sub_menu_id' => $request->sub_menu_id+1]);
            DB::table('image_sub_menus')->where('id' ,'=', $id+1)->update(['image' => $request->image]);
            DB::table('image_sub_menus')->where('id' ,'=', $id+1)->update(['status' => $request->status]);
        }
        $imageSubMenu->caption = $request->caption;
        $imageSubMenu->save();

        return response()->json($imageSubMenu);


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
