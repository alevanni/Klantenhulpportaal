Hello {{ $name }}!

Click on <a href="{{ url('/reset-password', [
            'token' => $token,
            'email' => $email,
        ], false);}}">this link</a> to reset your password!