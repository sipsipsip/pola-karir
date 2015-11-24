<?php namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Manajer extends Model {



    /*
     ** Eloquent Relationship
     *
     */

	public function pegawai()
	{
	    return $this->hasMany('App\Model\Pegawai', 'manajer_id', 'id');
	}

	public function rencanaKarir()
	{
	    return $this->hasManyThrough('App\Model\RencanaKarir','App\Model\Pegawai', 'manajer_id', 'user_id');
	}

}
