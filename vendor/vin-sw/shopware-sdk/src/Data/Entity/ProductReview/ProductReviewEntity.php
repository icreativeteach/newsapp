<?php declare(strict_types=1);
namespace Vin\ShopwareSdk\Data\Entity\ProductReview;

use Vin\ShopwareSdk\Data\Entity\Product\ProductEntity;
use Vin\ShopwareSdk\Data\Entity\Customer\CustomerEntity;
use Vin\ShopwareSdk\Data\Entity\SalesChannel\SalesChannelEntity;
use Vin\ShopwareSdk\Data\Entity\Language\LanguageEntity;
use Vin\ShopwareSdk\Data\Entity\Entity;

/**
 * Shopware Entity Mapping Class
 *
 * This class is generated dynamically following SW entities schema
 */
class ProductReviewEntity extends Entity
{
    public ?string $productId = null;

    public ?string $productVersionId = null;

    public ?string $customerId = null;

    public ?string $salesChannelId = null;

    public ?string $languageId = null;

    public ?string $externalUser = null;

    public ?string $externalEmail = null;

    public ?string $title = null;

    public ?string $content = null;

    public ?float $points = null;

    public ?bool $status = null;

    public ?string $comment = null;

    public ?ProductEntity $product = null;

    public ?CustomerEntity $customer = null;

    public ?SalesChannelEntity $salesChannel = null;

    public ?LanguageEntity $language = null;
}
