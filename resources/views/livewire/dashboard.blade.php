<div>
    <div class="container mt-5">
        <h1>Hi, {{ auth()->user()->with(['information'])->first()['information']['name'] }} welcome back!</h1>
    </div>
</div>
