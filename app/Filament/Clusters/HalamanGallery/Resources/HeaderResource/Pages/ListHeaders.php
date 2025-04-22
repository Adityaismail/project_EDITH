<?php

namespace App\Filament\Clusters\HalamanGallery\Resources\HeaderResource\Pages;

use App\Filament\Clusters\HalamanGallery\Resources\HeaderResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListHeaders extends ListRecords
{
    protected static ?string $title = 'Halaman Gallery';

    protected static string $resource = HeaderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Tambah')
                ->icon('heroicon-o-plus'),
        ];
    }
}
