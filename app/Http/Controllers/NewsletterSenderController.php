<?php

namespace App\Http\Controllers;

use App\Models\NewsletterSender;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
//use Webpatser\Uuid\Uuid;
//use Validator;
use App\Service\RouteService;
use Ramsey\Uuid\Uuid;
use DB;

class NewsletterSenderController extends Controller
{

    private RouteService $routeService;

    public function __construct(RouteService $routeService)
    {
        $this->routeService = $routeService;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->ajax()) {
            return datatables()->of(NewsletterSender::select('*'))
            ->addColumn('action', 'newsletter.newslettersender.sender-action')
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }
        return view('newsletter.newslettersender.senders');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       // return view('newsletter.newslettersender.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $shopData = DB::table('sw_shops')->first();
        $senderId = $request->senderId;
        $sender   =   NewsletterSender::updateOrCreate(
                    [
                     'id' => $senderId
                    ],
                    [
                    'email' => $request->senderEmail,
                    'name' => $request->senderName,
                    'sw_shops_shop_id' => $shopData->shop_id
                    ]);                 
        return Response()->json($sender);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NewsletterSender  $newsletterSender
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NewsletterSender  $newsletterSender
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {//dd($request);
        //echo $id;
       // DB::enableQueryLog();
       // $senderData = NewsletterSender::where('id',$id)->first();
           //dd(DB::getQueryLog());
        //exit();
       // return response()->json($senderData);
        $where = array('id' => $request->id);
        $sender = NewsletterSender::where($where)->first();
        //dd($sender);
        return Response()->json($sender);

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NewsletterSender  $newsletterSender
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NewsletterSender $newsletterSender,$id)
    {
        //dd($id);
       //  DB::enableQueryLog();
       /* NewsletterSender::Where('id', $id)->update([
            'email'=>$request->input('email'),
            'name'=>$request->input('name'),
        ]);*/
        //dd(DB::getQueryLog());    
         /*$senderData = NewsletterSender::where('id', '=', $id)->first();*/
        //
          /*return response()->json($senderData);*/
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NewsletterSender  $newsletterSender
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
       // $senderData = NewsletterSender::where('id', $id)->delete();
       // return response()->json($id);

        $sender = NewsletterSender::where('id',$request->id)->delete();
        return Response()->json($sender);  
    }

    public function deleteMultiSender(Request $request)
    {
        $idArray = isset($request->idArray) && is_array($request->idArray) ? $request->idArray : [];
        $idArray = implode(",", $idArray);

        $length=count($request->idArray);
      // $idArray = implode(",", $request->idArray);
        //  for($i=1; $i<=count($request->idArray); $i++)
        $senderArray=[];
        $senderArray = explode(",",$idArray);
       for($i=1; $i<=$length; $i++)
       {
          $senderData = NewsletterSender::whereIn('id',$senderArray)->delete();
          return response()->json($idArray);
        }
    }
}
