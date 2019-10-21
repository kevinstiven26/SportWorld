<?php

namespace App;

use App\Category;
use App\FieldType;
use App\FieldValue;
use App\AdditionalField;
use Illuminate\Database\Eloquent\Model;

class FieldProduct extends Model
{
    protected $fillable = [
        'name',
        'field_type_id',
    ];

    public function field_type() {
        return $this->hasOne(FieldType::class());
    }

    public function additional_field()
    {
        return $this->belongsTo(AdditionalField::class);
    }

    public function categories() {
        return $this->belongsToMany(Category::class);
    }

    public function field_values() {
        return $this->belongsToMany(FieldValue::class);
    }
}