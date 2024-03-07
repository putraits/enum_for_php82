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

namespace putraits\enums\tests\utilities;

/**
 * @internal
 */
abstract class AbstractTestCase extends \PHPUnit\Framework\TestCase
{
    public function setUp(): void
    {
        \set_error_handler(function($errno, $errstr, $errfile, $errline): void {
            throw new \RuntimeException(\sprintf('Error #%s: %s on %s(%s)', $errno, $errstr, $errfile, $errline));
        });
    }

    public function tearDown(): void
    {
        \restore_error_handler();
    }
}
