<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Video;
use App\VideoCategory;
use App\Tag;
use App\VideoTag;
use Carbon\Carbon;
use Session;
use Toastr;
use Image;
use File;
use Auth;
use DB;

class VideoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Page Data
        $this->title = 'Video';
        $this->url = 'video';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $rows = Video::orderBy('id', 'desc')->get();

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
        $categories = VideoCategory::where('status', '1')->orderBy('title', 'asc')->get();
        $tags = Tag::where('status', '1')->orderBy('title', 'asc')->get();

        $title = $this->title;
        $url = $this->url;

        return view('admin.'.$url.'.create', compact('categories', 'tags', 'title', 'url'));
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
            'category' => 'required',
            'details' => 'required',
            'image' => 'required|image',
            'file' => 'nullable|file',
            'video_id' => 'required|max:1000',
            'duration' => 'required|max:10',
            'tags' => 'required',
        ]);


        // image upload, fit and store inside public folder 
        if($request->hasFile('image')){
            //Upload New Image
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME); 
            $extension = $request->file('image')->getClientOriginalExtension();
            $thumbNameToStore = $filename.'_'.time().'.'.$extension;

            //Crete Folder Location
            $path = public_path('uploads/'.$this->url.'/thumb/');
            if (! File::exists($path)) {
                File::makeDirectory($path, 0777, true, true);
            }

            //Resize And Crop as Fit image here (250 width, 140 height)
            $thumbnailpath = $path.$thumbNameToStore;
            $img = Image::make($request->file('image')->getRealPath())->fit(250, 140, function ($constraint) { $constraint->upsize(); })->save($thumbnailpath);
        }
        else{
            $thumbNameToStore = NULL;
        }



        // file upload, fit and store inside public folder 
        if($request->hasFile('file')){
            //Upload New Image
            $filenameWithExt = $request->file('file')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME); 
            $extension = $request->file('file')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            //Crete Folder Location
            $path = public_path('uploads/'.$this->url.'/');
            if (! File::exists($path)) {
                File::makeDirectory($path, 0777, true, true);
            }

            // Move File inside public/uploads/ folder
            $file = $request->file('file')->move($path, $fileNameToStore);
        }
        else{
            $fileNameToStore = NULL;
        }

        
        if(empty($request->featured)){ $request->featured = 0; }
        if(empty($request->quality)){ $request->quality = 0; }


        // Insert Data
        $data = new Video;
        $data->title = $request->title;
        $data->category_id = $request->category;
        $data->description = $request->details;
        $data->image_path = $thumbNameToStore;
        $data->video_type = $request->video_type;
        $data->video_path = $fileNameToStore;
        $data->video_id = $request->video_id;
        $data->duration = $request->duration;
        $data->featured = $request->featured;
        $data->quality = $request->quality;
        $data->status = 1;
        $data->created_by = Auth::user()->id;
        $data->save();


        // Insert Tags
        $data->tags()->attach($request->tags);


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
        $row = Video::find($id);
        $video_tags = VideoTag::where('video_id', $id)->get();

        $title = $this->title;
        $url = $this->url;

        return view('admin.'.$url.'.show', compact('row', 'video_tags', 'title', 'url'));
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
        $row = Video::find($id);
        $video_tags = VideoTag::where('video_id', $id)->get();
        $categories = VideoCategory::where('status', '1')->orderBy('title', 'asc')->get();
        $tags = Tag::where('status', '1')->orderBy('title', 'asc')->get();

        $title = $this->title;
        $url = $this->url;

        return view('admin.'.$url.'.edit', compact('row', 'video_tags', 'categories', 'tags', 'title', 'url'));
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
            'category' => 'required',
            'details' => 'required',
            'image' => 'nullable|image',
            'file' => 'nullable|file',
            'video_id' => 'required|max:1000',
            'duration' => 'required|max:10',
            'tags' => 'required',
        ]);


        // image upload, fit and store inside public folder 
        if($request->hasFile('image')){

            //Delete Old Image
            $old_file = Video::find($id);

            $file_path = public_path('uploads/'.$this->url.'/thumb/'.$old_file->image_path);
            if(File::isFile($file_path)){
                File::delete($file_path);
            }

            //Upload New Image
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME); 
            $extension = $request->file('image')->getClientOriginalExtension();
            $thumbNameToStore = $filename.'_'.time().'.'.$extension;

            //Crete Folder Location
            $path = public_path('uploads/'.$this->url.'/thumb/');
            if (! File::exists($path)) {
                File::makeDirectory($path, 0777, true, true);
            }

            //Resize And Crop as Fit image here (250 width, 140 height)
            $thumbnailpath = $path.$thumbNameToStore;
            $img = Image::make($request->file('image')->getRealPath())->fit(250, 140, function ($constraint) { $constraint->upsize(); })->save($thumbnailpath);
        }
        else{

            $old_file = Video::find($id);

            $thumbNameToStore = $old_file->image_path; 
        }



        // file upload, fit and store inside public folder 
        if($request->hasFile('file')){

            //Delete Old Image
            $old_file = Video::find($id);

            $file_path = public_path('uploads/'.$this->url.'/'.$old_file->video_path);
            if(File::isFile($file_path)){
                File::delete($file_path);
            }

            //Upload New Image
            $filenameWithExt = $request->file('file')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME); 
            $extension = $request->file('file')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            //Crete Folder Location
            $path = public_path('uploads/'.$this->url.'/');
            if (! File::exists($path)) {
                File::makeDirectory($path, 0777, true, true);
            }

            // Move File inside public/uploads/ folder
            $file = $request->file('file')->move($path, $fileNameToStore);
        }
        else{

            $old_file = Video::find($id);

            $fileNameToStore = $old_file->video_path; 
        }


        if(empty($request->featured)){ $request->featured = 0; }
        if(empty($request->quality)){ $request->quality = 0; }


        // Update Data
        $data = Video::find($id);
        $data->title = $request->title;
        $data->category_id = $request->category;
        $data->description = $request->details;
        $data->image_path = $thumbNameToStore;
        $data->video_type = $request->video_type;
        $data->video_path = $fileNameToStore;
        $data->video_id = $request->video_id;
        $data->duration = $request->duration;
        $data->featured = $request->featured;
        $data->quality = $request->quality;
        $data->status = $request->status;
        $data->updated_by = Auth::user()->id;
        $data->save();

        // Update Tags
        $data->tags()->sync($request->tags);


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
        $data = Video::find($id);

        $image_path = public_path('uploads/'.$this->url.'/thumb/'.$data->image_path);
        if(File::isFile($image_path)){
            File::delete($image_path);
        }

        $file_path = public_path('uploads/'.$this->url.'/'.$data->video_path);
        if(File::isFile($file_path)){
            File::delete($file_path);
        }

        $data->delete();

        Toastr::success($this->title.' Deleted Successfully!', 'success');

        return redirect()->back();
    }
}
