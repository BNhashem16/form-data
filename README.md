# FormData Package

[![Latest Version on Packagist](https://img.shields.io/packagist/v/bnhashem/form-data.svg?style=flat-square)](https://packagist.org/packages/bnhashem/form-data)
[![Total Downloads](https://img.shields.io/packagist/dt/bnhashem/form-data.svg?style=flat-square)](https://packagist.org/packages/bnhashem/form-data)


## Installation

You can install the package via composer:

```bash
composer require bnhashem/form-data
```

## Usage

When you store data in a certain column, and it's found that there are some wrong or incorrect entries (validation failed), the browser will return you to the form with the previous entries you entered.

## What are the features of this package?

- It is easy to make one form of editing and saving into one blade.
- The values name are the same as the database columns name, so that it helps more to write clean code.

```php
use Bnhashem\FormData\FormData;

$formData = new FormData();
```

## Create Function

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

## Edit Function

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
        return view('your.custom.view', FormData::edit($model));
    }
```

## Example

you project contain Post Model thats mean you already have posts table, We will imagine that the posts table will be like this 

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

Be Focus here, The name of value must be the same as the column name value in the database
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

Be Focus here, The name of value must be the same as the column name value in the database
```html
<div class="form-group col-6">
    <label>{{ __('Name') }}</label>
    <input type="text" name="name" value="{{ $name }}">
    @error('name') <span class="erorr">{{ $message }}</span> @enderror
</div>
```


## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Ahmed Mohamed Salah Hashem](https://github.com/BNhashem16)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
