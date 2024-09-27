<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;

class RekapAtkExport implements FromCollection
{
    protected $rekapAtk;

    public function __construct($rekapAtk)
    {
        $this->rekapAtk = $rekapAtk;
    }

    public function collection()
    {
        return $this->rekapAtk;
    }
}
