<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Candidate;
use App\Models\Election;
use Alert;
use File;

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
            'election' => 'required',
            'candidate_number' => "required|numeric|unique:candidates",
            'chairman_name' => 'required|string|min:3|max:35',
            'vice_chairman_name' => 'required|string|min:3|max:35',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'program' => 'required',
        ],
        [
            'election.required' => 'Election harus di isi.',
            'candidate_number.required' => 'Nomor Kandidat harus di isi.',
            'candidate_number.unique' => 'Nomor Kandidat sudah digunakan.',

            'chairman_name.required' => 'Nama Ketua harus di isi.',
            'chairman_name.min' => 'Nama Ketua minimal harus 3 karakter.',
            'chairman_name.max' => 'Nama Ketua tidak boleh lebih dari 35 karakter.',

            'vice_chairman_name.required' => 'Nama Wakil Ketua harus di isi.',
            'vice_chairman_name.min' => 'Nama Wakil Ketua harus 3 karakter.',
            'vice_chairman_name.max' => 'Nama Wakil Ketua tidak boleh lebih dari 35 karakter.',

            'image.image' => 'Foto harus berupa gambar.',
            'image.max' => 'Ukuran dari Foto tidak boleh lebih dari 2048 KB.',

            'program.required' => 'Kolom Program harus di isi.',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');

            $image = time() . "_" . $file->getClientOriginalName();

            $tujuan_upload = public_path('images/uploaded');

            $file->move(public_path($tujuan_upload), $image);
        } else {
            $image = null;
        }

        $data = [
            'election_id' => $request->election,
            'candidate_number' => $request->candidate_number,
            'chairman_name' => $request->chairman_name,
            'vice_chairman_name' => $request->vice_chairman_name,
            'image' => $image,
            'program' => $request->program,
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
            'edit_candidate_number' => "required|unique:candidates,candidate_number,$candidate->id",
            'edit_chairman_name'      => 'required|min:3|max:35',
            'edit_vice_chairman_name'     => 'required|min:3|max:35',
            'edit_image'     => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'edit_program'     => 'required',
        ],
        [
            'edit_candidate_number.required' => 'Nomor Kandidat harus di isi.',
            'edit_candidate_number.unique' => 'Nomor Kandidat sudah digunakan.',

            'edit_chairman_name.required' => 'Nama Ketua harus di isi.',
            'edit_chairman_name.min' => 'Nama Ketua minimal harus 3 karakter.',
            'edit_chairman_name.max' => 'Nama Ketua tidak boleh lebih dari 35 karakter.',

            'edit_vice_chairman_name.required' => 'Nama Wakil Ketua harus di isi.',
            'edit_vice_chairman_name.min' => 'Nama Wakil Ketua harus 3 karakter.',
            'edit_vice_chairman_name.max' => 'Nama Wakil Ketua tidak boleh lebih dari 35 karakter.',

            'edit_image.image' => 'Foto harus berupa gambar.',
            'edit_image.max' => 'Ukuran dari Foto tidak boleh lebih dari 2048 KB.',

            'edit_program.required' => 'Kolom Program harus di isi.',
        ]);

        if ($request->hasFile('edit_image')) {

            $StoredImage = public_path("images/{$candidate->image}");
            if (File::exists($StoredImage) && !empty($candidate->image)) {
                unlink($StoredImage);
            }

            $file = $request->file('edit_image');

            $edit_image = time() . "_" . $file->getClientOriginalName();

            $tujuan_upload = public_path('images/uploaded');

            $file->move(public_path($tujuan_upload), $edit_image);
        }

        $data = [
            'candidate_number'      => $request->edit_candidate_number,
            'chairman_name'         => $request->edit_chairman_name,
            'vice_chairman_name'    => $request->edit_vice_chairman_name,
            'image'                 => $request->hasFile('edit_image') ? $edit_image : $candidate->image,
            'program'                => $request->edit_program,
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

    public function elect(Candidate $candidate)
    {
        $data = [
            'election_id' => $candidate->election_id,
            'voter_id'    => Auth::guard('voter')->id(),
        ];

        if ($candidate->votings()->create($data)) {
            Auth::guard('voter')->user()->update([
                'voted' => 1
            ]);

            Alert::success('Sukses', "Terima kasih telah menggunakan hak suara Anda.");

            return redirect(route('has_voted'));
        }

        Alert::error('Error', "Kandidat gagal dipilih!");

        return back();
    }
}
