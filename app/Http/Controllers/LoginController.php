<?php

namespace App\Http\Controllers;

use App\Models\Level;
use App\Models\Petugas;
use App\Models\Masyarakat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{

    public function postLogout(){
        //Menghapus data yang disimpan selama sesi berlangsung, agar data pengguna tidak terkait apabila telah keluar/logout dari web.
        Session::flush();
        // destroy sesi
        //Kembali Ke halaman utama
        return redirect('/')->with('alert', 'Kamu Telah Logout');
    }

    /* ================================LOGIN====================================== */
    /* ==============================MASYARAKAT=================================== */
    
    public function formLoginMasyarakat(){
        // Protect halaman -> kalau belum login
        if(!Session::get('login')){
            // form view Login Masyarakat
            return view('login.loginMasyarakat');
        } 
        else{
            // kalau udah masuk sini
            if(!Session::get('id_role')){
                return redirect('masyarakat/home');
            }else{
                return redirect('/');
            }
        }
    }
    
    public function postLoginMasyarakat(Request $request){
        // Request data input dari form login masyarakat
        $username = $request->username;
        $pass = $request->pass;
        
        // check username dalam database dengan
        $data = Masyarakat::where('username',$username)->first();
        if($data){
            // Check + Menejerjemahkan password yang sudah ter-brcypt
            if(Hash::check($pass,$data->pass)){
                // Check data user 
                Session::put('id_user',$data->id_user);
                Session::put('nama_lengkap',$data->nama_lengkap);
                Session::put('username',$data->username);
                Session::put('pass',$data->pass);
                Session::put('no_telp',$data->no_telp);
                // PENTING!! karena untuk login -> dan 'login' itu nama dari sesinya
                Session::put('login',TRUE);
                // redirect ke halaman home
                return redirect('masyarakat/home')->with('alert-info','Anda Berhasil Masuk');
            }else{
                // kalau salah
                return redirect('/formLoginMasyarakat')->with('alert','Username atau Password Salah!');
            }
        } else{
            // kalau salah
            return redirect('/formRegisMasyarakat')->with('alert','Username atau Password Salah!');
        }
    }
    
    public function formRegisMasyarakat(){
        // Protect halaman -> kalau belum login
        if(!Session::get('login')){
            // form view Login Masyarakat
            return view('login.registerMasyarakat');
        } 
        else{
            // kalau udah masuk sini
            if(!Session::get('id_role')){
                return redirect('masyarakat/home');
            }else{
                return redirect('/');
            }
        }
    }
    
    public function postRegisMasyarakat(Request $request){
        //ini untuk validasi. apa aja yang mau di input dalam register
    	$this->validate($request, [
            'nama_lengkap' => 'required',
    		'no_telp' => 'required|min:8',
    		'username' => 'required|min:3',
    		'pass' => 'required|min:6',
    		'cpass' => 'required|same:pass',
    	]);
        // Model Masyarakat
        $data = new Masyarakat;
        // CREATE Data
        $data->nama_lengkap = $request->nama_lengkap;
        $data->telp = $request->no_telp;
        $data->username = $request->username;
        // bcrypt -> protect password (enkripsi)
        $data->pass = bcrypt($request->pass);
        
        $statusc = $data->save();
        // Check validasi inputan
        if($statusc){
            // kalau sukses atau benar
            return redirect('/formLoginMasyarakat')->with('alert-success','Kamu Berhasil Register');
        }else {
            return redirect('/formRegisMasyarakat')->with('alert','Gagal Register');
        }
        
    }
    
    /* ================================LOGIN=================================== */
    /* ================================ADMIN=================================== */

    public function formLoginAdmin(){
        // Protect halaman -> kalau belum login
        if(!Session::get('login')){
            // form view Login Masyarakat
            return view('login.login');
        } 
        else{
            // kalau udah masuk sini
            if(Session::get('id_role') == '1'){
                return redirect('admin/home');
            } elseif(Session::get('id_role') == '2'){
                return redirect('petugas/home');
            }
            else{
                return redirect('/');
            }
        }
    }

    public function postLoginAdmin(Request $request){
        // Request data input dari form login Petugas/Admin
        $username = $request->username;
        $pass = $request->pass;
        
        // check username dalam database dengan yang di inputkan (memacukan apakah sama/dicocokan)
        $data = Petugas::where('username',$username)->first();
        // dd($data);
        if($data){
            // Check + Menejerjemahkan password yang sudah ter-brcypt
            if(Hash::check($pass,$data->password)){
                // Check data user 
                Session::put('id_petugas',$data->id_petugas);
                Session::put('nama_petugas',$data->nama_petugas);
                Session::put('username',$data->username);
                Session::put('pass',$data->password);
                Session::put('id_role',$data->id_role);
                // PENTING!! karena untuk login -> dan 'login' itu 
                Session::put('login',TRUE);

                // Pengecheckan ROLE admin/petugas
                if (Session::get('id_role') == 1){
                    // apabila role admin maka akan di arhakan ke halaman admin
                    return redirect('petugas/home')->with('alert-info', 'Anda Berhasil Masuk!');
                } else{
                    // apabila bukan admin maka akan di arahkan ke halaman petugas
                    return redirect('admin/home')->with('alert-info', 'Anda Berhasil Masuk!');
                }
            }else{
                // kalau salah data ada yang salah
                return redirect('/formLoginAdmin')->with('alert','Username atau Password Salah!');
            }
        } else{
            // ini juga kalau salah
            return redirect('/formLoginAdmin')->with('alert','Username atau Password Salah!');
        }
    }

    public function formRegisAdmin(){
        if (Session::get('id_role') == 2) {
        // if (!Session::get('id_role')) {
            //ini untuk menampilkan halaman register di dalam folder petugas
               return view('login.register',['id_role' => Level::get(),]);

            } else{
                return redirect('/');
             }
    }

    public function postRegisAdmin(Request $request){
        //ini untuk validasi. apa aja yang mau di input dalam register
    	$this->validate($request, [
            'nama_petugas' => 'required',
    		'id_role' => 'required',
    		'username' => 'required|min:3',
    		'pass' => 'required|min:6',
    		'cpass' => 'required|same:pass',
    	]);
        // Model Petugas
        $data = new Petugas();
        // CREATE Data
        $data->nama_petugas = $request->nama_petugas;
        $data->id_role = $request->id_role;
        $data->username = $request->username;
        // bcrypt -> protect password (enkripsi)
        $data->password = bcrypt($request->pass);
        
        $statusc = $data->save();
        // Check validasi inputan
        if($statusc){
            // kalau sukses atau benar
            return redirect('admin/home')->with('alert-success','Kamu Berhasil Register');
        }else {
            return redirect('/formRegisAdmin')->with('alert','Gagal Register');
        }
    }

    public function adminLTE(){
        return view ('admin.layouts.admin');
    }
}