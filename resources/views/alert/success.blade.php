@if (session('status'))
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">x</button>
    <strong>{{session('status')}}</strong>
</div>
@endif


