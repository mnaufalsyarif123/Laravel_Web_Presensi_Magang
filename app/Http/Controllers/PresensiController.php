<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;


class PresensiController extends Controller
{
    public function index()
    {
        // Periksa apakah user sudah check-in hari ini berdasarkan session
        $hasCheckedIn = session('hasCheckedIn', false);
        $presensiUuid = session('presensi_uuid', null);

        return view('user.presensi', compact('hasCheckedIn', 'presensiUuid'));
    }

    //     public function store(Request $request)
//     {

    // // Validasi input foto kehadiran
//     $request->validate([
//         'foto_kehadiran' => 'required|string|max:65535', // LONGTEXT mendukung hingga 4GB
//     ]);

    //         // Simpan data check-in ke tabel `presensi`
//         $uuid = \Str::uuid(); // Generate UUID unik
//         $tanggal = Carbon::now()->toDateString();
//         $waktuCheckIn = Carbon::now()->toTimeString();

    //         DB::table('presensi')->insert([
//             'user_uuid' => 'some-user-uuid', // Gantilah dengan UUID pengguna yang seharusnya
//             'tanggal' => $tanggal,
//             'waktu_check_in' => $waktuCheckIn,
//             'foto_bukti_check_in' => $request->foto_kehadiran,
//             'waktu_check_out' => null,
//             'keterangan_harian' => null,
//             'status' => 'Masuk',
//             'created_at' => now(),
//             'updated_at' => now(),
//         ]);

    //         // Simpan status check-in di session
//         session(['hasCheckedIn' => true, 'presensi_uuid' => $uuid]);

    //         return redirect()->back()->with('success', 'Check-in berhasil!');
//     }


    public function store(Request $request)
    {

        // Validasi input foto kehadiran

        $request->validate([
            'foto_kehadiran' => 'required', // LONGTEXT mendukung hingga 4GB
        ]);

        // Simpan data check-in ke tabel `presensi`
        // $uuid = \Str::uuid(); // Generate UUID unik

        // $tanggal = Carbon::now()->toDateString();
        // $waktuCheckIn = Carbon::now()->toTimeString();


        // Ambil UUID dari user yang login
        $userUuid = $request->input('user_uuid'); // Misalnya user_uuid dikirimkan di form

        // Validasi keberadaan user_uuid di tabel users
        $userExists = DB::table('users')->where('uuid', $userUuid)->exists();
        if (!$userExists) {
            return redirect()->back()->with('error', 'User tidak ditemukan.');
        }

        // Decode Base64 (Baru)
        $imageData = $request->input('foto_kehadiran');
        $fileName = 'foto_check_in_' . time() . '.png';
        $filePath = 'presensi/' . $fileName;

        // Simpan file ke Laravel Storage (Baru)
        $image = str_replace('data:image/png;base64,', '', $imageData);
        $image = str_replace(' ', '+', $image);
        Storage::disk('public')->put($filePath, base64_decode($image));



        $data = [
            'user_uuid' => $userUuid, // contoh UUID
            'tanggal' => now()->toDateString(),
            'waktu_check_in' => now()->toTimeString(),
            'foto_bukti_check_in' => $filePath,
            'waktu_check_out' => null,
            'keterangan_harian' => 'Deskripsi aktivitas harian',
            'status' => 'Check In',
            'created_at' => now(),
            'updated_at' => now(),
        ];

        try {
            DB::table('presensi')->insert($data);
            session(['hasCheckedIn' => true, 'presensi_uuid' => $userUuid]);

            return redirect()->back()->with('success', 'Check-in berhasil!');
        } catch (\Exception $e) {
            Log::error('Error saat menyimpan data presensi: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Gagal menyimpan data presensi.');
        }

        // Insert data ke database
        // DB::table('presensi')->insert($data);

        // Kirim data ke console log
        echo "<script>console.log(" . json_encode($data) . ");</script>";
        echo "<script>console.log(" . json_encode($request->foto_kehadiran) . ");</script>";

        session(['hasCheckedIn' => true, 'presensi_uuid' => $uuid]);

        return redirect()->back()->with('success', 'Check-in berhasil!');
    }


    public function checkOut(Request $request, $uuid)
    {
        // Validasi input deskripsi pekerjaan
        $request->validate([
            'deskripsi_pekerjaan' => 'required|string',
        ]);

        // Update data check-out di tabel `presensi`
        $waktuCheckOut = Carbon::now()->toTimeString();

        DB::table('presensi')
            ->where('user_uuid', 'some-user-uuid') // Gantilah dengan UUID pengguna yang seharusnya
            ->where('uuid', $uuid)
            ->update([
                'waktu_check_out' => $waktuCheckOut,
                'keterangan_harian' => $request->deskripsi_pekerjaan,
                'status' => 'Keluar',
                'updated_at' => now(),
            ]);

        // Hapus session check-in
        session()->forget(['hasCheckedIn', 'presensi_uuid']);

        return redirect()->back()->with('success', 'Check-out berhasil!');
    }
}
