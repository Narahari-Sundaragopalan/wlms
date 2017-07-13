Click here to reset your password: <a href="{{ $link = url('password/loginsecurity', $token).'?email='.urlencode($user->getEmailForPasswordReset()) }}"> {{ $link }} </a>
