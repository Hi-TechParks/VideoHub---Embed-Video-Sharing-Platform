<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Ad;
use Carbon\Carbon;
use Session;
use Toastr;
use Auth;

class AdController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Page Data
        $this->title = 'Ads Script Setup';
        $this->url = 'ad';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $rows = Ad::all();

        $title = $this->title;
        $url = $this->url;

        return view('admin.'.$url.'.index', compact('rows', 'title', 'url'));
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
        // Field Validation
        $request->validate([
            'header' => 'nullable',
            'sidebar1' => 'nullable',
            'sidebar2' => 'nullable',
            'footer' => 'nullable',
            'onclick' => 'nullable',
            'popup' => 'nullable',
        ]);

        $id = $request->id;


        // -1 means no data row found
        if($id == -1){
            // Insert Data
            $data = new Ad;
            $data->header = $request->header;
            $data->sidebar1 = $request->sidebar1;
            $data->sidebar2 = $request->sidebar2;
            $data->footer = $request->footer;
            $data->onclick = $request->onclick;
            $data->popup = $request->popup;
            $data->status = 1;
            $data->created_by = Auth::user()->id;
            $data->save();
        }
        else{
            // Update Data
            $data = Ad::find($id);
            $data->header = $request->header;
            $data->sidebar1 = $request->sidebar1;
            $data->sidebar2 = $request->sidebar2;
            $data->footer = $request->footer;
            $data->onclick = $request->onclick;
            $data->popup = $request->popup;
            $data->status = 1;
            $data->updated_by = Auth::user()->id;
            $data->save();
        }


        Toastr::success('Ad Script Updated Successfully!', 'success');


        return redirect()->back();
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
