import {
    CButton,
    CCard,
    CCardBody,
    CCardHeader,
    CTable,
    CTableBody,
    CTableDataCell,
    CTableHead,
    CTableHeaderCell,
    CTableRow,
} from '@coreui/react';
import { Link, router } from '@inertiajs/react';
import { useState } from 'react';

type Vehicle = {
    id: number;
    plate_number: string;
    vehicle_type: string;
    max_capacity: number;
    device_id: string | null;
    driver_id: number | null;
    route_id: number | null;
    status: string;
};

type Violation = {
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
    vehicle?: Vehicle;
    violations?: Violation[];
};

type Props = {
    drivers: Driver[];
};

export default function DriverIndex({ drivers }: Props) {
    const [deleteId, setDeleteId] = useState<number | null>(null);

    const handleDelete = async (id: number) => {
        try {
            const response = await fetch(`/api/drivers/${id}`, {
                method: 'DELETE',
                headers: {
                    Accept: 'application/json',
                },
            });

            const data = await response.json();

            if (!response.ok) {
                console.error(data);

                alert(
                    data.message ?? 'There was an error deleting the driver.',
                );

                return;
            }

            alert('Driver deleted successfully! 🗑️');

            setDeleteId(null);

            router.visit('/drivers');
        } catch (error) {
            console.error(error);

            alert('Could not connect to the API.');
        }
    };

    return (
        <CCard>
            <CCardHeader className="d-flex justify-content-between align-items-center">
                <strong>Drivers</strong>

                <Link href="/drivers/create">
                    <CButton color="primary">Add Driver</CButton>
                </Link>
            </CCardHeader>

            <CCardBody>
                <CTable hover responsive bordered>
                    <CTableHead>
                        <CTableRow>
                            <CTableHeaderCell>ID</CTableHeaderCell>

                            <CTableHeaderCell>Plate Number</CTableHeaderCell>

                            <CTableHeaderCell>Vehicle Type</CTableHeaderCell>

                            <CTableHeaderCell>Capacity</CTableHeaderCell>

                            <CTableHeaderCell>First Name</CTableHeaderCell>

                            <CTableHeaderCell>Last Name</CTableHeaderCell>

                            <CTableHeaderCell>License Number</CTableHeaderCell>

                            <CTableHeaderCell>Phone Number</CTableHeaderCell>

                            <CTableHeaderCell>Status</CTableHeaderCell>

                            <CTableHeaderCell>Actions</CTableHeaderCell>
                        </CTableRow>
                    </CTableHead>

                    <CTableBody>
                        {drivers.map((driver) => (
                            <CTableRow key={driver.id}>
                                {/* ID */}
                                <CTableDataCell>{driver.id}</CTableDataCell>

                                {/* PLATE NUMBER */}
                                <CTableDataCell>
                                    {driver.vehicle
                                        ? driver.vehicle.plate_number
                                        : 'No vehicle'}
                                </CTableDataCell>

                                {/* VEHICLE TYPE */}
                                <CTableDataCell>
                                    {driver.vehicle
                                        ? driver.vehicle.vehicle_type
                                        : 'No vehicle'}
                                </CTableDataCell>

                                {/* CAPACITY */}
                                <CTableDataCell>
                                    {driver.vehicle
                                        ? driver.vehicle.max_capacity
                                        : 'N/A'}
                                </CTableDataCell>

                                {/* FIRST NAME */}
                                <CTableDataCell>
                                    {driver.first_name}
                                </CTableDataCell>

                                {/* LAST NAME */}
                                <CTableDataCell>
                                    {driver.last_name}
                                </CTableDataCell>

                                {/* LICENSE NUMBER */}
                                <CTableDataCell>
                                    {driver.license_number}
                                </CTableDataCell>

                                {/* PHONE NUMBER */}
                                <CTableDataCell>
                                    {driver.phone_number}
                                </CTableDataCell>

                                {/* STATUS */}
                                <CTableDataCell>{driver.status}</CTableDataCell>

                                {/* ACTIONS */}
                                <CTableDataCell>
                                    <div className="d-flex align-items-center gap-1">
                                        {/* EDIT */}
                                        <Link
                                            href={`/drivers/${driver.id}/edit`}
                                        >
                                            <CButton color="warning" size="sm">
                                                Edit
                                            </CButton>
                                        </Link>

                                        {/* DELETE */}
                                        <CButton
                                            type="button"
                                            color="danger"
                                            size="sm"
                                            onClick={() =>
                                                setDeleteId(driver.id)
                                            }
                                        >
                                            Delete
                                        </CButton>

                                        {/* DELETE CONFIRMATION */}
                                        {deleteId === driver.id && (
                                            <>
                                                <span className="ms-2">
                                                    Are you sure?
                                                </span>

                                                <CButton
                                                    type="button"
                                                    color="danger"
                                                    size="sm"
                                                    onClick={() =>
                                                        handleDelete(driver.id)
                                                    }
                                                >
                                                    Yes
                                                </CButton>

                                                <CButton
                                                    type="button"
                                                    color="secondary"
                                                    size="sm"
                                                    onClick={() =>
                                                        setDeleteId(null)
                                                    }
                                                >
                                                    No
                                                </CButton>
                                            </>
                                        )}
                                    </div>
                                </CTableDataCell>
                            </CTableRow>
                        ))}
                    </CTableBody>
                </CTable>
            </CCardBody>
        </CCard>
    );
}
