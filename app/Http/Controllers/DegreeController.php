<?php

namespace App\Http\Controllers;

use App\Http\Requests\DegreeStoreRequest;
use App\Http\Requests\UpdateDegressRequest;
use App\Models\Degree;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DegreeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Gelar';
        $degress = Degree::orderByDesc('id')->search(request(['search']))->paginate(5)->withQueryString();

        return view('admin.gelar.index', compact('degress','title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Gelar';

        return view('admin.gelar.addDegrees', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DegreeStoreRequest $request)
    {
        DB::beginTransaction();
        $validated = $request->validated();

        try {
            // $validated['slug'] = Str::slug($validated['name']);

            Degree::create($validated);

            DB::commit();

            return redirect()->route('admin.degree.index')->with('successDegree', 'Berhasil Menambahkan Gelar');

        } catch (Exception $exeption) {

            DB::rollBack();

            return redirect()->route('admin.degree.index')->with('FailedDegree', $exeption->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Degree $degree)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Degree $degree)
    {
        $title = 'Gelar';
        return view('admin.gelar.updateDegrees', compact('degree','title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDegressRequest $request, Degree $degree)
    {
        DB::beginTransaction();
        $validated = $request->validated();

        try {

            $degree->update($validated);

            DB::commit();

            return redirect()->route('admin.degree.index')->with('successDegree', 'Berhasil Mengubah Gelar');

        } catch (Exception $exeption) {
            DB::rollBack();
            return redirect()->route('admin.degree.index')->with('FailedDegree', $exeption->getMessage());

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Degree $degree)
    {
        DB::beginTransaction();

        try {
           
            $degree->delete();
            DB::commit();

            return redirect()->route('admin.degree.index')->with('successDegree', 'Berhasil Menghapus Gelar');

        } catch (Exception $exeption) {

            DB::rollBack();

            return redirect()->route('admin.degree.index')->with('FailedDegree', $exeption->getMessage());

        }
    }
}
