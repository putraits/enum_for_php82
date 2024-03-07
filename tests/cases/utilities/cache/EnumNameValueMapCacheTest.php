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

namespace putraits\enums\tests\cases\utilities\cache;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\RunTestsInSeparateProcesses;
use PHPUnit\Framework\Attributes\Test;
use putraits\enums\tests\mocks\enums\TestDefaultSuitBackedEnum;
use putraits\enums\tests\mocks\enums\TestDefaultSuitEnum;
use putraits\enums\tests\mocks\enums\TestSuitEnum;
use putraits\enums\tests\utilities\AbstractTestCase;
use putraits\enums\utilities\cache\EnumNameValueMapCache;

/**
 * 列挙型の名前 => 列挙型変換支援キャッシュクラス
 * @internal
 */
#[CoversClass(EnumNameValueMapCache::class)]
#[RunTestsInSeparateProcesses]
class EnumNameValueMapCacheTest extends AbstractTestCase
{
    #[Test]
    public function hasEnum(): void
    {
        // ==============================================
        $enum_class = TestDefaultSuitEnum::class;
        $this->assertFalse(EnumNameValueMapCache::hasEnum($enum_class));
        EnumNameValueMapCache::get($enum_class, 'Clubs');
        $this->assertTrue(EnumNameValueMapCache::hasEnum($enum_class));

        // ==============================================
        $enum_class = TestDefaultSuitBackedEnum::class;
        EnumNameValueMapCache::set($enum_class);
        $this->assertTrue(EnumNameValueMapCache::hasEnum($enum_class));

        // ==============================================
        $enum_class = TestSuitEnum::class;
        $this->assertFalse(EnumNameValueMapCache::hasEnum($enum_class));
        EnumNameValueMapCache::has($enum_class, 'Clubs');
        $this->assertTrue(EnumNameValueMapCache::hasEnum($enum_class));
    }

    #[Test]
    public function set(): void
    {
        // ==============================================
        $enum_class = TestDefaultSuitBackedEnum::class;

        $this->assertSame(EnumNameValueMapCache::class, EnumNameValueMapCache::set($enum_class));

        foreach ($enum_class::cases() as $enum) {
            $this->assertSame($enum, EnumNameValueMapCache::get($enum_class, $enum->name));
        }
    }

    #[Test]
    public function has(): void
    {
        // ==============================================
        $enum_class = TestDefaultSuitBackedEnum::class;

        foreach ($enum_class::cases() as $enum) {
            $this->assertTrue(EnumNameValueMapCache::has($enum_class, $enum->name));
        }

        $this->assertFalse(EnumNameValueMapCache::has($enum_class, 'aaaaaaaaa'));
    }

    #[Test]
    public function get(): void
    {
        // ==============================================
        $enum_class = TestDefaultSuitBackedEnum::class;

        foreach ($enum_class::cases() as $enum) {
            $this->assertSame($enum, EnumNameValueMapCache::get($enum_class, $enum->name));
        }

        $this->assertNull(EnumNameValueMapCache::get($enum_class, 'aaaaaaaaa'));
    }
}
