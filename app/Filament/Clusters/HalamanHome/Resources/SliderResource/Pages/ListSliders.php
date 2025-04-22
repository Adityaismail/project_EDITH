<?php

namespace App\Filament\Clusters\HalamanHome\Resources\SliderResource\Pages;

use App\Filament\Clusters\HalamanHome\Resources\SliderResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSliders extends ListRecords
{
    protected static ?string $title = 'Halaman Home';

    protected static string $resource = SliderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Tambah')
                ->icon('heroicon-o-plus'),
        ];
    }
}
