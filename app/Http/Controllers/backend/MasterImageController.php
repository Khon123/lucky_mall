<?php

namespace App\Http\Controllers\backend;

use App\MasterImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MasterImageController extends Controller
{
    private $masterImage;
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeImage(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $image = $request->file('file');
        $fileName = time() . $image->getClientOriginalName();
        $image->move(public_path('images/') , $fileName );

        $masterImage = new MasterImage();

        $masterImage->name = $fileName;
        $masterImage->size = $image->getClientSize();
        $masterImage->extension = $image->getClientOriginalExtension();
        $masterImage->save();
    }

    /**
     * Display all the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showAll()
    {
        $this->masterImage =  MasterImage::orderBy('id','desc')->get();

        return $this->masterImage;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getWithID($id)
    {
        $this->masterImage = MasterImage::find($id);

        return $this->masterImage;

    }

    /**
     * get the last record in master image
     *
     */
    public function getLastRow(){
        $this->masterImage = MasterImage::orderBy('created_at', 'desc')->first();
        return $this->masterImage;
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
        $image = $request->file('file');
        $fileName = time() . $image->getClientOriginalName();
        $image->move(public_path('images/') , $fileName );

        $masterImage = MasterImage::find($id);

        $masterImage->name = $fileName;
        $masterImage->size = $image->getClientSize();
        $masterImage->extension = $image->getClientOriginalExtension();
        $masterImage->save();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->masterImage = MasterImage::find($id)->destroy();
        return $this->masterImage;
    }
}
