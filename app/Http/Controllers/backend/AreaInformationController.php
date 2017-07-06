<?php

namespace App\Http\Controllers\backend;

use App\AreaInformation;
use App\Http\Controllers\Helpers\Language;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use function json_decode;
use function response;

class AreaInformationController extends Controller
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
        $this->data['title'] = 'Area-Info';

        Language::checkLang($request->lang);
        $lang = Language::getTitleLang();

        $masterImageController = new MasterImageController();//create object
        $this->data['masterImages'] = $masterImageController->showAll();
        $this->data['areaInfos'] = AreaInformation::where('lang', $lang)->orderBy('id', 'desc')->get();
        return view('vendor.backpack.base.areas.area-information', $this->data);
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
//        $areaInformation  = AreaInformation::create($request->all());
//        return response()->json($areaInformation);
        $listLang = config('app.locales');
        $id_table = AreaInformation::max('id_table')+1;

        foreach ($listLang as $key => $value){
            $areaInfo = new AreaInformation();

            $areaInfo->id_table = $id_table;
            $areaInfo->information = $request->information;
            $areaInfo->image = $request->image;
            $areaInfo->status = $request->status;
            $areaInfo->lang = $key;
            $areaInfo->save();

            $areaInfoResponse[] = $areaInfo;

        }
        return response()->json($areaInfoResponse);
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
        $areaInfo = AreaInformation::find($id);
        return response()->json($areaInfo);
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
        $areaInfo = AreaInformation::find($id);

        $areaInfo->information = $request->information;

        if($request->image != null){
            $areaInfo->image = $request->image;
            DB::table('area_informations')->where('id' ,'=', $id+1)->update(['image' => $request->image]);
        }
        $areaInfo->status = $request->status;

        $areaInfo->save();

        return response()->json($areaInfo);

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
