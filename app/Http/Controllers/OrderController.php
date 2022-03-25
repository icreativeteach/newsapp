<?php declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Symfony\Component\HttpFoundation\Response;
use App\Service\OrderListService;
use Vin\ShopwareSdk\Data\Context;
use Illuminate\View\View;
use Vin\ShopwareSdk\Data\Webhook\AppAction\AppAction;
use Vin\ShopwareSdk\Data\Webhook\Event\Event;

class OrderController extends BaseController
{
    private OrderListService $orderListService;

    public function __construct(OrderListService $orderListService)
    {
        $this->orderListService = $orderListService;
    }

    public function orderPlacedEvent(Context $context, Event $event): Response
    {
        
        $eventData = $event->getData();
        $order = $eventData->getPayload()['order'] ?? null;

        // Should not happen, but return if there is no order.
        if (!$order) {
            return new Response();
        }

        $orderId = $order['id'];

        //Gets the configuration including the data for the order list.
        $orderListConfiguration = $this->orderListService->getOrderListConfigurationFromOrder($order);

        //Gets the order list table as plain html.
        $orderListTable = view('order.order-list-table', ['orderListConfiguration' => $orderListConfiguration])->render();

        //Updates the order with the order list table and the deep link to the order.
        $this->orderListService->updateOrder($context, $orderId, ['customFields' => ['order-list' => $orderListTable]]);

        return new Response();
    }

    public function iframeOrderList(Context $context): View
    {
        
        //Gets the data for the order list.
        $orderListConfiguration = $this->orderListService->getOrderListConfigurationForAllOpenOrders($context);

        //Outputs the order list to the user.
        return view('order.order-list', ['orderListConfiguration' => $orderListConfiguration]);
    }

    public function addOrderListToExistingOrder(Context $context, AppAction $action): Response
    {
        $eventData = $action->getData();
        $orderId = $eventData->getIds()[0];

        //Gets the order list data.
        $orderListConfiguration = $this->orderListService->getOrderListConfigurationFromOrderId($context, $orderId);

        //Gets the order list table as plain html.
        $orderListTable = view('order.order-list-table', ['orderListConfiguration' => $orderListConfiguration])->render();

        //Updates the existing order with the order list and the deep link to the order.
        $this->orderListService->updateOrder($context, $orderId, ['customFields' => ['order-list' => $orderListTable]]);

        return new Response();
    }
}
