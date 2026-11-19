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
    license_number: string;
    phone_number: string;
    status: string;
    driver_app?: {
        full_name: string;
    } | null;
    vehicle?: Vehicle | null;
    violations?: Violation[];
}

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

            if (!response.ok) {
                const data = await response.json().catch(() => null);

                console.error(data);

                alert(
                    data?.message ?? 'There was an error deleting the driver.',
                );

                return;
            }

            alert('Driver deleted successfully!');

            setDeleteId(null);

            router.visit('/admin/drivers');
        } catch (error) {
            console.error(error);

            alert('Could not connect to the API.');
        }
    };

    return (
        <CCard>
            <CCardHeader className="d-flex justify-content-between align-items-center">
                <strong>Drivers</strong>

                <Link href="/admin/drivers/create">
                    <CButton color="primary">Add Driver</CButton>
                </Link>
            </CCardHeader>

            <CCardBody className="p-0">
                <div className="table-responsive">
                    <CTable
                        hover
                        bordered
                        className="mb-0 align-middle"
                        style={{ minWidth: '1100px' }}
                    >
                        <CTableHead>
                            <CTableRow>
                                <CTableHeaderCell>ID</CTableHeaderCell>

                                <CTableHeaderCell>Capacity</CTableHeaderCell>

                                <CTableHeaderCell>Full Name</CTableHeaderCell>

                                <CTableHeaderCell>
                                    License Number
                                </CTableHeaderCell>

                                <CTableHeaderCell>
                                    Phone Number
                                </CTableHeaderCell>

                                <CTableHeaderCell>Status</CTableHeaderCell>

                                <CTableHeaderCell>Actions</CTableHeaderCell>
                            </CTableRow>
                        </CTableHead>

                        <CTableBody>
                            {drivers.map((driver) => (
                                <CTableRow key={driver.id}>
                                    {/* ID */}
                                    <CTableDataCell>{driver.id}</CTableDataCell>

                                    {/* Capacity */}
                                    <CTableDataCell>
                                        {driver.vehicle?.max_capacity ?? 'N/A'}
                                    </CTableDataCell>

                                    {/* Full Name */}
                                    <CTableDataCell>
                                        <Link href={`/drivers/${driver.id}`}>
                                            {driver.driver_app?.full_name ?? 'Application not linked'}
                                        </Link>
                                    </CTableDataCell>

                                    {/* Last Name */}
                                    {/* <CTableDataCell>
                                        <Link href={`/drivers/${driver.id}`}>
                                            {driver.last_name}
                                        </Link>
                                    </CTableDataCell> */}

                                    {/* License Number */}
                                    <CTableDataCell>
                                        {driver.license_number}
                                    </CTableDataCell>

                                    {/* Phone Number */}
                                    <CTableDataCell>
                                        {driver.phone_number}
                                    </CTableDataCell>

                                    {/* Status */}
                                    <CTableDataCell>
                                        {driver.status}
                                    </CTableDataCell>

                                    {/* Actions */}
                                    <CTableDataCell>
                                        <div className="d-flex align-items-center gap-1">
                                            <Link
                                                href={`/admin/drivers/${driver.id}/edit`}
                                            >
                                                <CButton
                                                    color="warning"
                                                    size="sm"
                                                >
                                                    Edit
                                                </CButton>
                                            </Link>

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
                                                            handleDelete(
                                                                driver.id,
                                                            )
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
                </div>
            </CCardBody>
        </CCard>
    );
}
