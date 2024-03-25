<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UrlNetworkHistory extends Model
{
    use HasFactory;

    protected $table = 'url_network_history';

    protected $fillable = [
        'network_id',
        'url_id',
        'removed_at',
    ];

    public function network()
    {
        return $this->belongsTo(Network::class);
    }

    public function url()
    {
        return $this->belongsTo(Url::class);
    }
}
