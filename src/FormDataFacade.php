<?php

namespace Bnhashem\FormData;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Bnhashem\FormData\FormData
 */
class FormDataFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'form-data';
    }
}
