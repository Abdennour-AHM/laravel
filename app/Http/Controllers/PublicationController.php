<?php

namespace App\Http\Controllers;

use App\Http\Requests\publicationRequest;
use App\Models\Publication;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class PublicationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }
    /** 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $publications=Publication::latest()->get();
        return view('publication.index',compact('publications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('publication.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(publicationRequest $request)
    {
        $formFields=$request->input();
        $formFields=$request->validated();
        $formFields['profile_id']=Auth::user()->id;
        $this->uploadImage($request,$formFields);
        Publication::create($formFields);

        return to_route('publications.index')->with('success','Your publication created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Publication  $publication
     * @return \Illuminate\Http\Response
     */
    public function show(Publication $publication)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Publication  $publication
     * @return \Illuminate\Http\Response
     */
    public function edit(Publication $publication)
    {
        $this->authorize('update',$publication);
        return view('publication.edit',compact('publication'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Publication  $publication
     * @return \Illuminate\Http\Response
     */
    public function update(publicationRequest $request, Publication $publication)
    {
        $this->authorize('update',$publication);
        $formFields=$request->validated();
        $this->uploadImage($request,$formFields);
        $publication->fill($formFields)->save();

        return to_route('publications.index')->with('success','Your publication updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Publication  $publication
     * @return \Illuminate\Http\Response
     */
    public function destroy(Publication $publication)
    {
        $this->authorize('delete',$publication);

        $publication->delete();
        return to_route('publications.index')->with('success','Your publication deleted successfully');
    }
    private function uploadImage(publicationRequest $req, array &$formFields){
        unset($formFields['image']);
        if($req->hasFile('image')){
            $formFields['image']= $req->file('image')->store('publication','public');
        }
    }
}
