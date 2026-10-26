<?php

namespace App\Http\Controllers;

abstract class Controller
{
    /**
     * Pesan validasi umum dalam Bahasa Indonesia.
     *
     * @return array<string, string>
     */
    protected function pesanValidasi(): array
    {
        return [
            'required' => ':attribute wajib diisi.',
            'string' => ':attribute harus berupa teks.',
            'max' => [
                'string' => ':attribute maksimal :max karakter.',
                'numeric' => ':attribute maksimal :max.',
            ],
            'min' => [
                'numeric' => ':attribute minimal :min.',
            ],
            'between' => [
                'numeric' => ':attribute harus bernilai antara :min sampai :max.',
            ],
            'numeric' => ':attribute harus berupa angka.',
            'integer' => ':attribute harus berupa bilangan bulat.',
            'email' => 'Format :attribute tidak valid.',
            'unique' => ':attribute sudah terdaftar, gunakan data lain.',
            'in' => ':attribute yang dipilih tidak valid.',
            'exists' => ':attribute yang dipilih tidak ditemukan.',
            'regex' => 'Format :attribute tidak valid.',
        ];
    }
}
