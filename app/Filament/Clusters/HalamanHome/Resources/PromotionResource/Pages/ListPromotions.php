<?php

namespace App\Filament\Clusters\HalamanHome\Resources\PromotionResource\Pages;

use App\Filament\Clusters\HalamanHome\Resources\PromotionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPromotions extends ListRecords
{
    protected static ?string $title = 'Halaman Home';

    protected static string $resource = PromotionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Tambah')
                ->icon('heroicon-o-plus'),
        ];
    }
}
