<?php

namespace App\Http\Controllers\backend;

use App\Career;
use App\Http\Controllers\Helpers\Language;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Psy\Util\Json;
use function response;

class CareerController extends Controller
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
        $this->data['title'] = 'Career';

        Language::checkLang($request->lang);
        $lang = Language::getTitleLang();

        $this->data['careers'] = Career::where('lang', $lang)->orderBy('id', 'desc')->get();

        return view ('backpack::careers.career', $this->data);
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
        $id_table = Career::max('id_table')+1;

        foreach ($listLang as $key => $value){
            $career = new Career();

            $career->id_table = $id_table;
            $career->job_title = $request->job_title;
            $career->job_requirement = $request->job_requirement;
            $career->job_description = $request->job_description;
            $career->post_date = $request->post_date;
            $career->close_date = $request->close_date;
            $career->status = $request->status;
            $career->lang = $key;
            $career->save();
            $careerResponse[] = $career;

        }
        return response()->json($careerResponse);
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
        $career = Career::find($id);
        return response()->json($career);
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
        $career = Career::find($id);

        $career->job_title = $request->job_title;
        $career->job_requirement = $request->job_requirement;
        $career->job_description = $request->job_description;
        $career->post_date = $request->post_date;
        $career->close_date = $request->close_date;
        $career->status = $request->status;
        $career->save();

        return response()->json($career);
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
