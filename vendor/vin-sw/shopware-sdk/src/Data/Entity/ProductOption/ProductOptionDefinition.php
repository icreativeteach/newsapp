<?php declare(strict_types=1);
namespace Vin\ShopwareSdk\Data\Entity\ProductOption;

use Vin\ShopwareSdk\Data\Entity\EntityDefinition;
use Vin\ShopwareSdk\Data\Schema\PropertyCollection;
use Vin\ShopwareSdk\Data\Schema\FlagCollection;
use Vin\ShopwareSdk\Data\Schema\Property;
use Vin\ShopwareSdk\Data\Schema\Flag;
use Vin\ShopwareSdk\Data\Schema\Schema;

/**
 * Shopware Definition Mapping Class
 *
 * This class is generated dynamically following SW entities schema
 */
class ProductOptionDefinition implements EntityDefinition
{
    public const ENTITY_NAME = 'product_option';

    public function getEntityName() : string
    {
        return self::ENTITY_NAME;
    }

    public function getEntityClass() : string
    {
        return ProductOptionEntity::class;
    }

    public function getEntityCollection() : string
    {
        return ProductOptionCollection::class;
    }

    public function getSchema() : Schema
    {
        return new Schema('product_option', new PropertyCollection([
            new Property('productId', 'uuid', new FlagCollection([new Flag('read_protected', [['Shopware\Core\Framework\Api\Context\AdminApiSource']]), new Flag('primary_key', 1), new Flag('required', 1), ]), []),
            new Property('productVersionId', 'uuid', new FlagCollection([new Flag('read_protected', [['Shopware\Core\Framework\Api\Context\AdminApiSource']]), new Flag('required', 1), ]), []),
            new Property('optionId', 'uuid', new FlagCollection([new Flag('read_protected', [['Shopware\Core\Framework\Api\Context\AdminApiSource']]), new Flag('primary_key', 1), new Flag('required', 1), ]), []),
            new Property('product', 'association', new FlagCollection([new Flag('read_protected', [['Shopware\Core\Framework\Api\Context\AdminApiSource']]), ]), ['entity' => 'product', 'referenceField' => 'id', 'localField' => 'productId', 'relation' => 'many_to_one', ]),
            new Property('option', 'association', new FlagCollection([new Flag('read_protected', [['Shopware\Core\Framework\Api\Context\AdminApiSource']]), ]), ['entity' => 'property_group_option', 'referenceField' => 'id', 'localField' => 'optionId', 'relation' => 'many_to_one', ]),
        ]));
    }
}
