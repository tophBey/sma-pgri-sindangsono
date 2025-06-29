<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeacherStoreRequest;
use App\Http\Requests\TeacherUpdateRequest;
use App\Models\Degree;
use App\Models\Teacher;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

use function Laravel\Prompts\search;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Guru";
        $teachers = Teacher::orderByDesc('id')->search(request(['search']))->paginate(5)->withQueryString();

        return view('admin.guru.index', compact('teachers','title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $degrees = Degree::orderByDesc('id')->get();
        $title = "Guru";
        return view('admin.guru.addTeacher',compact('degrees', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TeacherStoreRequest $request)
    {
        DB::beginTransaction();
        $validated = $request->validated();

        try {

            if($request->hasFile('foto')){
                $fotoPath = $request->file('foto')->store('fotos', 'public');
                $validated['foto'] = $fotoPath;
            }

            Teacher::create($validated);

            DB::commit();

            return redirect()->route('admin.teacher.index')->with('successTeacher', 'Berhasil Menambahkan Guru');

        } catch (Exception $exeption) {

            DB::rollBack();

            return redirect()->route('admin.teacher.index')->with('FailedTeacher', $exeption->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Teacher $teacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Teacher $teacher)
    {
        $title = "Guru";
        $degrees = Degree::orderByDesc('id')->get();

        return view('admin.guru.updateTeacher', compact('teacher','degrees','title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TeacherUpdateRequest $request, Teacher $teacher)
    {
        DB::beginTransaction();
        $validated = $request->validated();

        try {

            if($request->hasFile('foto')){

                if($request->input('oldImage')){
                    Storage::disk('public')->delete($request->input('oldImage'));
                }
                
                $fotoPath = $request->file('foto')->store('fotos', 'public');
                $validated['foto'] = $fotoPath;
            }

            $teacher->update($validated);

            DB::commit();

            return redirect()->route('admin.teacher.index')->with('successTeacher', 'Berhasil Mengubah Guru');

        } catch (Exception $exeption) {
            DB::rollBack();
            return redirect()->route('admin.teacher.index')->with('FailedTeacher', $exeption->getMessage());

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Teacher $teacher)
    {
        DB::beginTransaction();

        try {
            
            if($teacher->foto){
                Storage::disk('public')->delete($teacher->foto);
            }
           
            $teacher->delete();
            DB::commit();

            return redirect()->route('admin.teacher.index')->with('successTeacher', 'Berhasil Menghapus Guru');

        } catch (Exception $exeption) {

            DB::rollBack();
            return redirect()->route('admin.teacher.index')->with('FailedTeacher', $exeption->getMessage());

        }
    }
}
