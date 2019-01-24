<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Awayday;
use App\Http\Resources\Awayday as AwaydayResource;
use App\Events\OpenAwaydayEvent;
use Illuminate\Support\Facades\DB;

class AwaydayController extends Controller
{

    public function authUserId()
    {
        //get the login id user
        $authUserId = Auth::user();
        return response()->json([
            'AuthId' => $authUserId,
        ]);
    }
	/**
	 * show index page
	 * @return view
	 */
    public function index()
    {
        // $user_id = Auth::id();
        // $data = array('user_id' => $user_id);
    	return view('contents.awaydays.awaydays');
    }

    /**
     * show detail of awayday
     * @param string $slug
     * @return view
     */
    public function show($slug)
    {
    	return view('contents.awaydays.DetailAwayday');
    }

    public function saveAwaydayData(Request $request){
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
        $awayday->user_id = Auth::id();
        

        if($awayday->save()){

            //push to pusher
            //event(new OpenAwaydayEvent($awayday));
            broadcast(new OpenAwaydayEvent($awayday));
            //return resource
            //return new AwaydayResource($awayday);
        }
    }

    public function showAwaydayData()
    {

        //untuk penomoran 1,2.. dst
        DB::statement(DB::raw('set @row=0'));
        
        //$awayday = Awayday::where('user_id', $slug)->orderBy('id','desc')->get();
        $awayday = DB::table('awaydays')
                        ->selectRaw('*, @row:=@row+1 as row')
                        ->where('user_id', Auth::id())
                        ->orderBy('id', 'desc')
                        ->get();

        return new AwaydayResource($awayday);
    }

    public function getAwaydayTimeline()
    {
        
    }
}
