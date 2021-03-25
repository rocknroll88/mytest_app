<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProposalRequest;
use App\Mail\ProposalMail;
use Illuminate\Http\Request;
use App\Models\Proposal;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Spatie\Permission\Models\Role;
use App\Jobs\SendEmail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $proposals = Proposal::all();

        return view('home', ['proposals' => $proposals]);
    }


    public function client(){

        $id = Auth::user()->id;
        $all_app = Proposal::where('author_id', $id)->get();

        return view('client.index', compact('all_app'));
    }

    public function create(ProposalRequest $request){

        $proposal = $request->all();

       if($request->hasFile('file')){
           $proposal['file'] = $request->file('file')->store('public/proposal');
       }

        $proposal['author_id'] = Auth::user()->id;
        Proposal::create($proposal);
        dispatch(new SendEmail($proposal));

        return back()->with('success', 'Ваша заявка успешно отправлена!');
    }

    public function show($id){

        $proposal = Proposal::find($id);

        return view('proposal', ['proposal' => $proposal]);

    }

    public function done($id){
        $proposal = Proposal::find($id);

        DB::table('proposals')
            ->where('id', $proposal->id)
            ->update(['is_done' => 1]);

        return back()->with('success', 'Ваша заявка успешно закрыта!');

    }


    public function card($id){

        $proposal = Proposal::find($id);

        return view('client.card', compact('proposal'));

    }

}
