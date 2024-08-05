<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $students = DB::table('students')->select()->get();
        $students = Student::query()->with('subject')->latest()->paginate();

        return view('pages/students/index', [
            'students' => $students,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $subjects = Subject::query()->latest()->get();

        return view('pages/students/create', [
            'subjects' => $subjects
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'subject_id' => 'required',
            'image_ur;' => 'nullable|image'
        ]);

        if ($request->has('image_url')) {
            $name = time() . '.' . $request->image_url->extension();
            $request->file('image_url')->move('storage/images', $name);
            $validatedData['image_url'] = $name;
        }

        $student = Student::query();
        $student->create($validatedData);
        return redirect('/students');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        if (empty($student)) {
            return redirect('/students');
        }

        return view('pages/students/show', [
            'student' => $student
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        $subjects = Subject::query()->latest()->get();
        return view('pages/students/edit', [
            'student' => $student,
            'subjects' => $subjects
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $validatedData = $request->validate([
            'name' => 'nullable|string',
            'email' => 'nullable|email',
            'subject_id' => 'nullable',
            'image_url' => 'nullable|image'
        ]);

        if (empty($validatedData)) {
            return redirect("/students/edit/{{$student->id}}");
        }

        if ($request->has('image_url')) {
            if ($student->image_url) {
                $prevImage = public_path('storage/images' . '/' . $student->image_url);
                if (file_exists($prevImage)) {
                    unlink($prevImage);
                }
            }

            $name = time() . '.' . $request->image_url->extension();
            $request->file('image_url')->move('storage/images', $name);
            $validatedData['image_url'] = $name;
        }

        $student->update($validatedData);
        return redirect("/students");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        if (empty($student)) {
            return redirect("/students");
        }
        $student->delete($student);
        return redirect("/students");
    }
}
