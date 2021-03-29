<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Election;
use Illuminate\Http\Request;
use Alert;

class ElectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['elections'] = Election::orderByDesc('period')->get();

        return view('admin.election.data', $data);
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
            'period' => 'required|string|unique:elections,period'
        ]);

        Election::create($request->all())
            ? Alert::success('Sukses', 'Data pemilu berhasil disimpan.')
            : Alert::error('Error', 'Data pemilu gagal disimpan!');

        return redirect(route('elections.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Election  $election
     * @return \Illuminate\Http\Response
     */
    public function show(Election $election)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Election  $election
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Election $election)
    {
        $request->validate([
            'edit_period' => "required|string|unique:elections,period,$election->id"
        ]);

        $data['period'] = $request->edit_period;

        $election->update($data)
            ? Alert::success('Sukses', 'Data pemilu berhasil diubah.')
            : Alert::error('Error', 'Data pemilu gagal diubah!');

        return redirect(route('elections.index'));
    }

    /**
     * Arsipkan Pemilu (Pemilu selesai).
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Election  $election
     * @return \Illuminate\Http\Response
     */
    public function archive(Election $election, $archived=1)
    {
        $successMessage = ($archived) ? 'Pemilu berhasil diarsipkan.' : 'Pemilu tidak diarsipkan.' ;
        $errorrMessage  = ($archived) ? 'Pemilu gagal diarsipkan.' : 'Gagal membatalkan pengarsipan.' ;

        $data['archived'] = $archived;

        $election->update($data)
            ? Alert::success('Sukses', $successMessage)
            : Alert::error('Error', $errorrMessage);

        return redirect(route('elections.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Election  $election
     * @return \Illuminate\Http\Response
     */
    public function destroy(Election $election)
    {
        //
    }
}
