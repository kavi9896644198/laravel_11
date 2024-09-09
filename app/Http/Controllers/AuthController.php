<?php 

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Str;
use Hash;
use Auth;
class AuthController extends Controller
{
	public function registeration(){
		return view('auth.registeration');
	}

	public function registeration_post(Request $request){
		// dd($request->all());
		$user = $request->validate([
			'username'=>'required',
			'email'=>'required|unique:users',
			'password'=>'required|min:6',
			'repassword'=>'required_with:password|same:password|min:6',
			'is_role'=>'required'
		]);

		$user = new User();
		$user->name = trim($request->username);
		$user->email = trim($request->email);
		$user->password = Hash::make(trim($request->password));
		$user->is_role = trim($request->is_role);
		$user->remember_token = Str::random(50);
		$user->save();

		return redirect('login')->with('success','Register Successfully!');
	}

	public function login(){
		return view('auth.login');
	}

	public function login_post(Request $request){
		// dd($request->all());

		if(Auth::attempt(['email'=>$request->email,'password'=>$request->password],true)){
			if(Auth::user()->is_role == 2){
				echo 'Super Admin';die;
				// return redirect()->intended('superadmin/dashboard');
			}
			else if(Auth::user()->is_role == 1)
			{
				echo ' Admin';die;
				// return redirect()->intended('admin/dashboard');
			}
			else if(Auth::user()->is_role == 0)
			{
				echo 'User';die;
				// return redirect()->intended('user/dashboard');
			}
			else
			{
				return redirect('login')->with('error','No Abailables email.Please Check this email');
			}
		}
		else
		{
			return redirect()->back()->with('error','Please enter the correct curdencial');
		}
	}

	public function forgot(){
		return view('auth.forgot');
	}
}

?>