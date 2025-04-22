<?php

namespace App\Filament\Clusters\HalamanHome\Resources\PromotionResource\Pages;

use App\Filament\Clusters\HalamanHome\Resources\PromotionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPromotion extends EditRecord
{
    protected static ?string $title = 'Edit Promotion';

    protected static string $resource = PromotionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()
                ->label('Hapus')
                ->icon('heroicon-o-trash')
                ->color('danger'),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
