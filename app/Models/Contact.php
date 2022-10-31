<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Livewire\Component;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'fullname',
        'gender',
        'email',
        'postcode',
        'address',
        'building_name',
        'opinion'
    ];

    public static function doSearch($fullname, $gender,  $date_from, $date_to, $email)
    {
        $query = self::query();
        if (!empty($fullname)) {
            $query->where('fullname', 'like binary', "%{$fullname}%");
            $spaceConversion = mb_convert_kana($fullname, 's');
            $spaceConversion = mb_convert_kana($fullname, 's');
            $wordArraySearched = preg_split('/[\s,]+/', $spaceConversion, -1, PREG_SPLIT_NO_EMPTY);
        }
        if (!empty($gender)) {
            $query->where('gender', 'like binary', "%{$gender}%");
        }
        if (!empty($date_from)) {
            $query->whereBetween('created_at', ["{$date_from}","{$date_to}"]);
        }
        if (!empty($email)) {
            $query->where('email', 'like binary', "%{$email}%");
        }
        $results = $query->paginate(10);
        return $results;
    }
}

