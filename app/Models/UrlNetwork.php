<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UrlNetwork extends Model
{
    use HasFactory;

    protected $table = 'url_network';

    protected $fillable = [
        'network_id',
        'url_id',
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
