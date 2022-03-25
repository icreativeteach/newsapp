<?php declare(strict_types=1);
namespace Vin\ShopwareSdk\Data\Entity\ProductStreamTranslation;

use Vin\ShopwareSdk\Data\Entity\ProductStream\ProductStreamEntity;
use Vin\ShopwareSdk\Data\Entity\Language\LanguageEntity;
use Vin\ShopwareSdk\Data\Entity\Entity;

/**
 * Shopware Entity Mapping Class
 *
 * This class is generated dynamically following SW entities schema
 */
class ProductStreamTranslationEntity extends Entity
{
    public ?string $name = null;

    public ?string $description = null;

    public ?string $productStreamId = null;

    public ?string $languageId = null;

    public ?ProductStreamEntity $productStream = null;

    public ?LanguageEntity $language = null;
}
