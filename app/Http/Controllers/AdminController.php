<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Lelang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function homeAdmin(){
        // Protect halaman -> kalau belum login
        if(!Session::get('login')){
            //Kalau belum login diarahkan ke halaman login petugas
            return redirect('/formLoginAdmin')->with('alert','Kamu harus login dulu');
        //kalo id_role nya 1 masuk petugas
        }else{
            if (Session::get('id_role') == 1){
                // kalau id_rolenya 1 akan diarahkan kehalaman home petugas
                return view('petugas.home');
                
            }elseif(Session::get('id_role') == 2){
                // variable $data mengambil semua data dari model barang yang nantinya padd tabel/form di tampung pada nilai variable ['barang']
                $data['barang'] = Barang::get();
                // kalau id_role nya admin maka diarahkan ke halaman admin
                return view('admin.home',$data);
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
        }elseif(Session::get('id_role') == 2){
            //ini untuk menampilkan tampilan tambahBarang pada folder petugas
            //yang diujung biasanya kan pake where tapi disini pake find biar lebih singkat
            $data['barangDetail'] = Barang::where('id_barang', $id_barang)->get();
           return view('admin.detailBarang',$data);
                     
        }else{
            return redirect('/');
        }
    }

    public function formTambahBarang(){
        // Protect halaman -> kalau belum login
        if(!Session::get('login')){
            //Kalau belum login diarahkan ke halaman login petugas/admin
            return redirect('/formLoginAdmin')->with('alert','Kamu harus login dulu');
        //kalo id_role nya 2 masuk admin
        } elseif(Session::get('id_role') == 2){
            // kalau id_role nya bener admin diarahkan ke form tambah barang
            return view ('admin.tambahEditBarang');
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
           return redirect('admin/home')->with('alert-success','Data barang berhasil ditambahkan');
       } else {
           //kalo gagal
           return redirect('admin/formTambahBarang')->with('alert-error','Data barang gagal ditambahkan');
       }
   }

   public function formEditBarang($id_barang){
    // protect halaman -> kalau belum login
    if(!Session::get('login')){
        //kalau belum login di arahin ke form petugas
        return redirect('/formAdminLogin')->with('alert','Kamu harus login dulu');
    // boleh masuk kalau id_rolenya 1/petugas    
    }elseif(Session::get('id_role') == 2){
        //ini untuk menampilkan tampilan tambahBarang pada folder petugas
        //yang diujung biasanya kan pake where tapi disini pake find biar lebih singkat
        $data['barang'] = Barang::find($id_barang);
       return view('admin.tambahEditBarang',$data);
                 
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
        return redirect('admin/home')->with('alert-success','Data barang berhasil diperbarui');
    } else {
        //kalo gagal
        return redirect('admin/formTambahBarang')->with('alert-error','Data barang gagal diperbarui');
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
            return redirect('admin/home')->with('alert-success','Data barang berhasil dihapus');
        } else {
            //kalo gagal
            return redirect('admin/formTambahBarang')->with('alert-error','Data barang gagal dihapus');
        }
    }

    public function formPemenang(){
        // Protect halaman -> kalau belum login
        if(!Session::get('login')){
            //Kalau belum login diarahkan ke halaman login petugas
            return redirect('/formLoginAdmin')->with('alert','Kamu harus login dulu');
            
            //kalo id_role nya 1 masuk Admin
        }elseif(Session::get('id_role') == 2){
            // $status untuk menampung nilai "ditutup"
            $status = "ditutup";
            // variable $data mengambil semua data dari model barang yang nantinya padd tabel/form di tampung pada nilai variable ['barang']
            $data['lelang'] = Lelang::where('status',$status)->get(); // mengambil data dari kolom status hanya status yang ditutup saja    
            // halaman petugas
            return view ('admin.pemenang',$data);
            
        } else{
            return redirect('petugas/home');
        }
    }
}
