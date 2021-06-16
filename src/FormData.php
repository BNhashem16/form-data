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

            if (self::jsonColumnsIsset($model)) {
                self::jsonColumns($column, $model);
            }
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

    public static function jsonColumns(string $column, object $model)
    {
        if (array_key_exists($column, $model::$JSONCOLUMNS)) {
            $json_column_keys = array_flip($model::$JSONCOLUMNS[$column]);

            foreach ($json_column_keys as $json_column_key) {
                $data[$column][$json_column_key] = old($column.$json_column_key);
            }

            return $data;
        }
    }

    public static function jsonColumnsIsset($model): bool
    {
        return isset($model::$JSONCOLUMNS) ? true : false;
    }
}
