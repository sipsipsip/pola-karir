<?php namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model {

    protected $table = 'users';

	/*
     ** Eloquent Relationship
     *
     */

     public function manajer()
     {
        return $this->belongsTo('App\Model\Manajer', 'id_manajer', 'id');
     }

     public function rencanaKarir()
     {
        return $this->hasMany('App\Model\RencanaKarir', 'user_id', 'id');
     }

     public function penawaran()
     {
        return $this->belongsToMany('App\Model\Penawaran', 'user_penawaran', 'user_id', 'penawaran_id');
     }

}
