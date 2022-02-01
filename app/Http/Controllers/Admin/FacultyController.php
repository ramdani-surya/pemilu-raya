<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Faculty;
use App\Models\StudyProgram;
use Alert;
use Str;

class FacultyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['faculty'] = getActiveElection()->faculties;
        $data['study_program'] = getActiveElection()->studyPrograms;
        return view('admin.faculty.data', $data);
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function checkFacultyName(Request $request) 
    {
        if($request->Input('faculty_name')){
            $faculty_name = Faculty::where('name',$request->Input('faculty_name'))->first();
            if($faculty_name){
                return 'false';
            }else{
                return  'true';
            }
        }

        if($request->Input('edit_faculty_name')){
            $edit_faculty_name = Faculty::where('name',$request->Input('edit_faculty_name'))->first();
            if($edit_faculty_name){
                return 'false';
            }else{
                return  'true';
            }
        }
    }

    public function store(Request $request)
    {
        $data = [
            'election_id' => $request->election_id,
            'name' => $request->faculty_name,
            'slug' => Str::slug($request->faculty_name)

        ];

        Faculty::create($data)
        ? Alert::success('Sukses', "Faculty tetap berhasil disimpan.")
        : Alert::error('Error', "Faculty tetap gagal disimpan!");

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
        $faculty = Faculty::findOrFail($id);
        
        $data = [
            'name' => $request->edit_faculty_name,
            'slug' => Str::slug($request->edit_faculty_name)
        ];

        $faculty->update($data)
        ? Alert::success('Sukses', "Faculty tetap berhasil diubah.")
        : Alert::error('Error', "Faculty tetap gagal diubah!");

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
        $faculty = Faculty::find($id);

        $faculty->delete()
        ? Alert::success('Sukses', "Faculty tetap berhasil dihapus.")
        : Alert::error('Error', "Faculty tetap gagal dihapus!");

        return redirect()->back();
    }

    public function clear()
    {
        $faculty = Faculty::all();

        Faculty::destroy($faculty)
            ? Alert::success('Sukses', 'Data Faculty berhasil dibersihkan.')
            : Alert::error('Error', 'Data Faculty gagal dibersihkan.');

        return redirect(route('faculties.index'));
    }
}
