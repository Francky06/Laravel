<form action="{{route('search')}}" class="d-flex">
    <div class="form-group mb-0" style="margin-right: 5px;">
        <input type="text" name="q" class="form-control" value="{{ request()->q ?? ''}}">
    </div>
    <button type="submit" class="btn btn-success"><i class="fa fa-search" aria-hidden="true"></i>
</button>
</form>