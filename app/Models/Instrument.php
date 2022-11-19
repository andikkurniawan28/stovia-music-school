<?php

namespace App\Models;

use App\Models\Log;
use App\Models\Course;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Instrument extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function course()
    {
        return $this->hasMany(Course::class);
    }

    public static function handleRequestStore($request)
    {
        $instrument = self::create($request->all());
        $log = Log::writeLog('Instrument', 'Menambahkan instrument baru '.$request->name, $request->admin);

        if($instrument == true && $log == true) {
            return redirect()->back()->with('success', 'Instrument berhasil ditambahkan.');
        }
        else {
            return redirect()->back()->with('error', 'Instrument gagal ditambahkan!.');
        }
    }

    public static function handleRequestUpdate($request, $id)
    {
        $instrument = self::whereId($id)->update([ 'name' => $request->name, 'admin' => $request->admin ]);
        $log = Log::writeLog('Instrument', 'Merubah instrument '.$request->name, $request->admin);

        if($instrument == true && $log == true) {
            return redirect()->back()->with('success', 'Instrument berhasil dirubah.');
        }
        else {
            return redirect()->back()->with('error', 'Instrument gagal dirubah!.');
        }
    }

    public static function handleRequestDelete($request, $id)
    {
        $instrument = self::whereId($id)->delete();
        $log = Log::writeLog('Instrument', 'Menghapus instrument '.$request->name, $request->admin);

        if($instrument == true && $log == true) {
            return redirect()->back()->with('success', 'Instrument berhasil dihapus.');
        }
        else {
            return redirect()->back()->with('error', 'Instrument gagal dihapus!.');
        }
    }
}
