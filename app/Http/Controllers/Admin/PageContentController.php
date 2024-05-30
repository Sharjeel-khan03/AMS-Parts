<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PageContent as RequestsPageContent;
use App\Http\Requests\EditPageContent as RequestsEditPageContent;
use App\Models\BackendModels\Offer;
use App\Models\BackendModels\PageContent;
use App\Models\BackendModels\Page;
use App\Models\BackendModels\PrivacyPolicy;
use App\Models\BackendModels\TermsCondition;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class PageContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cms = PageContent::get();
        $privacy = PrivacyPolicy::get();
        $terms = TermsCondition::get();
        $offers = Offer::get();
        return view('admin.pagecontent.index', get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pages  = Page::where('status', 1)->get();
        return view('admin.pagecontent.create', compact('pages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestsPageContent $request)
    {
        $cms = $request->validated();
        $cms = new PageContent();
        $cms->page_id = $request->page_id;
        $cms->section_name = $request->section_name;
        $cms->title = $request->title;
        $cms->slug = Str::slug($request->title, "-");
        $cms->description = $request->description;
        if ($request->image) {
            $filename = time() . '.' . $request->image->extension();
            $request->image->move(public_path('content'), $filename);
            $cms->image = $filename;
        }
        $cms->save();
        $notification = array('message' => 'Page Content  Added Successfully! ', 'alert-type' => 'success');
        return redirect()->route('page-content.index')->with($notification);
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
        $pages  = Page::where('status', 1)->get();
        $cms = PageContent::find($id);
        
        return view('admin.pagecontent.edit', compact('cms', 'pages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RequestsEditPageContent $request, $id)
    {
        // return $request->all();
        $cms = $request->validated();
        $cms = PageContent::find($id);
        if ($request->hasFile('image')) {
            File::delete(public_path('content/' . $cms->image));
        }
        $cms->page_id = $request->page_id;
        $cms->section_name = $request->section_name;
        $cms->title = $request->title;
        $cms->title2 = $request->title2;
        $cms->video_link = $request->video_link;
        $cms->bottom_content = $request->bottom_content;
        $cms->slug = Str::slug($request->title, "-");
        $cms->description = $request->description;

        if ($id == 2) {
            if (empty($request->hasfile('image'))) {
                $cms->image = $request->old_banner;
            } else {
                $images = [];
                if ($request->hasfile('image')) {
                    foreach ($request->file('image') as $file) {
                        $name = time() . rand(1, 100) . '.' . $file->extension();
                        $file->move(public_path('content'), $name);
                        $images[] = $name;
                    }
                }

                if(count($images) > 0){
                    for ($i=count($images); $i < 4; $i++) { 
                        array_push($images, "");
                    }
                }

                $cms->image = json_encode($images);
                // $cms->save();
            }
        } else {
            if ($request->image) {
                $filename = time() . '.' . $request->image->extension();
                $request->image->move(public_path('content'), $filename);
                $cms->image = $filename;
            }
            if ($request->image2) {
                $filename = time() . '.' . $request->image2->extension();
                $request->image2->move(public_path('content'), $filename);
                $cms->image2 = $filename;
            }
        }

        $cms->save();

        $notification = array('message' => 'Page Content  Updated Successfully! ', 'alert-type' => 'success');
        return redirect()->route('page-content.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $id = $request->id;
        PageContent::where('id', $id)->delete();
        return response()->json(['status' => '200']);
    }
}
