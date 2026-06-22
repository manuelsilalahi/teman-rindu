<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Http;
Route::view('/', 'welcome');

Route::get('/login', [AuthController::class, 'login']);

Route::post('/login', [AuthController::class, 'prosesLogin']);

use Illuminate\Support\Facades\DB;

Route::get('/dashboard', function () {
   

$postingan = DB::table('postingan')
    ->join('users', 'postingan.user_id', '=', 'users.id')

->select(
    'postingan.id',
    'postingan.user_id',
    'postingan.isi',
    'postingan.foto',
    'postingan.tanggal',
    'users.nama',
    'users.foto as foto_profil'
)
    ->orderBy('postingan.id', 'desc')
    ->get();

foreach($postingan as $post){

    $post->jumlah_like = DB::table('likes')
        ->where('postingan_id', $post->id)
        ->count();
        $post->komentar = DB::table('komentar')
    ->join('users', 'komentar.user_id', '=', 'users.id')
    ->where('komentar.postingan_id', $post->id)
    ->select(
        'komentar.*',
        'users.nama'
    )
    ->orderBy('komentar.id', 'asc')
    ->get();

}

$jumlahNotif = 
    DB::table('notifikasi')
    ->where('user_id', session('id'))
    ->where('dibaca', 0)
    ->count();

return view(
    'dashboard',
    compact('postingan', 'jumlahNotif')
);
});

Route::get('/profil', function () {

    $user = DB::table('users')
        ->where('id', session('id'))
        ->first();

    $postingan = DB::table('postingan')
        ->where('user_id', session('id'))
        ->orderBy('tanggal', 'desc')
        ->get();

    return view('profil', compact('user', 'postingan'));

});

Route::get('/cek-onopay', function () {

    $user = DB::table('users')
        ->where('id', session('id'))
        ->first();

    $response = Http::post(
        'http://onopay.web.id/api/v1/merchant/check-user',
        [
            'phone_number' => $user->nomor_hp
        ]
    );

    dd($response->json());

});

Route::post('/update-profil', function () {

$data = [

    'nama' => request('nama'),
    'umur' => request('umur'),
    'kota' => request('kota'),
    'gender' => request('gender'),
    'bio' => request('bio'),
    'nomor_hp' => request('nomor_hp')

];

    if(request()->hasFile('foto')){

        $file = request()->file('foto');

        $namaFoto = time().'_'.$file->getClientOriginalName();

$file->move(
    public_path('uploads_profil'),
    $namaFoto
);

        $data['foto'] = $namaFoto;
    }

    DB::table('users')
        ->where('id', session('id'))
        ->update($data);

    return redirect('/profil');

});

Route::get('/match', function () {

    $users = DB::table('users')
        ->where('id', '!=', session('id'))
        ->get();

    return view('match', compact('users'));

});


Route::get('/daftar-match', function () {

    $matches = DB::table('matches')
        ->join('users', 'matches.pasangan_id', '=', 'users.id')
        ->where('matches.user_id', session('id'))
        ->select(
            'users.*',
            'matches.tanggal'
        )
        ->get();

    return view('daftar_match', compact('matches'));

});

Route::get('/notifikasi', function () {

    // Tandai semua notifikasi sebagai sudah dibaca
    DB::table('notifikasi')
        ->where('user_id', session('id'))
        ->update([
            'dibaca' => 1
        ]);

    // Ambil daftar notifikasi
    $notifikasi = DB::table('notifikasi')
        ->where('user_id', session('id'))
        ->orderBy('id', 'desc')
        ->get();

    return view('notifikasi', compact('notifikasi'));

});
Route::get('/galeri', function () {
    return view('galeri');
});
Route::get('/pengunjung', function () {
    return view('pengunjung');
});


Route::post('/simpan-postingan', function () {

    $namaFoto = '';

    if(request()->hasFile('foto')){

        $file = request()->file('foto');

        $namaFoto = time().'_'.$file->getClientOriginalName();

$file->move(
    public_path('uploads_postingan'),
    $namaFoto
);
    }

    DB::table('postingan')->insert([
        'user_id' => session('id'),
        'isi' => request('isi'),
        'foto' => $namaFoto,
        'tanggal' => now()
    ]);

    return redirect('/dashboard');

});

Route::get('/pesan', function () {

    $chat = DB::table('users')
        ->where('id', '!=', 1)
        ->get();

    return view('pesan', compact('chat'));

});

Route::get('/chat/{id}', function ($id) {

    $user = DB::table('users')
        ->where('id', $id)
        ->first();

    $pesan = DB::table('chats')
        ->where(function ($q) use ($id) {

            $q->where('pengirim_id', 1)
              ->where('penerima_id', $id);

        })
        ->orWhere(function ($q) use ($id) {

            $q->where('pengirim_id', $id)
              ->where('penerima_id', 1);

        })
        ->orderBy('id', 'asc')
        ->get();

    return view('chat', compact('user', 'pesan'));

});

Route::get('/match/{id}', function ($id) {

    $cek = DB::table('matches')
        ->where('user_id', session('id'))
        ->where('pasangan_id', $id)
        ->first();

    if(!$cek){

        DB::table('matches')->insert([
            'user_id' => session('id'),
            'pasangan_id' => $id,
            'tanggal' => now()
        ]);

    }

    return redirect('/daftar-match');

});

Route::get('/logout', function () {
    return redirect('/login');
});

Route::post('/kirim-pesan', function () {

    DB::table('chats')->insert([

        'pengirim_id' => 1,
        'penerima_id' => request('penerima_id'),
        'pesan' => request('pesan'),
        'waktu' => now()

    ]);

    return redirect('/chat/' . request('penerima_id'));

});

Route::get('/hapus-match/{id}', function ($id) {

    DB::table('matches')
        ->where('user_id', 1)
        ->where('pasangan_id', $id)
        ->delete();

    return redirect('/daftar-match');

});

Route::get('/like/{id}', function ($id) {
    $post = DB::table('postingan')
    ->where('id', $id)
    ->first();

if($post->user_id == session('id')){
    return redirect('/dashboard');
}

    $cek = DB::table('likes')
        ->where('user_id', session('id'))
        ->where('postingan_id', $id)
        ->first();

if(!$cek){

    DB::table('likes')->insert([

        'user_id' => session('id'),
        'postingan_id' => $id,
        'tanggal' => now()

    ]);

    $post = DB::table('postingan')
        ->where('id', $id)
        ->first();

    DB::table('notifikasi')->insert([

        'user_id' => $post->user_id,

        'pesan' => session('nama') . ' menyukai postingan Anda ❤️',

        'tanggal' => now()

    ]);

}

    return redirect('/dashboard');

});

Route::post('/komentar', function () {

    DB::table('komentar')->insert([

        'postingan_id' => request('postingan_id'),
        'user_id' => session('id'),
        'isi' => request('isi'),
        'tanggal' => now()

    ]);

    return redirect('/dashboard');

});

Route::get('/hapus-komentar/{id}', function ($id) {

    DB::table('komentar')
        ->where('id', $id)
        ->delete();

    return redirect('/dashboard');

});

Route::get('/hapus-postingan/{id}', function ($id) {

    DB::table('postingan')
        ->where('id', $id)
        ->where('user_id', session('id'))
        ->delete();

    return redirect('/dashboard');

});

Route::get('/dompet', function () {

    $user = DB::table('users')
        ->where('id', session('id'))
        ->first();

    $response = Http::post(
        'http://onopay.web.id/api/v1/merchant/check-balance',
        [
            'phone_number' => $user->nomor_hp
        ]
    );

    $data = $response->json();

    $saldo_onopay = 0;

    if(isset($data['success']) && $data['success'] == true){
        $saldo_onopay = $data['data']['balance'];
    }

$riwayat = DB::table('transfer_koin')
    ->join('users as penerima', 'transfer_koin.penerima_id', '=', 'penerima.id')
    ->where('pengirim_id', session('id'))
    ->select(
        'transfer_koin.*',
        'penerima.nama as nama_penerima'
    )
    ->orderBy('tanggal', 'desc')
    ->get();

return view('dompet', compact(
    'user',
    'saldo_onopay',
    'riwayat'
));

});

Route::get('/kirim-koin/{id}', function ($id) {

    $penerima = DB::table('users')
        ->where('id', $id)
        ->first();

    $user = DB::table('users')
        ->where('id', session('id'))
        ->first();

    $response = Http::post(
        'http://onopay.web.id/api/v1/merchant/check-balance',
        [
            'phone_number' => $user->nomor_hp
        ]
    );

    $data = $response->json();

    $saldo_onopay = 0;

    if(isset($data['success']) && $data['success'] == true){
        $saldo_onopay = $data['data']['balance'];
    }

$riwayat = DB::table('transfer_koin')
    ->join('users as penerima', 'transfer_koin.penerima_id', '=', 'penerima.id')
    ->where('pengirim_id', session('id'))
    ->select(
        'transfer_koin.*',
        'penerima.nama as nama_penerima'
    )
    ->orderBy('tanggal', 'desc')
    ->get();

    return view(
        'kirim_koin',
        compact(
            'penerima',
            'user',
            'saldo_onopay'
        )
    );

});

Route::post('/proses-kirim-koin', function () {

    $pengirim = DB::table('users')
        ->where('id', session('id'))
        ->first();

$penerima = DB::table('users')
    ->where('id', request('penerima_id'))
    ->first();



    $jumlah = (int) request('jumlah_koin');

    $generate = Http::post(
    'http://onopay.web.id/api/v1/payment/qr/generate',
    [
        'phone_number' => $penerima->nomor_hp,
        'amount' => $jumlah
    ]
);

$qr = $generate->json();

 



$bayar = Http::post(
    'http://onopay.web.id/api/v1/payment/qr/pay',
    [
        'qr_code' => $qr['data']['qr_code'],
        'payer_phone' => $pengirim->nomor_hp
    ]
);

$hasil = $bayar->json();

if(!$hasil['success']){
    return back()->with(
        'error',
        $hasil['message']
    );
}

$qr = $generate->json();

    if($jumlah <= 0){
        return redirect()->back();
    }


DB::table('transfer_koin')->insert([

    'pengirim_id' => $pengirim->id,
    'penerima_id' => $penerima->id,
    'jumlah_koin' => $jumlah,
    'tanggal' => now()

]);

DB::table('notifikasi')->insert([

    'user_id' => $penerima->id,

    'pesan' => '🎁 ' . $pengirim->nama .
               ' mengirim ' .
               number_format($jumlah) .
               ' koin kepada Anda',

    'tanggal' => now()

]);

return redirect('/dompet')
    ->with('success', 'Transfer berhasil');

});

Route::get('/topup-test', function () {

    $response = Http::post(
        'http://onopay.web.id/api/v1/payment/topup',
        [
            'phone_number' => '081271902384',
            'amount' => 1000
        ]
    );

    dd($response->json());

});

Route::get('/tes-transfer', function () {

    $pengirim = '081271902384';
    $penerima = '085373214753';

    $generate = Http::post(
        'http://onopay.web.id/api/v1/payment/qr/generate',
        [
            'phone_number' => $penerima,
            'amount' => 100
        ]
    );

$qr = $generate->json();

$bayar = Http::post(
    'http://onopay.web.id/api/v1/payment/qr/pay',
    [
        'qr_code' => $qr['data']['qr_code'],
        'payer_phone' => $pengirim->nomor_hp
    ]
);

dd($bayar->json());

});

Route::get('/tes-bayar', function () {

    $response = Http::post(
        'http://onopay.web.id/api/v1/payment/qr/pay',
        [
            'qr_code' => 'QR-HLQ6JMRTSN2P',
            'payer_phone' => '081271902384'
        ]
    );

    dd($response->json());

});

Route::get('/topup/{jumlah}', function ($jumlah) {

    if(!in_array($jumlah, [
        500000,
        5000000,
        20000000,
        50000000
    ])){
        return redirect('/dompet');
    }

    $user = DB::table('users')
        ->where('id', session('id'))
        ->first();

    $response = Http::post(
        'http://onopay.web.id/api/v1/payment/topup',
        [
            'phone_number' => $user->nomor_hp,
            'amount' => $jumlah
        ]
    );


});

Route::get('/topup/{jumlah}', function ($jumlah) {

    if(!in_array($jumlah, [
        500000,
        5000000,
        20000000,
        50000000
    ])){
        return redirect('/dompet');
    }

    $user = DB::table('users')
        ->where('id', session('id'))
        ->first();

  $response = Http::post(

        'http://onopay.web.id/api/v1/payment/topup',
        [
            'phone_number' => $user->nomor_hp,
            'amount' => $jumlah
        ]
    );

    return redirect('/dompet')
        ->with('success', 'Top Up berhasil');

});

Route::post('/topup-custom', function () {

    $jumlah = (int) request('jumlah');

    if($jumlah <= 0){
        return redirect('/dompet');
    }

    $user = DB::table('users')
        ->where('id', session('id'))
        ->first();

    Http::post(
        'http://onopay.web.id/api/v1/payment/topup',
        [
            'phone_number' => $user->nomor_hp,
            'amount' => $jumlah
        ]
    );

    return redirect('/dompet')
        ->with('success', 'Top Up Berhasil');

});

Route::get('/register', function () {
    return view('register');
});

Route::post('/register', function () {

    DB::table('users')->insert([
        'nama' => request('nama'),
        'email' => request('email'),
        'password' => bcrypt(request('password'))
    ]);

    return redirect('/login');

});

Route::get('/hapus-foto-profil', function () {

    $user = DB::table('users')
        ->where('id', session('id'))
        ->first();

    if($user->foto){

        $path = public_path(
            'uploads_profil/' . $user->foto
        );

        if(file_exists($path)){
            unlink($path);
        }
    }

    DB::table('users')
        ->where('id', session('id'))
        ->update([
            'foto' => null
        ]);

    return redirect('/profil');

});