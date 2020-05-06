<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Status extends Model
{
    //

    public static function getOptions($statuses = null) {
        $options = [];

        if ($statuses === null) {
            $statuses = self::all();
        }

        foreach ($statuses as $status) {
            array_push($options, $option = [
                'id' => $status->id,
                'value' => $status->value,
                'name' => __('inputs.statuses.'.$status->value.'.name'),
                'icon' => __('inputs.statuses.'.$status->value.'.icon'),
            ]);
        }

        return $options;
    }

    public static function getByValue($value) {
        $status = self::where('value', $value);

        if ($status !== null) {
            return $status->first();
        }

        return null;
    }
}
