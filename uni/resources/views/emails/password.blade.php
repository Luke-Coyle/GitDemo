<!-- resources/views/emails/password.blade.php -->

<!--Click here to reset your password: {{ url('uni.dev/password/reset/'.$token) }} --><!-- Possible error in URL -->

<!--This view is different to view for user: https://youtu.be/duMmNEJEZCw?t=1771 -->


Click Here to Reset your Password: <br>
<a href="{{ $link = url('password/reset', $token).'?email='.urlencode($user->getEmailForPasswordReset()) }}">{{ $link }}</a>

<!--This view will be sent to the user's email account. We need CSS-->