@if (count($errors->all()) > 0)
<div class="alert alert-danger alert-block">
    <strong>Error!</strong>
    <ul>
        @foreach($errors->all() as $message)
        <li>{!! $message !!}</li>
        @endforeach
    </ul>
</div>
@endif

@if ($message = Session::get('success_message'))
<div class="alert alert-success alert-block">
    <strong>Success!</strong>
    @if(is_array($message))
    <ul>
    @foreach ($message as $m)
        <li>{!! $m !!}</li>
    @endforeach
    </ul>
    @else
    {!! $message !!}
    @endif
</div>
@endif

@if ($message = Session::get('error_message'))
<div class="alert alert-danger alert-block">
    <strong>Error!</strong>
    @if(is_array($message))
    @foreach ($message as $m)
    {!! $m !!}
    @endforeach
    @else
    {!! $message !!}
@endif
</div>
@endif