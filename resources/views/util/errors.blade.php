@if ($errors->any())
    <div class="errors hidden d-none">
        @foreach ($errors->all() as $error)
            <div class="form-error hidden d-none">{{ $error }}</div>
        @endforeach
    </div>
@endif
