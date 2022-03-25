<?php declare(strict_types=1);
namespace Vin\ShopwareSdk\Data\Entity\NewsletterRecipientTag;

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
class NewsletterRecipientTagDefinition implements EntityDefinition
{
    public const ENTITY_NAME = 'newsletter_recipient_tag';

    public function getEntityName() : string
    {
        return self::ENTITY_NAME;
    }

    public function getEntityClass() : string
    {
        return NewsletterRecipientTagEntity::class;
    }

    public function getEntityCollection() : string
    {
        return NewsletterRecipientTagCollection::class;
    }

    public function getSchema() : Schema
    {
        return new Schema('newsletter_recipient_tag', new PropertyCollection([
            new Property('newsletterRecipientId', 'uuid', new FlagCollection([new Flag('read_protected', [['Shopware\Core\Framework\Api\Context\AdminApiSource']]), new Flag('primary_key', 1), new Flag('required', 1), ]), []),
            new Property('tagId', 'uuid', new FlagCollection([new Flag('read_protected', [['Shopware\Core\Framework\Api\Context\AdminApiSource']]), new Flag('primary_key', 1), new Flag('required', 1), ]), []),
            new Property('newsletterRecipient', 'association', new FlagCollection([new Flag('read_protected', [['Shopware\Core\Framework\Api\Context\AdminApiSource']]), ]), ['entity' => 'newsletter_recipient', 'referenceField' => 'id', 'localField' => 'newsletterRecipientId', 'relation' => 'many_to_one', ]),
            new Property('tag', 'association', new FlagCollection([new Flag('read_protected', [['Shopware\Core\Framework\Api\Context\AdminApiSource']]), ]), ['entity' => 'tag', 'referenceField' => 'id', 'localField' => 'tagId', 'relation' => 'many_to_one', ]),
        ]));
    }
}
