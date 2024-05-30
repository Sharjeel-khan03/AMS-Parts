<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Configuration as RequestsConfiguration;
use App\Http\Requests\EditConfiguration as RequestsEditConfiguration;
use App\Models\BackendModels\Configuration;
use Illuminate\Http\Request;

class ConfigurationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $configurations = Configuration::get();
        return view('admin.configuration.index',compact('configurations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.configuration.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestsConfiguration $request)
    {

        $validated = $request->validated();
        Configuration::create($validated);
        $notification = array('message' => 'Configuration Created Successfully! ', 'alert-type' => 'success');
        return redirect()->route('configuration.index')->with($notification);
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
        
        $copyright = Configuration::find($id);
        return view('admin.configuration.edit',compact('copyright'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RequestsEditConfiguration $request, $id)
    {
        // return $request->all();
        $validated = $request->validated();
        $packages = Configuration::find($id);
        $data = $request->all();
        if($request->financing_image){
            $filename = time() . '.' . $request->financing_image->extension();
            $request->financing_image->move(public_path('configuration'), $filename);
            $data['financing_image'] = $filename;
        }
        $packages->update($data);
        // return $packages;
        $notification = array('message' => 'Configurations Updated Successfully! ', 'alert-type' => 'success');
        return redirect()->route('configuration.index')->with($notification);
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
        Configuration::where('id', $id)->delete();
        return response()->json(['status'=>'200']);
    }


    
}
