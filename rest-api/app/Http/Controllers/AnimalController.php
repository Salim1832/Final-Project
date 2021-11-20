<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnimalController extends Controller
{
    public $animal = ['kucing', 'ayam', 'ikan'];

    public function index()
    {
        echo "Menampilkan data animals.";
        echo "<br>";
        foreach ($this->animal as $animals){
        echo $animals. "<br>";
        } 
    }

    public function store(Request $request)
    {
        echo "Menambahkan hewan baru";
        echo "<br>";
        array_push($this->animal, $request->nama);
        $this->index();
    }

    public function update(Request $request, $id)
    {
        echo "Mengupdate data hewan id $id";
        echo "<br>";
        $this->animal[$id] = $request->nama;
        $this->index();
    }

    public function destroy($id)
    {
        echo "Menghapus data hewan id $id";
        echo "<br>";
        unset($this->animal[$id]);
        $this->index();
    }
}


