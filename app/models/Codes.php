<?php

/**
 * Created by PhpStorm.
 * User: hahahehe
 * Date: 8/7/2017
 * Time: 3:46 PM
 */
class Codes extends Eloquent
{
    protected $table = 'code';
    protected $primaryKey = 'code';

    public function getPK()
    {
        return $this->orderBy('code','DESC')->first();
    }

    public function incrementPK($id)
    {
        DB::table('code')->increment('code',1,['id' => $id]);
    }
}