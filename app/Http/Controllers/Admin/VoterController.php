<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Imports\VotersImport;
use App\Mail\TokenMail;
use App\Mail\TahungodingMail;
use App\Models\Voter;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use Alert;
use App\Models\Faculty;
use Datatables;
use Illuminate\Support\Facades\Validator;

class VoterController extends Controller
{
    private $activeElection;

    function __construct()
    {
        $this->activeElection = getActiveElection();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['voters']   = $this->activeElection->voters->sortBy('created_at');
        // if ($request->ajax()) {
        //     $data = $this->activeElection->voters;
        //     return Datatables::of($data)->addIndexColumn()
        //         ->addColumn('action', function($row){
        //             $btn = '<a href="javascript:void(0)" class="btn btn-primary btn-sm">View</a>';
        //             return $btn;
        //         })
        //         ->rawColumns(['action'])
        //         ->make(true);
        // }

        $data['election']   = $this->activeElection;
        $data['faculties']  = Faculty::all();

        return view('admin.voter.data', $data);
    }

    public function indexApi()
    {

        $id = $this->activeElection->id ?: 0;
        $voters = Voter::where('election_id',$id)->where('email_sent',0)->get();

        return response()->json($voters);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function checkDptNim(Request $request) 
    {
        if($request->Input('nim')){
            $nim = Voter::where('nim',$request->Input('nim'))->first();
            if($nim){
                return 'false';
            }else{
                return  'true';
            }
        }

        if($request->Input('edit_nim')){
            $edit_nim = Voter::where('nim',$request->Input('edit_nim'))->first();
            if($edit_nim){
                return 'false';
            }else{
                return  'true';
            }
        }
    }

    public function checkDptEmail(Request $request) 
    {
        if($request->Input('email')){
            $email = Voter::where('email',$request->Input('email'))->first();
            if($email){
                return 'false';
            }else{
                return  'true';
            }
        }

        if($request->Input('edit_email')){
            $edit_email = Voter::where('email',$request->Input('edit_email'))->first();
            if($edit_email){
                return 'false';
            }else{
                return  'true';
            }
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'nim'           => 'required|string|unique:voters,nim',
            'name'          => 'required|string',
            'email'         => 'required|email:filter',
            'faculty_id'    => 'required'
        ], config('validation_messages'));

        $data = [
            'election_id' => $this->activeElection->id,
            'nim'         => $request->nim,
            'name'        => $request->name,
            'token'       => Str::random(6),
            'faculty_id'  => $request->faculty_id,
            'email'       => $request->email,
        ];

        Auth::user()->storedVoters()->create($data)
            ? Alert::success('Sukses', "Pemilih tetap berhasil disimpan.")
            : Alert::error('Error', "Pemilih tetap gagal disimpan!");

        return redirect(route('voters.index'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Voter  $voter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Voter $voter)
    {
        $messages = config('validation_messages');
        $messages['edit_nim.unique'] = 'NIM telah digunakan';

        $request->validate([
            'edit_nim'          => "required|string|unique:voters,nim,$voter->id",
            'edit_name'         => 'required|string',
            'edit_email'         => "required|email|unique:voters,email,$voter->id",
            'edit_faculty_id'    => 'required'
        ], $messages);

        $data = [
            'user_id'       => Auth::id(),
            'nim'           => $request->edit_nim,
            'name'          => $request->edit_name,
            'email'         => $request->edit_email,
            'faculty_id'    => $request->edit_faculty_id
        ];

        $voter->update($data)
            ? Alert::success('Sukses', "Pemilih tetap berhasil diubah.")
            : Alert::error('Error', "Pemilih tetap gagal diubah!");

        return redirect(route('voters.index'));
    }

    /**
     * Reset dan/kirim email token
     *
     * @param  \App\Models\Voter  $voter
     * @param  Boolean $sendEmail
     * @return \Illuminate\Http\Response
     */
    public function sendToken(Voter $voter)
    {
        // gunakan filter_var() untuk jika value parameter adalah string
        Mail::to($voter)->send(new TokenMail($voter));

        $voter->update(['email_sent' => 1]);

        return redirect(route('voters.index'));
    }

    public function resetToken(Voter $voter, $sendEmail)
    {
        $data = [
            'token'      => generateToken(),
            'email_sent' => 0,
        ];

        $voter->update($data)
            ? Alert::success('Sukses', "Token pemilih berhasil diubah.")
            : Alert::error('Error', "Token pemilih gagal diubah!");

        // gunakan filter_var() untuk jika value parameter adalah string
        if (filter_var($sendEmail, FILTER_VALIDATE_BOOLEAN)) {
            Mail::to($voter)->send(new TokenMail($voter));

            $voter->update(['email_sent' => 1]);
        }

        return redirect(route('voters.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Voter  $voter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Voter $voter)
    {
        if ($voter->voting) $voter->voting()->delete();

        $voter->delete()
            ? Alert::success('Sukses', "Pemilih tetap berhasil dihapus.")
            : Alert::error('Error', "Pemilih tetap gagal dihapus!");

        return redirect(route('voters.index'));
    }

    /**
     * Import DPT dari file excel.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx'
        ],
        [
            'file.mimes' => 'File yang di upload harus berupa file dengan tipe: xlsx.'
        ]);

        Excel::import(new VotersImport, $request->file('file'))
            ? Alert::success('Sukses', "Impor DPT berhasil.")
            : Alert::error('Error', "Impor DPT gagal!");

        return redirect(route('voters.index'));
    }

    /**
     * Download format excel untuk impor DPT.
     *
     * @return \Illuminate\Http\Response
     */
    public function downloadFormat()
    {
        return Storage::download('DPT_FORMAT.xlsx');
    }

    /**
     * Bersihkan DPT.
     *
     * @return \Illuminate\Http\Response
     */
    public function clear()
    {
        $voters = Voter::all();

        foreach ($voters as $voter) {
            if ($voter->voting) $voter->voting->delete();

            $voter->delete();
        }

        (count(Voter::all()) < 1)
            ? Alert::success('Sukses', "Daftar Pemilih Tetap berhasil dibersihkan.")
            : Alert::error('Error', "Daftar Pemilih Tetap gagal dibersihkan!");

        return redirect(route('voters.index'));
    }

    public function email()
    {
        return view('admin.voter.email');
    }

    public function sendEmailApi(Request $request)
    {

        $validation = Validator::make($request->all(), [
            'id' => 'required',
            'type' => 'required'
        ]);

        if ($validation->fails()) {
            return [
                'status' => false,
                'data' => $validation->errors()
            ];die;
        }

        $voter = Voter::find($request->id);

        if ($voter->email_sent != 1) {
            try {
                Mail::to($voter)->send(new TokenMail($voter));
                $voter->update(['email_sent' => 1]);
    
                return [
                    'status' => true,
                    'data' => $voter
                ];
            } catch (\Exception $e) {
                return [
                    'status' => false,
                    'data' => $e
                ];
            }
        }else{
            return ['status' => false];
        }


    }
}
