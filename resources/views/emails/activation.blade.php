<h1>Hello</h1>

<p>Please click following link for activate the account

    <a href="{{ env('APP_URL') }}/activate/{{ $user->email }}/{{ $code }}">activate account</a>
</p>
