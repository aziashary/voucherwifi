<?php

namespace App\Http\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Voucher;

class VoucherTable extends DataTableComponent
{
    protected $model = Voucher::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id_voucher');
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id_voucher")
                ->sortable(),
            Column::make("Lokasi", "lokasi")
                ->sortable(),
            Column::make("Kode voucher", "kode_voucher")
                ->sortable(),
            Column::make("Paket", "paket")
                ->sortable(),
            Column::make("Status voucher", "status_voucher")
                ->sortable(),
            Column::make("Created at", "created_at")
                ->sortable(),
            Column::make("Updated at", "updated_at")
                ->sortable(),
        ];
    }
}
