<div class="container">
    <h3 >
        {{isset($panel_title) ?$panel_title :''}}
    </h3>
    <div class="row col-lg-10 col-md-10">
        <form method="post" id="frm" enctype="multipart/form-data"
              action="{{isset($employee) ? route('employee.update',$employee->employee_id ) : route('employee.create')}}">
            {{csrf_field()}}
            <div class="col-md-8">

                <div class="form-group required" id="form-name-error">
                    <label for="name" class="col-md-4 control-label">نام : </label>
                    <input id="name" type="text" class="form-control required" name="name"
                           value="{{ old('name',isset($employee)? $employee->first_name:'') }}"
                           autofocus>
                    <span id="name-error" class="help-block"></span>
                </div>
                <div class="form-group required " id="form-last_name-error">
                    <label for="version" class="col-md-4 control-label"> تخلص :</label>
                    <input id="version" type="text" class="form-control required" name="last_name"
                           value="{{ old('last_name',isset($employee)? $employee->last_name:'') }}"
                           autofocus>
                    <span id="last_name-error" class="help-block"></span>
                </div>


                <div class="form-group required " id="form-email-error">
                    <label for="email" class="col-md-4 control-label">ایمیل :</label>
                    <input id="email" type="email" class="form-control required" name="email"
                           value="{{ old('email',isset($employee)? $employee->email:'') }}"
                           autofocus>
                    <span id="email-error" class="help-block"></span>
                </div>


                <div class="form-group required" id="form-phone-error">
                    <label for="phone" class="col-md-4 control-label">نمبرتماس :</label>
                    <input id="phone" type="tel" class="form-control required" name="phone"
                           value="{{ old('phone',isset($employee)? $employee->phone:'') }}"
                           autofocus>
                    <span id="phone-error" class="help-block"></span>
                </div>
                <div class="form-group required " id="form-address-error">
                    <label for="address" class="col-md-4 control-label">آدرس :</label>
                    <input id="address" type="text" class="form-control required" name="address"
                           value="{{ old('address',isset($employee)? $employee->address:'') }}"
                           autofocus>
                    <span id="address-error" class="help-block"></span>
                </div>
                <div class="form-group required" id="form-salary_type-error">
                    <label for="salary_type" class="col-md-4 control-label">نوعیت معاش :</label>
                   <select name="salary_type" id="salary_type" class="form-control required">
                       <option  value="معاش ثابت" >معاش ثابت</option>
                       <option value ="فیصدی"> فیصدی</option>
                   </select>
                    <span id="slary_type-error" class="help-block"></span>
                </div>
                <div class="form-group required" id="form-salary-error">
                    <label for="salary" class="col-md-4 control-label"> مبلغ معاش یافیصدی :</label>
                    <input id="salary" type="number" class="form-control required" name="salary"
                           value="{{ old('salary',isset($employee)? $employee->salary:'') }}"
                           autofocus>
                    <span id="salary-error" class="help-block"></span>
                </div>
                <div class="form-group required" id="form-shift-error">
                    <label for="shift" class="col-md-4 control-label required">تایم کاری :</label>
                    <select name="shift" id="shift" class="form-control required">
                        <option value="تمام وقت"> تمام وقت</option>
                        <option value="قبل ازظهر">قبل ازظهر</option>
                        <option value="بعدازظهر">بعدازظهر</option>
                    </select>
                    <span id="shift-error" class="help-block"></span>
                </div>
                <div class="form-group required" id="form-come_date-error">
                    <label for="come_date" class="col-md-4 control-label">تاریخ استخدام :</label>
                    <input id="jalali-datepicker"  placeholder="روز/ماه/سال" type="" class="form-control jalali-datepicker required" name="come_date"
                           value="{{ old('come_date',isset($employee)? $employee->hire_date:'') }}"
                           autofocus>
                    <span id="come_date-error" class="help-block"></span>
                </div>
                <div class="form-group " >
                    <label for="gender" class="col-md-4 control-label">جنسیت : </label>
                    <label>
                        <input type="radio"

                               @if(isset($employee))

                               @if($employee->gender == "آقا")
                               checked
                               @endif
                               @endif
                               name="gender" value="آقا" checked/>
                        آقای
                    </label>
                    <label>
                        <input type="radio"
                               @if(isset($employee))

                               @if($employee->gender == "خانم")
                               checked
                               @endif

                               @endif
                               name="gender" value="خانم"/>
                        خانم
                    </label>
                </div>
                <div class="form-group">
                    <label for="status" class="col-md-4 control-label">حالت مدنی: </label>
                    <label>
                        <input type="radio"
                               @if(isset($employee))

                               @if($employee->marital_status == "مجرد")
                               checked
                               @endif

                               @endif name="status" value="مجرد" checked/>
                        مجرد
                    </label>
                    <label>
                        <input type="radio"
                               @if(isset($employee))

                               @if($employee->marital_status == "متاهل")
                               checked
                               @endif

                               @endif
                               name="status" value="متاهل"/>
                        متاهل
                    </label>

                </div>

            </div>
            <div class="col-md-3" style="margin-top: 28px;">
                <div class="form-group">
                    <input name="photo"
                           {{ isset($employee)? 'disabled' : " " }}  style='height: 0px;width:0px; overflow:hidden;'
                           id="photo" type='file'
                           onchange="readURL1(this);"/>
                    <img id="blah1" style="height: 100%;width: 100% "
                         src="{{ isset($employee) ? asset($employee->photo) : asset('image/empty_profile.jpg') }}"
                         alt="your image"/>
                    <label for="photo" {{ isset($employee)? 'disabled' : " " }} class="form-control btn btn-default">انتخاب
                        عکس :</label>
                </div>
                <div class="form-group">
                    <input name="agreepaper" style='height: 0px;width:0px; overflow:hidden;'
                           {{ isset($employee)? 'disabled' : " " }} id="agreement" type='file'
                           onchange="readURL2(this);"/>
                    <img id="blah2" style="height: 100%;width: 100%"
                         src="{{isset($employee) ? asset( $employee->agreement_paper ) :  asset('image/agreement.jpg') }}"
                         alt="your image"/>
                    <label for="agreement"
                           {{ isset($employee)? 'disabled' : " " }} class="form-control btn btn-default">انتخاب تعهد
                        نامه :</label>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-6 col-md-offset-4 register">
                    <a href="javascript:ajaxLoad('employee')" class="btn btn-danger">لغو</a>
                    <button type="submit" id="btn_save" class="btn btn-primary"> ذخیره</button>
                </div>
            </div>
        </form>
    </div>
</div>


<script type="text/javascript">


    $(document).ready(function () {
        /*================
   JALALI DATEPICKER
   * ===============*/
        var opt = {

            // placeholder text

            placeholder: "",

            // enable 2 digits

            twodigit: true,

            // close calendar after select

            closeAfterSelect: true,

            // nexy / prev buttons

            nextButtonIcon: "fa fa-forward",

            previousButtonIcon: "fa fa-backward",

            // color of buttons

            buttonsColor: "پیشفرض ",

            // force Farsi digits

            forceFarsiDigits: true,

            // highlight today

            markToday: true,

            // highlight holidays

            markHolidays: false,

            // highlight user selected day

            highlightSelectedDay: true,

            // true or false

            sync: false,

            // display goto today button

            gotoToday: true

        }

        kamaDatepicker('jalali-datepicker', opt);

        /*================
		  EDTITABEL TABLE
		* ===============*/
        $('.select2_1').select2();

    });
</script>
