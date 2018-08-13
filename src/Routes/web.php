<?php

Route::group(['middleware' => ['web']], function () {

    Route::get('account/verify/{token}', function ($token) {
        $unverified_account = \MyShell\AccountVerification\Models\UnverifiedAccount::where('token', $token)->with('account')->first();
        if ($unverified_account == null)
            return abort(404);

        $account = $unverified_account->account;
        $unverified_account->delete();
        if (config('account_verification.login_after_verification', true))
            \Illuminate\Support\Facades\Auth::guard('web')->login($account);
        return redirect(config('account_verification.redirect_to', '/'));
    })->name('account.verify');

});