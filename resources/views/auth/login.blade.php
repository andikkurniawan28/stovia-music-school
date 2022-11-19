<form action="{{ route('loginAttempt') }}" method="POST">
    @csrf
    <p>Username</p>
    <p><input type="text" name="username" required></p>
    <p>Password</p>
    <p><input type="password" name="password" required></p>
    <p><input type="submit"></p>
</form>
