<?php declare(strict_types=1);
namespace Vin\ShopwareSdk\Data\Entity\PropertyGroupOption;

use Vin\ShopwareSdk\Data\Entity\Media\MediaEntity;
use Vin\ShopwareSdk\Data\Entity\PropertyGroup\PropertyGroupEntity;
use Vin\ShopwareSdk\Data\Entity\PropertyGroupOptionTranslation\PropertyGroupOptionTranslationCollection;
use Vin\ShopwareSdk\Data\Entity\ProductConfiguratorSetting\ProductConfiguratorSettingCollection;
use Vin\ShopwareSdk\Data\Entity\Product\ProductCollection;
use Vin\ShopwareSdk\Data\Entity\Entity;

/**
 * Shopware Entity Mapping Class
 *
 * This class is generated dynamically following SW entities schema
 */
class PropertyGroupOptionEntity extends Entity
{
    public ?string $groupId = null;

    public ?string $name = null;

    public ?int $position = null;

    public ?string $colorHexCode = null;

    public ?string $mediaId = null;

    public ?MediaEntity $media = null;

    public ?PropertyGroupEntity $group = null;

    public ?PropertyGroupOptionTranslationCollection $translations = null;

    public ?ProductConfiguratorSettingCollection $productConfiguratorSettings = null;

    public ?ProductCollection $productProperties = null;

    public ?ProductCollection $productOptions = null;
}
