<?php

namespace App\Http\Controllers\backend;

use App\HomeContent;
use App\Http\Controllers\Helpers\Language;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use function response;

class HomeContentController extends Controller
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
        $this->data['title'] = 'Home-Content';

        Language::checkLang($request->lang);
        $lang = Language::getTitleLang();

        $this->data['homeContents'] = HomeContent::where('lang', $lang)->get();

        return view('vendor.backpack.base.homes.home-content', $this->data);
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
        $homeContent = HomeContent::find($id);
        return response()->json($homeContent);
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
        $homeContent = HomeContent::find($id);

        $homeContent->title = $request->title;
        $homeContent->caption = $request->caption;
        $homeContent->updated_at = Carbon::now();

        $homeContent->save();
        return response()->json($homeContent);
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
