<?php

namespace App\Filament\Clusters\HalamanHome\Resources\PromotionResource\Pages;

use App\Filament\Clusters\HalamanHome\Resources\PromotionResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePromotion extends CreateRecord
{
    protected static ?string $title = 'Tambah Promotion';

    protected static string $resource = PromotionResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
