<?php

namespace App\Models;

use App\Models\Log;
use App\Models\Course;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Grade extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function course()
    {
        return $this->hasMany(Course::class);
    }

    public static function handleRequestStore($request)
    {
        $grade = self::create($request->all());
        $log = Log::writeLog('Grade', 'Menambahkan grade baru '.$request->name, $request->admin);

        if($grade == true && $log == true) {
            return redirect()->back()->with('success', 'Grade berhasil ditambahkan.');
        }
        else {
            return redirect()->back()->with('error', 'Grade gagal ditambahkan!.');
        }
    }

    public static function handleRequestUpdate($request, $id)
    {
        $grade = self::whereId($id)->update([ 'name' => $request->name, 'admin' => $request->admin ]);
        $log = Log::writeLog('Grade', 'Merubah grade '.$request->name, $request->admin);

        if($grade == true && $log == true) {
            return redirect()->back()->with('success', 'Grade berhasil dirubah.');
        }
        else {
            return redirect()->back()->with('error', 'Grade gagal dirubah!.');
        }
    }

    public static function handleRequestDelete($request, $id)
    {
        $grade = self::whereId($id)->delete();
        $log = Log::writeLog('Grade', 'Menghapus grade '.$request->name, $request->admin);

        if($grade == true && $log == true) {
            return redirect()->back()->with('success', 'Grade berhasil dihapus.');
        }
        else {
            return redirect()->back()->with('error', 'Grade gagal dihapus!.');
        }
    }
}
