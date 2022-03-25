<?php declare(strict_types=1);

namespace Vin\ShopwareSdk\Data\Webhook;

use Vin\ShopwareSdk\Data\Struct;

class Source extends Struct
{
    private string $shopUrl;

    private string $shopId;

    private string $appVersion;

    /**
     * Create the event from Event::createFromPayload.
     */
    public function __construct(string $shopUrl, string $shopId, string $appVersion)
    {
        $this->shopUrl = $shopUrl;
        $this->shopId = $shopId;
        $this->appVersion = $appVersion;
    }

    public function getShopUrl(): string
    {
        return $this->shopUrl;
    }

    public function getShopId(): string
    {
        return $this->shopId;
    }

    public function getAppVersion(): string
    {
        return $this->appVersion;
    }
}
