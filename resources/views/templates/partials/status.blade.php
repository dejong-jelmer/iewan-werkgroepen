@if (session()->has('error'))
    <div class="notification is-warning">
        <button class="delete"></button>
        {{ session('error') }}
    </div>
@endif
@if (session()->has('success'))
    <div class="notification is-success">
        <button class="delete"></button>
        {{ session('success') }}
    </div>
@endif
