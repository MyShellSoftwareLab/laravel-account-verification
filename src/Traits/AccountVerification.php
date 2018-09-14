<?php
namespace MyShell\AccountVerification\Traits;

use MyShell\AccountVerification\Models\UnverifiedAccount;
use MyShell\AccountVerification\Notifications\VerificateAccount;

trait AccountVerification
{
    public function setUnverified(){
        $uverified_account = UnverifiedAccount::firstOrCreate([
            'account_id' => $this->id,
            'token' => str_random(config('account_verification.token_length',64))
        ]);
        $this->notify(new VerificateAccount($uverified_account->token));

    }

    public function getIsVerifiedAttribute(){
        return $this->unverifiedAccount == null;
    }

    public function unverifiedAccount(){
        return $this->hasOne(UnverifiedAccount::class, 'account_id');
    }
}
