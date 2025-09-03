<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\User;
use App\Models\Lamaran;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class JobController extends Controller
{
    public function getData(Request $request)
    {
        $query = Job::query();

    if ($request->filled('title')) {
        $query->where('title', 'like', '%' . $request->title . '%');
    }

    if ($request->filled('category') && $request->category != "Kategori Pekerjaan") {
        $query->where('category', $request->category);
    }

    if ($request->filled('type') && $request->type != "Tipe Pekerjaan") {
        $query->where('employment_type', $request->type);
    }

    $jobs = $query->get();

    return response()->json($jobs);
    }

    public function employerData(Request $request){
        $user = auth()->user();
    $query = $user->jobs()->orderBy('created_at', 'desc');

    if ($request->filled('title')) {
        $query->where('title', 'like', '%' . $request->title . '%');
    }

    if ($request->filled('category') && $request->category != "Kategori Pekerjaan") {
        $query->where('category', $request->category);
    }

    if ($request->filled('type') && $request->type != "Tipe Pekerjaan") {
        $query->where('employment_type', $request->type);
    }

    $jobs = $query->get();

    return response()->json($jobs);
    }

    public function joblist()
    {   
        $jobs = Job::latest()->get();
        return view('jobs.joblist', compact('jobs'));
    }

    public function detail($id)
    {
        $job = Job::findOrFail($id);

        $user = auth()->id();
        $lamaran = Lamaran::where('user_id', $user)->where('job_id', $id)->first();

        $status = $lamaran ? 'sudah_dilamar' : '';
        return view('jobs.jobdetail', array_merge(compact('job', 'status', 'lamaran'), ['activePage' => 'jobdetail']));
    }

    public function addfavorite($id)
    {
        $user = auth()->user();
        $job = Job::findOrFail($id);

        $favoriteJobs = is_array($user->favorite_jobs)
            ? $user->favorite_jobs
            : json_decode($user->favorite_jobs, true) ?? [];

        // Cek apakah job sudah ada
        if (in_array($id, $favoriteJobs)) {
            return back()->with('info', 'Pekerjaan sudah ada di favorit.');
        }

        // Tambahkan dan simpan
        $favoriteJobs[] = $id;
        $user->favorite_jobs = $favoriteJobs;
        $user->save();

        return back()->with('success', 'Pekerjaan ditambahkan ke favorit.');
    }

    public function favoriteJobsData()
    {
        $user = auth()->user();

        $favoriteIds = is_array($user->favorite_jobs)
            ? $user->favorite_jobs
            : json_decode($user->favorite_jobs, true) ?? [];

        $jobs = Job::whereIn('id', $favoriteIds)
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->json($jobs);
    }


    public function myfavorites()
    {
        $user = auth()->user();
        $favoriteIds = is_array($user->favorite_jobs)
            ? $user->favorite_jobs
            : json_decode($user->favorite_jobs, true) ?? [];

        // Ambil semua job yang ID-nya ada di favoriteIds
        $jobs = Job::whereIn('id', $favoriteIds)
            ->orderBy('created_at', 'desc')
            ->get();
        return view('jobs.favoritejobs', compact('jobs'));
    }

    public function deletefavorite($id)
    {
        $user = auth()->user();
        $favorites = is_array($user->favorite_jobs)
            ? $user->favorite_jobs
            : json_decode($user->favorite_jobs, true) ?? [];

        $favorites = array_filter($favorites, fn($jobId) => $jobId != $id);

        // Simpan kembali ke kolom favorites
        $user->favorite_jobs = array_values($favorites); // biar index rapi
        $user->save();

        return redirect()->back()->with('success', 'Pekerjaan dihapus dari favorit.');
    }

    public function deletelamaran($id)
    {
        $lamaran = Lamaran::findOrFail($id);
        if ($lamaran) {
            $lamaran->delete();
        }

        return redirect()->route('jobs.history')->with('deletesuccess', 'Lamaran telah dihapus!');
    }

    public function historyJobsData()
    {
        $user = auth()->id();

        $lamaran = Lamaran::where('user_id', $user)->get();

        $jobId = $lamaran->pluck('job_id');

        $jobs = Job::whereIn('id', $jobId)
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->json(['jobs' => $jobs, 'lamaran' => $lamaran]);
    }

    public function history()
    {
        return view('jobs.history');
    }
}
