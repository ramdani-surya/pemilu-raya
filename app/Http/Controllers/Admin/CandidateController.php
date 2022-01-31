<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Candidate;
use App\Models\CandidateType;
use App\Models\Election;
use App\Models\StudyProgram;
use App\Models\Faculty;
use Alert;
use File;
use Storage;
use Str;
use Validator;
use Illuminate\Validation\Rule;

class CandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['candidate_type'] = getActiveElection()->candidateTypes;
        $data['election'] = Election::all();
        return view('admin.candidate.data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['candidate_type'] = CandidateType::all();
        $data['faculty'] = Faculty::all();
        return view('admin.candidate.create', $data);
    }

    public function filter($request)
    {
        
    }

    public function createIn($slug)
    {
        $data['slug'] = $slug;
        $data['candidate'] = Candidate::all();
        $data['candidate_type'] = CandidateType::all();
        $data['faculty'] = Faculty::all();
        return view('admin.candidate.create', $data);
    }

    public function getStudyProgram($id)
    {
        $study_program = StudyProgram::where('faculty_id',$id)->get();
        return response()->json($study_program);
    }

    public function getCandidateNumber($id)
    {
        $get_candidate_number = Candidate::where('candidate_type_id', $id)->orderBy('updated_at', 'desc')->first();
        
        if(isset($get_candidate_number)) {
            $candidate_number = $get_candidate_number->candidate_number + 1;
        } else {
            $candidate_number = 1;
        }
        return response()->json($candidate_number);
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
            'candidate_number' => ['required',Rule::unique('candidates')->where(function ($query) use ($request) {
                return $query->where('candidate_type_id', '=', $request->candidate_type_id);
            })],
            'candidate_type_id' => "required",
            'faculty_id' => "required",
            'study_program_id' => "required",
            'chairman_name' => 'required|string|min:3|max:35',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10000',
            'program' => 'required',
        ],
        [
            'election.required' => 'Election harus di isi.',
            'candidate_number.required' => 'Nomor Kandidat harus di isi.',
            'candidate_number.unique' => 'Nomor Kandidat sudah digunakan.',
            
            'candidate_type_id.required' => 'Tipe Kandidat harus di isi.',

            'faculty_id.required' => 'Fakultas harus di isi.',
            'study_program_id.required' => 'Program Studi harus di isi.',

            'chairman_name.required' => 'Nama Ketua harus di isi.',
            'chairman_name.min' => 'Nama Ketua minimal harus 3 karakter.',
            'chairman_name.max' => 'Nama Ketua tidak boleh lebih dari 35 karakter.',

            'image.required' => 'Foto harus di isi.',
            'image.image' => 'Foto harus berupa gambar.',
            'image.max' => 'Ukuran dari Foto tidak boleh lebih dari 2048 KB.',

            'program.required' => 'Kolom Program harus di isi.',
        ]);

        $slug = CandidateType::where('id', $request->candidate_type_id)->first();

        $data = [
            'election_id' => $request->election,
            'candidate_type_id'  => $request->candidate_type_id,
            'candidate_number' => $request->candidate_number,
            'chairman_name' => $request->chairman_name,
            'faculty_id' => $request->faculty_id,
            
            'image' => $request->file('image')->store("/public/input/candidates"),
            'program' => $request->program,
        ];

        Candidate::create($data)
            ? Alert::success('Sukses', "Kandidat berhasil ditambahkan.")
            : Alert::error('Error', "Kandidat gagal ditambahkan!");

        return redirect()->route('candidates.show', $request->candidateTypeUrl);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $candidate_type = CandidateType::where('slug', $slug)->first();
        $data['candidate_type2'] = CandidateType::where('slug', $slug)->first();
        $data['candidate'] = Candidate::where('candidate_type_id', $candidate_type->id)->get();
        // $data['candidate'] = getActiveEle;
        $data['candidates'] = Candidate::with(['election' => function ($query) {
            $query->select('id', 'status')->where('status',1);
        }])->get();
        
        return view('admin.candidate.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id,$candidateType)
    {
        $data['candidate'] = Candidate::find($id);
        $data['candidate_type'] = CandidateType::all();
        $data['faculty'] = Faculty::all();
        $data['candidateType'] = $candidateType;
        return view('admin.candidate.edit', $data);
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
          
            'edit_faculty_id' => "required",
            'edit_study_program_id' => "required",
            'edit_chairman_name'      => 'required|min:3|max:35',
            'edit_image'            => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'edit_program'     => 'required',
        ],
        [
            'edit_candidate_number.required' => 'Nomor Kandidat harus di isi.',
            'edit_candidate_number.unique' => 'Nomor Kandidat sudah digunakan.',

            'edit_candidate_type_id.required' => 'Tipe Kandidat harus di isi.',

            'edit_faculty_id.required' => 'Fakultas harus di isi.',
            'edit_study_program_id.required' => 'Program Studi harus di isi.',

            'edit_chairman_name.required' => 'Nama Ketua harus di isi.',
            'edit_chairman_name.min' => 'Nama Ketua minimal harus 3 karakter.',
            'edit_chairman_name.max' => 'Nama Ketua tidak boleh lebih dari 35 karakter.',

            'edit_image.image' => 'Foto harus berupa gambar.',
            'edit_image.max' => 'Ukuran dari Foto tidak boleh lebih dari 2048 KB.',

            'edit_program.required' => 'Kolom Program harus di isi.',
        ]);

        if($request->hasFile('edit_image')) {
            if(Storage::exists($candidate->image) && !empty($candidate->image)) {
                Storage::delete($candidate->image);
            }

            $edit_image = $request->file("edit_image")->store("/public/input/candidates");
        }   

        $edit_slug = CandidateType::where('id', $request->edit_candidate_type_id)->first();

        $data = [
            'candidate_type_id'  => $request->edit_candidate_type_id ? $edit_candidate_type_id : $candidate->candidate_type_id,
            'candidate_number'      => $request->edit_candidate_number ? $edit_candidate_number : $candidate->candidate_number,
            'chairman_name'         => $request->edit_chairman_name,
            'faculty_id'               => $request->edit_faculty_id,
            'study_program_id'         => $request->edit_study_program_id,
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
