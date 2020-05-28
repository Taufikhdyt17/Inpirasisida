<?php 

namespace App\Repositories;

// use Illuminate\Database\Eloquent\Model;
use App\Repositories\Core\FormLmbInovasiRepositoryInterface;
use Illuminate\Http\Request;
use App\User;
use App\lembaga;
use Auth;
use Storage;
use Carbon\Carbon;

class FormLmbInovasiRepository implements FormLmbInovasiRepositoryinterface
{

    protected $lembaga;

    public function __contruct(lembaga $lembaga)
    {
        $this->lembaga = $lembaga;
    }

    public function storeLmbInovasiForm($request)
    {
            $nama = str_replace(' ','-',$request->nama);
            $today = Carbon::today()->toDateString();
            $date = str_replace('-','',$today);
            //ktp
            $ext_ktp = $request->file('ktp')->getClientOriginalExtension();
            $ktp_file = $date."-".$nama."-ktp"."".".". $ext_ktp;
            //Surat Pernyataan
            $ext_surat_pernyataan = $request->file('surat_pernyataan')->getClientOriginalExtension();
            $surat_pernyataan_file = $date."-".$nama."-surat-pernyataan"."".".". $ext_surat_pernyataan;
            //proposal
            $ext_proposal = $request->file('proposal')->getClientOriginalExtension();
            $proposal_file = $date."-".$nama."-proposal"."".".". $ext_proposal;


           $lembaga = lembaga::create([
            'nama'               =>$request->nama,
            'nama_lembaga'       =>$request->nama_lembaga,
            'email'              =>$request->email,
            'ktp'                =>$request->file('ktp')->storeAs('ktp', $ktp_file),
            'telp'               =>$request->telp,
            'surat_pernyataan'   =>$request->file('surat_pernyataan')->storeAs('surat-pernyataan', $surat_pernyataan_file),
            'alamat'             =>$request->alamat,
            'proposal'           =>$request->file('proposal')->storeAs('proposal', $proposal_file),
            'url_proposal'       =>$request->url_proposal,
            'verifikasi'         => 0,
            'kelompok'           => 1,
            'kategori_peena'      =>'inovasi'
            ]);
    }

}