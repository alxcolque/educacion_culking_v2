<?php

namespace App\Http\Controllers;

use App\Models\Completion;
use Illuminate\Http\Request;
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
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        /* $completions = Completion::join('challenges', 'challenges.id','=','completions.challenge_id')
            //->join('users','users.id','=','completions.user_id')
            ->where('completions.payment_status','aprobado')
            ->select('completions.user_id', DB::raw("SUM(challenges.price) as sum"))
            ->groupBy('completions.user_id')
            ->get(); */

        return view('home');
    }
}
