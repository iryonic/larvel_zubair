<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManagePackages extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function pack()
    {
        return $this->belongsTo(PackageDetail::class, 'id', 'packagetype_id');
    }
}
