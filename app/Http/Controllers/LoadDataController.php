<?php
    namespace  App\Http\Controllers;

    use Illuminate\Support\Facades\Session;
    use Illuminate\Routing\Controller;
    use App\models\dati_concessionario;
    use DB;
    

    class LoadDataController extends Controller{
        public function veicoliHome(){
            $results = dati_concessionario::all();
            return $results;
        }

        public function datiConc($query){
            $img=DB::select("SELECT url_img FROM dati_conc WHERE nome='".$query."'");
            $dati=DB::select("SELECT dc.url_img as img_conc,v.*
            from ((veicolo v join disponibile d on v.CODICE=d.id_auto) join concessionario c on d.concessionario=c.codice)join dati_conc dc on c.nome=dc.nome
            where c.nome='".$query."'
            group by v.CODICE");

            return $dati;
        }

        public function caricaPreferiti($q){
            $id_session=Session::get('id_session');
            if($id_session!=null) {
                $query=DB::select("SELECT id_pref,v.nome,v.modello,v.url_img 
                from preferiti p join veicolo v on p.id_pref=v.codice
                where id_session=". "$id_session" ." AND concessionario=" ."'$q'");
                
            }
            return $query;
        }

        public function inserisciPreferiti($id,$nome){
            $id_session=Session::get('id_session');
            if($id_session!=null) {
                $query=DB::insert('INSERT INTO preferiti(id_session,id_pref,concessionario)
                values(?,?,?)',[$id_session,$id,$nome]);
            }
        }
        public function rimuoviPreferiti($id,$nome){
            $id_session=Session::get('id_session');
            if($id_session!=null) {
                $query=DB::delete('DELETE FROM preferiti 
                WHERE id_session=? and id_pref=? and concessionario=?'
                ,[$id_session,$id,$nome]);
            }
        }    
    }
?>