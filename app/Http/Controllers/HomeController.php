<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Attends;
use App\User;

class HomeController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        if (auth()->guest()) {
            return view('home');
        }
        return view('dashborad');
    }

    public function data() {
        $users = User::select([
                    'users.name',
                    'users.email',
                    'code',
                    'state',
                    'attends.created_at',
                    'comment'
                ])->join('attends', 'user_code', '=', 'code');

        $datatables = app('datatables')->of($users);

        if ($name = $datatables->request->get('name')) {
            $datatables->where('users.name', 'like', "$name%");
        }

        if ($from = $datatables->request->get('from')) {
            $datatables->where('attends.created_at', '>=', "$from%");
        }

        if ($to = $datatables->request->get('to')) {
            $datatables->where('attends.created_at', '<', "$to%");
        }
        $datatables->setRowClass(function ($user) {
            return $user->state == 'IN' ? 'text-success' : 'text-danger';
        });

        $datatables->editColumn('created_at', function ($user) {
            return date('d-m-Y  /  H:i', strtotime($user->created_at));
        });

        return $datatables->make(true);
    }

    /**
     * open the register new employee form
     * @return view
     */
    public function add() {
        return view('layouts.add');
    }

    /**
     * save the employee
     */
    public function store(Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'code' => 'required'
        ]);

        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->code = $request->input('code');

        if ($this->chek_records($user)) {
            return redirect('/new')->with('error', 'an employee with this information already exists');
        }
        $user->save();
        return redirect('/')->with('status', 'Employee added successfully');
    }

    public function attend(Request $request) {
        $this->validate($request, [
            'code' => 'required'
        ]);

        if ($this->chek_records($request->input('code')) === null) {
            return redirect('/')->with('error', 'Code not Valid');
        }
        $current_state = Attends::where('user_code', $request->input('code'))
                 ->whereDate('created_at', date('Y-m-d'))->orderBy('created_at', 'desc')->first()->state??null;

        $attend = new Attends();
        $attend->user_code = $request->input('code');
        $attend->comment = $request->input('comment');
        if ($current_state === 'IN') {
            $attend->state = 'OUT';
        } else {
            $attend->state = 'IN';
        }
        $request->session()->put('state', $attend->state);

        $attend->save();
        return redirect('/');
    }

    public function chek_records($data) {
        if (is_object($data)) {
            $user = User::where('code', $data->code)->orWhere('email', $data->email)->first();
        } else {
            $user = User::where('code', $data)->first();
        }
        return $user;
    }

}
