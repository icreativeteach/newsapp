<?php

namespace App\Http\Controllers;

use App\Models\NewsletterRecipient;
use App\Models\NewsletterRecipientsGroup;
use Illuminate\Http\Request;
use DB;



use Vin\ShopwareSdk\Data\Context;
use Vin\ShopwareSdk\Data\Criteria;
use Vin\ShopwareSdk\Data\Entity\Customer\CustomerDefinition;
use Vin\ShopwareSdk\Data\Entity\Customer\CustomerEntity;
use Vin\ShopwareSdk\Factory\RepositoryFactory;


class NewsletterRecipientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $getData = DB::table('newsletter_recipient')
            ->join('newsletter_recipients_group', 'newsletter_recipient.newsletter_recipients_group_id', '=', 'newsletter_recipients_group.id')
            ->select('newsletter_recipient.*', 'newsletter_recipients_group.name', 'newsletter_recipients_group.id as groupId');

       // $recipientsgroupdata = NewsletterRecipientsGroup::all();
       
        if(request()->ajax()) {
            return datatables()->of($getData)
            ->addColumn('action', 'newsletter.recipient.recipient-action')
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }
        // $recipientsgroupdata = NewsletterRecipientsGroup::all();
        // dd($recipientsgroupdata);
      //  return view('newsletter.recipient.recipients',compact('recipientsgroupdata'));
        return view('newsletter.recipient.recipients');

       
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
    public function store(Request $request,Context $context)
    {

     // $customerRepository = RepositoryFactory::create(CustomerDefinition::ENTITY_NAME);
     //  //dd($customerRepository);
     //    $criteria = new Criteria();
     //     $customerResult = $customerRepository->search($criteria, $context);
     //     //dd($customerResult);
     //     $customers = [];
     //    foreach ($customerResult->getEntities() as $customer) {
     //         array_push($customers, $customer);
     //     }
        //dd($customers);
         //isset($cOTLdata['char_data'])
         //dd(print_r($customers));

        $shopData = DB::table('sw_shops')->first();
        $recipientId = $request->recipientId;
        $recipient   =   NewsletterRecipient::updateOrCreate(
                    [
                     'id' => $recipientId
                    ],
                    [
                    'email' => $request->recipientEmail,
                    'newsletter_recipients_group_id' => $request->selectedRecipientGroup,
                    'customer' => '555',
                    'lastmailing' => '666',
                    'lastread' => '777',
                    'sw_shops_shop_id' => $shopData->shop_id
                    //'added' => '',
                    //'double_optin_confirmed' => '2'
                    ]);                 
        return Response()->json($recipient);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NewsletterRecipient  $newsletterRecipient
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NewsletterRecipient  $newsletterRecipient
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NewsletterRecipient  $newsletterRecipient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NewsletterRecipient $newsletterRecipient)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NewsletterRecipient  $newsletterRecipient
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $recipient = NewsletterRecipient::where('id',$request->id)->delete();
        return Response()->json($recipient);
    }

    //  public function getGroup()
    // {
        
    //     $recipientsgroupdata = NewsletterRecipientsGroup::all();
    //     dd($recipientsgroupdata);
    //    return view('newsletter.recipient.recipients',compact('recipientsgroupdata'));
    // }
}
