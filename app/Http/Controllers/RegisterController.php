<?php
namespace App\Http\Controllers;
// namespace App\Http\Controllers\Auth;

// use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Siswa;
use App\User;
use App\Galery;

class RegisterController extends Controller
{   
    use RegistersUsers;
    protected $redirectTo = RouteServiceProvider::HOME;
    public function index(Request $request)
    {
        $request->session()->forget('register');

        $products = \App\User::all();

        return view('register.index',compact('products'));
    }

    public function createStep1(Request $request)
    {
        $register = $request->session()->get('register');

        return view('register.step1',compact('register'));
    }

    public function PostcreateStep1(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|min:8',
            'jenkel' => 'required'
        ]);

        $validatedData['password'] = Hash::make($request['password']);
        $validatedData['level'] = 2;

        $register = $request->session()->get('register');
        // $register->fill($validatedData);
        $request->session()->push('register', $validatedData);

        $jadwal = \App\Jadwal::get();
        return view('register.step2', [
            'jadwal' => $jadwal,
        ]);
    }

    public function createStep2(Request $request)
    {
        $register = $request->session()->get('register');

        return view('register.step2',compact('register'));
    }

    public function PostcreateStep2(Request $request)
    {
        $validatedData = $request->validate([
            'kelas' => 'required',
            'id_jadwal' => 'required',
        ]);

        $register = $request->session()->get('register');
        // $register->fill($validatedData);
        $request->session()->push('register', $validatedData);

        return redirect('/register3');
    }
    
    public function createStep3(Request $request)
    {  
        $register = $request->session()->get('register');
        return view('register.step3',compact('register'));
    }

    public function PostcreateStep3(Request $request)
    {
        $register = $request->session()->get('register');

        $validatedData = $request->validate([
            'nama_bank' => 'required',
            'no_rekening' => 'required',
            'jml_transfer' => 'required',
            'tgl_pembayaran' => 'required',
            'file' => 'required',
            'keterangan' => 'required',
        ]);
        
        $register = $request->session()->get('register');
        // $register->fill($validatedData);

        
        
        $file = $request->file('file');
        $name = time()."_".$file->getClientOriginalName();

        $path ='images';
        $file->move($path,$name);

        $validatedData['file'] = $name;
        $request->session()->push('register', $validatedData);
        // var_dump($register); die();
        return view('register.step4',['register' => $register[0]]);
    }

    public function removeImage(Request $request)
    {
        $register = $request->session()->get('register');

        // $register->productImg = null;
        return view('register.step3',compact('register'));
    }

    public function store(Request $request)
    {
        $register = $request->session()->get('register');
        $kelas = $register[1]['kelas'];
        $jadwal = (int) $register[1]['id_jadwal'];
        // $jenkel = $register[4]['jenkel'];


        // var_dump($jadwal); die();
        // var_dump($register); die();
        
        $userId = User::create([
            'name' => $register[0]['name'],
            'email' => $register[0]['email'],
            'password' => $register[0]['password'],
            'level' => $register[0]['level'],
        ]);

        $siswa = Siswa::create([
            'id_users' => $userId['id'],
            'name' => $register[0]['name'],
            'email' => $register[0]['email'],
            'kelas' => $kelas,
            'jenkel' => $register[0]['jenkel'],
            'id_jadwal' => $jadwal,
            'status' => 'Aktif',
        ]);

        Galery::create([
            'id_user' => $userId['id'],
            'name' => $register[0]['name'],
            'kelas' => $kelas,
            'nama_bank' => $register[2]['nama_bank'],
            'no_rekening' => $register[2]['no_rekening'],
            'jml_transfer' => $register[2]['jml_transfer'],
            'tgl_pembayaran' => $register[2]['tgl_pembayaran'],
            'file' => $register[2]['file'],
            'keterangan' => $register[2]['keterangan'],
        ]);

        $request->session()->forget('register');
        return redirect('/home');
    }
}
