<?php

namespace App\Filament\Clusters\HalamanHome\Resources\SliderResource\Pages;

use App\Filament\Clusters\HalamanHome\Resources\SliderResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateSlider extends CreateRecord
{
    protected static ?string $title = 'Tambah Slider';

    protected static string $resource = SliderResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
