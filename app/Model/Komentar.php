<?php namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Komentar extends Model {

    protected $table = 'komentar_rencana_karir';

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
