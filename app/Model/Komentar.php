<?php namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Komentar extends Model {

	/*
     ** Eloquent Relationship
     *
     */

     public function author()
     {
        return $this->belongsTo('App\Model\Pegawai', 'user_id');
     }

     public function rencanaKarir()
     {
        return $this->belongsTo('App\Model\RencanaKarir', 'rencana_karir_id');
     }
}
