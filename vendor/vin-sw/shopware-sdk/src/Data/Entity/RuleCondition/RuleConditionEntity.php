<?php declare(strict_types=1);
namespace Vin\ShopwareSdk\Data\Entity\RuleCondition;

use Vin\ShopwareSdk\Data\Entity\Rule\RuleEntity;
use Vin\ShopwareSdk\Data\Entity\Entity;

/**
 * Shopware Entity Mapping Class
 *
 * This class is generated dynamically following SW entities schema
 */
class RuleConditionEntity extends Entity
{
    public ?string $type = null;

    public ?string $ruleId = null;

    public ?string $parentId = null;

    public ?array $value = null;

    public ?int $position = null;

    public ?RuleEntity $rule = null;

    public ?RuleConditionEntity $parent = null;

    public ?RuleConditionCollection $children = null;
}
