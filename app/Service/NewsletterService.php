<?php

namespace App\Service;

use Vin\ShopwareSdk\Data\Context;
use Vin\ShopwareSdk\Data\Criteria;
use Vin\ShopwareSdk\Data\Entity\NewsletterRecipient\NewsletterRecipientDefinition;
use Vin\ShopwareSdk\Data\Entity\NewsletterRecipient\NumberRangeTranslationEntity;
use Vin\ShopwareSdk\Data\Entity\OrderLineItem\OrderLineItemEntity;
use Vin\ShopwareSdk\Data\FieldSorting;
use Vin\ShopwareSdk\Data\Filter\EqualsFilter;
use Vin\ShopwareSdk\Factory\RepositoryFactory;

class NewsletterService
{

   //Generates the order list table data from all open orders.
    public function getOrderListConfigurationForAllOpenOrders(Context $context): array
    {
        $newsletterRepository = RepositoryFactory::create(NewsletterRecipientDefinition::ENTITY_NAME);
        //dd($newsletterRepository);
        $criteria = new Criteria();
        $newsletterResult = $newsletterRepository->search($criteria, $context);
        $recipients = [];

        //Format the line items
        /** @var OrderEntity $order */
        foreach ($newsletterResult->getEntities() as $recipient) {
            //dd($recipient);

            array_push($recipients, $recipient);
        }
        return $recipients;
    }
}
