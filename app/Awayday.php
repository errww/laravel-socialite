<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Awayday extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'slug', 
        'judul', 
        'jadwal_match', 
        'lokasi_match', 
        'biaya',
        'slot',
        'tutup_pendaftaran',
        'keterangan',
        'status_aktif',
        'user_id',
    ];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function awayday_detail(){

        return $this->hasMany('App\AwaydayDetail');
    }
}
