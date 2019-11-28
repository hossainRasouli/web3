<link rel="stylesheet" type="text/css" href="/css/jquery-ui.min.css">
    <div class="row">
        <h3 style="text-align: center">صفحه گزارش افراد ثبت شده</h3>
        <form action="{{route('ssn.public')}}" id="report">
        <div class="col col-md-12">
            
                <div class="col col-md-3">
                    <div class="form-group">
                        <label for="reason">نوع گزارش:*</label>
                        <select name="reason" id="reason" class="form-control select2_1">
                            <option value="" >نوع گزارش</option>
                           <option value="all">گزارش عمومی</option>
                           <option value="active">گزارش افراد فعال</option>
                           <option value="deactive">گزارش افراد غیرفعال</option>
                           <option value="mosana">گزارش براساس مثنی</option>
                          
                        </select>
                    </div>


                </div>
                <div class="col col-md-3">
                    <div class="form-group" id="choose">
                        <label for="type">نحوه گزارش:</label>
                        <select id="type" name="type" class="form-control">
                            <option  value="type-1">نوع</option>
                            <option value="month">ماه</option>
                            <option value="year">سال</option>
                            <option value="bt_date">بین تاریخ</option>
                        </select>
                    </div>



                </div>
                <div class="col col-md-3">

                    @include('ssn.month')
                    @include('ssn.year')
                    @include('ssn.bettwen_date')
                    
                </div>
                <div class="col col-md-3">
                    <div class="form-group " id="between_date">
	                    <label for="end_date" class="control-label ">تاریخ:*</label>
	                    <div class="input-group">
		                    <input type="text" class="form-control" placeholder="روز/ماه/سال" id="jalali-enddate"
		                           name="end_date" >
		                    <span class="input-group-addon bg-primary text-white"><i class="fa fa-calendar"></i></span>
	                    </div>
                    </div>
                </div>
           

        </div>
        
        </form>
      
      
        <div class="col-md-12">
        
           
            <table id="example" class=" js-serial table table-striped table-bordered display" style="width:100%">
                <thead>
                <tr>
                    <th >شماره</th>
                    <th >نام</th>
                    <th >تخلص</th>
                    <th >نام پدر</th>
                    <th >باکس نمبر</th>
                    <th >نمبر تذکره</th>
                    <th >تاریخ دریافت</th>
                    <th >تاریخ توزیع</th>
                    <th >مثنی</th>
                    <th >جنسیت</th>
                    <th >وضعیت</th> 
                </tr>
                </thead>
                <tbody id="reports">
              
             
                </tbody>    

            </table>
           
    
        </div>

    </div>
     



      
    <script src="/js/jquery-ui.min.js"></script>
    <script type="text/javascript">
        
        $(document).ready(function () {
            
            
            $('#report').on('click', function (e) {
                e.preventDefault();
                var data = $(this).serialize();
                var url = $(this).attr('action');
               
    
               var request1= $.ajax({
                    type: 'GET',
                    url: url,
                    data: data,
                    dataType: 'json',
                   success: function (response) {
                    console.log(response);

                  
                  
                    table = $('#example').DataTable({
                            destroy: true,
                            dom: 'Bfrtip',
                            data: response,
                            
                             
                            buttons: [
                                {
                                    extend: 'print',  
                                    customize: function ( win ) {
                                        $(win.document.body)
                                            .css( 'direction', 'rtl' )
                                            
                    
                                        $(win.document.body).find( 'table' )
                                            .addClass( 'compact' )
                                            .css( 'font-size', 'inherit' );
                                    }
                                },
                                {
                                    extend: 'excelHtml5',
                                    autoFilter: true,
                                    
                                    sheetName: 'Exported data'
                                }
                            ],
                          
                            columns: [
                            { title: 'آی دی',data:'ssn_id'},
                            { title: 'نام' , data: 'name' },
                            { title: 'تخلص', data: 'lname' },
                            { title: 'نام پدر', data: 'fname' },
                            { title: 'باکس نمبر', data: 'box_number' },
                            { title: 'نمبر تذکره', data: 'ssn_number' },
                            { title: 'تاریخ دریافت', data:'recive_date' },
                            { title: 'تاریخ توزیع', data: 'distribute_date' },
                            { title: ' مثنی', data: 'secondary_ssn' },
                            { title: ' جنسیت', data: 'gender' },
                            { title: ' وضعیت', data: 'state' },
                            ]
                                   
                        });
                        
                        // $("#example tbody tr").each(function(i){
                        //         $(this).prepend("<td>" + i + "</td>")
                        //     })
                        //     $("#example thead tr").each(function(i){
                        //             $(this).prepend("<th>شماره</th>")
                        //     })
                   
                        // $('#reports').html(data.table_data)
                    $(".dt-button").addClass("btn");
               
                               
        
                   }
                  
                });
              
            });
        });
    
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
            kamaDatepicker('jalali-enddate', opt);
            kamaDatepicker('jalali-startdate', opt);
            kamaDatepicker('tat', opt);

            /*================
			  EDTITABEL TABLE
			* ===============*/
            $('.select2_1').select2();

        });
        
        
    
        /** customer report js**/
        $(function () {
            $('#as_date').hide();
            $('#year').hide();
            $('#month').hide();
            $('#between_date').hide();
            $('#type').change(function () {
            
                if ($('#type').val() == 'month') {
                    $('#between_date')
                    $('#year').hide();
                    $('#as_date').hide();
                    $('#month').show();
                } else if ($('#type').val() == 'week') {
                    $('#month').hide();
                    $('#as_date').hide();
                    $('#between_date').hide();
                    $('#year').hide();
                
                } else if ($('#type').val() == 'day') {
                    $('#month').hide();
                    $('#as_date').hide();
                    $('#between_date').hide();
                    $('#year').hide();
                
                } else if ($('#type').val() == 'year') {
                    $('#month').hide();
                    $('#as_date').hide();
                    $('#year').show();
                } else if ($('#type').val() == 'bt_date') {
                    $('#month').hide();
                    $('#year').hide();
                    $('#as_date').show();
                    $('#between_date').show();
                } else {
                    $('#selection').hide();
                }
            });
        });
        
    </script>