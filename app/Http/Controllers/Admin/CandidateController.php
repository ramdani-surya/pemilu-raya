<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Candidate;
use App\Models\Election;
use Alert;

class CandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $data['candidates'] = getActiveElection()->candidates;

        return view('admin.candidate.data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.candidate.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'election'            => 'required',
            'candidate_number'    => "required|numeric|unique:candidates",
            'chairman_name'       => 'required|string|min:2',
            'vice_chairman_name'  => 'required|string|min:2',
            'chairman_photo'      => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'vice_chairman_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'vision'              => 'required|string|min:10',
            'mission'             => 'required|string|min:10'
        ]);

        if ($request->hasFile('chairman_photo')) {
            $file = $request->file('chairman_photo');

            $chairman_photo = time() . "_" . $file->getClientOriginalName();

            $tujuan_upload = 'Images';

            $file->move($tujuan_upload, $chairman_photo);
        } else {
            $chairman_photo = null;
        }

        if ($request->hasFile('vice_chairman_photo')) {
            $file = $request->file('vice_chairman_photo');

            $vice_chairman_photo = time() . "_" . $file->getClientOriginalName();

            $tujuan_upload = 'Images';

            $file->move($tujuan_upload, $vice_chairman_photo);
        } else {
            $vice_chairman_photo = null;
        }

        $data = [
            'election_id'         => $request->election,
            'candidate_number'    => $request->candidate_number,
            'chairman_name'       => $request->chairman_name,
            'vice_chairman_name'  => $request->vice_chairman_name,
            'chairman_photo'      => $chairman_photo,
            'vice_chairman_photo' => $vice_chairman_photo,
            'vision'              => $request->vision,
            'mission'             => $request->mission,
        ];


        Candidate::create($data)
            ? Alert::success('Sukses', "Kandidat berhasil ditambahkan.")
            : Alert::error('Error', "Kandidat gagal ditambahkan!");

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
    public function edit(Candidate $candidate)
    {
        return view('admin.candidate.edit', compact('candidate'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Candidate $candidate)
    {

        $request->validate([
            'edit_candidate_number'    => "required|numeric|unique:candidates,candidate_number,$candidate->id",
            'edit_chairman_name'       => 'required|string|min:2',
            'edit_vice_chairman_name'  => 'required|string|min:2',
            'edit_chairman_photo'      => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'edit_vice_chairman_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'edit_vision'              => 'required|string|min:10',
            'edit_mission'             => 'required|string|min:10',
        ]);

        if ($request->hasFile('edit_chairman_photo')) {
            $file = $request->file('edit_chairman_photo');

            $edit_chairman_photo = time() . "_" . $file->getClientOriginalName();

            $tujuan_upload = 'Images';

            $file->move($tujuan_upload, $edit_chairman_photo);
        }

        if ($request->hasFile('edit_vice_chairman_photo')) {
            $file = $request->file('edit_vice_chairman_photo');

            $edit_vice_chairman_photo = time() . "_" . $file->getClientOriginalName();

            $tujuan_upload = 'Images';

            $file->move($tujuan_upload, $edit_vice_chairman_photo);
        }

        $data = [
            'candidate_number'      => $request->edit_candidate_number,
            'chairman_name'         => $request->edit_chairman_name,
            'vice_chairman_name'    => $request->edit_vice_chairman_name,
            'chairman_photo'        => $request->hasFile('edit_chairman_photo') ? $edit_chairman_photo : $candidate->chairman_photo,
            'vice_chairman_photo'   => $request->hasFile('edit_vice_chairman_photo') ? $edit_vice_chairman_photo : $candidate->vice_chairman_photo,
            'vision'                => $request->edit_vision,
            'mission'               => $request->edit_mission,
        ];

        $candidate->update($data)
            ? Alert::success('Sukses', "Kandidat berhasil diubah.")
            : Alert::error('Error', "Kandidat gagal diubah!");

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function clear()
    {
        $candidates = Candidate::all();

        foreach ($candidates as $candidate) {
            foreach ($candidate->votings as $voting) {
                $voting->voter()->update(['voted' => 0]);
                $voting->delete();
            }

            $candidate->delete();
        }

        (count(Candidate::all()) < 1)
            ? Alert::success('Sukses', "Daftar Kandidat berhasil dibersihkan.")
            : Alert::error('Error', "Daftar Kandidat gagal dibersihkan!");

        return redirect(route('candidates.index'));
    }

    public function destroy(Candidate $candidate)
    {
        foreach ($candidate->votings as $voting) {
            $voting->voter()->update(['voted' => 0]);
            $voting->delete();
        }

        $candidate->delete()
            ? Alert::success('Sukses', "Kandidat berhasil dihapus.")
            : Alert::error('Error', "Kandidat gagal dihapus!");

        return redirect(route('candidates.index'));
    }
}
