<?php

class Items extends Eloquent
{
    protected $primaryKey = "code";
    protected $table = "items";
    protected $softDelete = true;
}

?>