<h1>Hello</h1>

<p>Please click following link for reset the account

    <a href="{{ env('APP_URL') }}/reset/{{ $user->email }}/{{ $code }}">click here</a>
</p>
