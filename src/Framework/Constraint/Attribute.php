<?php declare(strict_types=1);
/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace PHPUnit\Framework\Constraint;

final class Attribute extends Composite
{
    /**
     * @var string
     */
    private $attributeName;

    public function __construct(Constraint $constraint, string $attributeName)
    {
        parent::__construct($constraint);

        $this->attributeName = $attributeName;
    }

    /**
     * Returns a string representation of the constraint.
     */
    public function toString(): string
    {
        return 'attribute "' . $this->attributeName . '" ' . $this->innerConstraint()->toString();
    }

    /**
     * Returns the description of the failure
     *
     * The beginning of failure messages is "Failed asserting that" in most
     * cases. This method should return the second part of that sentence.
     *
     * @param mixed $other evaluated value or object
     */
    protected function failureDescription($other): string
    {
        return $this->toString();
    }
}
