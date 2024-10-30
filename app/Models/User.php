<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $table = 'Usuario';

    protected $fillable = [
        'Nombres',
        'Correo',
        'Passwordd',
        'provider',
        'provider_id',
    ];

    public $timestamps = false;


    public static function findOrCreateUser($user, $provider)
    {

        $existingUser = self::where('provider', $provider)
            ->where('provider_id', $user->getId())
            ->first();

        if ($existingUser) {
            return $existingUser;
        } else {

            return self::create([
                'Nombres' => $user->getName(),
                'Correo' => $user->getEmail(),
                'Passwordd' => '',
                'provider' => $provider,
                'provider_id' => $user->getId(),
            ]);
        }
    }
}
