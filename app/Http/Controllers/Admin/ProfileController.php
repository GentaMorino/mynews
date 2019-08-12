<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Profile;
use App\ProfileHistory;
use Carbon\Carbon;

//トランザクション用
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

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
          //dd($profile->profile_histories->toArray());
          return view('admin.profile.edit', ['profile_form' => $profile]);
          
     }
    public function update(Request $request){
        DB::transaction(function ()use ($request) {
            $profile=Profile::find($request->id);
            $profile_history=new ProfileHistory;
            //更新履歴用初回用
            $have_prohis=ProfileHistory::where('profile_id',$profile->id)->first();
            
            if(!isset($have_prohis)){
                $profile_history->profile_id=$profile->id;
                $profile_history->edited_at=$profile->created_at;
                $profile_history->name=$profile->name;
                $profile_history->gender=$profile->gender;
                $profile_history->hoby=$profile->hoby;
                $profile_history->introduction=$profile->introduction;
                $profile_history->save();
            }
            
            $profile_form=$request->all();
            unset($profile_form['__token']);
            $profile->fill($profile_form)->save();
            
            //更新履歴用
            $profile_history->profile_id=$profile->id;
            $profile_history->edited_at=Carbon::now();
            $profile_history->name=$request->name;
            $profile_history->gender=$request->gender;
            $profile_history->hoby=$request->hoby;
            $profile_history->introduction=$request->introduction;
            $profile_history->save();
            
        });
        return redirect('admin/profile/edit?id='.$request->id);
        //return redirect('admin/profile/edit');
    }
   
    
    
}
