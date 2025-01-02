<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;
use Spatie\Permission\Models\Role as ModelsRole;

class Role extends ModelsRole implements Auditable
{
    use HasFactory, SoftDeletes, \OwenIt\Auditing\Auditable;

    public const SUPER_ADMIN = 'super_admin';
    public const ADMINISTRADOR = 'Administrador';

    public static function getSuperAdminRole(): self
    {
        return self::where('name', self::SUPER_ADMIN)->first();
    }

    public static function getAdministrativeRole(): Collection
    {
        return self::whereIn('name', [self::ADMINISTRADOR])->get();
    }
}
