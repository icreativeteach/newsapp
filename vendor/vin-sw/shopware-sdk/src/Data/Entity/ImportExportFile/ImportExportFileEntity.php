<?php declare(strict_types=1);
namespace Vin\ShopwareSdk\Data\Entity\ImportExportFile;

use Vin\ShopwareSdk\Data\Entity\ImportExportLog\ImportExportLogEntity;
use Vin\ShopwareSdk\Data\Entity\Entity;

/**
 * Shopware Entity Mapping Class
 *
 * This class is generated dynamically following SW entities schema
 */
class ImportExportFileEntity extends Entity
{
    public ?string $originalName = null;

    public ?string $path = null;

    public ?\DateTimeInterface$expireDate = null;

    public ?int $size = null;

    public ?ImportExportLogEntity $log = null;

    public ?string $accessToken = null;
}
