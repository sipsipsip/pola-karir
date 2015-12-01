<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class AppController extends Controller {

    public function __construct()
    {
        $this->middleware('auth');
    }

	public function home()
	{
	    return view('app/root');
	}

}
