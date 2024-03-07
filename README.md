# Php Utility Traits for enum

このライブラリは列挙型をより快適に扱うための特性ライブラリです。

利用にあたっての最小バージョンはPHP 8.1.0からになります。

## NameFrom特性

`NameFromTrait` を使用することで、`name`から`Enumインスタンス`を簡単に引けるようにします。

なお、PHP8.3からは `TestSuitBackedEnum::{'Hearts'}` とした形式でもアクセスできるようになります。

### sample

```php
use putraits\enums\traits\NameFrom\NameFromInterface;
use putraits\enums\traits\NameFrom\NameFromTrait;

enum TestSuitBackedEnum: string implements NameFromInterface
{
    use NameFromTrait;

    case Hearts   = 'H';
    case Diamonds = 'D';
    case Clubs    = 'C';
    case Spades   = 'S';
}

var_dump(TestSuitBackedEnum::tryNameFrom('Hearts')); // enum(TestSuitBackedEnum::Hearts)
```
