<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
    // ================= GURU ================= //

    /**
     * Menampilkan daftar semua guru
     */
    public function guruIndex()
    {
        $users = User::where('role', 'guru')->paginate(10);
        return view('pages.admin.user.guru.index', compact('users'));
    }

    /**
     * Menampilkan form untuk membuat guru baru
     */
    public function guruCreate()
    {
        return view('pages.admin.user.guru.create');
    }

    /**
     * Menyimpan data guru baru ke database
     */
    public function guruStore(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users,username',
            'password' => 'required|min:6',
        ], [
            'username.required' => 'Username tidak boleh kosong!',
            'password.required' => 'Password tidak boleh kosong!',
            'password.min' => 'Password minimal 6 karakter!',
        ]);

        // Simpan data guru baru
        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'role' => 'guru',
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('admin.user.guru.index')->with('success', 'Guru berhasil dibuat');
    }

    /**
     * Menampilkan form edit guru
     */
    public function guruEdit(User $user)
    {
        return view('pages.admin.user.guru.edit', compact('user'));
    }

    /**
     * Memperbarui data guru di database
     */
    public function guruUpdate(Request $request, User $user)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . $user->id,
            'password' => 'nullable|string|min:6', // password optional
        ], [
            'name.required' => 'Nama wajib diisi.',
            'username.required' => 'Username wajib diisi.',
            'username.unique' => 'Username sudah digunakan, silakan pilih yang lain.',
            'password.min' => 'Password minimal 6 karakter.',
        ]);

        // Update data
        $user->name = $request->name;
        $user->username = $request->username;

        // Update password hanya jika diisi
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('admin.user.guru.index')->with('success', 'Guru berhasil diperbarui');
    }

    /**
     * Hapus guru
     */
    public function guruDestroy(User $user)
    {
        // Pastikan user yang dihapus memang guru
        if ($user->role !== 'guru') {
            return redirect()->route('admin.user.guru.index')->with('error', 'User bukan guru!');
        }

        $user->delete();
        return redirect()->route('admin.user.guru.index')->with('success', 'Guru berhasil dihapus');
    }

    // ================= SISWA ================= //

    /**
     * Menampilkan daftar semua siswa
     */
    public function siswaIndex()
    {
        $users = User::where('role', 'siswa')->paginate(10);
        return view('pages.admin.user.siswa.index', compact('users'));
    }

    /**
     * Menampilkan form untuk membuat siswa baru
     */
    public function siswaCreate()
    {
        return view('pages.admin.user.siswa.create');
    }

    /**
     * Menyimpan data siswa baru ke database
     */
    public function siswaStore(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users,username',
            'password' => 'required|min:6',
        ], [
            'username.required' => 'Username tidak boleh kosong!',
            'password.required' => 'Password tidak boleh kosong!',
            'password.min' => 'Password minimal 6 karakter!',
        ]);

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'role' => 'siswa',
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('admin.user.siswa.index')->with('success', 'Siswa berhasil dibuat');
    }

    /**
     * Menampilkan form edit siswa
     */
    public function siswaEdit(User $user)
    {
        return view('pages.admin.user.siswa.edit', compact('user'));
    }

    /**
     * Memperbarui data siswa di database
     */
    public function siswaUpdate(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . $user->id,
            'password' => 'nullable|string|min:6',
        ], [
            'name.required' => 'Nama wajib diisi.',
            'username.required' => 'Username wajib diisi.',
            'username.unique' => 'Username sudah digunakan, silakan pilih yang lain.',
            'password.min' => 'Password minimal 6 karakter.',
        ]);

        $user->name = $request->name;
        $user->username = $request->username;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('admin.user.siswa.index')->with('success', 'Siswa berhasil diperbarui');
    }

    /**
     * Hapus siswa
     */
    public function siswaDestroy(User $user)
    {
        // Pastikan user yang dihapus memang siswa
        if ($user->role !== 'siswa') {
            return redirect()->route('admin.user.siswa.index')->with('error', 'User bukan siswa!');
        }

        $user->delete();
        return redirect()->route('admin.user.siswa.index')->with('success', 'Siswa berhasil dihapus');
    }
}
