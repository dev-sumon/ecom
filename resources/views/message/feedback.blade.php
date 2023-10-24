@if(session($key ?? 'status'))
    <span class="alert alert-success w-100">{{session($key ?? 'status')}}</span>
@endif