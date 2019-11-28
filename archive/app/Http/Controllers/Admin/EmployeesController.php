<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Position;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class EmployeesController extends Controller
{
    public function index()
    {
        $employees = Employee::all()->where('status', '<', 1);
        return view("employee.index", compact("employees"))->with('panel_title','لیست همه کارمندان');

    }


    public function create(Request $request)
    {
        if ($request->isMethod('get')) {

            return view('employee.form')->with('panel_title','راجسترکارمند جدید');

        } else {
            $validator = Validator::make(Input::all(), [

                'name' => 'required',
                'last_name' => 'required',
                'salary' => 'required',
                'phone' => 'required |min:10 |max:16',
                'email' => 'required |email',
                'come_date' => 'required ',
                'shift' => 'required'
            ]);
            if ($validator->fails()) {
                return array(
                    'fail' => true,
                    'errors' => $validator->getMessageBag()->toArray()
                );
            } else {
                if ($request->file("photo")) {
                    $photo_address = "image/" . time() . "." . $request->file("photo")->getClientOriginalExtension();
                    $request->file("photo")->move(public_path("image"), $photo_address);

                } else {

                    $photo_address = "image/empty_profile.jpg";
                }
                if ($request->file("agreepaper")  ) {
                    $agree_address = "image/per_" . time() . "." . $request->file("agreepaper")->getClientOriginalExtension();
                    $request->file("agreepaper")->move(public_path("image"), $agree_address);

                } else {

                    $agree_address = "image/agreement.jpg";
                }

                $arr = [
                    "first_name" => $request->input("name"),
                    "last_name" => $request->input("last_name"),
                    "email" => $request->input("email"),
                    "salary_type" => $request->input("salary_type"),
                    "phone" => $request->input("phone"),
                    "salary" => $request->input("salary"),
                    "shift" => $request->input("shift"),
                    "hire_date" => $request->input("come_date"),
                    "gender" => $request->input("gender"),
                    "status" => $request->input("status"),
                    "address" => $request->input("address"),
                    "photo" => $photo_address,
                    "agreement_paper" => $agree_address,
                    "status" => 0
                ];

                Employee::create($arr);
                return array(
                    'content' => 'content',
                    'url' => route('employee.list')
                );
            }
        }
    }

    public function delete($id)
    {
            $emp=Employee::find($id);
            $emp->delete();
            return redirect("employee.list");            
        
    }

    public function update(Request $request, $id)
    {
        $employee = Employee::find($id);

        if ($request->isMethod('get'))

            return view('employee.form', compact('employee'))->with('panel_title','ویرایش کارمند');

        else {
            $validator = Validator::make(Input::all(), [

                'name' => 'required',
                'last_name' => 'required',
                'salary' => 'required',
                'phone' => 'required |min:10 |max:16',
                'email' => 'required |email',
                'come_date' => 'required ',
                'shift' => 'required'
            ]);
            if ($validator->fails()) {
                return array(
                    'fail' => true,
                    'errors' => $validator->getMessageBag()->toArray()
                );
            }
            if ($request->file("photo")) {
                $photo_address = "image/" . time() . "." . $request->file("photo")->getClientOriginalExtension();
                $request->file("photo")->move(public_path("image"), $photo_address);

            } else {

                $photo_address = "image/empty_profile.jpg";
            }
            if ($request->file("agreepaper")  ) {
                $agree_address = "image/per_" . time() . "." . $request->file("agreepaper")->getClientOriginalExtension();
                $request->file("agreepaper")->move(public_path("image"), $agree_address);

            } else {

                $agree_address = "image/agreement.jpg";
            }


            $arr = [
                "first_name" => $request->input("name"),
                "last_name" => $request->input("last_name"),
                "email" => $request->input("email"),
                "salary_type" => $request->input("salary_type"),
                "phone" => $request->input("phone"),
                "salary" => $request->input("salary"),
                "shift" => $request->input("shift"),
                "hire_date" => $request->input("come_date"),
                "gender" => $request->input("gender"),
                "status" => $request->input("status"),
                "address" => $request->input("address"),
                "photo" => $photo_address,
                "agreement_paper" => $agree_address,
                "status" => 0,
            ];
            Employee::find($id)->update($arr);
            return array(
                'content' => 'content',
                'url' => route('employee.list')
            );
        }

    }
}
