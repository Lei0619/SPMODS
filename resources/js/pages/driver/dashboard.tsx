import type { PageProps } from '@inertiajs/core';

export interface dashboardProps extends PageProps {
    dashboard: Dashboard;
    [key: string]: any;
}

export interface Dashboard {
    first_name: string;
    last_name: string;
    license_number: string;
    phone_number: string;
    vehicle: Vehicle | null;
    total_trips: number;
    total_violations: number;
    recent_notifications: Notification[];
}

type Vehicle = {
    id: number;
    plate_number: string;
    vehicle_type: string;
    max_capacity: number;
    device_id: string | null;
    driver_id: number | null;
    route_id: number | null;
    status: string;
    transport_route: TransportRoute | null;
};

type TransportRoute = {
    route_name: string;
    origin: string;
    destination: string;
};

type Notification = {
    message: string;
    violation_type: string | null;
};

export default function Dashboard({ dashboard }: dashboardProps) {
    return (
        <div>
            <h1>Driver Dashboard - updated... again</h1>

            <p>
                Name: {dashboard.first_name} {dashboard.last_name}
            </p>

            <p>License Number: {dashboard.license_number}</p>

            <p>Phone Number: {dashboard.phone_number}</p>

            {dashboard.vehicle ? (
                <div>
                    <h2>My Vehicle</h2>

                    <p>Plate Number: {dashboard.vehicle.plate_number}</p>
                    <p>Vehicle Type: {dashboard.vehicle.vehicle_type}</p>
                    <p>Max Capacity: {dashboard.vehicle.max_capacity}</p>
                    <p>
                        Vehicle Status:{' '}
                        {dashboard.vehicle.status ?? 'No Vehicle Assigned'}
                    </p>
                    {dashboard.vehicle.transport_route ? (
                        <div>
                            <p>
                                Route:{' '}
                                {dashboard.vehicle.transport_route.route_name}
                            </p>
                            <p>
                                From: {dashboard.vehicle.transport_route.origin}{' '}
                                to{' '}
                                {dashboard.vehicle.transport_route.destination}
                            </p>
                        </div>
                    ) : null}
                </div>
            ) : (
                <p>No vehicle assigned.</p>
            )}
        </div>
    );
}
