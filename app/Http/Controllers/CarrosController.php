<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarrosController extends Controller
{
    //dados default
    private $dateJson = [
        "0" => [
            "id"=> "1",
            "marca"=> "Fiat",
            "modelo"=> "Uno",
            "ano"=> "2020"
        ]
    ];
    
    public function index()
    {
        //verificar se existe o arquivo json
        if(file_exists('includes/date.json')){
            //pega os dados do arquivo json
            $pathJson = file_get_contents("includes/date.json");
            //decodifica para array
            $getJson = json_decode($pathJson, true);
            //dd($getJson);
            return view('pages.index', compact(['getJson']));
        }else{
            //pega o array com os dados padrão e codifica a json
            $codificar = json_encode($this->dateJson);
            //cria o arquivo json
            file_put_contents('includes/date.json', $codificar);
            return "Arquivo JSON criado! Atualize a página.";
        }

        //ler o arquivo json
        //$pathJson = file_get_contents("novo.json");
        //$decodifica = json_decode($pathJson, true);
        //dd($decodifica);
    }

    public function create()
    {
        return view('pages.cadastrar');
    }

    public function store(Request $request)
    {
        //pega todos os dados do form
        $getDate = $request->all();

        //pega os dados do arquivo json
        $pathJson = file_get_contents("includes/date.json");
        //decodifica os dados para array
        $getJson = json_decode($pathJson, true);
        //pega a quantidade de valores existente no array
        $count = count($getJson);
        $newId = $count + 1;
        //seta valores
        $values = array('id' => $newId, 'marca' => $getDate['marca'], 'modelo' => $getDate['modelo'], 'ano' => $getDate['ano']); 
        //insere no array
        array_push($getJson, $values);
        //dd($decodificar);
        //codifica a json
        $codificar = json_encode($getJson);
        //abre arquivo json
        $fp = fopen('includes/date.json', 'w');
        //inseri dados
        fwrite($fp, $codificar);
        //fecha arquivo json
        fclose($fp);
        return redirect('carros');
        
    }

    public function show($id)
    {
        //pega os dados do arquivo json
        $pathJson = file_get_contents("includes/date.json");
        //decodifica para array
        $getJson = json_decode($pathJson, true);
        $dados = $getJson[$id - 1];
        //dd($getJson[0]);
        return view('pages.info', compact(['dados']));
        
    }

    public function edit($id)
    {
        //pega os dados do arquivo json
        $pathJson = file_get_contents("includes/date.json");
        //decodifica para array
        $getJson = json_decode($pathJson, true);
        $dados = $getJson[$id - 1];
        //dd($getJson['Carro'.$id]);
        return view('pages.editar', compact(['dados']));
        
    }

    public function update(Request $request, $id)
    {
        //pega todos os dados do form
        $getDate = $request->all();
        $newId = $id - 1;
        //pega os dados do arquivo json
        $pathJson = file_get_contents("includes/date.json");
        //decodifica os dados para array
        $getJson = json_decode($pathJson, true);
        //seta em array os dados atualizados
        $a = array($newId => ['id' => $id, 'marca'=> $getDate['marca'], 'modelo'=> $getDate['modelo'], 'ano' => $getDate['ano']]);
        $dadosAtualizados = array_replace($getJson, $a);
        //codifica a json
        $codificar = json_encode($dadosAtualizados);
        //abre arquivo json
        $fp = fopen('includes/date.json', 'w');
        //inseri dados
        fwrite($fp, $codificar);
        //fecha arquivo json
        fclose($fp);
        return redirect('carros');
        
    }

    public function destroy($id)
    {
        //pega os dados do arquivo json
        $pathJson = file_get_contents("includes/date.json");
        //decodifica os dados para array
        $getJson = json_decode($pathJson, true);
        //remove valor do array
        unset($getJson[$id - 1]);
        //codifica a json
        $codificar = json_encode($getJson);
        //abre arquivo json
        $fp = fopen('includes/date.json', 'w');
        //inseri dados
        fwrite($fp, $codificar);
        //fecha arquivo json
        fclose($fp);

        //dd($codificar);
        return redirect('carros');
    }
}
