<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Awayday;
use App\AwaydayDetail;
use App\Http\Resources\Awayday as AwaydayResource;
use App\Http\Resources\AwaydayDetail as AwaydayDetailResource;
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
        $awayday = Awayday::where('slug','=', $slug)->firstOrFail();

    	return view('contents.awaydays.DetailAwayday');
    }

    /**
     * save awayday data
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function saveAwaydayData(Request $request){
        $awayday = $request->isMethod('put') ? Awayday::findOrFail($request->slug) : new Awayday;

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

    /**
     * [show awayday data]
     * @return [type] [description]
     */
    public function showAwaydayData()
    {

        DB::statement(DB::raw('set @row=0'));
        
        $awayday = DB::table('awaydays')
                        ->selectRaw('*, @row:=@row+1 as row')
                        ->where('user_id', Auth::id())
                        ->orderBy('id', 'desc')
                        ->get();

        return new AwaydayResource($awayday);
    }

    /**
     * get awayday data for timeline
     * @return [type] [description]
     */
    public function getAwaydayTimeline()
    {   
      
        DB::statement(DB::raw('set @row=0'));

        $awayday = DB::table('awaydays')
                        ->selectRaw('*, @row:=@row+1 as row')
                        ->join('users', 'users.id', '=', 'awaydays.user_id')
                        ->orderBy('awaydays.id', 'desc')
                        ->get();

        return new AwaydayResource($awayday);

    }

    public function getAwaydayDetail($slug)
    {
        $awayday = DB::table('awaydays')
                            ->select('*')
                            ->join('users','users.id','=','awaydays.user_id')
                            ->where('awaydays.slug','=',$slug)
                            ->get();

        return new AwaydayResource($awayday);
    }
    

    public function checkIsUserRegistrationAwayday($slug)
    {
        //check user apakah sudah daftar awayday atau belum
        $awayday = Awayday::where('slug', '=' ,$slug)->firstOrFail();

        $check = AwaydayDetail::where('awayday_id', '=', $awayday->id)
                                ->where('user_id', '=', Auth::id())
                                ->first();

        //dd($check);

        return new AwaydayDetailResource($check);

    }

    
}
