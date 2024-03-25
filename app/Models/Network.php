<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Network extends Model
{
    use HasFactory;

    protected $table = 'networks';

    protected $fillable = [
        'name',
        'sellers_json_url',
    ];

    public function urls()
    {
        return $this->belongsToMany(Url::class, 'url_network', 'network_id', 'url_id')->withTimestamps();
    }


}
