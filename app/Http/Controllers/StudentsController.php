<?php

namespace App\Http\Controllers;

use App\Student;
use App\Enderecos;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->input('student_id')) {
            $student = Student::where('id', $request->input('student_id'))->get();
            return view('students.index')->with("students", $student);
        }
        $students = Student::all();
        return view('students.index')->with("students", $students);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $student = Student::create($request->all());
        $user_endereco = Enderecos::create($request->all());

        if ($student && $user_endereco) {
            return redirect()->action('StudentsController@index');
        }

        //Não criado
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        $user_endereco = Enderecos::where('id', $student->id)->first();
    
        return view('students.edit')->with(["student" => $student, "user_endereco" => $user_endereco]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student, $idUser, Enderecos $endereco)
    {
        $user_endereco = [
            'rua' => $request->input('rua'),
            'bairro' => $request->input('bairro'),
            'cidade' => $request->input('cidade'),
            'estado' => $request->input('estado'),
            'complemento' => $request->input('complemento')
        ];
        
        $data = request()->except(['_token', 'rua', 'bairro', 'cidade', 'estado', 'complemento']);
        $student->where('id', $idUser)->update($data);
        $endereco->where('id', $idUser)->update($user_endereco);
        return redirect()->action('StudentsController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy($idStudent, Student $student)
    {
        $student->where('id', $idStudent)->delete();
        return redirect()->back()->withSuccess('sua msg de sucesso');
    }
}
