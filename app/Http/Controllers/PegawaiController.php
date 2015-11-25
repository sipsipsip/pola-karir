<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Model\Pegawai;
use App\Model\RencanaKarir;

use Illuminate\Http\Request;

class PegawaiController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        return Pegawai::paginate(10, ['name','created_at']);
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
		$pegawai = Pegawai::findOrFail($id);
		return $pegawai;
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


    public function addRencanaKarir($user_id)
    {
        if(!\Input::get('pendek_diklat_id'))
        {
            return 'empty';
        }
        \Eloquent::unguard();
        $rencanaKarir = new RencanaKarir(\Input::all());
        $rencanaKarir->save();
        return $rencanaKarir;
    }

    public function showRencanaKarir($user_id)
    {
       $rencanaKarir = RencanaKarir::with(['diklat_jk_pendek'])
                        ->where('user_id', $user_id)
                        ->paginate(10);
       return $rencanaKarir;
    }

    public function assignManajer($user_id)
    {
        if(!\Input::get('id_manajer'))
        {
            return 'empty';
        }
        \Eloquent::unguard();
        $pegawai = Pegawai::findOrFail($user_id);
        $pegawai->id_manajer = \Input::get('id_manajer');
        $pegawai->save();
        return $pegawai;
    }
}
