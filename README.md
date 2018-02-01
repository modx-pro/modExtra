## Quick start

* Install MODX Revolution

* Upload this package into the `Extras` directory in the root of site

* You need to rename it to `anyOtherName` your package, so enter into SSH console and run
```
php ~/www/Extras/modExtra/rename_it.php anyOtherName
```
*path on your site may differs*

* Then install it on dev site
```
php ~/www/Extras/anyOtherName/_build/build.php
``` 

## Settings

See `_build/config.inc.php` for editable package options.

All resolvers and elements are in `_build` path. All files that begins not from `.` or `_` will be added automatically. 

If you will add a new type of element, you will need to add the method with that name into `build.php` script as well.

## Build and download

You can build package at any time by opening `http://dev.site.com/Extras/anyOtherName/_build/build.php`

If you want to download built package - just add `?download=1` to the address.

## Example deploy settings

[![](https://file.modx.pro/files/3/a/b/3ab2753b9e8b6c09a4ca0da819db37b6s.jpg)](https://file.modx.pro/files/3/a/b/3ab2753b9e8b6c09a4ca0da819db37b6.png) [![](https://file.modx.pro/files/c/1/a/c1afbb8988ab358a0b400cdcdb0391d4s.jpg)](https://file.modx.pro/files/c/1/a/c1afbb8988ab358a0b400cdcdb0391d4.png)
