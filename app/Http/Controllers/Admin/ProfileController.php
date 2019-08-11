<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Profile;
class ProfileController extends Controller
{
    public function add(){
        return view('admin.profile.create');
    }
    
    public function create(Request $request){
        $this->validate($request,Profile::$rules);
        $profile=new Profile;
        $form=$request->all();
        unset($form['__token']);
        $profile->fill($form)->save();
        return redirect('admin/profile/create');
    }
    public function edit(Request $request){
          // News Modelからデータを取得する
          $profile = Profile::find($request->id);
          if (empty($profile)) {
            abort(404);    
          }
          return view('admin.profile.edit', ['profile_form' => $profile]);
          
     }
    public function update(Request $request){
        $profile=Profile::find($request->id);
        $profile_form=$request->all();
        unset($profile_form['__token']);
        $profile->fill($profile_form)->save();
        return redirect('admin/profile/edit?id='.$request->id);
        //return redirect('admin/profile/edit');
    }
   
    
    
}
