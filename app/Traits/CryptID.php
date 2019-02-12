<?php
/**
 * Created by PhpStorm.
 * User: antoniojose
 * Date: 15/12/18
 * Time: 20:31
 */

namespace App\Traits;


trait CryptID
{
    public function getCidAttribute()
    {
        try {
            return encrypt($this->original[$this->primaryKey]);
        } catch (\Exception $e) {
            return null;
        }
    }
}