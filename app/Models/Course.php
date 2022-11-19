<?php

namespace App\Models;

use App\Models\Course;
use App\Models\Instrument;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function instrument()
    {
        return $this->belongsTo(Instrument::class);
    }

    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }

    public static function handleRequestStore($request)
    {
        $course = self::create($request->all());
        $log = Log::writeLog('Kursus', 'Menambahkan kursus baru '.$request->name, $request->admin);

        if($course == true && $log == true) {
            return redirect()->back()->with('success', 'Kursus berhasil ditambahkan.');
        }
        else {
            return redirect()->back()->with('error', 'Kursus gagal ditambahkan!.');
        }
    }

    public static function handleRequestUpdate($request, $id)
    {
        $course = self::whereId($id)->update([
            'name' => $request->name,
            'instrument_id' => $request->instrument_id,
            'grade_id' => $request->grade_id,
            'price' => $request->price,
            'admin' => $request->admin,
        ]);
        $log = Log::writeLog('Kursus', 'Merubah kursus '.$request->name, $request->admin);

        if($course == true && $log == true) {
            return redirect()->back()->with('success', 'Kursus berhasil dirubah.');
        }
        else {
            return redirect()->back()->with('error', 'Kursus gagal dirubah!.');
        }
    }

    public static function handleRequestDelete($request, $id)
    {
        $course = self::whereId($id)->delete();
        $log = Log::writeLog('Kursus', 'Menghapus kursus '.$request->name, $request->admin);

        if($course == true && $log == true) {
            return redirect()->back()->with('success', 'Kursus berhasil dihapus.');
        }
        else {
            return redirect()->back()->with('error', 'Kursus gagal dihapus!.');
        }
    }
}
