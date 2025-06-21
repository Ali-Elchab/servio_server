<?php

namespace App\Helpers;

class ResponseMessages
{
    // 🔵 Core Actions
    const FETCH_SUCCESS = 'Data fetched successfully.';
    const CREATED = 'Successfully created!';
    const UPDATED = 'Successfully updated!';
    const DELETED = 'Successfully deleted!';

    // 🔴 Errors
    const NOT_FOUND = 'Not found.';
    const VALIDATION_FAILURE = 'Validation failed.';
    const UNAUTHORIZED = 'You are not authorized to perform this action.';
    const FORBIDDEN = 'Access denied.';

    // 🟢 Authentication (for future login or provider panel)
    const REGISTERED = 'Successfully registered!';
    const LOGGED_IN = 'Successfully logged in!';
    const LOGGED_OUT = 'Successfully logged out!';
    const NO_ACTIVE_SUBSCRIPTION = 'No active subscription.';

    // 🟡 Ratings
    const RATING_SUBMITTED = 'Your rating has been submitted!';
    const RATING_APPROVED = 'Rating approved successfully.';
    const RATING_REJECTED = 'Rating rejected.';

    // 🟣 Bookings / Views / Stats (future expansion)
    const BOOKING_SUCCESS = 'Booking completed!';
    const STATS_UPDATED = 'Stats updated.';
}
