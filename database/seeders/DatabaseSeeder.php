<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Jenis;
use App\Models\Produk;
use App\Models\Ruangan;
use App\Models\Kategori;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();

        Ruangan::create([
            'name'=>'Kamar Tidur',
            'slug'=>'kamar-tidur'
        ]);

        Ruangan::create([
            'name'=>'Ruang Keluarga',
            'slug'=>'ruang-keluarga'
        ]);

        Ruangan::create([
            'name'=>'Dapur',
            'slug'=>'dapur'
        ]);

        Ruangan::create([
            'name'=>'Kamar Mandi',
            'slug'=>'kamar-mandi'
        ]);

        Jenis::create([
            'name'=>'Televisi',
            'slug'=>'televisi'
        ]);

        Jenis::create([
            'name'=>'Shower',
            'slug'=>'shower'
        ]);

        Jenis::create([
            'name'=>'Panci',
            'slug'=>'panci'
        ]);

        Jenis::create([
            'name'=>'Kasur',
            'slug'=>'kasur'
        ]);

        Kategori::create([
            'name'=>'Elektronik',
            'slug'=>'elektronik'
        ]);

        Kategori::create([
            'name'=>'Furniture',
            'slug'=>'furniture'
        ]);

        Kategori::create([
            'name'=>'Alat Masak',
            'slug'=>'alat-masak'
        ]);

        Kategori::create([
            'name'=>'Pancuran',
            'slug'=>'pancuran'
        ]);

        Produk::create([
            'nama_barang'=>'Produk-1',
            'kategori_id'=>2,
            'jenis_id'=>3,
            'ruangan_id'=>2,
            'slug'=>'Produk-1',
            'harga_barang'=>'3000000',
            'jumlah_barang'=>'9',
            'deskripsi_barang'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Et quidem voluptatibus optio fugiat est quaerat magnam quasi id dolorem molestiae!'
        ]);

        Produk::create([
            'nama_barang'=>'Produk-2',
            'kategori_id'=>3,
            'jenis_id'=>2,
            'ruangan_id'=>2,
            'slug'=>'Produk-2',
            'harga_barang'=>'200000',
            'jumlah_barang'=>'6',
            'deskripsi_barang'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Et quidem voluptatibus optio fugiat est quaerat magnam quasi id dolorem molestiae!'
        ]);

        Produk::create([
            'nama_barang'=>'Produk-3',
            'kategori_id'=>1,
            'jenis_id'=>1,
            'ruangan_id'=>2,
            'slug'=>'Produk-3',
            'harga_barang'=>'100000',
            'jumlah_barang'=>'3',
            'deskripsi_barang'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Et quidem voluptatibus optio fugiat est quaerat magnam quasi id dolorem molestiae!'
        ]);

        Produk::create([
            'nama_barang'=>'Produk-4',
            'kategori_id'=>1,
            'jenis_id'=>4,
            'ruangan_id'=>3,
            'slug'=>'Produk-4',
            'harga_barang'=>'150000',
            'jumlah_barang'=>'6',
            'deskripsi_barang'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Et quidem voluptatibus optio fugiat est quaerat magnam quasi id dolorem molestiae!'
        ]);

        Produk::create([
            'nama_barang'=>'Produk-5',
            'kategori_id'=>4,
            'jenis_id'=>2,
            'ruangan_id'=>2,
            'slug'=>'Produk-5',
            'harga_barang'=>'200000',
            'jumlah_barang'=>'4',
            'deskripsi_barang'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Et quidem voluptatibus optio fugiat est quaerat magnam quasi id dolorem molestiae!'
        ]);

        Produk::create([
            'nama_barang'=>'Produk-6',
            'kategori_id'=>1,
            'jenis_id'=>4,
            'ruangan_id'=>4,
            'slug'=>'Produk-6',
            'harga_barang'=>'10000',
            'jumlah_barang'=>'60',
            'deskripsi_barang'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Et quidem voluptatibus optio fugiat est quaerat magnam quasi id dolorem molestiae!'
        ]);

        Produk::create([
            'nama_barang'=>'Produk-7',
            'kategori_id'=>3,
            'jenis_id'=>3,
            'ruangan_id'=>2,
            'slug'=>'Produk-7',
            'harga_barang'=>'20000',
            'jumlah_barang'=>'10',
            'deskripsi_barang'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Et quidem voluptatibus optio fugiat est quaerat magnam quasi id dolorem molestiae!'
        ]);

        Produk::create([
            'nama_barang'=>'Produk-8',
            'kategori_id'=>3,
            'jenis_id'=>2,
            'ruangan_id'=>4,
            'slug'=>'Produk-8',
            'harga_barang'=>'75000',
            'jumlah_barang'=>'13',
            'deskripsi_barang'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Et quidem voluptatibus optio fugiat est quaerat magnam quasi id dolorem molestiae!'
        ]);

        Produk::create([
            'nama_barang'=>'Produk-9',
            'kategori_id'=>2,
            'jenis_id'=>4,
            'ruangan_id'=>2,
            'slug'=>'Produk-9',
            'harga_barang'=>'70000',
            'jumlah_barang'=>'5',
            'deskripsi_barang'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Et quidem voluptatibus optio fugiat est quaerat magnam quasi id dolorem molestiae!'
        ]);

        Produk::create([
            'nama_barang'=>'Produk-10',
            'kategori_id'=>1,
            'jenis_id'=>2,
            'ruangan_id'=>1,
            'slug'=>'Produk-10',
            'harga_barang'=>'60000',
            'jumlah_barang'=>'23',
            'deskripsi_barang'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Et quidem voluptatibus optio fugiat est quaerat magnam quasi id dolorem molestiae!'
        ]);




        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
