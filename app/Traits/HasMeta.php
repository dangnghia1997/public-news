<?php
namespace App\Traits;

use App\Models\Meta;

trait HasMeta
{
    public function metas()
    {
        return $this->hasMany(Meta::class, 'model_id');
    }

    public function getMeta($key)
    {
        $meta = Meta::where(['key' => $key, 'model_id' => $this->id])
            ->first();

        if (empty($meta->value)) {
            return null;
        }

        return $this->maybeDecodeMetaValue($meta->value);
    }

    protected function maybeDecodeMetaValue($value)
    {
        $object = json_decode($value, true);

        if (json_last_error() === JSON_ERROR_NONE) {
            return $object;
        }

        return $value;
    }

    protected function maybeEncodeMetaValue($value)
    {
        if (is_object($value) || is_array($value)) {
            return json_encode($value, true);
        }
        return $value;
    }

    public function updateMeta($key, $value)
    {
        $meta = Meta::where(['key' => $key, 'model_id' => $this->id]);

        if ($meta->exists()) {
            return $meta->first()->update(['value' => $value]);
        }

        return Meta::create([
            'key' => $key,
            'value' => $this->maybeEncodeMetaValue($value),
            'model_type' => get_class($this),
            'model_id' => $this->id
        ]);
    }

    public function deleteMeta($key)
    {
        return Meta::where(['key' => $key, 'model_id' => $this->id])->delete();
    }
}