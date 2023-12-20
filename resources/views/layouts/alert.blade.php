@if ($message = Session::get ('Success'))
<div class="alert alert-success alert-dismissible show fade">
    <div class="alert-body">
        <button class="close" data-dismiss="alert">
<span>X</span>
        </button>
        <p>{{ message }}</p>
    </div>
</div>
@endif
