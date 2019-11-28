
@include('notifications.notifications');
<h4 class="box-title" style="text-align:center; font-size:20px;">
    {{isset($panel_title) ?$panel_title :'لیست اشخاص ثبت شده'}}
</h4>

<div class="col-md-12">
    <table id="example" class="table display nowrap table-striped table-bordered table-sm" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th >شماره</th>
            <th >نام و تخلص</th>
            <th >نام پدر</th>
            <th >باکس نمبر</th>
            <th >نمبر تذکره</th>
            <th >تاریخ دریافت</th>
            <th >تاریخ توزیع</th>
            <th >مثنی</th>
            <th >جنسیت</th>
            <th >وضعیت</th>
            <th >عملیات</th>
        </tr>
        </thead>
        <tbody>
        {{$i=0}}
        @foreach($ssn as $ssn)
            <tr>
                <td>{{++$i}}</td>
                <td>{{$ssn->name."  ".$ssn->lname}}</td>
                <td>{{$ssn->fname}}</td>
                <td>{{$ssn->box_number}}</td>
                <td>{{$ssn->ssn_number}}</td>
                <td>{{$ssn->recive_date}}</td>
                <td>{{$ssn->distribute_date}}</td>
                <td>{{$ssn->secondary_ssn}}</td>
                <td>{{$ssn->gender}}</td>
                <td>{{$ssn->state}}</td>
                <td colspan="2">
                    <a href="javascript:if(confirm('Are you want to delete this record?'))ajaxDelete('{{route('ssn.delete',$ssn->ssn_id)}}','{{csrf_token()}}')"><i class=" glyphicon glyphicon-trash btn-sm" ></i></a>
                    <a href="javascript:ajaxLoad('{{route('ssn.update',$ssn->ssn_id)}}')"><i class="glyphicon glyphicon-edit btn-sm"></i></a>
                </td>
            </tr>
        @endforeach
        </tbody>

    </table>
    <script>
        $(document).ready(function () {
            datatable();
        })

        
    </script>
</div>

