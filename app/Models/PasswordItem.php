<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PasswordItem extends Model
{
    use HasFactory;

    protected $table = 'password_items';

    protected $primaryKey = 'id';

    protected $fillable = [
        'password_id',
        'title',
        'name',
        'password',
    ];
}
