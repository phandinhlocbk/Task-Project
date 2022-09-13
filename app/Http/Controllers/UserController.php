<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    //

    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }//end method

    public function Profile()
    {
        $id = Auth::user()->id;
        $userData = User::find($id);
        return view('user.user_profile_view', compact('userData'));
    }//end method

    public function EditProfile()
    {
        $id = Auth::user()->id;
        $editData = User::find($id);

        ///
        // $comments = User::find($id)->tasks()->where('task_name', 'test123')
        // ->first();
        //$comments = User::find($id)->tasks;
        $users = DB::table('users')->where('id', 1)->first();
        ;
        // dd($users);
        ///
        return view('user.user_profile_edit', compact('editData'));
    }//end method

    public function StoreProfile(Request $request)
    {
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;


        if ($request->file('profile_image')) {
            $file = $request->file('profile_image');

            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/user_images'), $filename);
            $data['profile_image'] = $filename;
        }
        $data->save();

        $notification = array(
            'message' => 'Profile Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('user.profile')->with($notification);
    } //end method

    public function ChangePassword()
    {
        return view('user.user_change_password');
    } //end method

    public function UpdatePassword(Request $request)
    {
        $validateData = $request->validate([
            'oldpassword' => 'required',
            'newpassword' => 'required',
            'confirm_password' => 'required|same:newpassword',

        ]);

        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->oldpassword, $hashedPassword)) {
            $users = User::find(Auth::id());
            $users->password = bcrypt($request->newpassword);
            $users->save();

            session()->flash('message', 'Password Updated Successfully');
            return redirect()->back();
        } else {
            session()->flash('message', 'Old password is not match');
            return redirect()->back();
        }
    } // end method
}
