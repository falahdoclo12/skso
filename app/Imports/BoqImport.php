<?php 

namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use app\Models\Boq;

class BoqImport implements ToModel, WithHeadingRow
{
    public function model (array $row){
        
        return new Boq([

        ]);
    }
    
}