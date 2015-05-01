<?php namespace App\Http\Controllers;

use Request;
use Redirect;
use App\Http\Requests;
use App\Models\Teacher;
use App\Http\Requests\TeacherRequest;
use App\Http\Requests\TeacherEditRequest;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\File;

class TeachersController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $teachers = Teacher::all();

        return view('teachers.index', compact('teachers'));
    }


    /**
     * @param TeacherRequest $request
     * @return mixed
     */
    public function store(TeacherRequest $request)
    {
        $image = $request->file('image');
        $extension = $image->getClientOriginalExtension();

        $teacher = new Teacher;
        $teacher->name = $request->get('name');
        $teacher->teaches = $request->get('teaches');
        $teacher->education = $request->get('education');
        $teacher->description = $request->get('description');
        $teacher->image = $extension;
        $teacher->email = $request->get('email');
        $teacher->fb = $request->get('fb');
        $teacher->phone = $request->get('phone');
        $teacher->cv = $request->get('cv');
        $teacher->save();

        $imageName = $teacher->id . '.' . $extension;
        $image->move(base_path() . '/public/fileStorage/profile/', $imageName);

        return Redirect::route('teachers.index')->with('message', 'Teachers added!');
    }

    /**
     * @param Teacher $teacher
     * @return \Illuminate\View\View
     */
    public function show(Teacher $teacher)
    {
        return view('teachers.show', compact('teacher'));
    }


    /**
     * @param Teacher $teacher
     * @return \Illuminate\View\View
     */
    public function edit(Teacher $teacher)
    {
        return view('teachers.edit', compact('teacher'));
    }

    /**
     * @param Teacher $teacher
     * @param TeacherEditRequest $request
     * @return mixed
     */
    public function update(Teacher $teacher, TeacherEditRequest $request)
    {
        $image = $request->file('image');
        $extension = $image->getClientOriginalExtension();
        $teacher->name = $request->get('name');
        $teacher->teaches = $request->get('teaches');
        $teacher->education = $request->get('education');
        $teacher->description = $request->get('description');
        $teacher->email = $request->get('email');
        $teacher->fb = $request->get('fb');
        $teacher->phone = $request->get('phone');
        $teacher->cv = $request->get('cv');
        if (!$extension == null) $teacher->image = $extension;
        $teacher->save();

        if ($image)
        {
            $filepath = base_path() . '/public/fileStorage/profile/';
            $imageName = $teacher->id . '.' . $extension;
            if (File::exists($filepath . $imageName))
            {
                File::delete($filepath . $imageName);
                $image->move(base_path() . '/public/fileStorage/profile/', $imageName);
            } else $image->move(base_path() . '/public/fileStorage/profile/', $imageName);
        }

        return Redirect::route('teachers.index')->with('message', 'Teachers edited!');
    }

    /**
     * @param Teacher $teacher
     * @return mixed
     * @throws \Exception
     */
    public function destroy(Teacher $teacher)
    {
        $filepath = base_path() . '/public/fileStorage/profile/';
        $image = $teacher->id . '.' . $teacher->image;

        if (File::exists($filepath . $image))
        {
            File::delete($filepath . $image);
        }
        $teacher->delete();

        return Redirect::route('teachers.index')->with('message', 'teachers entry successfully deleted.');
    }

}
