<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Model\RencanaKarir;
use App\Model\Komentar;

use Illuminate\Http\Request;

class RencanaKarirController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
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
		$rencanaKarir = RencanaKarir::findOrFail($id);
		return $rencanaKarir;
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


	public function addKomentar($rencana_karir_id)
	{
        $rencana_karir = RencanaKarir::findOrFail($rencana_karir_id);

        \Eloquent::unguard();
        $komentar = new Komentar(\Input::all());
        $komentar->rencanaKarir()->associate($rencana_karir);
        $komentar->save();

        return $rencana_karir;
	}

	public function approve($id)
	{
	    $rencanaKarir = RencanaKarir::findOrFail($id);
	    $rencanaKarir->approved = 1; // 1 = approved
	    $rencanaKarir->save();
	    return $rencanaKarir;
	}

	public function reject($id)
	{
        $rencanaKarir = RencanaKarir::findOrFail($id);
	    $rencanaKarir->approved = 2; // 2 = rejected
	    $rencanaKarir->save();
	    return $rencanaKarir;
	}

	public function showKomentar($id)
	{
        $komentar = Komentar::where('rencana_karir_id', $id)->paginate(10);
        return $komentar;
	}

	public function showStats()
	{

	}

}
