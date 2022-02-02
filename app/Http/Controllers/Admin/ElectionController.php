<?php

namespace App\Http\Controllers\Admin;

use Alert;
use App\Http\Controllers\Controller;
use App\Mail\TokenMail;
use App\Models\Candidate;
use App\Models\Election;
use App\Models\Voter;
use App\Models\Voting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
        if (getActiveElection()) {
            Alert::info('Info', 'Anda hanya dapat menambahkan satu pemilu baru (belum diarsipkan).');
            return back();
        }

        $request->validate([
            'name'         => 'required|string',
            'period'       => 'required|string|unique:elections,period',
            'running_date' => 'nullable|date'
        ]);

        Election::create($request->all())
            ? Alert::success('Sukses', 'Data pemilu berhasil disimpan.')
            : Alert::error('Error', 'Data pemilu gagal disimpan!');

        return redirect(route('elections.index'));
    }

    public function checkElectionName(Request $request) 
    {
        if($request->Input('name')){
            $name = Election::where('name',$request->Input('name'))->first();
            if($name){
                return 'false';
            }else{
                return  'true';
            }
        }

        if($request->Input('edit_name')){
            $edit_name = Election::where('name',$request->Input('edit_name'))->first();
            if($edit_name){
                return 'false';
            }else{
                return  'true';
            }
        }
    }

    public function checkElectionPeriod(Request $request) 
    {
        if($request->Input('period')){
            $period = Election::where('period',$request->Input('period'))->first();
            if($period){
                return 'false';
            }else{
                return  'true';
            }
        }

        if($request->Input('edit_period')){
            $edit_period = Election::where('period',$request->Input('edit_period'))->first();
            if($edit_period){
                return 'false';
            }else{
                return  'true';
            }
        }
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
            'edit_name'   => 'required|string',
            'edit_period' => "required|string|unique:elections,period,$election->id",
            'edit_date'   => 'nullable|date'
        ]);

        $data = [
            'name'         => $request->edit_name,
            'period'       => $request->edit_period,
            'running_date' => $request->edit_date,
        ];

        $election->update($data)
            ? Alert::success('Sukses', 'Data pemilu berhasil diubah.')
            : Alert::error('Error', 'Data pemilu gagal diubah!');

        return redirect(route('elections.index'));
    }

    public function activation(Election $election)
    {
        $allElection = Election::all();

        foreach($allElection as $allElectionLoop) {
            $allElectionLoop->update(['status' => '3']);
        }

        $election->update(['status' => 1])
        ? Alert::success('Sukses', 'Pemilu telah berhasil di aktifkan.')
        : Alert::error('Error', 'Pemilu gagal di aktfikan.');

        return redirect(route('elections.index'));
    }

    public function deactivation(Election $election)
    {
        $allElection = Election::all();

        foreach($allElection as $allElectionLoop) {
            $allElectionLoop->update(['status' => '0']);
        }

        $election->update(['status' => 0])
        ? Alert::success('Sukses', 'Pemilu telah berhasil di nonaktfikan.')
        : Alert::error('Error', 'Pemilu gagal di nonaktfikan.');

        return redirect(route('elections.index'));
    }

    public function running(Election $election, $runningStatus=1)
    {
        $action = ($runningStatus === 1)
            ? 'Sekarang pemilu dapat menerima voting.'
            : 'Sekarang pemilu tidak dapat menerima voting.';

        if ($runningStatus === 1) {
            if (Election::where('running', 1)->first()) {
                Alert:: info('Info', "Hanya satu pemilu yang dapat berjalan.");

                return redirect(route('elections.index'));
            }
        }

        $election->running = $runningStatus;

        $election->save()
            ? Alert::success('Sukses', $action)
            : Alert::error('Error', "Pemilu gagal $action");

        return redirect(route('elections.index'));
    }

    public function resetVoting(Election $election)
    {
        $election->voters()->update(['voted' => 0]) && Voting::destroy($election->votings)
            ? Alert::success('Sukses', 'Hasil voting pemilu berhasil direset.')
            : Alert::error('Error', 'Hasil voting pemilu gagal direset.');

        return redirect(route('elections.index'));
    }

    public function status()
    {
        
    }

    /**
     * Arsipkan Pemilu (Pemilu selesai).
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Election  $election
     * @return \Illuminate\Http\Response
     */
    public function archive(Election $election)
    {
        $biggestVote = 0;
        $electedCandidate = null;

        foreach ($election->candidates as $candidate) {
            if (count($candidate->votings) > $biggestVote)
                $electedCandidate = $candidate;
        }

        $data = [
            'total_voters'        => count($election->voters),
            'voted_voters'        => count($election->votedVoters),
            'unvoted_voters'      => count($election->unvotedVoters),
            'total_candidates'    => count($election->candidates),
            'election_winner'     => $electedCandidate->candidate_number,
            'chairman'            => $electedCandidate->chairman_name,
            // 'vice_chairman'       => $electedCandidate->vice_chairman_name,
            'chairman_photo'      => $electedCandidate->chairman_photo,
            // 'vice_chairman_photo' => $electedCandidate->vice_chairman_photo,
            'archived'            => 1,
        ];

        // $election->votings()->delete();
        // $election->voters()->delete();
        // $election->candidates()->delete();

        $election->update($data)
            ? Alert::success('Sukses', 'Pemilu berhasil diarsipkan.')
            : Alert::error('Error', 'Pemilu gagal diarsipkan.');

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
        $election->votings()->delete();
        $election->voters()->delete();
        $election->candidates()->delete();

        $election->delete()
            ? Alert::success('Sukses', 'Data pemilu berhasil dihapus.')
            : Alert::error('Error', 'Data pemilu gagal dihapus.');

        return redirect(route('elections.index'));
    }

    /**
     * Remove all resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function clear()
    {
        $elections = Election::all();

        foreach ($elections as $election) {
            Voting::destroy($election->votings);
            Voter::destroy($election->voters);
            Candidate::destroy($election->candidates);
        }

        Election::destroy($elections)
            ? Alert::success('Sukses', 'Data pemilu berhasil dibersihkan.')
            : Alert::error('Error', 'Data pemilu gagal dibersihkan.');

        return redirect(route('elections.index'));
    }

    public function sendToken(Election $election)
    {
        $voters = $election->voters()->where('email_sent', 0)->get();

        if (count($voters) < 1) {
            Alert::info('Info', 'Semua token DPT telah terkirim!');
        } else {
            foreach ($voters as $voter) {
                Mail::to($voter)->queue(new TokenMail($voter));
            }

            $election->voters()->update(['email_sent' => 1])
                ? Alert::success('Sukses', 'Email token berhasil dikirim.')
                : Alert::error('Error', 'Email token gagal dikirim.');
        }

        return redirect(route('elections.index'));
    }
}
