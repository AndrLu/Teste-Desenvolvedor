<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Orchestra\Parser\Xml\Facade as XmlParser;
use App\Curso;

class CursosController extends Controller
{
    public function importXml (Request $request) {
        $arquivo = $request->file('xml');
        $xml = simplexml_load_file($arquivo);
        $json = json_encode($xml);
        $array = json_decode($json,TRUE);

        foreach ($array['curso'] as $key => $value) {
            if(empty($value['nome']) || empty($value['codigo'])){
                return;
            }
            Curso::create([
                'nome' => $value['nome'],
                'codigo' => $value['codigo']
            ]);
        }
        
        return redirect()->back()->withSuccess('sua msg de sucesso');
    }   

    public function index(Request $request)
    {
        if ($request->input('curso_id')) {
            dd($request);
            $cursos = Curso::where('id', $request->input('curso_id'))->get();
            return view('cursos.index')->with("curso", $cursos);
        }
        $cursos = Curso::paginate(50);
        return view('cursos.index')->with("cursos", $cursos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cursos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $curso = Curso::create($request->all());

        if ($curso) {
            return redirect()->action('CursosController@index');
        }

        //Não criado
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Curso  $cursos
     * @return \Illuminate\Http\Response
     */
    public function show(Curso $cursos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Curso  $cursos
     * @return \Illuminate\Http\Response
     */
    public function edit($idCurso)
    {
        $curso = Curso::where('id', $idCurso)->first();

        return view('cursos.edit')->with(["curso" => $curso]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Curso  $cursos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Curso $curso, $idCurso)
    {
        $cursos = [
            'codigo' => $request->input('codigo'),
            'nome' => $request->input('nome'),
        ];
        $curso->where('id', $idCurso)->update($cursos);
        return redirect()->action('CursosController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Curso  $cursos
     * @return \Illuminate\Http\Response
     */
    public function destroy($idCurso, Curso $cursos)
    {
        $cursos->where('id', $idCurso)->delete();
        return redirect()->back()->withSuccess('sua msg de sucesso');
    }
}

