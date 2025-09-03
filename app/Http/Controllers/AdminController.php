<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Job;
use App\Models\Lamaran;

class AdminController extends Controller
{
    public function home()
    {
        $jobCount = Job::count();
        $candidateCount = User::role('job_seeker')->count();
        $applicationCount = Lamaran::count();
        $activeEmployers = User::role('employer')->count();
        $recentJobs = Job::latest()->take(6)->get();
        return view('admin.adminhome', compact(
            'jobCount',
            'candidateCount',
            'applicationCount'
            ,
            'activeEmployers',
            'recentJobs'
        ));
    }

    public function getEmployersData()
    {
        $employers = User::role('employer')->get();
        return response()->json($employers);
    }

    public function employerlist()
    {
        return view('admin.employerlist');
    }

    public function getUserData()
    {
        $user = User::role('job_seeker')->get();
        return response()->json($user);
    }

    public function jobseekerlist()
    {
        return view('admin.jobseekerlist');
    }

    public function getLowongansData(Request $request)
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

    public function lowonganlist()
    {
        return view('admin.lowonganlist');
    }

    public function jobdetail($id)
    {
        $job = Job::findOrFail($id);
        $employer = User::findOrFail($job->user_id);
        return view('admin.jobdetail', array_merge(compact('job', 'employer')));
    }

    public function employerdetail($id)
    {
        $employer = User::findOrFail($id);

        return view('admin.employerdetail', compact('employer'));
    }

    public function employerdelete($id)
    {
        $employer = User::findOrFail($id);
        $employer->delete();

        return redirect()->back()->with('success', 'Lamaran berhasil dihapus.');
    }

    public function getemployerjobs(Request $request, $id)
    {
        $user = User::findOrFail($id);
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

    public function employerjobs($id)
    {
        $employer = User::findOrFail($id);
        return view('admin.employerjobs', compact('employer'));
    }

    public function getLamaransData($id)
    {
        $lamarans = Lamaran::with('job')->where('user_id', $id)->get();

        return response()->json($lamarans);
    }

    public function lamaranlistuser($id)
    {
        $user = User::findOrFail($id);
        $lamarans = Lamaran::where('user_id', $id)->get();

        return view('admin.lamaranlistuser', array_merge(compact('user', 'lamarans')));
    }
}