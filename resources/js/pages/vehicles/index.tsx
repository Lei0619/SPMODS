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

type Driver = {
    id: number;
    first_name: string;
    last_name: string;
};

type TransportRoute = {
    id: number;
    route_name: string;
    origin: string;
    destination: string;
};

type Vehicle = {
    id: number;
    plate_number: string;
    vehicle_type: string;
    max_capacity: number;
    device_id: string | null;
    driver_id: number | null;
    route_id: number | null;
    status: string;
    driver?: Driver;
    transport_route?: TransportRoute;
};

type Props = {
    vehicles: Vehicle[];
};

export default function VehicleIndex({ vehicles }: Props) {
    const [deleteId, setDeleteId] = useState<number | null>(null);

    const handleDelete = async (id: number) => {
        try {
            const response = await fetch(`/api/vehicles/${id}`, {
                method: 'DELETE',
                headers: {
                    Accept: 'application/json',
                },
            });

            const data = await response.json();

            if (!response.ok) {
                console.error(data);

                alert(
                    data.message ??
                        'There was an error deleting the vehicle.',
                );

                return;
            }

            alert('Vehicle deleted successfully! 🗑️');

            setDeleteId(null);

            router.visit('/vehicles');
        } catch (error) {
            console.error(error);

            alert('Could not connect to the API.');
        }
    };

    return (
        <CCard>
            <CCardHeader>
                <strong>Vehicles</strong>

                <Link href="/vehicles/create">
                    <CButton color="primary">
                        Add Vehicle
                    </CButton>
                </Link>
            </CCardHeader>

            <CCardBody>
                <CTable hover responsive bordered>
                    <CTableHead>
                        <CTableRow>
                            <CTableHeaderCell>
                                ID
                            </CTableHeaderCell>

                            <CTableHeaderCell>
                                Plate Number
                            </CTableHeaderCell>

                            <CTableHeaderCell>
                                Type
                            </CTableHeaderCell>

                            <CTableHeaderCell>
                                Capacity
                            </CTableHeaderCell>

                            <CTableHeaderCell>
                                Driver
                            </CTableHeaderCell>

                            <CTableHeaderCell>
                                Route
                            </CTableHeaderCell>

                            <CTableHeaderCell>
                                Status
                            </CTableHeaderCell>

                            <CTableHeaderCell>
                                Actions
                            </CTableHeaderCell>
                        </CTableRow>
                    </CTableHead>

                    <CTableBody>
                        {vehicles.map((vehicle) => (
                            <CTableRow key={vehicle.id}>
                                <CTableDataCell>
                                    {vehicle.id}
                                </CTableDataCell>

                                <CTableDataCell>
                                    {vehicle.plate_number}
                                </CTableDataCell>

                                <CTableDataCell>
                                    {vehicle.vehicle_type}
                                </CTableDataCell>

                                <CTableDataCell>
                                    {vehicle.max_capacity}
                                </CTableDataCell>

                                <CTableDataCell>
                                    {vehicle.driver
                                        ? `${vehicle.driver.first_name} ${vehicle.driver.last_name}`
                                        : 'Unassigned'}
                                </CTableDataCell>

                                <CTableDataCell>
                                    {vehicle.transport_route
                                        ? `${vehicle.transport_route.origin} → ${vehicle.transport_route.destination}`
                                        : 'Unassigned'}
                                </CTableDataCell>

                                <CTableDataCell>
                                    {vehicle.status}
                                </CTableDataCell>

                                <CTableDataCell>
                                    {/* EDIT BUTTON */}
                                    <Link
                                        href={`/vehicles/${vehicle.id}/edit`}
                                    >
                                        <CButton
                                            color="warning"
                                            size="sm"
                                        >
                                            Edit
                                        </CButton>
                                    </Link>

                                    {/* DELETE BUTTON */}
                                    <CButton
                                        type="button"
                                        color="danger"
                                        size="sm"
                                        className="ms-1"
                                        onClick={() =>
                                            setDeleteId(vehicle.id)
                                        }
                                    >
                                        Delete
                                    </CButton>

                                    {/* DELETE CONFIRMATION */}
                                    {deleteId === vehicle.id && (
                                        <>
                                            <span className="ms-2">
                                                Are you sure?
                                            </span>

                                            <CButton
                                                type="button"
                                                color="danger"
                                                size="sm"
                                                className="ms-2"
                                                onClick={() =>
                                                    handleDelete(
                                                        vehicle.id,
                                                    )
                                                }
                                            >
                                                Yes
                                            </CButton>

                                            <CButton
                                                type="button"
                                                color="secondary"
                                                size="sm"
                                                className="ms-1"
                                                onClick={() =>
                                                    setDeleteId(null)
                                                }
                                            >
                                                No
                                            </CButton>
                                        </>
                                    )}
                                </CTableDataCell>
                            </CTableRow>
                        ))}
                    </CTableBody>
                </CTable>
            </CCardBody>
        </CCard>
    );
}