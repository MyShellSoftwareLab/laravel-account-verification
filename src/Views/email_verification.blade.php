@extends('account-verification::email_template')
@section('header',config('app.name'))
@section('title','Verify your account')
@section('top_message')
    Welcome to {{ config('app.name') }}, to confirm your email address, click on the confirm button.
@endsection
@section('button_href', $token)
@section('button_text','Confirm')
@section('bottom_message')
    If you did not make this request, no further action is required.
@endsection