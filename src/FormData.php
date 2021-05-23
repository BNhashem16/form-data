<?php

namespace Bnhashem\FormData;

use Illuminate\Support\Facades\Schema;

    function data($model)
    {
        $route = request()->route()->getName();

        $bindKey = $model::$bindKey ?? 'id';

        if (request()->routeIs('*.edit')) {
            $route = str_replace('edit', 'update', $route);
            $route = route($route, $model->$bindKey);
        } else {
            $route = str_replace('create', 'store', $route);
            $route = route($route);
        }

        $columns = Schema::getColumnListing(($model)->getTable());
        foreach ($columns as $column) {
            $data[$column] = $model->id == null ? old($column) : $model->$column;
        }

        $data['route'] = $route;

        return $data;
    }
