<?php

namespace App\Models;

use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Test extends Model implements HasMedia
{
    use SoftDeletes, InteractsWithMedia, HasFactory;

    public $table = 'tests';

    protected $hidden = [
        'password',
    ];

    protected $appends = [
        'file',
        'photo',
    ];

    public const RADIO_RADIO = [
        '1' => '1',
        '2' => '2',
        '3' => '3',
    ];

    public const SELECT_SELECT = [
        '1' => '1',
        '2' => '2',
        '3' => '3',
    ];

    protected $dates = [
        'data_picker',
        'data_time_picker',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'radio',
        'select',
        'checkbox',
        'test',
        'email',
        'textarea',
        'password',
        'integer',
        'float',
        'money',
        'data_picker',
        'data_time_picker',
        'time_picker',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function getDataPickerAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDataPickerAttribute($value)
    {
        $this->attributes['data_picker'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getDataTimePickerAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setDataTimePickerAttribute($value)
    {
        $this->attributes['data_time_picker'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function getFileAttribute()
    {
        return $this->getMedia('file');
    }

    public function getPhotoAttribute()
    {
        $files = $this->getMedia('photo');
        $files->each(function ($item) {
            $item->url       = $item->getUrl();
            $item->thumbnail = $item->getUrl('thumb');
            $item->preview   = $item->getUrl('preview');
        });

        return $files;
    }
}
