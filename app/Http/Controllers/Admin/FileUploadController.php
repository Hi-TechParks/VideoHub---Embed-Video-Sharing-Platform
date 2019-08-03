<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\FileUpload;
use Carbon\Carbon;
use Session;
use Toastr;
use File;
use Auth;

class FileUploadController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Page Data
        $this->title = 'Ad Assets';
        $this->url = 'file-upload';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $rows = FileUpload::orderBy('id', 'desc')->get();

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
            'title' => 'required|max:250',
            'file' => 'required|file',
        ]);


        // file upload, fit and store inside public folder 
        if($request->hasFile('file')){
            //Upload New File
            $filenameWithExt = $request->file('file')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME); 
            $extension = $request->file('file')->getClientOriginalExtension();
            $fileNameToStore = $filename.'.'.$extension;

            //Crete Folder Location
            $path = base_path();
            if (! File::exists($path)) {
                File::makeDirectory($path, 0777, true, true);
            }

            // Move File inside public/uploads/ folder
            $file = $request->file('file')->move($path, $fileNameToStore);
        }
        else{
            $fileNameToStore = NULL;
        }


        // Insert Data
        $data = new FileUpload;
        $data->title = $request->title;
        $data->file_path = $fileNameToStore;
        $data->created_by = Auth::user()->id;
        $data->save();


        Toastr::success($this->title.' Created Successfully!', 'success');

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
        // Field Validation
        $request->validate([
            'title' => 'required|max:250',
            'file' => 'nullable|file',
        ]);


        // file upload, fit and store inside public folder 
        if($request->hasFile('file')){

            //Delete Old File
            $old_file = FileUpload::find($id);

            $file_path = base_path($old_file->file_path);
            if(File::isFile($file_path)){
                File::delete($file_path);
            }

            //Upload New File
            $filenameWithExt = $request->file('file')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME); 
            $extension = $request->file('file')->getClientOriginalExtension();
            $fileNameToStore = $filename.'.'.$extension;

            //Crete Folder Location
            $path = base_path();
            if (! File::exists($path)) {
                File::makeDirectory($path, 0777, true, true);
            }

            // Move File inside public/uploads/ folder
            $file = $request->file('file')->move($path, $fileNameToStore);
        }
        else{

            $old_file = FileUpload::find($id);

            $fileNameToStore = $old_file->file_path; 
        }


        // Update Data
        $data = FileUpload::find($id);
        $data->title = $request->title;
        $data->file_path = $fileNameToStore;
        $data->updated_by = Auth::user()->id;
        $data->save();


        Toastr::success($this->title.' Updated Successfully!', 'success');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Delete Data
        $data = FileUpload::find($id);

        $file_path = base_path($data->file_path);
        if(File::isFile($file_path)){
            File::delete($file_path);
        }

        $data->delete();

        Toastr::success($this->title.' Deleted Successfully!', 'success');

        return redirect()->back();
    }
}
