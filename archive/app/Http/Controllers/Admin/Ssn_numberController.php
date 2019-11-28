<?php

namespace App\Http\Controllers\Admin;

use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Morilog\Jalali\Jalalian;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Snn;

use function GuzzleHttp\Promise\all;

class Ssn_numberController extends Controller
{
    public function index(){

        $ssn = Snn::all()->where('status', '!=', 1);

        return view('ssn.list',compact('ssn'))->with(['panel_title'=>'لیست اشخاص ثبت شده']);
    
    }
    public function create(Request $request){
        
        if ($request->isMethod('get'))

            return view('ssn.form')->with('panel_title','ثبت شخص جدید');

        else {
            $validator = Validator::make(Input::all(), [
                'name'=>'required',
                'fname'=>'required',
                'lname'=>'required',
                'bnumber'=>'required',
                'ssn_number'=>'required',
                'recive_date'=>'required',
                'gender'=>'required',
            ]);
            if ($validator->fails()) {
                return array(
                    'fail' => true,
                    'errors' => $validator->getMessageBag()->toArray()
                );
            } else {
             
                $ssn = new Snn();
                $ssn->name = Input::get('name');
                $ssn->fname = Input::get('fname');
                $ssn->lname = Input::get('lname');
                $ssn->box_number = Input::get('bnumber');
                $ssn->ssn_number = Input::get('ssn_number');
                $ssn->recive_date = Input::get('recive_date');
                $ssn->distribute_date = Input::get('distribute_date');
                $ssn->secondary_ssn = Input::get('secondary_ssn');
                $ssn->gender = Input::get('gender');
                $ssn->state = Input::get('state');
             
             
                $ssn->save();
                return array(
                    'content' => 'content',
                    'url' => route('ssn.list')
                );

            }
        }
    }

        // delete person
    public function delete($id)
    {
        $ssn=Snn::find($id);
        $ssn->delete();
        return redirect()->route('ssn.list');
        
    }
    //  update person
    public function update(Request $request, $id)
    {

        $ssn=Snn::find($id);
        if($request->isMethod('get'))

            return view('ssn.form',compact('ssn'))->with(['panel_title'=>'ویرایش شخص']);
        else {
            $validator = Validator::make(Input::all(), [
                'name'=>'required',
                'fname'=>'required',
                'lname'=>'required',
                'bnumber'=>'required',
                'ssn_number'=>'required',
                'recive_date'=>'required',
                'gender'=>'required',

            ],
            );
            if ($validator->fails()) {
                return array(
                    'fail' => true,
                    'errors' => $validator->getMessageBag()->toArray()
                );
            }

       
                $ssn->name = Input::get('name');
                $ssn->fname = Input::get('fname');
                $ssn->lname = Input::get('lname');
                $ssn->box_number = Input::get('bnumber');
                $ssn->ssn_number = Input::get('ssn_number');
                $ssn->recive_date = Input::get('recive_date');
                $ssn->distribute_date = Input::get('distribute_date');
                $ssn->secondary_ssn = Input::get('secondary_ssn');
                $ssn->gender = Input::get('gender');
                $ssn->state = Input::get('state');
         
            $ssn->update();
            return array(
                'content' => 'content',
                'url' => route('ssn.list')
            );

            Session::put('msg_status', 'fkjdkfgjdlgjdlkgjdkgjdl');
        } 
    }

    public function report(){

        $ssn = Snn::all()->where('status', '!=', 1);

        return view('ssn.reportall',compact('ssn'))->with(['panel_title'=>'صفحه گزارش']);
   
    }


    public function report_data(Request $request)
    {

        if ($request->ajax()) {

           
            
            $output = '';

         
            $reason = $request->get('reason');
            $type = $request->get('type');


            if($reason==='all'){

                 // monthly report
            if ($type === 'month') {
                $get_month = $request->get('month_r');
                if (ctype_digit($get_month)) {
                    $jyear = Jalalian::fromCarbon(Carbon::now())->getYear();
                    $jmonth = $get_month;
                    $jday = '1';
                    $start_date = '';
                    if ($jmonth < 10 && $jday > 10) {
                        $start_date = $jyear . '-0' . $jmonth . '-' . $jday;
                    } elseif ($jday < 10 && $jmonth > 10) {
                        $start_date = $jyear . '-' . $jmonth . '-0' . $jday;

                    } elseif ($jmonth < 10 && $jday < 10) {
                        $start_date = $jyear . '-0' . $jmonth . '-0' . $jday;
                    }
                    // end date
                    $end_date = '';
                    $end_day = '29';
                    if ($jmonth < 10 && $end_day > 10) {
                        $end_date = $jyear . '-0' . $jmonth . '-' . $end_day;
                    } elseif ($end_day < 10 && $jmonth > 10) {
                        $end_date = $jyear . '-' . $jmonth . '-0' . $end_day;

                    } elseif ($jmonth < 10 && $end_day < 10) {
                        $end_date = $jyear . '-0' . $jmonth . '-0' . $end_day;
                    }

                    $data = DB::table('ssn_number')
                        ->whereBetween('recive_date', [$start_date, $end_date])
                        ->get();

                }

            }
            // yearly report
            if ($type === 'year') {

                $get_year = $request->get('year_r');
                $yaer_date = explode('/', $get_year);
                $final_year = $yaer_date[0];
                $start_date = $final_year . '-01-01';
                $end_date = $final_year . '-12-29';


                $data = DB::table('ssn_number')
                    ->whereBetween('recive_date', [$start_date, $end_date])
                    ->get();
            }
            // between tow date report
            if ($type === 'bt_date') {
                $start_date = $request->get('start_date');
                $end_date = $request->get('end_date');
            
                $data = DB::table('ssn_number')
                    ->whereBetween('recive_date', [$start_date, $end_date])
                    ->get();

            }

            }
           

            if($reason==='active')
            {

                    // monthly report
            if ($type === 'month') {
                $get_month = $request->get('month_r');
                if (ctype_digit($get_month)) {
                    $jyear = Jalalian::fromCarbon(Carbon::now())->getYear();
                    $jmonth = $get_month;
                    $jday = '1';
                    $start_date = '';
                    if ($jmonth < 10 && $jday > 10) {
                        $start_date = $jyear . '-0' . $jmonth . '-' . $jday;
                    } elseif ($jday < 10 && $jmonth > 10) {
                        $start_date = $jyear . '-' . $jmonth . '-0' . $jday;

                    } elseif ($jmonth < 10 && $jday < 10) {
                        $start_date = $jyear . '-0' . $jmonth . '-0' . $jday;
                    }
                    // end date
                    $end_date = '';
                    $end_day = '29';
                    if ($jmonth < 10 && $end_day > 10) {
                        $end_date = $jyear . '-0' . $jmonth . '-' . $end_day;
                    } elseif ($end_day < 10 && $jmonth > 10) {
                        $end_date = $jyear . '-' . $jmonth . '-0' . $end_day;

                    } elseif ($jmonth < 10 && $end_day < 10) {
                        $end_date = $jyear . '-0' . $jmonth . '-0' . $end_day;
                    }

                    $data = DB::table('ssn_number')
                        ->whereBetween('recive_date', [$start_date, $end_date])
                        ->where('state','=','فعال')
                        ->get();

                }

            }
            // yearly report
            if ($type === 'year') {

                $get_year = $request->get('year_r');
                $yaer_date = explode('/', $get_year);
                $final_year = $yaer_date[0];
                $start_date = $final_year . '-01-01';
                $end_date = $final_year . '-12-29';


                $data = DB::table('ssn_number')
                    ->whereBetween('recive_date', [$start_date, $end_date])
                    ->where('state','=','فعال')
                    ->get();
            }
            // between tow date report
            if ($type === 'bt_date') {
                $start_date = $request->get('start_date');
                $end_date = $request->get('end_date');
            
                $data = DB::table('ssn_number')
                    ->whereBetween('recive_date', [$start_date, $end_date])
                    ->where('state','=','فعال')
                    ->get();

            }

            }
        


            
            if($reason==='deactive')
            {
                  // monthly report
            if ($type === 'month') {
                $get_month = $request->get('month_r');
                if (ctype_digit($get_month)) {
                    $jyear = Jalalian::fromCarbon(Carbon::now())->getYear();
                    $jmonth = $get_month;
                    $jday = '1';
                    $start_date = '';
                    if ($jmonth < 10 && $jday > 10) {
                        $start_date = $jyear . '-0' . $jmonth . '-' . $jday;
                    } elseif ($jday < 10 && $jmonth > 10) {
                        $start_date = $jyear . '-' . $jmonth . '-0' . $jday;

                    } elseif ($jmonth < 10 && $jday < 10) {
                        $start_date = $jyear . '-0' . $jmonth . '-0' . $jday;
                    }
                    // end date
                    $end_date = '';
                    $end_day = '29';
                    if ($jmonth < 10 && $end_day > 10) {
                        $end_date = $jyear . '-0' . $jmonth . '-' . $end_day;
                    } elseif ($end_day < 10 && $jmonth > 10) {
                        $end_date = $jyear . '-' . $jmonth . '-0' . $end_day;

                    } elseif ($jmonth < 10 && $end_day < 10) {
                        $end_date = $jyear . '-0' . $jmonth . '-0' . $end_day;
                    }

                    $data = DB::table('ssn_number')
                        ->whereBetween('recive_date', [$start_date, $end_date])
                        ->where('state','=','غیرفعال')
                        ->get();

                }

            }
            // yearly report
            if ($type === 'year') {

                $get_year = $request->get('year_r');
                $yaer_date = explode('/', $get_year);
                $final_year = $yaer_date[0];
                $start_date = $final_year . '-01-01';
                $end_date = $final_year . '-12-29';


                $data = DB::table('ssn_number')
                    ->whereBetween('recive_date', [$start_date, $end_date])
                    ->where('state','=','غیرفعال')
                    ->get();
            }
            // between tow date report
            if ($type === 'bt_date') {
                $start_date = $request->get('start_date');
                $end_date = $request->get('end_date');
            
                $data = DB::table('ssn_number')
                    ->whereBetween('recive_date', [$start_date, $end_date])
                    ->where('state','=','غیرفعال')
                    ->get();

            }

            }
          
                
            if($reason==='mosana')
            {
                   // monthly report
            if ($type === 'month') {
                $get_month = $request->get('month_r');
                if (ctype_digit($get_month)) {
                    $jyear = Jalalian::fromCarbon(Carbon::now())->getYear();
                    $jmonth = $get_month;
                    $jday = '1';
                    $start_date = '';
                    if ($jmonth < 10 && $jday > 10) {
                        $start_date = $jyear . '-0' . $jmonth . '-' . $jday;
                    } elseif ($jday < 10 && $jmonth > 10) {
                        $start_date = $jyear . '-' . $jmonth . '-0' . $jday;

                    } elseif ($jmonth < 10 && $jday < 10) {
                        $start_date = $jyear . '-0' . $jmonth . '-0' . $jday;
                    }
                    // end date
                    $end_date = '';
                    $end_day = '29';
                    if ($jmonth < 10 && $end_day > 10) {
                        $end_date = $jyear . '-0' . $jmonth . '-' . $end_day;
                    } elseif ($end_day < 10 && $jmonth > 10) {
                        $end_date = $jyear . '-' . $jmonth . '-0' . $end_day;

                    } elseif ($jmonth < 10 && $end_day < 10) {
                        $end_date = $jyear . '-0' . $jmonth . '-0' . $end_day;
                    }

                    $data = DB::table('ssn_number')
                        ->whereBetween('recive_date', [$start_date, $end_date])
                        ->where('secondary_ssn','!=','Null')
                        ->get();

                }

            }
            // yearly report
            if ($type === 'year') {

                $get_year = $request->get('year_r');
                $yaer_date = explode('/', $get_year);
                $final_year = $yaer_date[0];
                $start_date = $final_year . '-01-01';
                $end_date = $final_year . '-12-29';


                $data = DB::table('ssn_number')
                    ->whereBetween('recive_date', [$start_date, $end_date])
                    ->where('secondary_ssn','!=','Null')
                    ->get();
            }
            // between tow date report
            if ($type === 'bt_date') {
                $start_date = $request->get('start_date');
                $end_date = $request->get('end_date');
            
                $data = DB::table('ssn_number')
                    ->whereBetween('recive_date', [$start_date, $end_date])
                    ->where('secondary_ssn','!=','Null')
                    ->get();

            }
            }
         
            return response()->json($data);

        }
        
        
    }

}





