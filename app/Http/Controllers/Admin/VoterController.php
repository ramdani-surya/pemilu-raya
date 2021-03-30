<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Imports\VotersImport;
use App\Models\Voter;
use App\Models\Election;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;
use Alert;

class VoterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['voters'] = Voter::orderBy('nim')->get();
        $data['elections'] = Election::where('archived', 0)->orderByDesc('period')->get();

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
            'election' => 'required|numeric|exists:elections,id',
            'nim'      => 'required|string',
            'name'     => 'required|string',
        ]);

        $election = Election::find($request->election);

        if ($election->voters()->where('nim', $request->nim)->first()) {
            Alert::info('Gagal', "Pemilih tetap dengan NIM $request->nim di Pemilu $election->period telah ada!");

            return back()->withInput();
        }

        $data = [
            'election_id' => $request->election,
            'nim'         => $request->nim,
            'name'        => $request->name,
            'token'       => Str::random(6),
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
        $request->validate([
            'edit_election' => 'required|numeric|exists:elections,id',
            'edit_nim'      => 'required|string',
            'edit_name'     => 'required|string',
        ]);

        if ($request->edit_election !== $voter->election_id && $request->edit_nim !== $voter->nim) {
            $election = Election::find($request->edit_election);

            if ($election->voters()->where('nim', $request->edit_nim)->first()) {
                Alert::info('Gagal', "Pemilih tetap dengan NIM $request->edit_nim di Pemilu $election->period telah ada!");

                return back()->withInput();
            }
        }

        $data = [
            'election_id' => $request->edit_election,
            'nim'         => $request->edit_nim,
            'name'        => $request->edit_name,
            'token'       => Str::random(6),
        ];

        $voter->update($data)
            ? Alert::success('Sukses', "Pemilih tetap berhasil diubah.")
            : Alert::error('Error', "Pemilih tetap gagal diubah!");

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
