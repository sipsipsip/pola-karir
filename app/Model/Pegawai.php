<?php namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model {


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
}
