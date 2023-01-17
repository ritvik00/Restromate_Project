<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Generalsetting extends Model
{
    use HasFactory;
    protected $table='generalsetting';
    protected $primarykey ='id';
    protected $fillable = [
        'sitetitle',
        'number',
        'email',
        'copyright',
        'address',
        'description',
        'mapiframe',
        'siteimage',
        'faviconimage',
        'metakeywords',
        'facebook',
        'twitter',
        'instagram',
        'youtube',
        'user_id',
        'metadescription'
    ];
}
