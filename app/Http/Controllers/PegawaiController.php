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

        \Eloquent::unguard();
        $rencanaKarir = new RencanaKarir(\Input::except(['diklat_jk_pendek', 'diklat_jk_menengah', 'diklat_jk_panjang']));
        $rencanaKarir->save();

        foreach(\Input::get('diklat_jk_pendek') as $diklat){
            $rencanaKarir->diklat_jk_pendek()->attach($diklat);
        }

        foreach(\Input::get('diklat_jk_menengah') as $diklat){
            $rencanaKarir->diklat_jk_menengah()->attach($diklat);
        }

        foreach(\Input::get('diklat_jk_panjang') as $diklat){
            $rencanaKarir->diklat_jk_panjang()->attach($diklat);
        }


        $rencanaKarir->save();
        return $rencanaKarir;
    }

    public function editRencanaKarir($user_id)
    {

        \Eloquent::unguard();
        return \Input::get('id');
        $rencanaKarir = RencanaKarir::findOrFail(\Input::get('id'));
        $rencanaKarir->update(\Input::except(['diklat_jk_pendek', 'diklat_jk_menengah', 'diklat_jk_panjang']));


        foreach(\Input::get('diklat_jk_pendek') as $diklat){
            $rencanaKarir->diklat_jk_pendek()->attach($diklat);
        }

        foreach(\Input::get('diklat_jk_menengah') as $diklat){
            $rencanaKarir->diklat_jk_menengah()->attach($diklat);
        }

        foreach(\Input::get('diklat_jk_panjang') as $diklat){
            $rencanaKarir->diklat_jk_panjang()->attach($diklat);
        }


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

    public function optionsValue(){
        $query = \Input::get('query');
        $items = Pegawai::where('name', 'like', '%'.$query.'%')->take(10)->get();
        return $items;
    }

}
