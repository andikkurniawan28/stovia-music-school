@if($message = Session::get('error'))
    @include('components.alert', ['message'=>$message, 'color'=>'danger'])
@elseif($message = Session::get('success'))
    @include('components.alert', ['message'=>$message, 'color'=>'success'])
@endif
