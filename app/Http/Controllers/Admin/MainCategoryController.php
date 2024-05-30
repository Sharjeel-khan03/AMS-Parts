<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\MainCategory as RequestsMainCategory;
use App\Http\Requests\EditMainCategory as RequestsEditMainCategory;
use App\Models\BackendModels\MainCategory;
use App\Models\BackendModels\ParentCategory;
use Illuminate\Support\Str;

class MainCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $main_categories = MainCategory::get();
        return view('admin.maincategory.index',compact('main_categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parent_categories = ParentCategory::where('status',1)->get();
        return view('admin.maincategory.create',compact('parent_categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $main_category = $request->validated();
        $main_category = new MainCategory();
        // $main_category->parent_category_id = $request->parent_category_id;
        $main_category->main_category_name = $request->main_category_name;
        $main_category->slug = Str::slug($request->main_category_name,"-");
        $main_category->status = 1;
        $main_category->save();
        $notification = array('message' => 'Main Category Created Successfully! ', 'alert-type' => 'success');
        return redirect()->route('main-category.index')->with($notification);
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
        $main_category = MainCategory::find($id);
        $parent_categories = ParentCategory::where('status',1)->get();
        return view('admin.maincategory.edit',compact('parent_categories','main_category'));
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
        // $main_category = $request->validated();
        $main_category = MainCategory::find($id);
        // $main_category->parent_category_id = $request->parent_category_id;
        $main_category->main_category_name = $request->main_category_name;
        $main_category->slug = Str::slug($request->main_category_name,"-");
        $main_category->status = 1;
        $main_category->save();
        $notification = array('message' => 'Main Category Updated Successfully! ', 'alert-type' => 'success');
        return redirect()->route('main-category.index')->with($notification);
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
        MainCategory::where('id', $id)->delete();
        return response()->json(['status'=>'200']);
    }
    public function status(Request $request,$id){
        $user_status = MainCategory::find($id);
        if($user_status->status == 0){
            $user_status->status =1;
        }else {
            $user_status->status =0;
        }
        $user_status->save();
        $notification = array('message' => 'Main Category Status Updated Successfully! ', 'alert-type' => 'success');
        return redirect()->route('main-category.index')->with($notification);
    }
}
