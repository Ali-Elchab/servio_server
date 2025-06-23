<?php

namespace App\Helpers;

class ResponseMessages
{
    public static function FETCH_SUCCESS() { return __('messages.fetch_success'); }
    public static function CREATED() { return __('messages.created'); }
    public static function UPDATED() { return __('messages.updated'); }
    public static function DELETED() { return __('messages.deleted'); }

    public static function NOT_FOUND() { return __('messages.not_found'); }
    public static function VALIDATION_FAILURE(){ return __('messages.validation_failure'); }
    public static function UNAUTHORIZED() { return __('messages.unauthorized'); }
    public static function FORBIDDEN() { return __('messages.forbidden'); }

    public static function REGISTERED() { return __('messages.registered'); }
    public static function LOGGED_IN()  { return __('messages.logged_in'); }
    public static function LOGGED_OUT() { return __('messages.logged_out'); }
    public static function NO_ACTIVE_SUBSCRIPTION() { return __('messages.no_active_subscription'); }
    public static function ACCOUNT_DELETION_FAILED() { return __('messages.account_deletion_failed'); }

    public static function RATING_SUBMITTED(){ return __('messages.rating_submitted'); }
    public static function RATING_APPROVED() { return __('messages.rating_approved'); }
    public static function RATING_REJECTED() { return __('messages.rating_rejected'); }

    public static function BOOKING_SUCCESS() { return __('messages.booking_success'); }
    public static function STATS_UPDATED() { return __('messages.stats_updated'); }

    public static function PROVIDER_CREATED() { return __('messages.provider_created'); }
    public static function PROVIDER_UPDATED() { return __('messages.provider_updated'); }
    public static function PROVIDER_NOT_FOUND() { return __('messages.provider_not_found'); }
    public static function PROVIDER_PROFILE_MISSING() { return __('messages.provider_profile_missing'); }
    public static function PROVIDER_PROFILE_FETCHED() { return __('messages.provider_profile_fetched'); }
    public static function PROVIDER_STATS_FETCHED()   { return __('messages.provider_stats_fetched'); }
    public static function PROVIDER_STATUS_TOGGLED()  { return __('messages.provider_status_toggled'); }
    public static function PROVIDER_ADDED_TO_FAVORITES() { return __('messages.provider_added_to_favorites');}
    public static function PROVIDER_REMOVED_FROM_FAVORITES() { return __('messages.provider_removed_from_favorites');}

    public static function CITIES_FETCHED() { return __('messages.cities_fetched'); }
    public static function AREAS_FETCHED() { return __('messages.areas_fetched'); }

}
