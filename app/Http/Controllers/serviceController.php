<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\service;
use App\Http\Requests\serviceStoreRequest;
use App\Http\Requests\serviceUpdateRequest;

class serviceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $allservices = service::get();
        return view('services.index',compact('allservices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('services.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(serviceStoreRequest $request)
    {    
        $path = $request->image->store('public/service');
        service::create([
           'name'=>$request->name,
           'description'=>$request->description,
           'price'=>$request->price,
           'image'=>$path
        ]);
        return redirect()->route('service.index')->with('message','stored sucessfully!');
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
        $service_edit = service::find($id);
        return view('services.edit',compact('service_edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(serviceUpdateRequest $request, $id)
    {
        $service_update = service::find($id);
   if($request->has('image')){
    $path = $request->image->store('public/service');
   }
   else{
          $path= $service_update->image;
   }

        $service_update->fill($request->input());
        $service_update->name = $request->name;
        $service_update->description =$request->description;
        $service_update->price = $request->price;
        $service_update->image = $path;
        $service_update->save();
        return redirect()->route('service.index')->with('message','Updated Sucessfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        service::find($id)->delete();
        return redirect()->route('service.index')->with('message','Deleted Sucessfully');
    }
}
