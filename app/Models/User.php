<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Log;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'firstName',
        'lastName',
        'secondLastName',
        'secretWord',
        'username',
        'email',
        'password',
        'status',
    ];

    protected $hidden = [
        'status',
        'password',
        'secretWord',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getDecryptedFieldAttribute($value)
    {
        try {
            return Crypt::decryptString($value);
        } catch (DecryptException $e) {
            Log::error('Error al descifrar los datos: ' . $e->getMessage());
            return 'Error al descifrar';
        }
    }
}
