<?php
namespace App;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'username', 'email', 'password', 'type'];
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];
    //---------------relaciones con tablas-------------------------
    public function articulos()
    {
        return $this->hasMany('App\Articulo');
    }
    public function cobranzas()
    {
        return $this->hasMany('App\Cobranza');
    }
    public function pedidos()
    {
        return $this->hasMany('App\Pedido');
    }
    public function stocks()
    {
        return $this->hasMany('App\Stock');
    }
    
    //---------------relaciones con tablas-------------------------
}