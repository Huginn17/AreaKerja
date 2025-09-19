<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SkillController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'skill' => 'required|string|max:255',
            'experience_level' => 'nullable|string|max:255',
        ]);

        $validated['pelamar_id'] = Auth::user()->pelamar->id;

        Skill::create($validated);
        return redirect()->route('profile.index')->with('success', 'Pengalaman Kerja berhasil disimpan');
    }

    public function update(Request $request, Skill $skill)
    {
        $validated = $request->validate([
            'skill' => 'required|string|max:255',
            'experience_level' => 'nullable|string|max:255',
        ]);

        $validated['pelamar_id'] = Auth::user()->pelamar->id;


        $skill->update($validated);
        return redirect('/profile');
        return back();
    }

    public function edit(Skill $skill)
    {
        return view('non-user.profile.skill.edit', ['DS' => $skill]);
    }

    public function destroy(Skill $skill)
    {
        $skill->delete();
        return redirect()->back()->with('success', 'Pengalaman Kerja berhasil dihapus');
    }
}
