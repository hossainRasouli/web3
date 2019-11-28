@if(session('success'))
<div class="alert alert-success" id="no" style="color: green;border-radius: 23px;font-size:30px;background-color:lightsalmon;">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <p>{{ session('success') }}</p>
</div>
@endif


