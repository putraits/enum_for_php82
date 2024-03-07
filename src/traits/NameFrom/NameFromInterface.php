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

namespace putraits\enums\traits\NameFrom;

/**
 * 列挙型向けtryNameFromインターフェース
 */
interface NameFromInterface
{
    /**
     * 名前を列挙型にマップします。
     *
     * @param  string      $name 名前
     * @return null|object 列挙型
     */
    public static function tryNameFrom(string $name): ?self;
}
