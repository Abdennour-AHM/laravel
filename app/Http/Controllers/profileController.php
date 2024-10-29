<?php

namespace App\Http\Controllers;

use \App\Models\Profile;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\profileRequest;
use Illuminate\Support\Facades\Cache;

class profileController extends Controller
{
    public function __construct() {
        $this->middleware('auth')->only(['show']);
    }
    public function index(){
        $profiles=Profile::paginate(12);
        return view('profile.index',compact('profiles'));
    }

    public function show(string $id){
        $profile = Cache::remember('profile_'.$id, 20,function() use ($id){
            return Profile::findOrFail($id);
        });

        return view('profile.show',compact('profile'));
    }

    public function create(){
        return view('profile.create');
    }

    public function store(profileRequest $req){
        //$name=$req->name;
        //$email=$req->email;
        //$password=Hash::make($req->password);
        //$password=$req->password;
        //$bio=$req->bio;

        // Validation
        $formFields=$req->validated();

        $formFields['password']=Hash::make($req->password);

        $this->uploadImage($req,$formFields);

        Profile::create($formFields);
        // Profile::create([
        //     'name'=>$name,
        //     'email'=>$email,
        //     'password'=>$password,
        //     'bio'=>$bio,
        // ]);

        return redirect()->route('profiles.index')->with('success','your profile added successfully');
    }

    public function destroy(Profile $profile){
        $profile->delete();
        return redirect()->route('profiles.index')->with('success','your profile deleted successfully');
    }

    public function edit(Profile $profile){
        return view('profile.edit',compact('profile'));
    }

    public function update(profileRequest $req, Profile $profile){
        $formFields=$req->validated();
        $formFields['password']=Hash::make($req->password);
        $this->uploadImage($req,$formFields);
        $profile->fill($formFields)->save();

        return to_route('profiles.show',$profile->id)->with('success','your profile updated successfully');
    }

    private function uploadImage(profileRequest $req, array &$formFields){
        unset($formFields['image']);
        if($req->hasFile('image')){
            $formFields['image']= $req->file('image')->store('profile','public');
        }
    }
}
