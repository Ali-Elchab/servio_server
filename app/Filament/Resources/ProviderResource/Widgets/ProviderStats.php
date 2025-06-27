<?php

namespace App\Filament\Resources\ProviderResource\Widgets;

use App\Models\Category;
use App\Models\Provider;
use App\Models\ProviderStat;
use App\Models\Subcategory;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class ProviderStats extends BaseWidget
{
    protected function getStats(): array
    {
        $pendingCount = Provider::where('approval_status', 'pending')->count();
        $reviewCount = ProviderStat::sum('reviews_count');
        $avgRating = number_format(ProviderStat::avg('average_rating'), 1);
        return [
            Stat::make('Total Providers', Provider::count())
                ->description('Registered service providers')
                ->color('primary'),

            Stat::make('Active Providers', Provider::where('is_active', true)->count())
                ->description('Currently visible to users')
                ->color('success')
                ->descriptionIcon('heroicon-o-eye'),

            Stat::make('Pending Approvals', $pendingCount)
                ->description($pendingCount > 0 ? 'Need review & decision' : 'All reviewed')
                ->descriptionIcon('heroicon-o-clock')
                ->color($pendingCount > 0 ? 'warning' : 'gray'),

            Stat::make('Users', User::count())
                ->description('All registered accounts')
                ->descriptionIcon('heroicon-o-user-group')
                ->color('info'),

            Stat::make('Categories', Category::count())
                ->description('Main service categories')
                ->color('gray'),

            Stat::make('Subcategories', Subcategory::count())
                ->description('Available service types')
                ->color('gray'),

            Stat::make('Total Reviews', $reviewCount)
                ->description('Reviews submitted by users')
                ->descriptionIcon('heroicon-o-chat-bubble-left-ellipsis')
                ->color('gray'),

            Stat::make('Average Rating', $avgRating)
                ->description('Across all providers')
                ->descriptionIcon('heroicon-o-star')
                ->color(match (true) {
                    $avgRating >= 4.5 => 'success',
                    $avgRating >= 3.5 => 'warning',
                    default => 'danger',
                }),
        ];
    }
}
