<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Lelang;
use App\Models\History;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use PhpParser\Node\Stmt\Else_;

class MasyarakatController extends Controller
{
    public function homeMasyarakat(){
        //ini buat ngeprotect halaman
    	//kalo belum login
    	if(!Session::get('login')){
    		//masuk sini
            return redirect('masyarakat/login')->with('alert','Kamu harus login dulu');
        } else{
            return view('masyarakat.home');
        }
    }

    public function homeLelang(){
        //ini buat ngeprotect halaman
    	//kalo belum login
    	if(!Session::get('login')){
    		//masuk sini
            return redirect('masyarakat/login')->with('alert','Kamu harus login dulu');
        }
        else{
            if (!Session::get('id_role')) {
            
            //$status buat nampung nilai dibuka
            $status = "dibuka";
            //$id digunakan untuk menampung id_user yang lagi login
            $id = Session::get('id_user');     
            //ini ngambil history berdasarkan user login
            $barang =  History::where('id_user',$id)->first();
            //pengecekan jikalau user yang login mempunyai data di tabel history lelang
            if($barang != null) { // apabila user mempunyai history akan dijalankan fungsi ini
                //$data['barang'] yg bacaan barang itu variabel buat di tampilan
                //yg sesudah where([]) itu maksudnya wherenya ada 2 kondisi
                $data['barang'] = Lelang::where([
                    ['status',$status],
                    ['id_user',"!=",$barang->id_user]
                ])->get();

            } elseif($barang == null) { // apabila user tidak memiliki history akan dijalankan fungsi ini
                // mengambil data lelang hanya mengambil statusnya dibuka saja, sesuai $status diatas
                 $data['barang'] = Lelang::where('status',$status)->get();
            }

            //ini untuk menampilkan tampilan home pada folder masyarakat
           return view('masyarakat.homeLelang',$data);
                            
            }else{
                return redirect('/');
            }
                    	         
        }
    }

    public function detailPenawaran($id_lelang){
        // protect halaman -> kalau belum login
        if(!Session::get('login')){
            //kalau belum login di arahin ke form petugas
            return redirect('/formLoginMasyarakat')->with('alert','Kamu harus login dulu');
        // boleh masuk kalau id_rolenya 1/petugas    
        }else{
            //ini untuk menampilkan tampilan detail barang pada folder Masyarakat
            $data['barangDetail'] = Lelang::where('id_lelang', $id_lelang)->get();
           return view('masyarakat.detailPenawaran',$data);
                     
        }
    }
    
    public function modalLelang($id_lelang)
    {
        $lelang = Lelang::find($id_lelang);

        // Ubah format data sesuai kebutuhan
        $data = [
            'foto_barang' => asset('storage/'.$lelang->barang->foto_barang),
            'nama_barang' => $lelang->barang->nama_barang,
            'tgl' => $lelang->barang->tgl,
            'harga_awal' => $lelang->barang->harga_awal
        ];

        return response()->json($data);
        
    }

    public function postPenawaran(Request $request, $id_lelang){
        // Validasi input penawaran harga yang dimana harus diisi
        $this->validate($request,[
            'penawaran_harga' => 'required',
        ]);
        // untuk mengambil id_lelang bedasarkan id dalam model Lelang
        $lelang = Lelang::find($id_lelang);
        // tampungan sementara untuk nilai penawaran harga yang di inputkan oleh user
        $harga = $request->penawaran_harga;

        // Pengecheckan terhadap harga penawaran apabila LEBIH BESAR atau SAMA DENGAN harga awal pada kolom harga awal pada tabel lelang maka bisa melakukan penawaran/penambahan data
        if($harga >= $lelang->barang->harga_awal){
            // melakukan penambahan data pada tabel/model history
            $data = new History;
            // request input
            $data->id_lelang = $id_lelang; // diambil dari id_lelang dari model lelang yang di passing
            $data->id_barang = $request->id_barang; //diambil dari form detail penawaran sesuai dengan data yang di pilih
            $data->id_user = Session::get('id_user');
            $data->penawaran_harga = $request->penawaran_harga;

            $statusc = $data->save();
            // Dilakukan pengecekan kalau berhasil
            if($statusc){
                // dicheck lagi apablia yang di input user lebih besar dari harga akhir pada tabel/model lelang maka bisa lanjut
                if($harga > $lelang->harga_akhir){
                    $lelang->harga_akhir = $harga;
                    $lelang->id_user = Session::get('id_user');
                    // data baru/penawaran baru lebih besar maka data akan di update
                    $statusv = $lelang->update();
                    // kalau berhasi di update
                    if($statusv){
                        return redirect('masyarakat/formHistoryLelang')->with('alert-success','Selamat anda berhasil melakukan BID!');
                    }else{ //kalau gagal
                        return redirect('masyarakat/home')->with('alert-error','Penawaran anda gagal');
                    }
                } else{ // kalau penawaran nilai/harganya kurang
                    return redirect('masyarakat/home')->with('alert-warning','Penawaran anda kurang dari penawaran sebelumnya');
                }
            } else{ // kalau gagal
                return redirect('masyarakat/home')->with('alert-error','Penawaran anda gagal');
            }
        } else{ // kalau gagal juga
            return redirect('masyarakat/home')->with('alert-error','Penawaran anda gagal');
        }
    }

    public function formPemenang(){
        // Protect halaman -> kalau belum login
        if(!Session::get('login')){
            //Kalau belum login diarahkan ke halaman login petugas
            return redirect('/formLoginMasyarakat')->with('alert','Kamu harus login dulu');
            
        } else{
            // ambil id_usernya lewat sesi login
            $id = Session::get('id_user');
            // $status untuk menampung nilai "ditutup"
            $status = "ditutup";
            // ada 2 kondisi yang di ambil yaitu sesi id_user yang login dan status lelang yang udah ditutup
            $data['lelang'] = Lelang::where([
                ['status', $status],
                ['id_user', $id]
            ])->get();
            // menampilkan form pemenang
            return view('masyarakat.pemenang',$data);
        }
    }

    public function formHistoryLelang(){
        // Protect halaman -> kalau belum login
        if(!Session::get('login')){
            //Kalau belum login diarahkan ke halaman login petugas
            return redirect('/formLoginMasyarakat')->with('alert','Kamu harus login dulu');
            
        } else{
            // $id buat nampung sesi id_user yang login
            $id = Session::get('id_user');
            // mencaro data dari model history yang sesuai dengan sesi id_user yang login
            $data['history'] = History::where('id_user',$id)->get();
            // Menampilkan view History lelang
            return view('masyarakat/historyLelang',$data);
        }
    }

    public function editDetailPenawaran($id_history){
        // protect halaman -> kalau belum login
        if(!Session::get('login')){
            //kalau belum login di arahin ke form petugas
            return redirect('/formLoginMasyarakat')->with('alert','Kamu harus login dulu');
        // boleh masuk kalau id_rolenya 1/petugas    
        }else{
            //ini untuk menampilkan tampilan detail barang pada folder Masyarakat
            $data['barangDetail'] = History::where('id_history', $id_history)->get();
           return view('masyarakat.editDetailPenawaran',$data);
                     
        }
    }

    public function postEditPenawaran(Request $request, $id_history){
        // Validasi input penawaran harga yang dimana harus diisi
        $this->validate($request,[
            'penawaran_harga' => 'required',
        ]);
        $id_lelang = $request->id_lelang;
        // untuk mengambil id_lelang bedasarkan id dalam model Lelang
        $lelang = Lelang::find($id_lelang);
        // tampungan sementara untuk nilai penawaran harga yang di inputkan oleh user
        $harga = $request->penawaran_harga;

        // Pengechekan apabila data yang di edit harus lebih besar atau sama dengan nilai terkahir di inputkan
        if($harga >= $lelang->barang->harga_awal && $harga >= $lelang->harga_akhir){
            // Mengambil data dari model atau tabel history bedasarkan id_barang yang terpilih
            $data = History::find($id_history);
            $data->penawaran_harga = $request->penawaran_harga; // mengganti/update penawaran harga
            // update
            $statusc = $data->update();
            // dilakukan pengecheckan kembali
            if($statusc){
                // check lagi apabila $hargan lebih besar dari harga akhir pada tabel lelang
                if($harga > $lelang->harga_akhir){
                    // untuk update harga akhir yang di inputkan
                    $lelang->harga_akhir = $harga;
                    // untuk mengganti/update id_user yang terakhir menawar harga lebih besar dari sebelumnya
                    $lelang->id_user = Session::get('id_user');
                    // update data lelang
                    $statusv = $lelang->update();
                    if($statusv){ //kalau berhasil
                        return redirect('masyarakat/formHistoryLelang')->with('alert-success','Selamat BID anda berhasil di update');
                    }
                }else{ //kalau gagal
                    return redirect('masyarakat/formHistoryLelang')->with('alert-warning','BID anda kurang dari BID sebelumnya');
                }
            }else{ //kalau gagal
                return redirect('masyarakat/formHistoryLelang')->with('alert-error','BID anda gagal');
            }
        } else{ //kalau gagal
            return redirect('masyarakat/formHistoryLelang')->with('alert-error','BID anda gagal');
        }
    }

    public function deletePenawaran($id_history){
        // Mengambil data dari model atau tabel history bedasarkan id_barang yang terpilih
        $data = History::find($id_history);
        // delete data sesuai dengan id_history yang di ambil
        $statusc = $data->delete();
        // pengecheckan apabila berhasi
        if($statusc){
            // tampungan nilai sementara bedarasarkan id_lelang yang berada di tabel lelang dan menampilkan penawaran terbesar
            $history = History::where('id_lelang',$data->lelang->id_lelang)->max('penawaran_harga');
            // untuk menampung pengecheckan dan pencarian pada tabel lelang bedasarkan id_lelang
            $lelang = Lelang::findOrFail($data->lelang->id_lelang);
            // tampungan sementara tabel history bedasarkan id_lelang yang ada di tabel lelang, diambil data pertama pada tabel history
            $user = History::where('id_lelang',$data->lelang->id_lelang)->first();

            // dilakukan penghecheckan lagi kalau data di hapus dan tidak ada penawaran tebesar
            if($history == null){
                // mengubah data akhir jadi 0
                $lelang->harga_akhir = 0;
                // dan mengubah data user jadi 0 juga
                $lelang->id_user = 0;
            } else{ // kalau data tidak kosong berati ada penawaran sebelumnya ke 2
                // mengganti penawaran terakhir pada tabel lelang dengan MAX pada tabel history
                $lelang->harga_akhir = $history;
                // mengganti id_user dengan id_user lain dengan penawaran terbesar ke 2
                $lelang->id_user = $user->id_user;
            }
            // update data lelang
            $statusv = $lelang->update();
            // kalau berhasil
            if($statusv){
                return redirect('masyarakat/home')->with('alert-success','BID anda berhasil di hapus');
            } else{ //kalau gagal
                return redirect('masyarakat/formHistoryLelang')->with('alert-error','BID anda gagal di hapus');
            }
        } else{ //kalau gagal juga
            return redirect('masyarakat/formHistoryLelang')->with('alert-error','BID anda gagal di hapus');
        }
    }
}
