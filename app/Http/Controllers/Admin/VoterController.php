<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Imports\VotersImport;
use App\Mail\TokenMail;
use App\Models\Voter;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;
use Alert;

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
        $data['voters']   = $this->activeElection->voters;
        $data['election'] = $this->activeElection;

        return view('admin.voter.data', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nim'      => 'required|string|unique:voters,nim',
            'name'     => 'required|string',
        ], config('validation_messages'));

        $data = [
            'election_id' => $this->activeElection->id,
            'nim'         => $request->nim,
            'name'        => $request->name,
            'token'       => Str::random(6),
            'email'       => emailStmik($request->nim),
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
            'edit_nim'  => "required|string|unique:voters,nim,$voter->id",
            'edit_name' => 'required|string',
            'email'     => "required|email|unique:voters,email,$voter->id",
        ], $messages);

        $data = [
            'user_id' => Auth::id(),
            'nim'     => $request->edit_nim,
            'name'    => $request->edit_name,
            'email'   => $request->email,
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
        return response()->download('storage/DPT_Pemilu_Raya.xlsx');
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
}
