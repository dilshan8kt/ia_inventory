<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Database\Eloquent\SoftDeletes;

// use Illuminate\Support\Facades\Auth;
// use App\User;

class User extends Model implements Authenticatable
{
    use Notifiable;
    use SoftDeletes;
    use \Illuminate\Auth\Authenticatable;
    
    //one user belongs to one company
    public function company(){
        return $this->belongsTo(Company::class);
    }

    public function roles(){
        return $this->belongsToMany('App\Role', 'user_role', 'user_id', 'role_id');
    }
     
    public function hasAnyRole($roles){
        if(is_array($roles)){
            foreach($roles as $role){
                if($this->hasRole($role)){
                    return true;
                }
            }
        }else{
            if($this->hasRole($roles)){
                return true;
            }
        }
        return false;
    }

    public function role($user_id){
        $user_role = $this::find($user_id)->roles->first();
        return $user_role->name;
    }

    public function hasRole($role){
        if($this->roles()->where('name', $role)->first()){
            return true;
        }
        return false;
    }

    protected $fillable = [
        'company_id', 'first_name', 'last_name', 'email', 'password',
    ];

    protected $hidden = [
        'company_id', 'password', 'remember_token',
    ];

    protected $dates = ['deleted_at'];
}
