<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudyProgram;
use Alert;

class StudyProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    
    public function checkStudyProgramName(Request $request) 
    {
        if($request->Input('study_program_name')){
            $study_program_name = StudyProgram::where('name',$request->Input('study_program_name'))->first();
            if($study_program_name){
                return 'false';
            }else{
                return  'true';
            }
        }

        if($request->Input('edit_study_program_name')){
            $edit_study_program_name = StudyProgram::where('name',$request->Input('edit_study_program_name'))->first();
            if($edit_study_program_name){
                return 'false';
            }else{
                return  'true';
            }
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [
            'faculty_id' => $request->faculty_id,
            'election_id' => $request->election_id_2,
            'name' => $request->study_program_name
        ];

        StudyProgram::create($data)
        ? Alert::success('Sukses', "Program Studi tetap berhasil disimpan.")
        : Alert::error('Error', "Program Studi tetap gagal disimpan!");

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $study_program = StudyProgram::findOrFail($id);
        
        $data = [
            'faculty_id' => $request->edit_faculty_id,
            'name' => $request->edit_study_program_name
        ];

        $study_program->update($data)
        ? Alert::success('Sukses', "Program Studi tetap berhasil diubah.")
        : Alert::error('Error', "Program Studi tetap gagal diubah!");

        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $study_program = StudyProgram::find($id);

        $study_program->delete()
        ? Alert::success('Sukses', "Program Studi tetap berhasil dihapus.")
        : Alert::error('Error', "Program Studi tetap gagal dihapus!");

        return redirect()->back();
    }

    public function clear()
    {
        $study_program = StudyProgram::all();

        StudyProgram::destroy($study_program)
            ? Alert::success('Sukses', 'Data Program Studi berhasil dibersihkan.')
            : Alert::error('Error', 'Data Program Studi gagal dibersihkan.');

        return redirect(route('faculties.index'));
    }

}