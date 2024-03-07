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

namespace putraits\enums\utilities\cache;

/**
 * 列挙型の名前 => 列挙型変換支援キャッシュクラス
 */
final class EnumNameValueMapCache
{
    /**
     * @var array 列挙型の名前 => 列挙型変換マップ
     */
    private static array $nameValueMapCache = [];

    /**
     * 指定した列挙型がキャッシュマップにあるかどうかを返します。
     *
     * @param  string $enum 列挙型
     * @return bool   指定した列挙型がキャッシュマップにあるかどうか
     */
    public static function hasEnum(string $enum): bool
    {
        return \array_key_exists($enum, self::$nameValueMapCache);
    }

    /**
     * 指定した列挙型を名前 => 列挙型変換マップに登録します。
     *
     * @param  object $enum 列挙型
     * @return string このクラスパス
     */
    public static function set(string $enum): string
    {
        foreach ($enum::cases() as $enum) {
            self::$nameValueMapCache[$enum::class][$enum->name]    = $enum;
        }

        return self::class;
    }

    /**
     * 指定した列挙型で指定した名前があるかどうかを返します。
     *
     * @param  string $enum 列挙型
     * @param  string $name 名前
     * @return bool   指定した列挙型で指定した名前があるかどうか
     */
    public static function has(string $enum, string $name): bool
    {
        if (!\array_key_exists($enum, self::$nameValueMapCache)) {
            self::set($enum);
        }

        return isset(self::$nameValueMapCache[$enum][$name]);
    }

    /**
     * 指定した列挙型で指定した名前が合致するものを返します。
     *
     * @param  string      $enum 列挙型
     * @param  strign      $name 名前
     * @return null|object 列挙型
     */
    public static function get(string $enum, string $name): ?object
    {
        if (!\array_key_exists($enum, self::$nameValueMapCache)) {
            self::set($enum);
        }

        return self::$nameValueMapCache[$enum][$name] ?? null;
    }
}
