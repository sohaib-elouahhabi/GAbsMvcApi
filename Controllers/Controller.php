<?php
abstract class Controller
{ 
        public function __Construct(string $model)
        {
            include_once ROOT.'Models/'.$model.".php";
        }
        public function view(string $fichier,$data=null,$data2=null)
        {
            include_once ROOT."Views/".get_class($this)."/$fichier.php";
        }

        // public function Redirect($chemin)
        // {
        //     header('Location:'.$chemin);
        // }


}
?>