<?php

namespace App\Http\Controllers;

use App\Models\NewsletterRecipientsGroup;
use Illuminate\Http\Request;
use App\Service\RouteService;
use DB;

use App\Models\NewsletterRecipient;

class NewsletterRecipientsGroupController extends Controller
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
        $getCount = DB::table('newsletter_recipients_group')->select('newsletter_recipients_group.*', DB::raw("count('newsletter_recipient.newsletter_recipients_group_id') as number_of_recipients"))->leftJoin('newsletter_recipient', function($join){$join->on('newsletter_recipients_group.id','=','newsletter_recipient.newsletter_recipients_group_id');
            })->groupBy('newsletter_recipients_group.id')->get();



        // if(request()->ajax()) {
        //     return datatables()->of(NewsletterRecipientsGroup::select('*'))
        //     ->addColumn('action', 'newsletter.recipientgroup.recipientgroup-action')
        //     ->rawColumns(['action'])
        //     ->addIndexColumn()
        //     ->make(true);
        // }
        if(request()->ajax()) {
            return datatables()->of($getCount)
            ->addColumn('action', 'newsletter.recipientgroup.recipientgroup-action')
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }
         return view('newsletter.recipientgroup.recipientgroups');
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
        //
        $shopData = DB::table('sw_shops')->first();
        $recipientgroupId = $request->recipientgroupId;
        $recipientgroup   =   NewsletterRecipientsGroup::updateOrCreate(
                    [
                     'id' => $recipientgroupId
                    ],
                    [
                    'name' => $request->recipientgroupName,
                    'sw_shops_shop_id' => $shopData->shop_id
                    ]);                 
        return Response()->json($recipientgroup);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NewsletterRecipientsGroup  $newsletterRecipientsGroup
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NewsletterRecipientsGroup  $newsletterRecipientsGroup
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {

        $where = array('id' => $request->id);
        $recipientgroup = NewsletterRecipientsGroup::where($where)->first();
        return Response()->json($recipientgroup);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NewsletterRecipientsGroup  $newsletterRecipientsGroup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NewsletterRecipientsGroup $newsletterRecipientsGroup,$id)
    {
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NewsletterRecipientsGroup  $newsletterRecipientsGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $recipientgroup = NewsletterRecipientsGroup::where('id',$request->id)->delete();
        return Response()->json($recipientgroup);  
    }
}
