<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    private static $user, $imageUrl, $image, $directory, $imageName;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
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
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];


    private static function getImageUrl($request)
    {
        self::$image = $request->file('image');
        self::$imageName = time().'.'.self::$image->getClientOriginalExtension();
        self::$directory = 'user-images/';
        self::$image->move(self::$directory, self::$imageName);
        return self::$directory.self::$imageName;
    }


    public static function newUser($request)
    {
        self::$user = new User();
        self::$user->name       = $request->name;
        self::$user->email      = $request->email;
        self::$user->password   = bcrypt($request->password);
        self::$user->mobile     = $request->mobile;
        self::$user->user_type  = $request->user_type;
        self::$user->image      = self::getImageUrl($request);
        self::$user->save();
        return self::$user;
    }

    public function roles()
    {
        return $this->belongsToMany('App\Models\Role', 'user_role', 'user_id', 'role_id');
    }

    public static function updateUser($request, $id)
    {
        self::$user = User::find($id);
        if ($request->file('image'))
        {
            if (file_exists(self::$user->image))
            {
                unlink(self::$user->image);
            }
            self::$imageUrl = self::getImageUrl($request);
        }
        else
        {
            self::$imageUrl = self::$user->image;
        }


        self::$user->name       = $request->name;
        self::$user->email      = $request->email;
        if ($request->password)
        {
            self::$user->password   = bcrypt($request->password);
        }
        self::$user->mobile     = $request->mobile;
        self::$user->user_type  = $request->user_type;
        self::$user->image      = self::$imageUrl;
        self::$user->save();
        return self::$user;
    }

    public static function deleteUser($id)
    {
        self::$user = User::find($id);
        self::$user->Delete();
    }

    public function hasAnyRole($roles) {
        if(is_array($roles)) {
            foreach ($roles as $role) {
                if($this->hasRole($role)) {
                    return true;
                }
            }
        } else {
            if($this->hasRole($roles)) {
                return true;
            }
        }
        return false;
    }

    public function hasRole($role) {
        if($this->roles()->where('name', $role)->first()) {
            return true;
        }
        return false;
    }
}
