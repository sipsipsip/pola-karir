<?php namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Penawaran extends Model {


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


     /*
      ** Non Eloquent
      *
      */

     public function stats()
     {
        return "return stats here";
     }

     public function registerUser($user_id)
     {
        return "register user here";
     }
}
