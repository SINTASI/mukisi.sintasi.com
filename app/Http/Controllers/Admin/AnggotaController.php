<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Verified;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $xhr = $request->query('xhr');
        $type = $request->query('type', 'institusi');
        $data = User::doesntHave('roles')
            ->with(['category', 'profesi'])
            ->where('type', $type)->get();

        if ($xhr) {
            return response($data);
        }

        return inertia('admin/anggota', [
            'title' => 'Anggota',
            'data' => $data
        ]);
    }

    public function resendEmail(User $user)
    {
        try {
            if (!$user->hasVerifiedEmail()) {
                $user->sendEmailVerificationNotification();
            }
            return response($user);
        } catch (\Throwable $err) {
            return response([
                'message' => $err->getMessage()
            ], 404);
        }
    }


    public function verifyEmail(User $user)
    {
        try {
            if (!$user->hasVerifiedEmail()) {
                $user->markEmailAsVerified();
                event(new Verified($user));
            }
            return response($user);
        } catch (\Throwable $err) {
            return response([
                'message' => $err->getMessage()
            ], 404);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
