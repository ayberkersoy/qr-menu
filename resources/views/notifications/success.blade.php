@if(session('success'))
    <div class="alert alert-success">
        <p>{{ session('success') }} <a href="{{ route('basket.index') }}">Sepete git.</a></p>
    </div>
@endif
