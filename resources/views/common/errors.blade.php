@if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>おやおや？何かがおかしいようです？</strong>

        <br><br>

        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $errors }}</li>
            @endforeach
        </ul>
    </div>
@endif
