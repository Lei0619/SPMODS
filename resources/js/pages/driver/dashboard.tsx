import type { PageProps } from '@inertiajs/core';

export interface dashboardProps extends PageProps {
    dashboard: {
        vehicle: {
            plate_number: string;
            vehicle_type: string;
            max_capacity: number;
        } | null;

        phone_number: string;
        total_trips: number;
        total_violations: number;

        recent_notifications: {
            message: string;
            violation_type: string;
        }[];
    };
    [key: string]: any;
}

export default function Dashboard() {
    const dashboard = {
        phone_number: 'TEST',
        total_trips: 0,
        total_violations: 0,
        vehicle: null,
    };

    return (
        <div>
            <h1>Driver Dashboard</h1>

            <p>Phone Number: {dashboard.phone_number}</p>

            <p>Total Trips: {dashboard.total_trips}</p>

            <p>Total Violations: {dashboard.total_violations}</p>
            {/* 
        {dashboard.vehicle && (
            <div>
                <h2> My Vehicle </h2>

                <p>Plate Number: {dashboard.vehicle.plate_number}</p>

                <p>Vehicle Type: {dashboard.vehicle.vehicle_type}</p>

                <p>Max Capacity: {dashboard.vehicle.max_capacity}</p>
            </div>
        )} */}
        </div>
    );
}
