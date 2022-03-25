<?php declare(strict_types=1);
namespace Vin\ShopwareSdk\Data\Entity\MailHeaderFooterTranslation;

use Vin\ShopwareSdk\Data\Entity\MailHeaderFooter\MailHeaderFooterEntity;
use Vin\ShopwareSdk\Data\Entity\Language\LanguageEntity;
use Vin\ShopwareSdk\Data\Entity\Entity;

/**
 * Shopware Entity Mapping Class
 *
 * This class is generated dynamically following SW entities schema
 */
class MailHeaderFooterTranslationEntity extends Entity
{
    public ?string $name = null;

    public ?string $description = null;

    public ?string $headerHtml = null;

    public ?string $headerPlain = null;

    public ?string $footerHtml = null;

    public ?string $footerPlain = null;

    public ?string $mailHeaderFooterId = null;

    public ?string $languageId = null;

    public ?MailHeaderFooterEntity $mailHeaderFooter = null;

    public ?LanguageEntity $language = null;
}
