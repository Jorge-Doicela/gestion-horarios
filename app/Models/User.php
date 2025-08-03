<?php

// app/Models/User.php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles; // Importamos la trait HasRoles de Spatie

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles; // Usamos la trait HasRoles para manejar roles y permisos

    /**
     * Los atributos que son asignables de forma masiva.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * Los atributos que deberían ser ocultados para los arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Los atributos que deben ser convertidos a tipos nativos.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Relación con los roles a través de la tabla intermedia model_has_roles.
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'model_has_roles');
    }

    /**
     * Relación con los permisos a través de la tabla intermedia model_has_permissions.
     */
    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'model_has_permissions');
    }

    /**
     * Relación con los documentos que el usuario haya subido (si aplica).
     */
    public function documentos()
    {
        return $this->hasMany(Documento::class);
    }

    /**
     * Relación con los registros de auditoría, si deseas hacer un seguimiento de las actividades.
     */
    public function logs()
    {
        return $this->hasMany(Log::class);
    }

    /**
     * Función para verificar si el usuario tiene un rol específico.
     *
     * @param string $role
     * @return bool
     */
    public function hasRole($role)
    {
        return $this->roles->contains('name', $role);
    }

    /**
     * Función para verificar si el usuario tiene un permiso específico.
     *
     * @param string $permission
     * @return bool
     */
    public function hasPermission($permission)
    {
        return $this->permissions->contains('name', $permission);
    }
}
