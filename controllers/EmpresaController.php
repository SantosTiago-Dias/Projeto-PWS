<?php
require_once './controllers/BaseController.php';



class EmpresaController extends BaseController
{
    public function index()
    {
        $auth= new auth();
        $empresa = Empresa::all();
        $nome=$auth->getUsername();

        if($auth->isLoggedIn())
        {
         $this->makeView('empresa', 'index',['empresas'=>$empresa,'nome'=>$nome]);
        }
        else
        {
            $this->redirectToRoute('login', 'index');
        }
    }

    public function show($id)
    {
        $auth= new auth();
        $empresa = Empresa::find([$id]);

        $nome=$auth->getUsername();
        $this->makeView('empresa', 'show',['empresas'=>$empresa,'nome'=>$nome]);
        /*if(!$auth->isLoggedIn())
        {

        }
        else
        {
            $this->redirectToRoute('backend', 'index');
        }*/
    }


}