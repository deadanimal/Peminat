<?php

namespace App\Http\Controllers;

use Response;
Use Exception;

use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use App\Models\Poll;
use App\Models\PollVote;
use App\Models\PollOption;

class PollController extends Controller
{

    public function daftar(Request $request)
    {

        $validated = $request->validate([
            'soalan' => 'required|string|max:255',
        ]);

        Poll::create($validated);
        Alert::success('Success Title', 'Success Message');
        return back();
    }

    public function kemaskini(Request $request)
    {
        $poll_id = (int)$request->route('poll_id');
        $poll = Poll::find($poll_id);
        $poll->soalan = $request->soalan;
        $poll->save();
        Alert::success('Success Title', 'Success Message');
        return back();
    }

    public function senarai(Request $request)
    {
        $polls = Poll::all();
        return view('polls', compact('polls'));
    }

    public function satu(Request $request)
    {
        $user = $request->user();
        $poll_id = (int)$request->route('poll_id');
        $poll = Poll::find($poll_id);
        if($user->hasRole('super-admin')){
            $options = PollOption::where('poll_id', $poll->id)->get();
        } else {
            $options = PollOption::where([
                ['poll_id', '=', $poll->id],
                ['sekolah_id', '=', $user->sekolah->id],
            ])->get();
        }        
        return view('poll', compact('poll', 'options'));
    }

    public function lokasi(Request $request)
    {
        $user = $request->user();
        if ($user) {
        } else {
        }

        $poll = Poll::find(1);
        $poll_options = PollOption::where('poll_id', $poll->id)->get();

        $merged = $poll->merge($poll_options);
        return $merged->toJson();
    }


    public function daftar_pilihan(Request $request)
    {
        $poll_id = (int)$request->route('poll_id');
        $option = new PollOption;
        $option->poll_id = $poll_id;
        $option->sekolah_id = $request->sekolah_id;
        $option->nama = $request->nama;
        $option->save();
        Alert::success('Success Title', 'Success Message');
        return back();
    }

    public function kemaskini_pilihan(Request $request)
    {
        $option_id = (int)$request->route('option_id');
        $option = Poll::find($option_id);
        $option->nama = $request->nama;
        $option->save();
        Alert::success('Success Title', 'Success Message');
        return back();
    }


    public function undi(Request $request)
    {

        try {
            $vote = new PollVote;
            $vote->poll_id = (int)$request->route('poll_id');
            $vote->poll_option_id = (int)$request->route('option_id');
            $vote->user_id = $request->user()->id;
            $vote->save();
            Alert::success('Success Title', 'Success Message');
            return back();
        } catch (Exception $e) {

            Alert::error('Success Title', 'Success Message');
            return back();
        }
    }
}
