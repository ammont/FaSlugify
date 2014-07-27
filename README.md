ammont/fa-slugify
=============

> Converts a string into a slug with persian/farsi support.


Features
--------

- Removes all special characters from a string.
- Provides custom replacements for Persian/Farsi.
- PSR-4 compatible.
- Compatible with PHP >= 5.3.


Installation
------------

You can install ammont/fa-slugify through [Composer](https://getcomposer.org):

```shell
$ composer require ammont/fa-slugify:dev-master
```


Usage
-----

Generate a slug:

```php
use Ammont\FaSlugify\FaSlugify;

$slugify = new FaSlugify();
echo $slugify->slugify('سلام دنیا'); // سلام-دنیا
```

You can also change the seperator used by `FaSlugify`:

```php
echo $slugify->slugify('سلام دنیا', '_'); // سلام_دنیا
```

You can enable translation to generate standard latin (pinglish) slugs. (it's in developement)

```php
$slugify = new FaSlugify(true);// pass true to enable translation

echo $slugify->slugify('سلام دنیا');// salam-donya
```


Changelog
---------

### Version 0.1 (27 July 2014)


Authors
-------

- [Amir Montazer](https://github.com/ammont)


License
-------

The MIT License (MIT)

Copyright (c) 2012-2014 Amir Montazer

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated
documentation files (the "Software"), to deal in the Software without restriction, including without limitation the
rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit
persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the
Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE
WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR
COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR
OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.