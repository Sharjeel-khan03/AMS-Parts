<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Banner as RequestsBanner;
use App\Http\Requests\EditBanner as RequestsEditBanner;
use App\Models\BackendModels\Banner;
use App\Models\BackendModels\Page;
use Illuminate\Support\Facades\File;
class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners  = Banner::with('get_page')->get();
        return view('admin.banners.index',compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pages  = Page::where('status',1)->get();
        return view('admin.banners.create',compact('pages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestsBanner $request)
    {
        // return $request->all();
        $banners = $request->validated();
        $banners = new Banner();
        // $banners->page_id = $request->page_id;
        $banners->page_title = $request->page_title;
        $banners->page_id = $request->page_id;
        if($request->banner_image){
            $filename = time() . '.' . $request->banner_image->extension();
            $request->banner_image->move(public_path('banner'), $filename);
            $banners->banner_image = $filename;
        }
        // $images = [];
        // if($request->hasfile('banner_image'))
        //  {
        //     foreach($request->file('banner_image') as $file)
        //     {
        //         $name = time().rand(1,100).'.'.$file->extension();
        //         $file->move(public_path('banner'), $name);
        //         $images[] = $name;
        //     }
        // }
        // $banner->banner_image = json_encode($images);

        $banners->save();
        $notification = array('message' => 'Banner Image Added Successfully! ', 'alert-type' => 'success');
        return redirect()->route('banner.index')->with($notification);
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
        $pages  = Page::where('status',1)->get();
        $banners = Banner::find($id);

        return view('admin.banners.edit',compact('banners','pages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RequestsEditBanner $request, $id)
    {
        $banners = $request->validated();
        $banners = Banner::find($id);
        if ($request->hasFile('banner_image')) {
            File::delete(public_path('banner/'. $banners->banner_image));
        }


        $banners->page_id = $request->page_id;
        $banners->page_title = $request->page_title;
        $banners->page_id = $request->page_id;
        // $banners->description = $request->description;

        
        if($request->banner_image){
            $filename = time() . '.' . $request->banner_image->extension();
            $request->banner_image->move(public_path('banner'), $filename);
            $banners->banner_image = $filename;
        }

        if($request->video){
        $filename = time() . '.' . $request->video->extension();
        $request->video->move(public_path('video'), $filename);
        $banners->video = $filename;
        }


        $banners->save();
        $notification = array('message' => 'Page Content Updated Successfully! ', 'alert-type' => 'success');
        return redirect()->route('banner.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $id = $request->id;
        $banners =  Banner::where('id', $id)->first();
            File::delete(public_path('banner/'.$request->banner_image));

        $banners->delete();
        return response()->json(['status'=>'200']);
    }

    public function status(Request $request,$id){
        $user_status = Banner::find($id);
        if($user_status->status == 0){
            $user_status->status =1;
        }else {
            $user_status->status =0;
        }
        $user_status->save();
        $notification = array('message' => 'Banner Image Status Updated Successfully! ', 'alert-type' => 'success');
        return redirect()->route('page-content.index')->with($notification);
    }
}