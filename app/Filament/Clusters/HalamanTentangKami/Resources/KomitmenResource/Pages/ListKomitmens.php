<?php

namespace App\Filament\Clusters\HalamanTentangKami\Resources\KomitmenResource\Pages;

use App\Filament\Clusters\HalamanTentangKami\Resources\KomitmenResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKomitmens extends ListRecords
{
    protected static ?string $title = 'Halaman Tentang Kami';

    protected static string $resource = KomitmenResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Tambah')
                ->icon('heroicon-o-plus'),
        ];
    }
}
