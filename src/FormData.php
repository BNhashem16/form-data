<?php

namespace Bnhashem\FormData;

use Illuminate\Support\Facades\Schema;

class FormData
{
    public static function old($model): array
    {
        $columns = Schema::getColumnListing(($model)->getTable());
        foreach ($columns as $column) {
            $data[$column] = old($column);
        }

        return $data;
    }

    public static function edit($model): array
    {
        $columns = Schema::getColumnListing(($model)->getTable());
        foreach ($columns as $column) {
            $data[$column] = $model->$column;
        }

        return $data;
    }
}
