<?php

namespace App;

use App\Category;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    //

    protected $fillable = ['created_at', 'updated_at','name', 'value', 'fee_type_id'];

    public function feeType() {
        return $this->belongsTo('App\FeeType');
    }

    public function categories() {
        return $this->belongsToMany('App\Category');
    }

    public function studies() {
        return $this->belongsToMany('App\Category')
            ->wherePivot('program_id', Program::where('value', 'study')->first()->id);
    }

    public function industries() {
        return $this->belongsToMany('App\Category')
            ->wherePivot('program_id', Program::where('value', 'internship')->first()->id);
    }

    public function degrees() {
        return $this->belongsToMany('App\Category')
            ->wherePivot('program_id', Program::where('value', 'university')->first()->id);
    }

    public static function getByValue($value) {
        $program = self::where('value', $value);

        if ($program !== null) {
            return $program->first();
        }

        return null;
    }

    public static function getOptions($programs = null) {
        $options = [];
        if ($programs == null) {
            $programs = self::all();
        }

        foreach($programs as $program) {
            $options[$program->value] = $program->name;
        }

        return $options;
    }
}
