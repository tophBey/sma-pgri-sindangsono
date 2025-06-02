<?php

namespace App\Http\Controllers;

use App\Http\Requests\ActivityStoreRequest;
use App\Http\Requests\UpdateActivityRequest;
use App\Models\Activity;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $activities = Activity::orderByDesc('id')->search(request(['search']))->paginate(5)->withQueryString();
        $title = "Kegiatan";
        return view('admin.kegiatan.index', compact('activities','title') );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Kegiatan";

        return view('admin.kegiatan.addKegiatan', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ActivityStoreRequest $request)
    {
         DB::beginTransaction();
        $validated = $request->validated();

        try {

            if($request->hasFile('photo_activity')){
                $fotoPath = $request->file('photo_activity')->store('photo_activities', 'public');
                $validated['photo_activity'] = $fotoPath;
            }

            $validated['slug'] = Str::slug($validated['title']);
            Activity::create($validated);

            DB::commit();

            return redirect()->route('admin.activity.index')->with('successActivity', 'Berhasil Menambahkan Aktivitas Terbaru');

        } catch (Exception $exeption) {

            DB::rollBack();

            return redirect()->route('admin.activity.index')->with('FailedActivity', $exeption->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Activity $activity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Activity $activity)
    {
        $title = "Kegiatan";

        return view('admin.kegiatan.updateKegiatan', compact('activity', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateActivityRequest $request, Activity $activity)
    {
         DB::beginTransaction();
        $validated = $request->validated();

        try {

            if($request->hasFile('photo_activity')){

                if($request->input('oldImage')){
                    Storage::disk('public')->delete($request->input('oldImage'));
                }
                
                $fotoPath = $request->file('photo_activity')->store('photo_activities', 'public');
                $validated['photo_activity'] = $fotoPath;
            }

            $validated['slug'] = Str::slug($validated['title']);
            $activity->update($validated);

            DB::commit();

            return redirect()->route('admin.activity.index')->with('successActivity', 'Berhasil Mengubah Kegiatan');

        } catch (Exception $exeption) {
            DB::rollBack();
            return redirect()->route('admin.activity.index')->with('FailedActivity', $exeption->getMessage());

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Activity $activity)
    {
         DB::beginTransaction();

        try {
            
            if($activity->photo_activity){
                Storage::disk('public')->delete($activity->photo_activity);
            }
           
            $activity->delete();
            DB::commit();

            return redirect()->route('admin.activity.index');

        } catch (Exception $exeption) {

            DB::rollBack();
            return redirect()->route('admin.activity.index')->with('FailedTeacher', $exeption->getMessage());

        }
    }
}

