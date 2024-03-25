<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
    use HasFactory;

    protected $table = 'urls';

    protected $fillable = [
        'url',
    ];

    public function networks()
    {
        return $this->belongsToMany(Network::class, 'url_network', 'url_id', 'network_id')->withTimestamps();
    }

    public function history()
    {
        return $this->hasMany(UrlNetworkHistory::class);
    }
}
