<?php

namespace App\Http\Controllers;

//use Illuminate\Routing\Controller as BaseController;
use App\Models\Newsletter;
use App\Models\NewsletterSender;
use App\Models\NewsletterRecipientsGroup;
use Illuminate\Http\Request;
use App\Service\NewsletterService;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\View\View;
use Vin\ShopwareSdk\Data\Context;
use Vin\ShopwareSdk\Data\Criteria;
use Vin\ShopwareSdk\Data\Entity\NewsletterRecipient\NewsletterRecipientDefinition;
use Vin\ShopwareSdk\Data\Entity\NewsletterRecipient\NewsletterRecipientEntity;
use Vin\ShopwareSdk\Data\Webhook\AppAction\AppAction;
use Vin\ShopwareSdk\Data\Webhook\Event\Event;
use Vin\ShopwareSdk\Factory\RepositoryFactory;
use App\Service\RouteService;


class NewsletterController extends Controller
{

   // private NewsletterService $newsletterService;
    private RouteService $routeService;

    public function __construct(NewsletterService $newsletterService,RouteService $routeService)
    {
       // $this->newsletterService = $newsletterService;
        $this->routeService = $routeService;
    }

    
    public function newsletter_getdata(Context $context, Request $request): View
    {

        $newsletterRepository = RepositoryFactory::create(NewsletterRecipientDefinition::ENTITY_NAME);
       //dd($newsletterRepository);
        $criteria = new Criteria();
        $newsletterResult = $newsletterRepository->search($criteria, $context);
        //dd($newsletterResult);
        $recipients = [];
        foreach ($newsletterResult->getEntities() as $recipient) {
            array_push($recipients, $recipient);
        }
        return view('newsletter.recipients-list', ['recipients' => $recipients]);

     
    }    

        
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function neswsletter_manager(Context $context, Request $request): View
    // {
    //     $data = $this->routeService->shopDetails($request);
    //     return view('newsletter.newsletter-manager', ['data' => $data]);
    // }
     public function neswsletter_manager(Request $request): View
    {
        
        $CSRFToken = csrf_token();
        
        $data = $this->routeService->shopDetails($request);

        //$items = $request->items ?? 5; 
        //$newsletterSender = NewsletterSender::all();
        
        //$newsletterSender = NewsletterSender::paginate($items);

        $newsletterRecipientsGroupReccords = NewsletterRecipientsGroup::all();



       // return view('newsletter.newsletter-manager', ['data' => $data,'newsletterSender' => $newsletterSender,'items'=> $items]);
         //return view('newsletter.newsletter-manager', ['data' => $data]);
        //return view('newsletter.newsletter-manager', compact('data','newsletterSender','items','CSRFToken','newsletterRecipientsGroup'));
        return view('newsletter.newsletter-manager', compact('data','CSRFToken','newsletterRecipientsGroupReccords'));
    }




    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('newsletter.create');
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
       //dd("store");
          $request->validate([
            'name0' => 'required',
            'name1' => 'required',
             'name2' => 'required',
              'name3' => 'required',
               'name4' => 'required',
                'name5' => 'required',
            'introduction' => 'required',
            'price' => 'required'
        ]);

        $newsletter = new Newsletter;
        $newsletter->id = $request->input('name0');
        $newsletter->name = $request->input('name1');
        $newsletter->x_type = $request->input('name2');
        $newsletter->convert_function = $request->input('name3');
        $newsletter->description = $request->input('name4');
        $newsletter->template = $request->input('name5');
        $newsletter->cls = $request->input('introduction');
        $newsletter->pluginID = $request->input('price');     
        $newsletter->save();

        //return redirect()->route('newsletter.index')
          //  ->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Newsletter  $newsletter
     * @return \Illuminate\Http\Response
     */
    public function show(Newsletter $newsletter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Newsletter  $newsletter
     * @return \Illuminate\Http\Response
     */
    public function edit(Newsletter $newsletter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Newsletter  $newsletter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Newsletter $newsletter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Newsletter  $newsletter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Newsletter $newsletter)
    {
        //
    }
}
