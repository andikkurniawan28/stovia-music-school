<?php

namespace App\Models;

use App\Models\Log;
use App\Models\Course;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Classroom extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static function handleRequestStore($request)
    {
        $classroom = self::create($request->all());
        $log = Log::writeLog('Ruang Kelas', 'Menambahkan ruang kelas baru '.$request->name, $request->admin);

        if($classroom == true && $log == true) {
            return redirect()->back()->with('success', 'Ruang Kelas berhasil ditambahkan.');
        }
        else {
            return redirect()->back()->with('error', 'Ruang Kelas gagal ditambahkan!.');
        }
    }

    public static function handleRequestUpdate($request, $id)
    {
        $classroom = self::whereId($id)->update([ 'name' => $request->name, 'admin' => $request->admin ]);
        $log = Log::writeLog('Ruang Kelas', 'Merubah ruang kelas '.$request->name, $request->admin);

        if($classroom == true && $log == true) {
            return redirect()->back()->with('success', 'Ruang Kelas berhasil dirubah.');
        }
        else {
            return redirect()->back()->with('error', 'Ruang Kelas gagal dirubah!.');
        }
    }

    public static function handleRequestDelete($request, $id)
    {
        $classroom = self::whereId($id)->delete();
        $log = Log::writeLog('Ruang Kelas', 'Menghapus ruang kelas '.$request->name, $request->admin);

        if($classroom == true && $log == true) {
            return redirect()->back()->with('success', 'Ruang Kelas berhasil dihapus.');
        }
        else {
            return redirect()->back()->with('error', 'Ruang Kelas gagal dihapus!.');
        }
    }
}
