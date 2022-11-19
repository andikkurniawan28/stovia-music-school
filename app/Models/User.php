<?php

namespace App\Models;

use App\Models\Log;
use App\Models\Role;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'role_id',
        'name',
        'username',
        'password',
        'admin',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public static function encryptPassword($password){
        return bcrypt($password);
    }

    public function role(){
        return $this->belongsTo(Role::class);
    }

    public static function handleRequestStore($request)
    {
        $password_encrypted = self::encryptPassword($request->password);
        $request->request->add([ 'password' => $password_encrypted, ]);
        $user = self::create($request->all());
        $log = Log::writeLog('User', 'Menambahkan user baru '.$request->name, $request->admin);

        if($user == true && $log == true) {
            return redirect()->back()->with('success', 'User berhasil ditambahkan.');
        }
        else {
            return redirect()->back()->with('error', 'User gagal ditambahkan!.');
        }
    }

    public static function handleRequestUpdate($request, $id)
    {
        $password_encrypted = self::encryptPassword($request->password);
        $user = self::whereId($id)->update([
            'role_id' => $request->role_id,
            'name' => $request->name,
            'username' => $request->username,
            'password' => $password_encrypted,
            'active' => $request->active,
            'admin' => $request->admin,
        ]);
        $log = Log::writeLog('User', 'Merubah data user '.$request->name, $request->admin);

        if($user == true && $log == true) {
            return redirect()->back()->with('success', 'User berhasil dirubah.');
        }
        else {
            return redirect()->back()->with('error', 'User gagal dirubah!.');
        }
    }

    public static function handleRequestDelete($request, $id)
    {
        $password_encrypted = self::encryptPassword($request->password);
        $user = self::whereId($id)->delete();
        $log = Log::writeLog('User', 'Menghapus data user '.$request->name, $request->admin);

        if($user == true && $log == true) {
            return redirect()->back()->with('success', 'User berhasil dihapus.');
        }
        else {
            return redirect()->back()->with('error', 'User gagal dihapus!.');
        }
    }
}
