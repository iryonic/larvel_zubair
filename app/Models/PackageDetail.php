<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackageDetail extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function type()
    {
        return $this->belongsTo(ManagePackages::class, 'packagetype_id', 'id');
    }
}
