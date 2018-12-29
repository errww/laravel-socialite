<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Awayday;
use App\Http\Resources\Awayday as AwaydayResource;

class AwaydayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get data
        $awaydays = Awayday::paginate(15);

        //return collection of data as a resource
        return AwaydayResource::collection($awaydays);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $awayday = $request->isMethod('put') ? Awayday::findOrFail($request->slug) : new Awayday;


        //$awayday->id = $request->input('id');
        $awayday->slug = uniqid();
        $awayday->judul = $request->input('judul');
        $awayday->jadwal_match = $request->input('jadwal_match');
        $awayday->lokasi_match = $request->input('lokasi_match');
        $awayday->biaya = $request->input('biaya');
        $awayday->slot = $request->input('slot');
        $awayday->tutup_pendaftaran = $request->input('tutup_pendaftaran');
        $awayday->keterangan = $request->input('keterangan');
        $awayday->status_aktif = 'open';
        $awayday->user_id = '1';
        

        if($awayday->save()){
            return new AwaydayResource($awayday);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        
        $awayday = Awayday::findOrFail($slug);

        return new AwaydayResource($awayday);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
