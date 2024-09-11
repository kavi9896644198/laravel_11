<?php 
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Str;
use Hash;
use Auth;
use App\Mail\ForgotPasswordMail;
Use Mail;
Use App\Http\Requests\ResetPassword;
class AuthController extends Controller
{
	public function registeration(){
		$data['meta_title'] = 'Register Page';
		return view('auth.registeration',$data);
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
		
		$data['meta_title'] = 'Login Page';
		return view('auth.login',$data);
	}

	public function login_post(Request $request){
		// dd($request->all());

		if(Auth::attempt(['email'=>$request->email,'password'=>$request->password],true)){
			if(Auth::user()->is_role == 2){
				// echo 'Super Admin';die;
				return redirect()->intended('superadmin/dashboard');
			}
			else if(Auth::user()->is_role == 1)
			{
				return redirect()->intended('admin/dashboard');
			}
			else if(Auth::user()->is_role == 0)
			{
				return redirect()->intended('user/dashboard');
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
		$data['meta_title'] = 'Forget Password Page';
		return view('auth.forgot',$data);
	}

	public function logout(){
		Auth::logout();
		return redirect(url('login'));
	}

	public function forgot_post(Request $request){
		$user = User::where('email','=',$request->email)->count();
		if($user > 0){
			$user = User::where('email','=',$request->email)->first();
			$user->remember_token = Str::random(50);
			$user->save();
			Mail::to($user->email)->send(new ForgotPasswordMail($user));
			return redirect()->back()->with('success','Password has beed reset!');
		}else{
			return redirect()->back()->with('error','Email Not Found In this System');
		}
	}
	public function getReset(Request $request, $token){
		$user = User::where('remember_token','=',$token);
		if($user->count() == 0){
			abort(403);
		}
		$user = $user->first();
		$data['token'] = $token;
		return view('auth.reset',$data);
	}

	public function passReset($token,ResetPassword $request)
	{
		$user = User::where('remember_token','=',$token);
		if($user->count() == 0){
			abort(403);
		}
		$user = $user->first();
		$user->password = Hash::make($request->password);
		$user->remember_token = Str::random(50);
		$user->save();
		return redirect('login')->with('success','Password Successfully Reset');
	}
}

?>