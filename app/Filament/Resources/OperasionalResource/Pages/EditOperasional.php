<?php

namespace App\Filament\Resources\OperasionalResource\Pages;

use App\Filament\Resources\OperasionalResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditOperasional extends EditRecord
{
    protected static ?string $title = 'Edit Operasional';
    
    protected static string $resource = OperasionalResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()
                ->color('danger')
                ->icon('heroicon-o-trash')
                ->tooltip('Delete')
                ->label('Delete'),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
