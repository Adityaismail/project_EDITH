<?php

namespace App\Filament\Resources\OperasionalResource\Pages;

use App\Filament\Resources\OperasionalResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListOperasionals extends ListRecords
{
    protected static ?string $title = 'Daftar Operasional';
    
    protected static string $resource = OperasionalResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Tambah')
                ->icon('heroicon-o-plus')
                ->color('info'),
        ];
    }
}
