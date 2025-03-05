Hello {{ $name }}!

Click on this link to reset your password: {{'http://localhost:8000/reset-password/' . $token . '?email=' . urlencode($email)}}

or: {{ url('/reset-password', [
            'token' => $token,
            'email' => $email,
        ], false);}}