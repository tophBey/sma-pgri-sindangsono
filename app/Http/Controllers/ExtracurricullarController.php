<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExtraculicullarStoreRequest;
use App\Http\Requests\ExtraculicullarUpdateRequest;
use App\Models\Extracurricullar;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ExtracurricullarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $extracurricullars = Extracurricullar::orderByDesc('id')->search(request(['search']))->paginate(5)->withQueryString();
        $title = "Ekstrakulikuler";
        return view('admin.extrakulikuler.index', compact('extracurricullars','title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Ekstrakulikuler";

        return view('admin.extrakulikuler.addExtrakulikuler', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ExtraculicullarStoreRequest $request)
    {
        DB::beginTransaction();
        $validated = $request->validated();

        try {

            if($request->hasFile('icon')){
                $fotoPath = $request->file('icon')->store('extrakulikuler', 'public');
                $validated['icon'] = $fotoPath;
            }

            Extracurricullar::create($validated);

            DB::commit();

            return redirect()->route('admin.extracurricullar.index')->with('successExtracurricular', 'Berhasil Menambahkan Ekstrakulikuler');

        } catch (Exception $exeption) {

            DB::rollBack();
            return redirect()->route('admin.extracurricullar.index')->with('FailedExtracurricular', $exeption->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Extracurricullar $extracurricullar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Extracurricullar $extracurricullar)
    {
        $title = "Ekstrakulikuler";

        return view('admin.extrakulikuler.updateExtrakulikuler', compact('extracurricullar', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ExtraculicullarUpdateRequest $request, Extracurricullar $extracurricullar)
    {
        DB::beginTransaction();
        $validated = $request->validated();

        try {

            if($request->hasFile('foto')){

                if($request->input('oldImage')){
                    Storage::disk('public')->delete($request->input('oldImage'));
                }
                
                $fotoPath = $request->file('icon')->store('extrakulikuler', 'public');
                $validated['icon'] = $fotoPath;
            }

            $extracurricullar->update($validated);

            DB::commit();

            return redirect()->route('admin.extracurricullar.index')->with('successExtracurricular', 'Berhasil Mengubah Ekstrakulikuler');

        } catch (Exception $exeption) {
            DB::rollBack();
            return redirect()->route('admin.extracurricullar.index')->with('FailedExtracurricular', $exeption->getMessage());

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Extracurricullar $extracurricullar)
    {
        // dd($extracurricullar);
        DB::beginTransaction();

        try {
            
            if($extracurricullar->icon){
                Storage::disk('public')->delete($extracurricullar->icon);
            }
           
            $extracurricullar->delete();

            DB::commit();

            return redirect()->route('admin.extracurricullar.index');

        } catch (Exception $exeption) {

            DB::rollBack();
            return redirect()->route('admin.extracurricullar.index')->with('FailedExtracurricular', $exeption->getMessage());

        }
    }
}
