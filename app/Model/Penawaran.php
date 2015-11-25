<?php namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Penawaran extends Model {


    protected $table = 'penawaran';

	/*
     ** Eloquent Relationship
     *
     */

     public function diklat()
     {
        return $this->belongsTo('App\Model\Diklat', 'id_jabatan');
     }

     public function perbantuan()
     {
        return $this->belongsTo('App\Model\Perbantuan', 'id_perbantuan');
     }

     public function jabatan()
     {
        return $this->belongsTo('App\Model\Jabatan', 'id_jabatan');
     }

     public function pegawai()
     {
        return $this->belongsToMany('App\Model\Pegawai', 'user_penawaran', 'penawaran_id', 'user_id');
     }

    }
