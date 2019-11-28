<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Employee;
use App\Models\SalaryPayment;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class EmployeeReportsController extends Controller
{
    public function index(Request $request){

        $salary = SalaryPayment::select('payment_id', 'payment_amount', 'payment_borrow', 'payment_date','payment_month','salary', 'first_name')
            ->Join('employee', 'employee.employee_id', '=', 'salary_payment.employee_id')
            ->where('payment_borrow', '>',0)->get();

        return view('employeereport.index',compact('salary'))->with(['panel_title'=>'پرداخت باقیات معاش کارمندان']);

    }

    public function getSalary($id)
    {
        $employee = \DB::table("employee")
            ->select("employee_id","salary")
            ->where("employee_id",$id)->first();
        return ($employee ->salary);
    }


    public function create(Request $request)
    {
        $employee = Employee::select('employee_id', 'salary', 'first_name','last_name')
            ->where('status', '==',0)
            ->get();

        if ($request->isMethod('get'))
            return view('employeereport.form', compact('employee'))->with('panel_title','پرداخت معاش کارمندان');
        else {

            //$empSalary = Input::get('salary');
            $validator = Validator::make(Input::all(), array(

                'employee_id' => 'required',
                'payment_amount' => 'required',
                'payment_month' => 'required',
                'payment_date' => 'required |min:1'

            ));
            if ($validator->fails()) {
                return array(
                    'fail' => true,
                    'errors' => $validator->getMessageBag()->toArray()
                );
            } else {

                $sp = new SalaryPayment();
                $sp->payment_date = Input::get('payment_date');
                $sp->payment_month = Input::get('payment_month');
                $sp->payment_amount = Input::get('payment_amount');
                $sp->payment_borrow = (Input::get('salary') - Input::get('payment_amount'));
                $sp->employee_id = Input::get('employee_id');
           

                $sp->save();
                return array(
                    'content' => 'content',
                    'url' => route('employeereport.list')
                );
            }
        }
    }


    public function update(Request $request,$id){
        $salary=SalaryPayment::find($id);
        $employee = Employee::select('employee_id', 'salary', 'first_name','last_name')
            ->where('status', '!=',1)->get();
        if($request->isMethod('get'))

            return view('employeereport.form',compact('salary','employee'))->with(['panel_title'=>'ویرایش پرداخت معاش کارمند']);
        else {

            $validator = Validator::make(Input::all(), [

                'employee_id' => 'required',
                'payment_amount' => 'required',
                'payment_month' => 'required',
                'payment_date' => 'required'
            ]);
            if ($validator->fails()) {

                return array(
                    'fail' => true,
                    'errors' => $validator->getMessageBag()->toArray()
                );
            }
            if ($request->get('id')) {
                $data = [
                    'payment_date' => $request->get('payment_date'),
                    'payment_month' => $request->get('payment_month'),
                    'payment_amount' => $request->get('payment_amount'),
                    'employee_id' => $request->get('employee_id'),
                    'user_id' => Session::get('user_id')

                ];

                SalaryPayment::find($request->get('id'))->where('payment_id', $request->get('id'))->update($data);

                return array(
                    'content' => 'content',
                    'url' => route('employeereport.list')
                );
            }
        }
    }



    public function payment(Request $request,$id)
    {
        $salary=SalaryPayment::find($id);
        $employee = Employee::find($salary->employee_id);
        if($request->isMethod('get'))

            return view('employeereport.payment_form',compact('salary','employee'))->with(['panel_title'=>'پرداخت باقی معاش کارمند']);
        else{

            $validator=Validator::make(Input::all(),[
                'id' => 'required',
                'payment_amount' => 'required|min:1',
                'payment_month' => 'required',
                'payment_date' => 'required'
            ]);
            if($validator->fails()){

                return array(
                    'fail'=>true,
                    'errors'=>$validator->getMessageBag()->toArray()
                );
            }

            if (ctype_digit($request->get('id'))) {
                $payment = Input::get('payment_amount');
                if ($payment <= $salary->payment_borrow) {

                    $data = [
                        'payment_date' => $request->get('payment_date'),
                        'payment_month' => $request->get('payment_month'),
                        'payment_amount' => ($salary->payment_amount + $payment),
                        'payment_borrow' => ($salary->payment_borrow - $payment),
                        'user_id' => Session::get('user_id')

                    ];

                    SalaryPayment::find($request->get('id'))->where('payment_id', $request->get('id'))->update($data);

                    return array(
                        'content' => 'content',
                        'url' => route('employeereport.list')
                    );
                }
                else{

                }

            }

        }
    }


    public  function  getdata(Request  $request){
        $em=SalaryPayment::select('payment_amount','payment_borrow','payment_date') ->where('payment_date',$request->id)
            ->where('employee_id',$request->employeeId)->get();
        return response()->json($em);
    }


    public function empSalaryPayPercentage()
    {


        $salary = Employee::selectRaw('employee.employee_id, salary_type, salary, first_name, last_name')
            ->where('salary_type' ,'=','فیصدی')
            ->where('employee.status', '!=',1)
            ->Join('class', 'class.employee_id', '=', 'employee.employee_id')
            ->Join('student_class','student_class.class_id','=','class.class_id')
            ->Join('subject','subject.subject_id','=','class.subject_id')
            ->get();

        return view('employeereport.empSalaryPayPercentage',compact('salary'))->with(['panel_title'=>'پرداخت باقیات معاش کارمندان']);

    }

}
