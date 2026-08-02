<?php

use App\Models\PassengerLog;

test('passenger log exposes the passengerlog relation alias', function (): void {
    $model = new PassengerLog();

    expect(method_exists($model, 'passengerlog'))->toBeTrue();
});
