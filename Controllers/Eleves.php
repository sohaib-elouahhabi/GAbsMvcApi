<?php
class Eleves extends Controller
{

    public function __Construct()
    {
        parent::__Construct('eleve');
    }

    public function index()
    {
    $eleve=eleve::All();
    //envoie l'en-tête http json au navigateur pour l'informer du type de données qu'il attend.
    header('Content-Type:application/json');

    $result=["data"=>$eleve];
    //json_encode — Renvoie la représentation JSON d'une valeur
    echo json_encode($result,JSON_PRETTY_PRINT);
    return json_encode($result);

    }
    public function show($id)
    {
        $eleve=eleve::find($id);
        header('Content-Type:application/json');
        $result=["data"=>$eleve];
        echo json_encode($result);
        return json_encode($result);
    }
    public function destroy($id)
    {
        $P=eleve::find($id);
        $P->delete();
        header('Content-Type:application/json');
        $result=["data"=>$P];
        echo json_encode($result);
        return json_encode($result);
    }
    public function store($request)
    {
        $P=new eleve();
        $P->cne=$request->cne;
        $P->nom=$request->nom;
        $P->prenom=$request->prenom;
        $P->groupe=$request->groupe;
        $P->save();
        header('Content-Type:application/json');
        $result=["data"=>$P];
        echo json_encode($result);
        return json_encode($result);
    }
    public function edit($id)
    {
        parent::view("form",eleve::find($id));
    }
    public function update($id,$request)
    {
        $P=eleve::find($id);
        $P->cne=$request->cne;  
        $P->nom=$request->nom;
        $P->prenom=$request->prenom;
        $P->groupe=$request->groupe;
        $P->save();
        header('Content-Type:application/json');

        $result=["data"=>$P];
        echo json_encode($result);
        return json_encode($result);
    }
    public function create()
    {
    }   
}
?>