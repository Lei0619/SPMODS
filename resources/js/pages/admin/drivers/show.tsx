import { CButton, CCard, CCardBody, CCardHeader } from '@coreui/react';
import { Link, router } from '@inertiajs/react';
import { useState } from 'react';

type Violation = {
    id: number;
    driver_id: number;
    vehicle_id: number;
    trip_id: number;
    allowed_capacity: number;
    violation_type: string;
};

type Driver = {
    id: number;
    first_name: string;
    last_name: string;
    license_number: string;
    phone_number: string;
    status: string;
    vehicle?: {
        id: number;
        plate_number: string;
        vehicle_type: string;
        max_capacity: number;
        device_id: string | null;
        driver_id: number | null;
        route_id: number | null;
        status: string;
    } | null;
    violations?: Violation[];
};

type Props = {
    driver: Driver;
};

export default function DriverShow({ driver }: Props) {
    const [deleting, setDeleting] = useState(false);

    const handleDelete = async () => {
        const confirmed = window.confirm(
            `Are you sure you want to delete ${driver.first_name} ${driver.last_name}?`,
        );

        if (!confirmed) {
            return;
        }

        setDeleting(true);

        try {
            const response = await fetch(`/api/drivers/${driver.id}`, {
                method: 'DELETE',
                headers: {
                    Accept: 'application/json',
                },
            });

            const data = await response.json().catch(() => null);

            if (!response.ok) {
                console.error(data);

                alert(
                    data?.message ?? 'There was an error deleting the driver.',
                );

                return;
            }

            alert('Driver deleted successfully!');

            router.visit('/admin/drivers');
        } catch (error) {
            console.error(error);

            alert('Could not connect to the API.');
        } finally {
            setDeleting(false);
        }
    };

    return (
        <CCard>
            <CCardHeader className="d-flex justify-content-between align-items-center">
                <strong>
                    {driver.first_name} {driver.last_name}
                </strong>

                <div className="d-flex gap-2">
                    <Link href="/admin/dashboard">
                        <CButton color="secondary">Back</CButton>
                    </Link>

                    <Link href={`/admin/drivers/${driver.id}/edit`}>
                        <CButton color="warning">Edit</CButton>
                    </Link>

                    <CButton
                        color="danger"
                        onClick={handleDelete}
                        disabled={deleting}
                    >
                        {deleting ? 'Deleting...' : 'Delete'}
                    </CButton>
                </div>
            </CCardHeader>

            <CCardBody>
                <h4>Driver Information</h4>

                <p>
                    <strong>ID:</strong> {driver.id}
                </p>

                <p>
                    <strong>Name:</strong> {driver.first_name}{' '}
                    {driver.last_name}
                </p>

                <p>
                    <strong>License:</strong> {driver.license_number}
                </p>

                <p>
                    <strong>Phone:</strong> {driver.phone_number}
                </p>

                <p>
                    <strong>Status:</strong> {driver.status}
                </p>

                <hr />

                <h4>Vehicle</h4>

                {driver.vehicle ? (
                    <>
                        <p>
                            <strong>Plate Number:</strong>{' '}
                            {driver.vehicle.plate_number}
                        </p>

                        <p>
                            <strong>Vehicle Type:</strong>{' '}
                            {driver.vehicle.vehicle_type}
                        </p>

                        <p>
                            <strong>Maximum Capacity:</strong>{' '}
                            {driver.vehicle.max_capacity}
                        </p>

                        <p>
                            <strong>Device ID:</strong>{' '}
                            {driver.vehicle.device_id ?? 'None'}
                        </p>
                    </>
                ) : (
                    <p>No vehicle assigned.</p>
                )}

                <hr />

                <h4>Violations</h4>

                {driver.violations && driver.violations.length > 0 ? (
                    <ul>
                        {driver.violations.map((violation) => (
                            <li key={violation.id}>
                                {violation.violation_type}
                            </li>
                        ))}
                    </ul>
                ) : (
                    <p>No violations recorded.</p>
                )}
            </CCardBody>
        </CCard>
    );
}
