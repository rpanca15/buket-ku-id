<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class ProfileController extends Controller
{
    public function index()
    {
        $user = User::find(Auth::id());

        return view('profile.index', compact('user')); // Pastikan Anda memiliki file profile.blade.php di folder views
    }

    /**
     * Mengupdate data profil pengguna.
     */
    public function updateProfile(Request $request, $id)
    {
        // Lakukan validasi manual
        $validator = validator($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'no_telepon' => 'nullable|string|max:15',
        ]);

        if ($validator->fails()) {
            session()->flash('form', 'edit-profile');
            return back()->withInput()->withErrors($validator); // Kembalikan error validasi
        }

        $user = User::find($id);

        // Update data profil
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'no_telepon' => $request->no_telepon,
        ]);

        session()->flash('success', 'Profil berhasil diperbarui.');

        return back();
    }

    /**
     * Mengupdate password pengguna.
     */
    public function updatePassword(Request $request, $id)
    {
        $user = User::find($id);

        // Lakukan validasi manual
        $validator = validator($request->all(), [
            'current_password' => 'required',
            'new_password' => [
                'required',
                'confirmed',
                Password::min(8)
                    ->letters()
                    ->mixedCase()
                    ->numbers()
                    ->symbols(),
            ],
        ]);
        
        if ($validator->fails()) {
            session()->flash('form', 'edit-password');
            return back()->withInput()->withErrors($validator); // Kembalikan error validasi
        }

        // Verifikasi password lama
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withInput()->withErrors([
                'current_password' => 'Password lama tidak sesuai.',
            ]);
        }

        // Update password
        $user->update([
            'password' => Hash::make($request->new_password),
        ]);

        session()->flash('success', 'Password berhasil diperbarui.');

        return back();
    }
}
