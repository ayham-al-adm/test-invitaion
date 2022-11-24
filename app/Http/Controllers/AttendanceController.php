<?php

namespace App\Http\Controllers;

use App\Http\Requests\Attendances\AttendancePostRequest;
use App\Models\Attendance;
use App\Services\AttendanceService;
use App\Services\ImageUploaderService;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web')->except(['create', 'store']);
    }
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attendances = Attendance::latest()->paginate(10);
        return view('attendances.index', ['attendances' => $attendances]);
    }
    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response

     */
    public function create()
    {
        return view('attendances.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request   $request
     * @return \Illuminate\Http\Response
     */
    public function store(AttendancePostRequest $request, AttendanceService $service, ImageUploaderService $uploader)
    {
        $passportImage = $uploader->uploadSingle($request->file('passport_image'));
        $personalImage = $uploader->uploadSingle($request->file('personal_image'));

        $images = [
            'passport_image'    => $passportImage,
            'personal_image'    => $personalImage,
        ];

        dd($request->validated(), $images);
        $service->addNew($request->validated(), $images);
        return redirect()->route('attendances.index')->with('success', 'Item Added Successfully!');
    }
    /**
     * Display the specified resource.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        //
    }
    /**
     * Show the form for editing the specified resource.
     * @param  int  $id
     * @return  \Illuminate\Http\Response
     */
    public function edit($id)

    {

        //

    }
    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request   $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        //

    }
    /**
     * Remove the specified resource from storage.
     * @param  int  $id
     * @return  \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }
}
