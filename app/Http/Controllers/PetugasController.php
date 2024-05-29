<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Lelang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class PetugasController extends Controller
{
    public function homePetugas(){
        // Protect halaman -> kalau belum login
        if(!Session::get('login')){
            //Kalau belum login diarahkan ke halaman login petugas
            return redirect('/formLoginAdmin')->with('alert','Kamu harus login dulu');

        } else{
            //kalo id_role nya 1 masuk petugas
            if (Session::get('id_role') == 1){
                // variable $data mengambil semua data dari model barang yang nantinya padd tabel/form di tampung pada nilai variable ['barang']
                $data['barang'] = Barang::get();
                // halaman petugas
                return view ('petugas.home',$data);

            }elseif(Session::get('id_role') == 2){
                // kalau id_role nya admin maka diarahkan ke halaman admin
                return redirect('admin/home');
            }else{
                return redirect('/');
            }
        };
    }

    public function formDetailBarang($id_barang){
        // protect halaman -> kalau belum login
        if(!Session::get('login')){
            //kalau belum login di arahin ke form petugas
            return redirect('/formAdminLogin')->with('alert','Kamu harus login dulu');
        // boleh masuk kalau id_rolenya 1/petugas    
        }elseif(Session::get('id_role') == 1){
            //ini untuk menampilkan tampilan tambahBarang pada folder petugas
            //yang diujung biasanya kan pake where tapi disini pake find biar lebih singkat
            $data['barangDetail'] = Barang::where('id_barang', $id_barang)->get();
           return view('petugas.detailBarang',$data);
                     
        }else{
            return redirect('/');
        }
    }
    
    /* ================================CRUD====================================== */
    /* ===============================BARANG===================================== */

    public function formTambahBarang(){
        // Protect halaman -> kalau belum login
        if(!Session::get('login')){
            //Kalau belum login diarahkan ke halaman login petugas
            return redirect('/formLoginAdmin')->with('alert','Kamu harus login dulu');

        //kalo id_role nya 1 masuk petugas
        } elseif(Session::get('id_role') == 1){
            // kalau id_role nya bener petugas diarahkan ke form tambah barang
            return view ('petugas.tambahEditBarang');
        }
    }

    public function postTambahBarang(Request $request){
         //ini untuk memvalidasi apakah ada data pada inputan from
         $this->validate($request,[
            'nama_barang' => 'required',
            'harga_awal' => 'required',
            'deskripsi_barang' => 'required',
            'foto_barang' => 'required',
        ]);
        // validasi untuk inputan gambar
        $image = null;
        if($request->hasFile('foto_barang')){
            $image = $request->file('foto_barang')->store('fotos'); // request foto dari form dan atribut store yang nantinya menambahkan fotos/ pada datbase (encrypt)
        }

        // model barang
        $data = new Barang;
        // untuk tanggal -> tahun,bulan,hari
        $date = date("Y-m-d");
        // request inputan dari form untuk di cocokan dan nantinya dimasukan ke tabel
        $data->nama_barang = $request->nama_barang;
        $data->tgl = $date; //data berasal dari variabel date diatas untuk set tanggal
        $data->harga_awal = $request->harga_awal;
        $data->deskripsi_barang = $request->deskripsi_barang;
        $data->foto_barang = $image; // data berasal dari validasi variable image diatas

        $statusc = $data->save(); //simpan data

        //ini buat pengecekan
        if ($statusc) {
            //kalo berhasil
            return redirect('petugas/home')->with('alert-success','Data barang berhasil ditambahkan');
        } else {
            //kalo gagal
            return redirect('petugas/formTambahBarang')->with('alert-error','Data barang gagal ditambahkan');
        }
    }

    public function formEditBarang($id_barang){
        // protect halaman -> kalau belum login
        if(!Session::get('login')){
            //kalau belum login di arahin ke form petugas
            return redirect('/formAdminLogin')->with('alert','Kamu harus login dulu');
        // boleh masuk kalau id_rolenya 1/petugas    
        }elseif(Session::get('id_role') == 1){
            //ini untuk menampilkan tampilan tambahBarang pada folder petugas
            //yang diujung biasanya kan pake where tapi disini pake find biar lebih singkat
            $data['barang'] = Barang::find($id_barang);
           return view('petugas.tambahEditBarang',$data);
                     
        }else{
            return redirect('/');
        }
    }

    public function postEditBarang(Request $request, $id_barang){
        //ini untuk memvalidasi apakah ada data pada inputan from
        $this->validate($request,[
            'nama_barang' => 'required',
            'harga_awal' => 'required',
            'deskripsi_barang' => 'required',
            'foto_barang' => 'required',
        ]);
        
         // Periksa apakah ada file yang diunggah
        if ($request->hasFile('foto_barang')) {
        // Simpan file baru
            $image = $request->file('foto_barang')->store('fotos');
        // Hapus file lama jika ada
            $oldImage = DB::table('tb_barang')->where('id_barang', $request->id_barang)->value('foto_barang');
            if (Storage::exists($oldImage)) {
                Storage::delete($oldImage);
            }
        } else {
        // Jika tidak ada file yang diunggah, gunakan file yang ada
            $image = $request->foto_barang;
        }
        // cari id_barang pada model barang
        $data = Barang::find($id_barang);
        // untuk tanggal -> tahun,bulan,hari
        $date = date("Y-m-d");
        // request inputan dari form untuk di cocokan dan nantinya dimasukan ke tabel
        $data->nama_barang = $request->nama_barang;
        $data->tgl = $date; //data berasal dari variabel date diatas untuk set tanggal
        $data->harga_awal = $request->harga_awal;
        $data->deskripsi_barang = $request->deskripsi_barang;
        $data->foto_barang = $image; // data berasal dari validasi variable image diatas

        $statusc = $data->update();
        //ini buat pengecekan
        if ($statusc) {
            //kalo berhasil
            return redirect('petugas/home')->with('alert-success','Data barang berhasil diperbarui');
        } else {
            //kalo gagal
            return redirect('petugas/formTambahBarang')->with('alert-error','Data barang gagal diperbarui');
        }
    }

    public function deleteBarang($id_barang){
        // ambil/cari id_barang dari model barang
        $data = Barang::find($id_barang);
        // delete data
        $statusc = $data->delete();
        //ini buat pengecekan
        if ($statusc) {
            //kalo berhasil 
            return redirect('petugas/home')->with('alert-success','Data barang berhasil dihapus');
        } else {
            //kalo gagal
            return redirect('petugas/formTambahBarang')->with('alert-error','Data barang gagal dihapus');
        }
    }
    
    /* ================================CRUD====================================== */
    /* ===============================LELANG===================================== */
    
    public function homeLelang(){
        // Protect halaman -> kalau belum login
        if(!Session::get('login')){
            //Kalau belum login diarahkan ke halaman login petugas
            return redirect('/formLoginAdmin')->with('alert','Kamu harus login dulu');
            
        }   //kalo id_role nya 1 masuk petugas
        elseif(Session::get('id_role') == 1){
            // variable $data mengambil semua data dari model barang yang nantinya padd tabel/form di tampung pada nilai variable ['barang']
            $data['lelang'] = Lelang::get();
            // halaman petugas
            return view ('petugas.homeLelang',$data);
            
        }
    }
    
    public function formTambahLelang(){
        // Protect halaman -> kalau belum login
        if(!Session::get('login')){
            //Kalau belum login diarahkan ke halaman login petugas
            return redirect('/formLoginAdmin')->with('alert','Kamu harus login dulu');
            
            //kalo id_role nya 1 masuk petugas
        } elseif(Session::get('id_role') == 1){
            // kalau id_role nya bener petugas diarahkan ke form tambah barang
            $data['barang'] = Barang::get();
            return view ('petugas.tambahEditLelang',$data);
        }
    }
    
    public function postTambahLelang(Request $request){
        // validasi kolom apa aja yang harus di input
        $this->validate($request,[
            'id_barang' => 'required',            
        ]);
        // ambil data dari model lelang
        $data = new Lelang;
        // set otomatis untuk kolom tanggal
        $date = date("Y-m-d");
        
        // REQUEST seluruh inputan dari form dan di cocokan dengan kolom pada tabel
        $data->id_barang = $request->id_barang;
        $data->tgl_lelang = $date;
        $data->harga_akhir = 1; // set otomatis ke 0 karena belum ada penawaran
        // PENTING!!: buat user dengan id_user 0 pada tabel masyarakat di database (untuk sementara sebelum di tawar oleh user dengan id_user lain)
        $data->id_user = 0; // set 0 juga karena belum ada user yang menawar
        $data->id_petugas = Session::get('id_petugas'); // ambil data petugas sesuai dengan sesi login
        $data->status = "ditutup"; // status di set ke ditutup dulu
        
        $statusc = $data->save(); //simpan data
        
        //ini buat pengecekan
        if ($statusc) {
            //kalo berhasil
            return redirect('petugas/homeLelang')->with('alert-success','Barang Lelang berhasil ditambahkan');
        } else {
            //kalo gagal
            return redirect('petugas/formTambahLelang')->with('alert-error','Barang Lelang gagal ditambahkan');
        }
    }
    
    public function formEditLelang($id_lelang){
        // protect halaman -> kalau belum login
        if(!Session::get('login')){
            //kalau belum login di arahin ke form petugas
            return redirect('/formAdminLogin')->with('alert','Kamu harus login dulu');
            // boleh masuk kalau id_rolenya 1/petugas    
        }elseif(Session::get('id_role') == 1){
            //ini untuk menampilkan tampilan tambahBarang pada folder petugas
            //yang diujung biasanya kan pake where tapi disini pake find biar lebih singkat
            $data['lelang'] = Lelang::find($id_lelang);
            $data['barang'] = Barang::get();
            return view('petugas.tambahEditLelang',$data);
            
        }else{
            return redirect('/');
        }
    }
    
    public function postEditLelang(Request $request, $id_lelang){
        // validasi kolom apa aja yang harus di input
        $this->validate($request,[
            'id_barang' => 'required',            
        ]);
        // ambil data dari model lelang
        $data = Lelang::find($id_lelang);
        // set tanggal otomatis ke kolom tanggal
        $date = date("Y-m-d");
        // ambil dan ubah kolom id_barang
        $data->id_barang = $request->id_barang;
        $data->tgl_lelang = $date;
        // ambil id_petugas sesuai sesi yang login
        $data->id_petugas = Session::get('id_petugas');
        
        // Update Data
        $statusc = $data->update();
        //ini buat pengecekan
        if ($statusc) {
            //kalo berhasil
            return redirect('petugas/homeLelang')->with('alert-success','Barang lelang berhasil diperbarui');
        } else {
            //kalo gagal
            return redirect('petugas/formTambahLelang')->with('alert-error','Barang lelang gagal diperbarui');
        }
    }

    public function deleteLelang($id_lelang){
        // ambil/cari id_barang dari model barang
        $data = Lelang::find($id_lelang);
        // delete data
        $statusc = $data->delete();
        //ini buat pengecekan
        if ($statusc) {
            //kalo berhasil 
            return redirect('petugas/homeLelang')->with('alert-success','Barang lelang berhasil dihapus');
        } else {
            //kalo gagal
            return redirect('petugas/homeLelang')->with('alert-error','Barang lelang gagal dihapus');
        }
    }

    public function postLelangDibuka($id_lelang){
        // Ambil data lelang bedasarkan id_lelang
        $data = Lelang::find($id_lelang);
        // ambil kolom status pada tabel lelang
        $data->status = "dibuka";
        
        // Hanya untuk update status saja ya
        $statusc = $data->update();
        //ini buat pengecekan
        if ($statusc) {
            //kalo berhasil 
            return redirect('petugas/homeLelang')->with('alert-open','Lelang telah dibuka');
        } else {
            //kalo gagal
            return redirect('petugas/homeLelang')->with('alert-error','Lelang gagal Dibuka');
        }
    }
    public function postLelangDitutup($id_lelang){
        // Ambil data lelang bedasarkan id_lelang
        $data = Lelang::find($id_lelang);
        // ambil kolom status pada tabel lelang
        $data->status = "ditutup";
        
        // Hanya untuk update status saja ya
        $statusc = $data->update();
        //ini buat pengecekan
        if ($statusc) {
            //kalo berhasil 
            return redirect('petugas/homeLelang')->with('alert-close','Lelang telah ditutup');
        } else {
            //kalo gagal
            return redirect('petugas/homeLelang')->with('alert-error','Lelang Gagal Di TUTUP');
        }
    }

    public function formPemenang(){
        // Protect halaman -> kalau belum login
        if(!Session::get('login')){
            //Kalau belum login diarahkan ke halaman login petugas
            return redirect('/formLoginAdmin')->with('alert','Kamu harus login dulu');
            
            //kalo id_role nya 1 masuk petugas
        }elseif(Session::get('id_role') == 1){
            // $status untuk menampung nilai "ditutup"
            $status = "ditutup";
            // variable $data mengambil semua data dari model barang yang nantinya padd tabel/form di tampung pada nilai variable ['barang']
            $data['lelang'] = Lelang::where('status',$status)->get(); // mengambil data dari kolom status hanya status yang ditutup saja    
            // halaman petugas
            return view ('petugas.pemenang',$data);
            
        } else{
            return redirect('petugas/home');
        }
    }
}
