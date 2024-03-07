<?php
/**
 *  ___ _  _ _____ ___  __  _ _____
 * | _,\ || |_   _| _ \/  \| |_   _|
 * | v_/ \/ | | | | v / /\ | | | |
 * |_|  \__/  |_| |_|_\_||_|_| |_|
 *
 * @category    putrait
 * @package     putrait
 * @author      wakaba <wakabadou@gmail.com>
 * @copyright   Copyright (c) @2023  Wakabadou (http://www.wakabadou.net/) / Project ICKX (https://ickx.jp/). All rights reserved.
 * @license     http://opensource.org/licenses/MIT The MIT License.
 *              This software is released under the MIT License.
 * @varsion     1.0.0
 */

declare(strict_types=1);

namespace putraits\enums\tests\cases\traits\NameFrom;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\RunTestsInSeparateProcesses;
use PHPUnit\Framework\Attributes\Test;
use putraits\enums\tests\mocks\enums\TestSuitBackedEnum;
use putraits\enums\tests\mocks\enums\TestSuitEnum;
use putraits\enums\tests\utilities\AbstractTestCase;
use putraits\enums\traits\NameFrom\NameFromInterface;
use putraits\enums\traits\NameFrom\NameFromTrait;

/**
 * 列挙型向けtryNameFrom
 * @internal
 */
#[CoversClass(NameFromTrait::class)]
#[CoversClass(NameFromInterface::class)]
#[RunTestsInSeparateProcesses]
class NameFromTest extends AbstractTestCase
{
    public static function tryNameFromDataProvider(): \Generator
    {
        yield [TestSuitEnum::class];

        yield [TestSuitBackedEnum::class];
    }

    #[Test]
    #[DataProvider('tryNameFromDataProvider')]
    public function tryNameFrom(string $enum_class): void
    {
        $this->assertSame($enum_class::Hearts, $enum_class::tryNameFrom('Hearts'));
        $this->assertSame($enum_class::Diamonds, $enum_class::tryNameFrom('Diamonds'));
        $this->assertSame($enum_class::Clubs, $enum_class::tryNameFrom('Clubs'));
        $this->assertSame($enum_class::Spades, $enum_class::tryNameFrom('Spades'));

        $this->assertNull($enum_class::tryNameFrom('BigOne'));
    }
}
