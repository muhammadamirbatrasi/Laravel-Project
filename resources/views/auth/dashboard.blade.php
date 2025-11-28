<h1>Welcome to Dashboard</h1>
<h1>Welcome, {{ $user->name }}</h1>
<p>Email: {{ $user->email }}</p>
<form action="{{ route('logout') }}" method="POST">
    @csrf
    <button type="submit">Logout</button>
</form>