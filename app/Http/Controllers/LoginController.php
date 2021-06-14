<?php

    namespace App\Http\Controllers;

    use Illuminate\Routing\Controller;
    use App\Models\User;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Hash;
    use Illuminate\Support\Facades\Session;
    
    class LoginController extends Controller{
        public function login() {
            if(session('id_session') != null) {
                return redirect('home');
            }
            else {
                return view('login')
                ->with('csrf_token', csrf_token());
            }
        }

        public function checkLogin() {
            $user = User::where('username', request('username'))->first();
            if(Hash::check(request('password'), $user->password)){
                if($user !== null) {
                    Session::put('id_session', $user->id_session);
                    Session::put("username",$user->username);
                    return redirect('home');
                }
            }
            else {
                return redirect('login')->withErrors('Password errata')->withInput();
            }
        }
        public function logout() {
            Session::flush();
            return redirect('login');
        }
    }
?>