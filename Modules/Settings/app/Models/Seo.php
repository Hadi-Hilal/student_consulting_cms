<?php

namespace Modules\Settings\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Seo extends Model
{
    use HasTranslations;

    static public $seo = null;
    public $translatable = ['value'];
    public $timestamps = false;
    protected $table = 'seo';
    protected $fillable = [
        'key',
        'value'
    ];

    static function get(string $key, $default = null)
    {
        if (empty(self::$seo)) {
            self::$seo = self::all();
        }
        $model = self::$seo
            ->firstWhere('key', $key);
        if ($model === null) {
            if (empty($default)) {
                return false;
            }

            return $default;
        }

        return $model->value;
    }

    static function set(string $key, $value)
    {
        if (empty(self::$seo)) {
            self::$seo = self::all();
        }
        if (is_string($value) || is_int($value)) {
            $model = self::$seo
                ->firstWhere('key', $key);

            if ($model === null) {
                $model = self::create([
                    'key' => $key,
                    'value' => $value
                ]);
                self::$seo->push($model);
            } else {
                $model->update(compact('value'));
            }
            return true;
        }
        return false;

    }
}
