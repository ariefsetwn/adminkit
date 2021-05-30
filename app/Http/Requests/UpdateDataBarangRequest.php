<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDataBarangRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            // 'kode_barang' => 'required|numeric|unique:data_barang,kode_barang',
            'nama_barang' => 'required',
            'jumlah' => 'required',
            'berat' => 'required',
            'foto' => 'image|mimes:jpeg,png,jpg|max:2048'
        ];
    }

    public function messages()
    {
        $messages = [
            'kode_barang.required' => 'Kode barang harus diisi',
            'kode_barang.numeric' => 'Kode barang harus angka',
            'kode_barang.unique' => 'Kode barang sudah ada',
            'nama_barang.required' => 'Nama barang harus diisi',
            'jumlah.required' => 'jumlah harus diisi',
            'berat.required' => 'berat harus diisi',
            'foto.image' => 'Foto harus berupa file gambar',
            'foto.mimes' => 'Foto harus memiliki format jpeg, jpg, atau png',
            'foto.max' => 'Foto maksimal 2MB'
        ];

        return $messages;
    }
}
