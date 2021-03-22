<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProposalRequest;
use App\Mail\ProposalMail;
use Illuminate\Http\Request;
use App\Models\Proposal;
use Illuminate\Support\Facades\Mail;

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
        return view('client.index');
    }

    public function create(ProposalRequest $request){

        $proposal = $request->all();

       if($request->hasFile('file')){
           $proposal['file'] = $request->file('file')->store('public/proposal');
       }

        Proposal::create($proposal);

        // dump($proposal1);

         Mail::to('test@test.ru')->send(new ProposalMail($proposal));

        return back()->with('success', 'Ваша заявка успешно отправлена!');
    }

    public function show($id){

        $proposal = Proposal::find($id);

        return view('proposal', ['proposal' => $proposal]);

    }

}
