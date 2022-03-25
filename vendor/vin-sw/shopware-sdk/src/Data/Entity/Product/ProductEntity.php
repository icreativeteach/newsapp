<?php declare(strict_types=1);
namespace Vin\ShopwareSdk\Data\Entity\Product;

use Vin\ShopwareSdk\Data\Entity\DeliveryTime\DeliveryTimeEntity;
use Vin\ShopwareSdk\Data\Entity\Tax\TaxEntity;
use Vin\ShopwareSdk\Data\Entity\ProductManufacturer\ProductManufacturerEntity;
use Vin\ShopwareSdk\Data\Entity\Unit\UnitEntity;
use Vin\ShopwareSdk\Data\Entity\ProductMedia\ProductMediaEntity;
use Vin\ShopwareSdk\Data\Entity\ProductFeatureSet\ProductFeatureSetEntity;
use Vin\ShopwareSdk\Data\Entity\CmsPage\CmsPageEntity;
use Vin\ShopwareSdk\Data\Entity\ProductPrice\ProductPriceCollection;
use Vin\ShopwareSdk\Data\Entity\ProductMedia\ProductMediaCollection;
use Vin\ShopwareSdk\Data\Entity\ProductCrossSelling\ProductCrossSellingCollection;
use Vin\ShopwareSdk\Data\Entity\ProductCrossSellingAssignedProducts\ProductCrossSellingAssignedProductsCollection;
use Vin\ShopwareSdk\Data\Entity\ProductConfiguratorSetting\ProductConfiguratorSettingCollection;
use Vin\ShopwareSdk\Data\Entity\ProductVisibility\ProductVisibilityCollection;
use Vin\ShopwareSdk\Data\Entity\ProductSearchKeyword\ProductSearchKeywordCollection;
use Vin\ShopwareSdk\Data\Entity\ProductReview\ProductReviewCollection;
use Vin\ShopwareSdk\Data\Entity\MainCategory\MainCategoryCollection;
use Vin\ShopwareSdk\Data\Entity\SeoUrl\SeoUrlCollection;
use Vin\ShopwareSdk\Data\Entity\OrderLineItem\OrderLineItemCollection;
use Vin\ShopwareSdk\Data\Entity\CustomerWishlistProduct\CustomerWishlistProductCollection;
use Vin\ShopwareSdk\Data\Entity\PropertyGroupOption\PropertyGroupOptionCollection;
use Vin\ShopwareSdk\Data\Entity\ProductStream\ProductStreamCollection;
use Vin\ShopwareSdk\Data\Entity\Category\CategoryCollection;
use Vin\ShopwareSdk\Data\Entity\Tag\TagCollection;
use Vin\ShopwareSdk\Data\Entity\CustomFieldSet\CustomFieldSetCollection;
use Vin\ShopwareSdk\Data\Entity\ProductTranslation\ProductTranslationCollection;
use Vin\ShopwareSdk\Data\Entity\Entity;

/**
 * Shopware Entity Mapping Class
 *
 * This class is generated dynamically following SW entities schema
 */
class ProductEntity extends Entity
{
    public ?string $parentId = null;

    public ?string $parentVersionId = null;

    public ?string $manufacturerId = null;

    public ?string $productManufacturerVersionId = null;

    public ?string $unitId = null;

    public ?string $taxId = null;

    public ?string $coverId = null;

    public ?string $productMediaVersionId = null;

    public ?string $deliveryTimeId = null;

    public ?string $featureSetId = null;

    public ?string $canonicalProductId = null;

    public ?string $cmsPageId = null;

    public ?string $cmsPageVersionId = null;

    public ?array $price = null;

    public ?string $productNumber = null;

    public ?int $stock = null;

    public ?int $restockTime = null;

    public ?int $autoIncrement = null;

    public ?bool $active = null;

    public ?int $availableStock = null;

    public ?bool $available = null;

    public ?bool $isCloseout = null;

    public ?array $variation = null;

    public ?string $displayGroup = null;

    public ?array $configuratorGroupConfig = null;

    public ?string $mainVariantId = null;

    public ?array $variantRestrictions = null;

    public ?string $manufacturerNumber = null;

    public ?string $ean = null;

    public ?int $purchaseSteps = null;

    public ?int $maxPurchase = null;

    public ?int $minPurchase = null;

    public ?float $purchaseUnit = null;

    public ?float $referenceUnit = null;

    public ?bool $shippingFree = null;

    public ?array $purchasePrices = null;

    public ?bool $markAsTopseller = null;

    public ?float $weight = null;

    public ?float $width = null;

    public ?float $height = null;

    public ?float $length = null;

    public ?\DateTimeInterface$releaseDate = null;

    public ?float $ratingAverage = null;

    public ?array $categoryTree = null;

    public ?array $propertyIds = null;

    public ?array $optionIds = null;

    public ?array $streamIds = null;

    public ?array $tagIds = null;

    public ?array $categoryIds = null;

    public ?int $childCount = null;

    public ?bool $customFieldSetSelectionActive = null;

    public ?int $sales = null;

    public ?string $metaDescription = null;

    public ?string $name = null;

    public ?string $keywords = null;

    public ?string $description = null;

    public ?string $metaTitle = null;

    public ?string $packUnit = null;

    public ?string $packUnitPlural = null;

    public ?array $slotConfig = null;

    public ?array $customSearchKeywords = null;

    public ?ProductEntity $parent = null;

    public ?ProductCollection $children = null;

    public ?DeliveryTimeEntity $deliveryTime = null;

    public ?TaxEntity $tax = null;

    public ?ProductManufacturerEntity $manufacturer = null;

    public ?UnitEntity $unit = null;

    public ?ProductMediaEntity $cover = null;

    public ?ProductFeatureSetEntity $featureSet = null;

    public ?CmsPageEntity $cmsPage = null;

    public ?ProductEntity $canonicalProduct = null;

    public ?ProductPriceCollection $prices = null;

    public ?ProductMediaCollection $media = null;

    public ?ProductCrossSellingCollection $crossSellings = null;

    public ?ProductCrossSellingAssignedProductsCollection $crossSellingAssignedProducts = null;

    public ?ProductConfiguratorSettingCollection $configuratorSettings = null;

    public ?ProductVisibilityCollection $visibilities = null;

    public ?ProductSearchKeywordCollection $searchKeywords = null;

    public ?ProductReviewCollection $productReviews = null;

    public ?MainCategoryCollection $mainCategories = null;

    public ?SeoUrlCollection $seoUrls = null;

    public ?OrderLineItemCollection $orderLineItems = null;

    public ?CustomerWishlistProductCollection $wishlists = null;

    public ?PropertyGroupOptionCollection $options = null;

    public ?PropertyGroupOptionCollection $properties = null;

    public ?CategoryCollection $categories = null;

    public ?ProductStreamCollection $streams = null;

    public ?CategoryCollection $categoriesRo = null;

    public ?TagCollection $tags = null;

    public ?CustomFieldSetCollection $customFieldSets = null;

    public ?ProductTranslationCollection $translations = null;

    public ?array $cheapestPrice = null;
}
