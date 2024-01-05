<?php

namespace App\Http\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Paket;

class PaketTable extends DataTableComponent
{
    protected $model = Paket::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id_paket');
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id_paket")
                ->sortable(),
            Column::make("Paket", "paket")
                ->sortable(),
            Column::make("Harga", "harga")
                ->sortable(),
            Column::make("Durasi", "durasi")
                ->sortable(),
            Column::make("Created at", "created_at")
                ->sortable(),
            Column::make("Updated at", "updated_at")
                ->sortable(),
        ];
    }
}
