<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Feira;
use App\Http\Controllers\Controller;

class FeiraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('feira.index')->with("dados", $this->listar());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try{
            $date = date_create($_POST["data"]);
            $_POST["data"] = date_format($date, "Y-m-d H:i");
            $id = \DB::connection('mysql')->table('feira')->insert($_POST);
            exit(json_encode($id));
        } catch (\Exception $ex) {
            exit(json_encode("Erro ao salvar feira: " . $ex->getMessage()));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $feira = new Feira();
        $dados = $feira->getFeira($id);
        return view('feira.ver')->with("dados", $dados);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dados = $request->all();
        $date = date_create($dados["data"]);
        $dados["data"] = date_format($date, "Y-m-d H:i");
        return \DB::connection('mysql')->table('feira')
                                        ->where('id', $id)
                                        ->update([      'tipo'          => $dados['tipo'],
                                                        'tema'          => $dados['tema'],
                                                        'local'         => $dados['local'],
                                                        'data'          => $dados['data'],
                                                        'status'        => $dados['status'],
                                                        'observacao'    => $dados['observacao']]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Remove os dados de uma Feira.
    }
    
    public function action_nova()
    {
        return view('feira.nova');
    }
    
    /**
     * Retorna um Objeto de Feiras
     * @param Int $status Status da feira:  Acept=0/1; default=false;
     * Se default, retorna todas as feiras, se 0, somente inativas, se 1, ativas.
     * @return Objeto JSON
     */
    public function listar($status = false)
    {
        if($status != false){
            return \DB::connection('mysql')->table('feira')->where('status', $status)->get();
        }
        return \DB::connection('mysql')->table('feira')->get();
    }
    
    
    public function manager(Request $request, $id)
    {
        $dados = $request->all();
        return \DB::connection('mysql')->table('feira')->where('id', $id)->update(['status' => $dados['status']]);
    }
}
