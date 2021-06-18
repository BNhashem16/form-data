# FormData Package

Make your database columns available in your blade view effortlessly. 

[![Latest Version on Packagist](https://img.shields.io/packagist/v/bnhashem/form-data.svg?style=flat-square)](https://packagist.org/packages/bnhashem/form-data)
[![Total Downloads](https://img.shields.io/packagist/dt/bnhashem/form-data.svg?style=flat-square)](https://packagist.org/packages/bnhashem/form-data)


## Installation

You can install the package via composer:

```bash
composer require bnhashem/form-data
```

## Features

- Incredibly easy to use.
- Help use signle form for create and update.
- The values name are the same as the database columns name, save you calling `old` conditionally in the view.

```php
use Bnhashem\FormData\FormData;

$formData = new FormData();
```

## Usage

## Create

```php
use Bnhashem\FormData\FormData;

/**
 * Show the form for creating a new resource.
 *
 * @return \Illuminate\Http\Response
 */
public function create()
{
    return view('your.custom.view', FormData::old(new Model()));
}
```

## Edit 

```php
use Bnhashem\FormData\FormData;

/**
 * Show the form for editing the specified resource.
 *
 * @param  \App\Models\Model $model
 * @return \Illuminate\Http\Response
 */

public function edit(Model $model)
{
    return view('your.custom.view', FormData::edit($model);
}
```

# Example

```php
/**
 * Run the migrations.
 *
 * @return void
 */
public function up()
{
    Schema::create('posts', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('content');
        $table->timestamps();
    });
}
```

## We will try to store a new post

```php
use Bnhashem\FormData\FormData;

public function create()
{
    return view('your.custom.view', FormData::old(new Post()));
}
```

Mind that the name of variable must be the same as the column name value in the database
```html
<div class="form-group col-6">
    <label>{{ __('Name') }}</label>
    <input type="text" name="name" value="{{ $name }}">
    @error('name') <span class="erorr">{{ $message }}</span> @enderror
</div>
```

## We will try to edit a post

```php
use Bnhashem\FormData\FormData;

public function edit(Post $post)
{
    return view('your.custom.view', FormData::edit($post));
}
```


```html
<div class="form-group col-6">
    <label>{{ __('Name') }}</label>
    <input type="text" name="name" value="{{ $name }}">
    @error('name') <span class="erorr">{{ $message }}</span> @enderror
</div>
```

# Json Columns
> Somtimes Column have many values and unique keys, in this case We will do the following: 

#### posts table migration
```php
public function up()
{
    Schema::create('posts', function (Blueprint $table) {
        $table->id();
        $table->json('name');
        $table->json('content');
    });
}
```

#### Post Model
Add static property ``$JSONCOLUMNS``, with column names and the the keys that you want to add in the blade.


```php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    public static $JSONCOLUMNS = [
        'name' => ['en', 'ar'], 
        'content' => ['ar', 'en']
        ];

}

```
#### Fetch Data From Json columns in blade

```html
<div class="form-group col-6">
    <label>{{ __('English Name') }}</label>
    <input type="text" name="name['en']" value="{{ $name['en'] }}">
    @error('name.en') <span class="erorr">{{ $message }}</span> @enderror
</div>


<div class="form-group col-6">
    <label>{{ __('Arabic Name') }}</label>
    <input type="text" name="name['ar']" value="{{ $name['ar'] }}">
    @error('name.ar') <span class="erorr">{{ $message }}</span> @enderror
</div>
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Ahmed Mohamed Hashem](https://github.com/BNhashem16)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
