<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProfileRessource;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    private const CacheKey='profiles_api';
    /**
     * Display a listing of the resource
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profiles=Cache::remember(self::CacheKey,14400,function(){
            return ProfileRessource::collection(Profile::all());
        });

        return $profiles;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $formFields=$request->all();
        $formFields['password']=Hash::make($request->password);
        Cache::forget(self::CacheKey);
        return Profile::create($formFields);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        return new ProfileRessource($profile);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profile $profile)
    {
        $formFields=$request->all();
        $formFields['password']=Hash::make($request->password);
        $profile->fill($formFields)->save();
        Cache::forget(self::CacheKey);
        return $profile;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        $profile->delete();
        Cache::forget(self::CacheKey);
        return response()->json([
            'id'=>$profile->id,
            'message'=>'your profile deleted succussfully',
        ]);
    }
}