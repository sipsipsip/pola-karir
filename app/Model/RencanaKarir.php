<?php namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class RencanaKarir extends Model {


     protected $table = 'rencana_karir';

	/*
     ** Eloquent Relationship
     *
     */

    public function pegawai()
    {
        return $this->belongsTo('App\Model\Pegawai', 'user_id', 'id');
    }



    public function diklat_jk_pendek()
    {
        return $this->hasMany('App\Model\Diklat', 'pendek_diklat_id', 'id');
    }

    public function diklat_jk_menengah()
    {
        return $this->hasMany('App\Model\Diklat', 'menengah_diklat_id', 'id');
    }

    public function diklat_jk_panjang()
    {
        return $this->hasMany('App\Model\Diklat', 'panjang_diklat_id', 'id');
    }


    public function komentar()
    {
        return $this->hasMany('App\Model\Komentar', 'rencana_karir_id', 'id');
    }



    public function jabatan_jk_pendek()
    {
        return $this->belongsTo('App\Model\Jabatan', 'pendek_jabatan_id');
    }

    public function jabatan_jk_pendek_plan_b()
    {
        return $this->belongsTo('App\Model\Jabatan', 'pendek_jabatan_id_b');
    }

    public function jabatan_jk_menengah()
    {
        return $this->belongsTo('App\Model\Jabatan', 'menengah_jabatan_id');
    }

    public function jabatan_jk_menengah_plan_b()
    {
        return $this->belongsTo('App\Model\Jabatan', 'menengah_jabatan_id_b');
    }

    public function jabatan_jk_panjang()
    {
        return $this->belongsTo('App\Model\Jabatan', 'panjang_jabatan_id');
    }

    public function jabatan_jk_panjang_plan_b()
    {
        return $this->belongsTo('App\Model\Jabatan', 'panjang_jabatan_id_b');
    }


    public function perbantuan_jk_pendek()
    {
        return $this->belongsTo('App\Model\Perbantuan', 'pendek_perbantuan_id');
    }

    public function perbantuan_jk_pendek_plan_b()
    {
        return $this->belongsTo('App\Model\Perbantuan', 'pendek_perbantuan_id_b');
    }

    public function perbantuan_jk_menengah()
    {
        return $this->belongsTo('App\Model\Perbantuan', 'menengah_perbantuan_id');
    }

    public function perbantuan_jk_menengah_plan_b()
    {
        return $this->belongsTo('App\Model\Perbantuan', 'menengah_perbantuan_id_b');
    }

    public function perbantuan_jk_panjang()
    {
        return $this->belongsTo('App\Model\Perbantuan', 'panjang_perbantuan_id');
    }

    public function perbantuan_jk_panjang_plan_b()
    {
        return $this->belongsTo('App\Model\Perbantuan', 'panjang_perbantuan_id_b');
    }


    /*
     ** Non Eloquent
     *
     */

    public function stats()
    {
        return "stats of rencana karir here";
    }

    public function approve()
    {
        return "change this status to approved";
    }

    public function showKomentar()
    {
        return "showing comments of this rencana karir";
    }

    public function reject()
    {
        return "reject this rencana karir";
    }


}
