<?php

namespace App\Traits;

trait HasSnowflake
{
    protected static function bootHasSnowflake()
    {
        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                $snowflake = new \Godruoyi\Snowflake\Snowflake(1, 1);
                $model->{$model->getKeyName()} = $snowflake->id();
            }
        });
    }
}
