<?php
namespace App;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Cache;
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'password', 'role_id', 'avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role() 
    {
        return $this->belongsTo(Role::class);
    }
    public function isAdmin()
    {
        return auth()->check() && auth()->user()->role->name == 'administrator';
    }
    public function isChiefEngineer()
    {
        return auth()->check() && auth()->user()->role->name == 'chief engineer';
    }
    public function isAccessor()
    {
        return auth()->check() && auth()->user()->role->name == 'assessor';
    }
    public function isProcessor()
    {
        return auth()->check() && auth()->user()->role->name == 'processor';
    }
    public function isCashier()
    {
        return auth()->check() && auth()->user()->role->name == 'cashier';
    }
    public function isAccounting()
    {
        return auth()->check() && auth()->user()->role->name == 'accounting';
    }
    public function isAdminAide() 
    {
        return auth()->check() && auth()->user()->role->name == 'admin aide';
    }
    public function hasRole($role)
    {
        return in_array($this->role->name, $role);
    }
    public function isOnline()
    {
        return Cache::has('user-is-online-' . $this->id);
    }
}
