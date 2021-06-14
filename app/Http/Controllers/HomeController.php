<?php
    namespace  App\Http\Controllers;

    use Illuminate\Support\Facades\Session;
    use Illuminate\Routing\Controller;
    use DB;
    use App\Models\User;
    use App\Models\veicolo;
    use Illuminate\Http\Request;


    

    class HomeController extends Controller{
        public function dati_utente(){
            $userId=Session::get("id_session");

            $query = DB::select("SELECT V.nome as Nome, v.modello as Modello ,CO.prezzo as Prezzo, CON.nome as Concessionario, CON.via as Indirizzo, ct.nome as Citta,CO.data as data
            FROM (((dati_login d join cliente c on d.CF=c.CF) join compravendita CO on c.CF=CO.cliente) join veicolo v on CO.CODICE_VEICOLO=v.codice join dipendente DP on CO.CODICE_VENDITORE=DP.CODICE) 
            join concessionario CON on DP.CONCESSIONARIO=CON.CODICE join risiede rd on CON.codice=rd.CONCESSIONARIO join citta ct on rd.CITTA=ct.cap
            where d.id_session=".$userId);

            return $query;
        }
        public function spesa_utente(){
            $userId=Session::get("id_session");

            $query1=DB::select("SELECT sum(CO.prezzo) as Spesa_totale
            FROM ((dati_login d join cliente c on d.CF=c.CF) join compravendita CO on c.CF=CO.cliente) join veicolo v on CO.CODICE_VEICOLO=v.codice
            where d.id_session=".$userId);
            
            return $query1;
        }

        public function stampa_auto(){
            $query=veicolo::all();
            return $query;
        }

        public function compra_auto(){
            try { 
                $request=request();
                $codici= $request->input('codici');
                $cf= $request->input('cf_input');

                $prezzo=veicolo::select('PREZZO')
                           ->where('CODICE', '=', $codici)
                           ->get();
                $dipendente=rand(1,9);
                $data=date("Y-m-d");
                $prezzo=$prezzo[0]->PREZZO;

                $insert=DB::insert('insert into compravendita (CLIENTE,CODICE_VENDITORE,CODICE_VEICOLO,PREZZO,DATA)values(?,?,?,?,?)',[$cf,$dipendente,$codici,$prezzo,$data]);
            
            } catch(\Illuminate\Database\QueryException $ex){ 
                return redirect('error');
            }  
            return redirect('home')->with('success_buy', 'ok');
        }

        public function checkCF($cf) {
            $userId=Session::get("id_session");
            $exist = User::where('CF', $cf)->where('id_session', $userId)->exists();
            return ['exists' => $exist];
        }

        public function checkSconto($cf) {
            $userId=Session::get("id_session");
            $exist = DB::select("SELECT * 
            FROM dati_login d join cliente c on d.CF=c.CF and d.CF = '$cf' 
            where d.id_session=".$userId." AND c.eta<=30 OR c.eta>=60");
            if($exist){
                return response()->json(['exists' => true]);
            }else{
                return response()->json(['exists' => false]);
            }

        }
        public function applicaSconto(){
            $request=request();
            $cf= $request->input('cf_input');
            $query=DB::select("call p3('$cf')");
            
            return redirect('home')->with('success_discount', 'ok');;
            
        }
    }   
?>