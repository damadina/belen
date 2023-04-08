<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];
    //dias asignados
    public function diasAsignados () {
        return $this->belongsToMany(tdia::class,'tdia_ttrabajo_user')->withTimestamps()->withPivot(['user_id']);
    }
    public function trabajosAsignados () {
        return $this->belongsToMany(ttrabajo::class,'tdia_ttrabajo_user')->withTimestamps()->withPivot(['user_id']);
    }


     // Jornadas
     public function jornadas() {
        return $this->hasMany(jornada::class);
    }

    // Jornada del día actual
    public function jornadaHoy() {
        /* $hoy =  date('Y-m-d'); */
        $hoy = now()->addDays(1)->format('Y-m-d');
        return $this->hasMany(jornada::class)->where('dia',$hoy);
    }

    // Proximas Jornadas
    public function jornadasProximas() {
        $hoy =  date('Y-m-d');
        return $this->hasMany(jornada::class)->where('dia','>',$hoy)->limit(7);
    }
}
