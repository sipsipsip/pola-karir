<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Model\Penawaran;
use App\Model\Pegawai;

use Illuminate\Http\Request;

class PenawaranController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($year)
	{
		$penawaran = Penawaran::where('year_created', $year)->paginate(10);
		return $penawaran;
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}



	public function mendaftar($id)
	{
	    $penawaran = Penawaran::findOrFail($id);
	    $user = Pegawai::findOrFail(\Input::get('user_id'));

        $id_pegawai_terdaftar = $penawaran->pegawai()->getRelatedIds();

        if(in_array($user->id, $id_pegawai_terdaftar))
        {
            return "already registered";
        }

        $penawaran->pegawai()->attach($user->id);
        return $penawaran->pegawai;
	}

	public function showStats()
	{

	}

}
