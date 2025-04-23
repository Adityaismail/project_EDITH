<?php

namespace App\Filament\Clusters\HalamanTentangKami\Resources\OwnerContentResource\Pages;

use App\Filament\Clusters\HalamanTentangKami\Resources\OwnerContentResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListOwnerContents extends ListRecords
{
    protected static ?string $title = 'Halaman Tentang Kami';

    protected static string $resource = OwnerContentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Tambah')
                ->icon('heroicon-o-plus'),
        ];
    }
}
