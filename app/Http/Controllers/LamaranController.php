<?php

namespace App\Http\Controllers;
use App\Models\Job;
use App\Models\Lamaran;

use Illuminate\Http\Request;

class LamaranController extends Controller
{
    public function index($jobId)
    {
        $job = Job::findOrFail($jobId);
        return view("lamaran.apply", compact('job'));
    }

    public function store(Request $request, $id)
    {
        $job = Job::findOrFail($id);
        $user = auth()->id();

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:lamarans,email',
            'phone' => 'required',
            'address' => 'required',
            'cv' => 'required|file|mimes:pdf,doc,docx|max:2048',
            'message' => 'nullable|string',
        ]);

        $cvPath = $request->file('cv')->store('lamaran/cv', 'public');

        $data['user_id'] = $user;
        $data['job_id'] = $job->id;
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['address'] = $request->address;
        $data['cv_path'] = $cvPath;
        $data['message'] = $request->message ?? null;

        Lamaran::create($data);
        return redirect()->route('lamaran.success')->with('success', 'lamaran berhasil dikirimkan');
    }

    public function success()
    {
        return view('lamaran.success');
    }

    public function editlamaran($id)
    {
        $lamaran = Lamaran::findOrFail($id);
        $job = $lamaran->job_id;
        return view('lamaran.editlamaran', compact('lamaran', 'job'));
    }

    public function update(Request $request, $id)
    {
        $lamaran = Lamaran::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:lamarans,email',
            'phone' => 'required',
            'address' => 'required',
            'cv' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
            'message' => 'nullable|string',
        ]);

        if ($request->hasFile('cv')) {
            $cvPath = $request->file('cv')->store('lamaran/cv', 'public');
            $data['cv_path'] = $cvPath;
        } else {
            $data['cv_path'] = $lamaran->cv_path;
        }

        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['address'] = $request->address;
        $data['cv_path'] = $cvPath ?? $lamaran->cvPath;
        $data['message'] = $request->message ?? $lamaran->message;

        $lamaran->update($data);
        return redirect()->route('lamaran.success')->with('success', 'lamaran berhasil diedit');
    }
}
