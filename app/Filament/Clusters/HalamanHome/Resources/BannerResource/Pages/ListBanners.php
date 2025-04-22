<?php

namespace App\Filament\Clusters\HalamanHome\Resources\BannerResource\Pages;

use App\Filament\Clusters\HalamanHome\Resources\BannerResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBanners extends ListRecords
{
    protected static ?string $title = 'Halaman Home';

    protected static string $resource = BannerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Tambah')
                ->icon('heroicon-o-plus'),
        ];
    }
}
