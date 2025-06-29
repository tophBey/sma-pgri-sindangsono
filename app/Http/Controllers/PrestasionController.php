<?php

namespace App\Http\Controllers;

use App\Http\Requests\PrestasionStoreRequest;
use App\Http\Requests\UpdatePrestasionRequest;
use App\Models\Category;
use App\Models\Prestasion;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PrestasionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $presentasions = Prestasion::orderByDesc('id')->search(request(['search']))->paginate(5)->withQueryString();

        $title = "Prestasi";
        return view('admin.prestasi.index', compact('title','presentasions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Prestasi";
        $categories = Category::orderByDesc('id')->get();

        return view('admin.prestasi.addPrestasion', compact('title','categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PrestasionStoreRequest $request)
    {
         DB::beginTransaction();
        $validated = $request->validated();

      
        try {


            if($request->hasFile('photo_prestasion')){
                $photo_prestasionPath = $request->file('photo_prestasion')->store('photo_prestasions', 'public');
                $validated['photo_prestasion'] = $photo_prestasionPath;
            }

            $validated['slug'] = Str::slug($validated['title']);
            Prestasion::create($validated);

            DB::commit();

            return redirect()->route('admin.prestasion.index')->with('successPresentasion', 'Berhasil Menambahkan Prestasi');
        } catch (Exception $exception) {
            DB::rollBack();
            return redirect()->route('admin.prestasion.index')->with('FailedPresentasion', $exception->getMessage());

        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Prestasion $prestasion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Prestasion $prestasion)
    {
        $title = "Prestasi";
        $categories = Category::orderByDesc('id')->get();

        return view('admin.prestasi.updatePrestasion', compact('prestasion','title','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePrestasionRequest $request, Prestasion $prestasion)
    {
        DB::beginTransaction();
        $validated = $request->validated();

      
        try {


            if($request->hasFile('photo_prestasion')){

                 if($request->input('oldImage')){
                    Storage::disk('public')->delete($request->input('oldImage'));
                }

                $photo_prestasionPath = $request->file('photo_prestasion')->store('photo_prestasions', 'public');
                $validated['photo_prestasion'] = $photo_prestasionPath;
            }

            $validated['slug'] = Str::slug($validated['title']);

           $prestasion->update($validated);

            DB::commit();

            return redirect()->route('admin.prestasion.index')->with('successPresentasion', 'Berhasil Mengubah Prestasi');
        } catch (Exception $exception) {
            DB::rollBack();
            return redirect()->route('admin.prestasion.index')->with('FailedPresentasion', $exception->getMessage());

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Prestasion $prestasion)
    {
         DB::beginTransaction();

        try {
            
            if($prestasion->photo_prestasion){
                Storage::disk('public')->delete($prestasion->photo_prestasion);
            }
           
            $prestasion->delete();
            DB::commit();

            return redirect()->route('admin.prestasion.index')->with('successPresentasion', 'Berhasil Menghapus Prestasi');

        } catch (Exception $exeption) {

            DB::rollBack();
            return redirect()->route('admin.prestasion.index')->with('FailedPrestasion', $exeption->getMessage());

        }
    }
}
