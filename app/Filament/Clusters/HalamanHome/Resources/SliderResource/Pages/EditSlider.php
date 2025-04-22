<?php

namespace App\Filament\Clusters\HalamanHome\Resources\SliderResource\Pages;

use App\Filament\Clusters\HalamanHome\Resources\SliderResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSlider extends EditRecord
{
    protected static ?string $title = 'Edit Slider';

    protected static string $resource = SliderResource::class;

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
