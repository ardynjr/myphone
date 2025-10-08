<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PhoneController extends Controller
{
    private $apiBaseUrl;

    public function __construct()
    {
        $this->apiBaseUrl = env('API_BASE_URL');
    }

    // Halaman utama - tampilkan form pencarian
    public function index()
    {
        return view('phones.index');
    }

    // Fungsi pencarian HP
   public function search(Request $request)
{
    $query = $request->input('query');

    if (empty($query)) {
        return redirect()->route('phones.index')->with('error', 'Silakan masukkan nama HP yang ingin dicari');
    }

    try {
        $url = $this->apiBaseUrl . '/gsm/search?q=' . urlencode($query);

        // Debug: tampilkan URL yang dipanggil
        // dd($url);

        $response = Http::timeout(10)->get($url);

        // Debug: tampilkan response mentah
        // dd($response->json());

        if ($response->successful()) {
            $results = $response->json();

            // Debug: lihat isi results
            // dd($results);

            return view('phones.search', compact('results', 'query'));
        } else {
            return view('phones.error')->with('message', 'API tidak merespon dengan benar. Status: ' . $response->status());
        }
    } catch (\Illuminate\Http\Client\ConnectionException $e) {
        return view('phones.error')->with('message', 'Tidak dapat terhubung ke API. Cek koneksi internet Anda.');
    } catch (\Exception $e) {
        return view('phones.error')->with('message', 'Terjadi kesalahan: ' . $e->getMessage());
    }
}


    // Menampilkan detail spesifikasi HP
    public function showPhone($phoneId)
    {
        try {
            // Get phone info
            $response = Http::timeout(10)->get($this->apiBaseUrl . '/gsm/info/' . $phoneId);

            if ($response->successful()) {
                $phone = $response->json();

                // Get phone images
                $imagesResponse = Http::timeout(10)->get($this->apiBaseUrl . '/gsm/images/' . $phoneId);
                $images = $imagesResponse->successful() ? $imagesResponse->json() : null;

                return view('phones.detail', compact('phone', 'images'));
            } else {
                return view('phones.error')->with('message', 'Data HP tidak ditemukan');
            }
        } catch (\Illuminate\Http\Client\ConnectionException $e) {
            return view('phones.error')->with('message', 'Tidak dapat terhubung ke API. Cek koneksi internet Anda.');
        } catch (\Exception $e) {
            return view('phones.error')->with('message', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
