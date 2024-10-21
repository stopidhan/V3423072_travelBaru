<?php

namespace App\Http\Controllers;

use App\Models\Packet;

use Illuminate\View\View;

use Illuminate\Http\RedirectResponse;

use Illuminate\Http\Request;

class PacketController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index(): View
    {
        //get all packets
        $packets = Packet::latest()->paginate(10);

        //render view with packets
        return view('packets.index', compact('packets'));
    }

    public function create(): View
    {
        return view('packets.create');
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return RedirectResponse
     */
    // app/Http/Controllers/PacketController.php

    public function store(Request $request)
    {
        // Validasi data
        $validatedData = $request->validate([
            'nama_paket' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'harga_total' => 'required|numeric',
            'rating' => 'required|numeric|min:1|max:5',
            'total_pembelian' => 'required|numeric',
            'destinasi' => 'required|string|max:255',
            'hotel' => 'required|string|max:255',
            'transport' => 'required|string|max:255',
            'layanan_tambahan' => 'required|array'
        ]);

        try {
            // Buat array data yang akan disimpan
            $data = [
                'nama_paket' => $request->nama_paket,
                'deskripsi' => $request->deskripsi,
                'harga_total' => $request->harga_total,
                'rating' => $request->rating,
                'total_pembelian' => $request->total_pembelian,
                'destinasi' => $request->destinasi,
                'hotel' => $request->hotel,
                'transport' => $request->transport,
                'layanan_tambahan' => json_encode($request->layanan_tambahan)
            ];

            // Simpan data
            Packet::create($data);

            return redirect()
                ->route('packets.index')
                ->with('success', 'Data berhasil disimpan!');

        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * edit
     *
     * @param  mixed $id
     * @return View
     */
    public function edit(string $id): View
    {
        //get product by ID
        $packet = Packet::findOrFail($id);

        //render view with product
        return view('packets.edit', compact('packet'));
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return RedirectResponse
     */
    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id): RedirectResponse
    {
        // Validasi request
        $request->validate([
            'nama_paket' => 'required|min:5',
            'deskripsi' => 'required|min:10',
            'harga_total' => 'required|numeric',
            'rating' => 'required|numeric',
            'total_pembelian' => 'required|numeric',
            'destinasi' => 'required',
            'hotel' => 'required',
            'transport' => 'required',
            'layanan_tambahan' => 'nullable|array',
            'layanan_tambahan.*' => 'string' // Memvalidasi setiap item dalam array
        ]);

        // Get packet by ID
        $packet = Packet::findOrFail($id);

        // Prepare layanan_tambahan
        $layananTambahan = $request->layanan_tambahan ?? []; // Jika null, gunakan array kosong

        // Update packet
        $packet->update([
            'nama_paket' => $request->nama_paket,
            'deskripsi' => $request->deskripsi,
            'harga_total' => $request->harga_total,
            'rating' => $request->rating,
            'total_pembelian' => $request->total_pembelian,
            'destinasi' => $request->destinasi,
            'hotel' => $request->hotel,
            'transport' => $request->transport,
            'layanan_tambahan' => json_encode($layananTambahan) // Encode array ke JSON
        ]);

        // Redirect dengan pesan sukses
        return redirect()
            ->route('packets.index')
            ->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * destroy
     *
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        //get product by ID
        $packet = Packet::findOrFail($id);

        //delete product
        $packet->delete();

        //redirect to index
        return redirect()->route('packets.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}