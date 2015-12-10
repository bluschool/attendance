<?php namespace Bluschool\Attendance\Http\Controllers;


use Bluschool\Attendance\Http\Requests\AttendanceRequest;
use Bluschool\Attendance\Model\Attendance;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;
use Laracasts\Flash\Flash;
use Orchestra\Foundation\Http\Controllers\AdminController;

class AttendanceController extends AdminController {

    public function __construct()
    {
//        $this->middleware('registration');
        $this->middleware('attendance');
    }

    protected function setupFilters()
    {
        $this->beforeFilter('control.csrf', ['only' => 'delete']);
    }

    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Attendance $attendance)
	{
        return view('bluschool/attendance::attendance', compact('attendance'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return view('bluschool/attendance::edit');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(AttendanceRequest $request )
	{
        try {
            $file = Input::file('file1');
            $filename1 = 'attendance_'.uniqid() . '.jpg';
            $destinationPath = 'images/attendance';
            $itemImage = Image::make($file)->fit(350, 450);
            $itemImage->save($destinationPath . '/' . $filename1);
            $request['photo'] = $destinationPath.'/'.$filename1;

            $attachFile = Input::file('file2');
            $filename2 = 'attendance_attach_'.uniqid() . '.jpg';
            $destinationPathAttach = 'images/attendance';
            $itemAttachment = Image::make($attachFile)->fit(450, 350);

            $itemAttachment->save($destinationPathAttach . '/' . $filename2);
            $request['attachment'] = $destinationPathAttach.'/'.$filename2;

            $attendance = Attendance::create($request->all());

        } catch (Exception $e) {
            Flash::error('Unable to Save');
            return $this->redirect(handles('bluschool/attendance::attendance'));
        }
        Flash::success($attendance->name.' Saved Successfully');
        return $this->redirect(handles('bluschool/attendance::member'));

    }

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	
	public function teacherAttendance()
	{
		//
	}

	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
