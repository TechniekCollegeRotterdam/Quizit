<?php


namespace App\Http\Controllers;


use App\Category;
use App\Design;
use App\Http\Requests\DesignStoreRequest;
use App\Http\Requests\DesignUpdateRequest;
use Illuminate\Http\Request;
use Throwable;


class DesignController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $designs = Design::all();
        return view('admin.designs.index',compact('designs'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.designs.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DesignStoreRequest $request)
    {
        $design = new Design();
        $design->name = $request->name;
        $design->link = $request->link;
        $design->save();
        return redirect()->route('designs.index')->with('message', 'Design toegevoegd');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Design  $design
     * @return \Illuminate\Http\Response
     */
    public function show(Design $design)
    {
        return view('admin.designs.show',compact('design'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Design  $design
     * @return \Illuminate\Http\Response
     */
    public function edit(Design $design)
    {
        return view('admin.designs.edit',compact('design'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Design  $design
     * @return \Illuminate\Http\Response
     */
    public function update(DesignUpdateRequest $request, Design $design)
    {
        $design->name = $request->name;
        $design->link = $request->link;
        $design->save();


        return redirect()->route('designs.index')->with('message','Design geupdate');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Design  $design
     * @return \Illuminate\Http\Response
     */


    public function delete(Design $design)
    {
        return view('admin.designs.delete',compact('design'));
    }


    public function destroy(Design $design)
    {
        try {
            $design->delete();
        }catch (Throwable $e){
            report($e);
            return redirect()->route('designs.index')->with('wrong', 'Design kon niet worden verwijderd omdat er nog gebruikers van zijn.');
        }
        return redirect()->route('designs.index')->with('message', 'Design verwijderd');
    }
}
