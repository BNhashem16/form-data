<?php

namespace Bnhashem\FormData;

use Illuminate\Support\Facades\Schema;

class FormData
{
    public static function old($model): array
    {
        $columns = Schema::getColumnListing(($model)->getTable());
        $data = [];

        foreach ($columns as $column) {
            $data[$column] = old($column);

            if (array_key_exists($column, $model::$JSONCOLUMNS)) {
                // $model::$JSONCOLUMNS[$column] = collect(['ar' => old($column), 'en' => old($column)]);

                $data[$column] = $model::$JSONCOLUMNS[$column];
                // $data[$column] = $model::$JSONCOLUMNS[$column];
            }
        }
        dd($data);
        dd($model::$JSONCOLUMNS[$column]);


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
