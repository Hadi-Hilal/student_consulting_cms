<?php

namespace Modules\Settings\Models;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{

    static public $settings = null;
    public $timestamps = false;
    protected $fillable = [
        'key',
        'value'
    ];

    static function get(string $key, $default = null)
    {
        if (empty(self::$settings)) {
            self::$settings = self::all();
        }
        $model = self::$settings
            ->firstWhere('key', $key);
        if (empty($model)) {
            if (empty($default)) {
                return false;
            }
            return $default;
        }

        return $model->value;
    }

    static function set(string $key, $value)
    {
        if (empty(self::$settings)) {
            self::$settings = self::all();
        }
        if ($value) {
            $model = self::$settings
                ->firstWhere('key', $key);

            if ($model === null) {
                $model = self::create([
                    'key' => $key,
                    'value' => $value
                ]);
                self::$settings->push($model);
            } else {
                $model->update(compact('value'));
            }
            return true;
        }
        return false;

    }
}
