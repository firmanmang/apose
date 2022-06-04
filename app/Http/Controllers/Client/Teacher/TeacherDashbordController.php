<?php

namespace App\Http\Controllers\Client\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\School;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class TeacherDashbordController extends Controller
{
    public function index(Request $request)
    {
        $teacher = $request->user();

        $studies = $teacher->teachs()
            ->limit(7)
            ->with('classroom:id,name')
            ->get();

        if ($studies->count() <= 0) {
            return redirect()->route('error-page', 
                'Mohon hubungi admin untuk menetapkan pelajaran anda');
        };

        $school = School::find($teacher->school_id);

        return Inertia::render('Teacher/Dashboard', [
            'school' => $school->name,
            'studies' => $studies,
        ]);
    }
}
