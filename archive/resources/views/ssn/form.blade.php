<h4 class="box-title" style="text-align:center; margin-top:10px; font-size:20px;">
    {{isset($panel_title) ?$panel_title :''}}
</h4>


    <form method="post" id="frm" action="{{isset($ssn) ?url('ssn/update/'.$ssn->ssn_id):route('ssn.create')}}">
        {{isset($ssn) ?method_field('put') :''}}
        {{csrf_field()}}
        {{-- name --}}
        <div class="col-md-4">
            <div class="form-group required" id="form-name-error">
                <label for="name" class="col-md-4 control-label">نام</label>
            <input type="text" class="form-control" id="name" name="name"
                 value="{{old('name',isset($ssn)?$ssn-> name:'')}}"  placeholder="نام" autofocus required autocomplete="off">
                <span id="name-error" class="help-block"></span>
            </div>
        </div>
           {{-- father name --}}
           <div class="col-md-4">
            <div class="form-group required" id="form-fname-error">
                <label for="fname" class="col-md-4 control-label">نام پدر</label>
            <input type="text" class="form-control" id="fname" name="fname"
                 value="{{old('fname',isset($ssn)?$ssn-> fname:'')}}"  placeholder="نام پدر" autofocus required autocomplete="off">
                <span id="fname-error" class="help-block"></span>
            </div>
        </div>
        {{-- last name --}}
      <div class="col-md-4"> 
        <div class="form-group required" id="form-lname-error">
            <label for="lname" class="col-md-4 control-label">تخلص</label>
            <input type="text" class="form-control" id="lname" name="lname"
               value="{{old('lname',isset($ssn)?$ssn-> lname:'')}}" placeholder="تخلص" required autocomplete="off">
            <span id="lname-error" class="help-block"></span>
        </div>
      </div>
      {{-- box number --}}
      <div class="col-md-4"> 
        <div class="form-group required" id="form-bnumber-error">
            <label for="bnumber" class="col-md-4 control-label">باکس نمبر</label>
            <input type="text" class="form-control" id="bnumber" name="bnumber"
               value="{{old('bnumber',isset($ssn)?$ssn-> box_number:'')}}" placeholder="باکس نمبر" required autocomplete="off">
            <span id="bnumber-error" class="help-block"></span>
        </div>
      </div>
      {{-- ssn number --}}
      <div class="col-md-4"> 
        <div class="form-group required" id="form-ssn_number-error">
            <label for="ssn_number" class="col-md-4 control-label">نمبر تذکره</label>
            <input type="text" class="form-control" id="ssn_number" name="ssn_number"
               value="{{old('ssn_number',isset($ssn)?$ssn-> ssn_number:'')}}" placeholder="نمبر تذکره" required autocomplete="off">
            <span id="ssn_number-error" class="help-block"></span>
        </div>
      </div>
{{-- state --}}
 <div class="col-md-4">
  <div class="form-group required" id="form-state-error" style="padding-left:0px;">
    <label for="gender" class="col-md-6 control-label">وضعیت</label>
      <select name="state" id="state" class="form-control" required autocomplete="off">
        <option value ="فعال"
        {{isset($ssn->state) && $ssn->state =='فعال'? 'selected'.'='. 'selected':
              ''}}
        >فعال</option>
        <option  value="غیرفعال"
        {{isset($ssn->state) && $ssn->state =='غیرفعال'? 'selected'.'='. 'selected':
              ''}}
        >غیرفعال</option>
      </select>
          <span id="state-error" class="help-block"></span>
  </div>
</div>


      {{-- recive date --}}
      <div class="col-md-4"> 
        <div class="form-group required" id="form-recive_date-error">
            <label for="recive_date" class="col-md-6 control-label">تاریخ دریافت</label>
            <input id="jalali-datepicker"  class="form-control jalali-datepicker" id="recive_date" name="recive_date"
               value="{{old('recive_date',isset($ssn)?$ssn-> recive_date:'')}}" placeholder="روز/ماه/سال" required autocomplete="off">
            <span id="recive_date-error" class="help-block"></span>
        </div>
      </div>
      
          {{-- distribute_date--}}
          <div class="col-md-4"> 
            <div class="form-group required" id="form-distribute_date-error">
                <label for="distribute_date" class="col-md-4 control-label">تاریخ توزیع</label>
                   <input  name="distribute_date" id="jalali-datepicker1" class="form-control jalali-datepicker1"  placeholder="روز/ماه/سال"
                   value="{{old('distribute_date',isset($ssn)?$ssn-> distribute_date:'')}}"   required autocomplete="off">
                <span id="distribute_date-error" class="help-block"></span>
            </div>
          </div>

          {{-- mosan --}}
      <div class="col-md-4">
        <div class="form-group" id="form-mosana-error">
            <label for="secondary_ssn" class="col-md-4 control-label">مثنی</label>
            <input type="text" class="form-control" id="secondary_ssn" name="secondary_ssn" 
                value="{{old('secondary_ssn',isset($ssn)?$ssn-> secondary_ssn:'')}}" placeholder="مثنی" autocomplete="off">
            <span id="secondary_ssn-error" class="help-block"></span>     
        </div>
      </div>
      {{-- gender --}}
     <div class="col-md-4">
        <div class="form-group required" id="form-gender-error" style="padding-left:0px;">
          <label for="gender" class="col-md-6 control-label">جنسیت</label>
            <select name="gender" id="gender" class="form-control" required autocomplete="off">
              <option  value="مرد"
              {{isset($ssn->gender) && $ssn->gender =='مرد'? 'selected'.'='. 'selected':
              ''}}
              >مرد</option>
              <option value ="زن"
              {{isset($ssn->gender) && $ssn->gender =='زن'? 'selected'.'='. 'selected':
              ''}}
              >زن</option>
            </select>
                <span id="gender-error" class="help-block"></span>
        </div>
     </div>
       

    <div class="col-md-12">
         
     <button class="btn btn-primary" type="submit" id="btn_save">ذخیره<i class="fa fa-save" style="margin-right: 5px;"></i></button>     
     <a href="javascript:ajaxLoad('{{route('ssn.list')}}')" class="btn btn-danger">لغو<i class="fa fa-backward" style="margin-right: 5px;"></i></a>
    </div>
     
    </form>




    <script src="/js/jquery-ui.min.js"></script>

    <script type="text/javascript">
    
        $(document).ready(function () {

          $('#state').change(function() {
          if( $(this).val() ==="فعال") {
              $('#jalali-datepicker1').prop( "disabled", false );
          } else {       
              $('#jalali-datepicker1').prop( "disabled", true );
          }
      });


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
            kamaDatepicker('jalali-enddate', opt);
            kamaDatepicker('jalali-startdate', opt);
    
            /*================
              EDTITABEL TABLE
            * ===============*/
            $('.select2_1').select2();
    
        });
        
    
    
    </script>

    
<script src="/js/jquery-ui.min.js"></script>
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

        kamaDatepicker('jalali-datepicker1', opt);
        kamaDatepicker('jalali-enddate', opt);
        kamaDatepicker('jalali-startdate', opt);

        /*================
          EDTITABEL TABLE
        * ===============*/
        $('.select2_1').select2();

    });
    


</script>

    
    
