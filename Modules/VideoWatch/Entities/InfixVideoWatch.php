<?php

namespace Modules\VideoWatch\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrioVideoWatch extends Model
{
    use HasFactory;

    protected $fillable = [];

    protected static function newFactory()
    {
        return \Modules\VideoWatch\Database\factories\TrioVideoWatchFactory::new();
    }
}
