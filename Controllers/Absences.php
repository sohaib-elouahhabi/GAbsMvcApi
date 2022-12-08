<?php
class Absences extends Controller
{
    public function __Construct()
    {
        parent::__Construct('absence');
    }
    
    public function index()
    {
        //parent::view("index",absence::All());
    $absence=absence::All();
    header('Content-Type:application/json');
    $dataFinal=["data"=>$absence];
    echo json_encode($dataFinal);
    return json_encode($dataFinal);
    }


    public function show($id)
    {
        parent::view("show",absence::find($id));
    }

    public function showabs($cne)
    {
        $P=new absence();
        $req="SELECT *,a.id as idAb FROM absence a, eleve e WHERE a.cne=e.cne and a.cne=".$cne;
        // echo"$req";
        $res=$P->selection($req);
        $data=$res->fetchAll(PDO::FETCH_OBJ);
        parent::view("index",$data,$cne);
    }

    public function destroy($id)
    {
        $P=absence::find($id);
        $cne=$P->cne;
        $P->delete();
        $this->Redirect("../../Absences/showabs/$cne");
    }

    public function store($request)
    {
        $P=new absence();
        $P->cne=$request->cne;
        $P->semaine=$request->semaine;
        $P->nbr_abs=$request->nbr_abs;
        $P->save();
        $this->Redirect("../Absences/showabs/$P->cne");
    }

    public function edit($id)
    {
        parent::view("form",absence::find($id));
    }

    public function update($id,$request)
    {
        $P=absence::find($id);
        $P->cne=$request->cne;
        $P->id= $id;
        $P->semaine=$request->semaine;
        $P->nbr_abs=$request->nbr_abs;
        $P->save();
        $this->Redirect("../../Absences/showabs/$P->cne");
    }

    public function create($cne)
    {
        parent::view("form",null,$cne);
    }
    
}
?>