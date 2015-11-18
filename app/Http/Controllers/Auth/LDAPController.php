<?php namespace App\Http\Controllers\Auth;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class LDAPController extends Controller {

	// Show login form LDAP
	public function getLogin()
	{
		return view('auth/ldap/login');
	}



	// Process LDAP Login
	public function postLogin()
	{
		$username = \Request::get('username');
		$username_kemenkeu = "kemenkeu\\".$username;
		$password = \Request::get('password');

		$ldapconn = ldap_connect ('kemenkeu.go.id') or die('can not connect');

		if($ldapconn){
			$ldapbind = ldap_bind($ldapconn, $username_kemenkeu, $password) or die(' wrong credential');

			if($ldapbind){
				// search username where muhammad.azamuddin
				// log in the user
				// dummy
				$user = User::where('kemenkeu', $username)->first();
				\Auth::loginUsingId($user->id);
				return \Redirect::to('/');
			}
		}
	}

}
