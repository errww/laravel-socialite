<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AwaydayDetail extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'slug', 
        'awayday_id', 
        'user_id', 
        'kode_daftar', 
        'status_pendaftaran',
    ];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function awayday()
    {
    	return $this->belongsTo('App\Awayday');
    }
}
