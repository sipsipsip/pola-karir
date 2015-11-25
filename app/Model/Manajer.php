<?php namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Manajer extends Model {

    protected $table = 'users';


    /*
     ** Eloquent Relationship
     *
     */

	public function pegawai()
	{
	    return $this->hasMany('App\Model\Pegawai', 'id_manajer', 'id');
	}

	public function rencanaKarir()
	{
	    return $this->hasManyThrough('App\Model\RencanaKarir','App\Model\Pegawai', 'id_manajer', 'user_id');
	}

}
