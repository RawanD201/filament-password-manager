<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Password extends Model
{
    use HasFactory;

    protected $table = 'passwords';

    protected $primaryKey = 'id';

    protected $fillable = [
        'item_id',
        'name',
        'note',
        'private',
        'public',
    ];


    public function items()
    {
        return $this->hasMany(PasswordItem::class, 'password_id', 'id');
    }
}
