<?php

namespace Carbon\Carbon;
namespace App\Http\Controllers; 

use Illuminate\Routing\Controller;
use App\Models\User;
use App\Models\cliente;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use DB;

class RegisterController extends Controller {

    protected function create()
    {
        $request = request();

        if($this->countErrors($request) === 0) {
            $newUser=DB::insert('insert into dati_login (username,password,nome,cognome,CF) values (?,?,?,?,?)', 
                [$request['username'],Hash::make($request['password']),$request['nome'],$request['cognome'],$request['CF']]);
            $user=User::where('username', $request['username'])->first();
            if ($newUser) {
                Session::put('id_session',$user->id_session);
                Session::put('username',$user->username);

                return redirect('home');
            } 
            else {
                return redirect('register')->withInput();
            }
        }
        else{
            return redirect('register')->withInput();
        }
    }
    private function countErrors($data) {
        $error = array();
        
        /**
         * !COCNTROLLO USERNAME
         */
        if(!preg_match('/^[a-zA-Z0-9_]{1,15}$/', $data['username'])) {
            $error[] = "Username non valido";
        } else {
            $username = User::where('username', $data['username'])->first();
            if ($username !== null) {
                $error[] = "Username già utilizzato";
            }
        }
        /**
         * !CONTROLLO PASSWORD
         */
        $pattern = '/^(?=.*\d)(?=.*[A-Z])(?=.*[a-z])(?=.*[_.\-()?#;:!@])[0-9A-Za-z_.\-()?#;:!@]{8,20}$/';
        if(!preg_match($pattern, $data['password'])) {
           $error[]="La password non rispetta i requisiti!";
        }
        /**
         * !CONTROLLO CF
         */
        if(!preg_match('/^[a-zA-Z0-9]{7,7}$/',$data['CF'])){
            $error[] = "CF non valido";
        }else{
            $CF_u = User::where('CF', $data['CF'])->first();
            $CF_c= cliente::where('CF', $data['CF'])->first();

            if ($CF_u !== null && $CF_c !==null) {
                $error[] = "CF già utilizzato";
            }else if($CF_u === null && $CF_c ===null){

                $eta=\Carbon\Carbon::parse($data['compleanno'])->diff(\Carbon\Carbon::now())->format('%y');
        
                DB::insert('insert into cliente (CF,nome,cognome,eta,data_nascita) values (?,?,?,?,?)', 
                [$data['CF'], $data['nome'],$data['cognome'],$eta,$data['compleanno']]);
            }
        }

        return count($error);
    }

    public function checkUsername($query) {
        $exist = User::where('username', $query)->exists();
        return ['exists' => $exist];
    }
    public function checkCF($query) {
        $exist = User::where('CF', $query)->exists();
        return ['exists' => $exist];
    }

    public function index() {
        return view('register');
    }  
}
?>