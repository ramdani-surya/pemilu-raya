<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Candidate;
use App\Models\CandidateType;
use Alert;
use Str;

class CandidateTypeController extends Controller
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function checkCandidateType(Request $request) 
    {
        if($request->Input('candidate_type_name')){
            $candidate_type_name = CandidateType::where('name',$request->Input('candidate_type_name'))->first();
            if($candidate_type_name){
                return 'false';
            }else{
                return  'true';
            }
        }

        if($request->Input('edit_candidate_type_name')){
            $edit_candidate_type_name = CandidateType::where('name',$request->Input('edit_candidate_type_name'))->first();
            if($edit_candidate_type_name){
                return 'false';
            }else{
                return  'true';
            }
        }
    }

    public function store(Request $request)
    {
        $data = [
            'name' => $request->candidate_type_name,
            'election_id' => $request->election_id,
            'slug' => Str::slug($request->candidate_type_name)
        ];

        CandidateType::create($data)
        ? Alert::success('Sukses', "Tipe Kandidat berhasil ditambahkan.")
        : Alert::error('Error', "Tipe Kandidat gagal ditambahkan!");

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
       
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
        $candidate_type = CandidateType::findOrFail($id);

        $data = [
            'name' => $request->edit_candidate_type_name ? $request->edit_candidate_type_name : $candidate_type->name,
            'slug' => Str::slug($request->candidate_type_name)
        ];

        $candidate_type->update($data)
        ? Alert::success('Sukses', "Tipe Kandidat berhasil diubah.")
        : Alert::error('Error', "Tipe Kandidat gagal diubah!");

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
        $candidate_type = CandidateType::find($id);
        $candidate_type->delete()
        ? Alert::success('Sukses', "Tipe Kandidat berhasil dihapus.")
        : Alert::error('Error', "Tipe Kandidat gagal dihapus!");

        return redirect()->back();
    }

    public function clear()
    {
        $candidate_type = CandidateType::all();

        foreach ($candidate_type as $candidate_types) {
            $candidate_types->delete();
        }

        (count(CandidateType::all()) < 1)
            ? Alert::success('Sukses', "Tipe Kandidat berhasil dibersihkan.")
            : Alert::error('Error', "Tipe Kandidat gagal dibersihkan!");

        return redirect()->back();
    }
}
