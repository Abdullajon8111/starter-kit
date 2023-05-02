<div class="col-lg-{!! $bootstrapColWidth !!}">
    <form action="{!! $url !!}" method="post">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" href="{!! $url !!}" @if(!empty($htmlAttributes)) {!! $htmlAttributes !!} @endif >
            <i class="fa fa-trash"></i>
        </button>&nbsp
    </form>
</div>
<div class="d-lg-none">&nbsp</div>
