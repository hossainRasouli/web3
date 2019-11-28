
<h4 class="box-title">
    {{isset($panel_title) ?$panel_title :''}}
</h4>
<div class="col-md-12">
    <table id="example" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th >ای دی</th>
            <th>نام</th>
            <th>فامیلی</th>
            <th >نام کاربری</th>
            <th >نقش کاربری</th>
            <th >عملیات</th>


        </tr>
        </thead>
        <tbody>
        @php $i=1; @endphp
            @foreach($users as $user)

                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->last_name}}</td>
                    <td>{{$user->username}}</td>
                    <td>{{($user->user_level==\App\User::ADMIN) ?'مدیر':'کاربر عادی'}}</td>
                    <td colspan="2">
                        <a href="javascript:if(confirm('Are you want to delete this record?'))ajaxDelete('{{route('user.delete',$user->user_id)}}','{{csrf_token()}}')"><i class=" glyphicon glyphicon-trash " ></i></a>
                        <a href="javascript:ajaxLoad('{{route('user.update',$user->user_id)}}')"><i class="glyphicon glyphicon-edit "></i></a>
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

