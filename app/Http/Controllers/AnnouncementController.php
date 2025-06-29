<?php

namespace App\Http\Controllers;

use App\Http\Requests\AnnouncementStoreRequest;
use App\Models\Announcement;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $announcements = Announcement::orderByDesc('id')->search(request(['search']))->paginate(5)->withQueryString();
        $title = "Pengumuman";
        return view('admin.pengumuman.index', compact('announcements', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Pengumuman";

        return view('admin.pengumuman.addPengumuman', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AnnouncementStoreRequest $request)
    {
        DB::beginTransaction();
        $validated = $request->validated();

        try {
            $validated['slug'] = Str::slug($validated['title']);

            Announcement::create($validated);

            DB::commit();

            return redirect()->route('admin.announcement.index')->with('successAnnountcement', 'Berhasil Menambahkan Pengumuman');

        } catch (Exception $exeption) {

            DB::rollBack();

            return redirect()->route('admin.announcement.index')->with('FailedAnnouncement', $exeption->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Announcement $announcement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Announcement $announcement)
    {
        $title = "Pengumuman";

        return view('admin.pengumuman.updatePengumuman', compact('announcement','title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AnnouncementStoreRequest $request, Announcement $announcement)
    {
        DB::beginTransaction();
        $validated = $request->validated();

        try {
            $validated['slug'] = Str::slug($validated['title']);

            $announcement->update($validated);

            DB::commit();

            return redirect()->route('admin.announcement.index')->with('successAnnountcement', 'Berhasil Mengubah Pengumuman');

        } catch (Exception $exeption) {

            DB::rollBack();

            return redirect()->route('admin.announcement.index')->with('FailedAnnouncement', $exeption->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Announcement $announcement)
    {
        DB::beginTransaction();

        try {
           
            $announcement->delete();
            DB::commit();

            return redirect()->route('admin.announcement.index')->with('successAnnountcement', 'Berhasil Mengapus Pengumuman');

        } catch (Exception $exeption) {
            
            DB::rollBack();
            return redirect()->route('admin.announcement.index')->with('FailedCategory', $exeption->getMessage());

        }
    }
}
