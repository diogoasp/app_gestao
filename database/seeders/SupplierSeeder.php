<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Supplier;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //via objeto
        $fornecedor = new Supplier();
        $fornecedor->name = 'Fornecedor 100';
        $fornecedor->site = 'fornecedor 100.com.br';
        $fornecedor->uf = 'CE';
        $fornecedor->email = 'contato@fornecedor100.com';
        
        $fornecedor->save();


        //via create
        // para usar esse método é necessário que os atributos usados estejam na relação de fillable no modelo
        Supplier::create([
            'name' => 'Fornecedor 200',
            'site' => 'fornecedor200.com.br',
            'uf' => 'RS',
            'email' => 'contato@fornecedor200.com',
        ]);

        // Via DB direto
        // DB::table('suppliers')->insert([
        //     'name' => 'Fornecedor 200',
        //     'site' => 'fornecedor200.com.br',
        //     'uf' => 'RS',
        //     'email' => 'contato@fornecedor200.com',
        // ]);
    }
}
