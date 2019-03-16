<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
   /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function profile()
    {
        $user = \Auth::user();
        return view('profile',compact('user',$user));
    }

	public function showChangePasswordForm(){
        return view('auth.changepassword');
    	}

     public function update_profile(Request $request){
	if ($request->has('form1')) {

        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user = \Auth::user();

	if($user->avatar != 'user.jpg') {
		$image_path = public_path().'/storage/avatars/'.$user->avatar;
	    if(\File::exists($image_path)) {
	  	unlink($image_path);
		}
	}

        $avatarName = $user->id.'_avatar'.time().'.'.request()->avatar->getClientOriginalExtension();

        $request->avatar->storeAs('avatars',$avatarName);

        $user->avatar = $avatarName;
        $user->save();

        return back()
            ->with('success','You have successfully upload image.');
	
	} //avatar form1

	if ($request->has('form3')) {
	
	$request->validate([
	   'current-password' => 'required',
	   'new-password' => 'required|string|min:6|confirmed',
	]);
	$user = \Auth::user();
	$curPassword = $request->input('current-password');
	 if (\Hash::check($curPassword, $user->password)) {
	//Change Password
	$user->password = \Hash::make($request->get('new-password'));
	$user->save();
	return redirect()->back()->with("successpassword","Password changed successfully!");
	   } else {
	return redirect()->back()->with("errorpassword","The current password you entered is incorrect!");
		}
	} //password form3

	if ($request->has('form2')) {
	   
	$request->validate([
	   'first-name' => 'alpha|max:255',
	   'last-name' => 'alpha|max:255',
	]);

	$user = \Auth::user();

	$user->first_name = $request->get('first-name');
	$user->last_name = $request->get('last-name');
	
	$user->save();
	return redirect()->back()->with("successname","Name changed successfully!");

	} //personal information form2
    
    }

}
