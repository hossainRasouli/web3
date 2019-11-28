
<div class="col-md-12">

    <h3 style="text-align: center">{{isset($panel_title) ?$panel_title :''}}</h3>
    <table id="example" class="table table-striped table-bordered display" style="width:100%">
        <thead>
        <tr>
            <th>ادیِ</th>
            <th>نام</th>
            <th>تخلص</th>
            <th>معاش</th>
            <th>تلفن</th>
            <th>آدرس</th>
            <th>عملیات</th>
        
        </tr>
        </thead>
        <tfoot>
        <tr>
            <th>ادیِ</th>
            <th>نام</th>
            <th>تخلص</th>
            <th>معاش</th>
            <th>تلفن</th>
            <th>آدرس</th>
            <th>عملیات</th>
        
        </tr>
        </tfoot>
        <tbody>
        @foreach($employees as $employee)
            <tr>
                <td>{{$employee->employee_id}}</td>
                <td>{{$employee->first_name}}</td>
                <td>{{$employee->last_name}}</td>
                <td>{{$employee->salary}}</td>
                <td>{{$employee->phone}}</td>
                <td>{{$employee->address}}</td>

                <td>

                    
                    <a href="javascript:ajaxLoad('{{route('employee.update',$employee->employee_id)}}')" class="glyphicon glyphicon-edit btn btn-success btn-xs" id="edit_employee"></a>
                    <a href="javascript:if(confirm('Do you want delete this record?'))ajaxDelete('{{route('employee.delete',$employee->employee_id)}}','{{csrf_token()}}')" class="glyphicon glyphicon-trash btn btn-danger btn-xs" id="delete_employee"></a>
                </td>
            </tr>
        @endforeach
        
        </tbody>
    </table>
    <script>
        
        $(document).ready(function () {
            
            $('#example').dataTable();
        })
    </script>

</div>








<

