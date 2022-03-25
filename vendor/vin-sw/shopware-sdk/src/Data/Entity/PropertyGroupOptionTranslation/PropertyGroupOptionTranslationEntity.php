<?php declare(strict_types=1);
namespace Vin\ShopwareSdk\Data\Entity\PropertyGroupOptionTranslation;

use Vin\ShopwareSdk\Data\Entity\PropertyGroupOption\PropertyGroupOptionEntity;
use Vin\ShopwareSdk\Data\Entity\Language\LanguageEntity;
use Vin\ShopwareSdk\Data\Entity\Entity;

/**
 * Shopware Entity Mapping Class
 *
 * This class is generated dynamically following SW entities schema
 */
class PropertyGroupOptionTranslationEntity extends Entity
{
    public ?string $name = null;

    public ?int $position = null;

    public ?string $propertyGroupOptionId = null;

    public ?string $languageId = null;

    public ?PropertyGroupOptionEntity $propertyGroupOption = null;

    public ?LanguageEntity $language = null;
}
