<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmailVerificationController extends Controller
{
    /**
     * Send invitation link in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * 
     * @return \Illuminate\Http\JsonResponse
     */
    public function invite(Request $request): JsonResponse
    {
        try
        {
            // get error
            $error = static::validateRequest(
                \Validator::make($request->all(), [
                    'email' => 'required|email'
                ])
            );

            // count error
            if (count($error) > 0)
            {
                // response
                return $this->respondWithError($error);
            }

            // extract all
            extract($request->all());

            // start transaction
            \DB::beginTransaction();

                // create user
                $user = User::firstOrCreate(['email' => $email]);

                // encrypt email
                $email = Crypt::encryptString($email);

                // send invitation link email
                //\Mail::to($email)->send(new InvitationLink($email));

            // commit transaction
            \DB::commit();

            // response
            return $this->respondWithSuccess([
                'email' => $email,
                'message' => 'Invitation link is successfully sent!'
            ]);
        }
        catch(\Exception $e)
        {
            // response
            $this->respondWithError(['message' => $e->getMessage()]);
        }
    }
}
