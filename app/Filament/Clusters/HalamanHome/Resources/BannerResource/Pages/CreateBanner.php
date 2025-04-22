<?php

namespace App\Filament\Clusters\HalamanHome\Resources\BannerResource\Pages;

use App\Filament\Clusters\HalamanHome\Resources\BannerResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateBanner extends CreateRecord
{
    protected static ?string $title = 'Tambah Banner';

    protected static string $resource = BannerResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
