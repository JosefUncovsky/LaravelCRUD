<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Contact extends Model
{
    use Sortable;
    protected $fillable = [
        'name',
        'interpret',
        'genre',
        'release_year',
        'obal'

    ];
    public $sortable = ['name', 'interpret', 'genre', 'release_year'];
}
