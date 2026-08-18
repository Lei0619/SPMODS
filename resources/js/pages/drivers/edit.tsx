import {
    CButton,
    CCard,
    CCardBody,
    CCardHeader,
    CForm,
    CFormInput,
    CFormSelect,
} from '@coreui/react';
import { router } from '@inertiajs/react';
import type { FormEvent } from 'react';
import { useState } from 'react';

type Driver = {
    id: number;
    name: string;
    vehicle_type: string;
    max_capacity: number;
    device_id: string | null;
    driver_id: number | null;
    route_id: number | null;
    status: string;
};

type Props = {
    driver: Driver;
};

export default function EditDriver({ driver }: Props) {
    const [form, setForm] = useState({
        name: driver.name ?? '',
        vehicle_type: driver.vehicle_type ?? '',
        max_capacity: String(driver.max_capacity ?? ''),
        device_id: driver.device_id ?? '',
        driver_id: String(driver.driver_id ?? ''),
        route_id: String(driver.route_id ?? ''),
        status: driver.status ?? 'available',
    });

    const [loading, setLoading] = useState(false);

    const handleChange = (
        event: React.ChangeEvent<HTMLInputElement | HTMLSelectElement>,
    ) => {
        const { name, value } = event.target;

        setForm((previous) => ({
            ...previous,
            [name]: value,
        }));
    };

    const handleSubmit = async (event: FormEvent) => {
        event.preventDefault();

        setLoading(true);

        try {
            const response = await fetch(`/api/drivers/${driver.id}`, {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json',
                    Accept: 'application/json',
                },
                body: JSON.stringify({
                    name: form.name,
                    vehicle_type: form.vehicle_type,
                    max_capacity: Number(form.max_capacity),
                    device_id: form.device_id || null,
                    driver_id: form.driver_id ? Number(form.driver_id) : null,
                    route_id: form.route_id ? Number(form.route_id) : null,
                    status: form.status,
                }),
            });

            const data = await response.json();

            if (!response.ok) {
                console.error(data);

                alert(
                    data.message ?? 'There was an error updating the driver.',
                );

                return;
            }

            alert('Driver updated successfully! 🎉');

            router.visit('/drivers');
        } catch (error) {
            console.error(error);
            alert('Could not connect to the API.');
        } finally {
            setLoading(false);
        }
    };

    return (
        <CCard>
            <CCardHeader>
                <strong>Edit Driver #{driver.id}</strong>
            </CCardHeader>

            <CCardBody>
                <CForm onSubmit={handleSubmit}>
                    <div className="mb-3">
                        <CFormInput
                            label="Name"
                            name="name"
                            value={form.name}
                            onChange={handleChange}
                            required
                        />
                    </div>

                    <div className="mb-3">
                        <CFormSelect
                            label="Vehicle Type"
                            name="vehicle_type"
                            value={form.vehicle_type}
                            onChange={handleChange}
                            required
                        >
                            <option value="">Select vehicle type</option>
                            <option value="bus">Bus</option>
                            <option value="van">Van</option>
                            <option value="jeepney">Jeepney</option>
                        </CFormSelect>
                    </div>

                    <div className="mb-3">
                        <CFormInput
                            label="Maximum Capacity"
                            name="max_capacity"
                            type="number"
                            min="1"
                            value={form.max_capacity}
                            onChange={handleChange}
                            required
                        />
                    </div>

                    <div className="mb-3">
                        <CFormInput
                            label="Device ID"
                            name="device_id"
                            value={form.device_id}
                            onChange={handleChange}
                            placeholder="Arduino device ID"
                        />
                    </div>

                    <div className="mb-3">
                        <CFormInput
                            label="Driver ID"
                            name="driver_id"
                            type="number"
                            min="1"
                            value={form.driver_id}
                            onChange={handleChange}
                        />
                    </div>

                    <div className="mb-3">
                        <CFormInput
                            label="Route ID"
                            name="route_id"
                            type="number"
                            min="1"
                            value={form.route_id}
                            onChange={handleChange}
                        />
                    </div>

                    <div className="mb-3">
                        <CFormSelect
                            label="Status"
                            name="status"
                            value={form.status}
                            onChange={handleChange}
                        >
                            <option value="available">Available</option>
                            <option value="on_trip">On Trip</option>
                            <option value="maintenance">Maintenance</option>
                            <option value="offline">Offline</option>
                        </CFormSelect>
                    </div>

                    <div className="d-flex gap-2">
                        <CButton
                            type="submit"
                            color="primary"
                            disabled={loading}
                        >
                            {loading ? 'Updating...' : 'Update Driver'}
                        </CButton>

                        <CButton
                            type="button"
                            color="secondary"
                            disabled={loading}
                            onClick={() => router.visit('/drivers')}
                        >
                            Cancel
                        </CButton>
                    </div>
                </CForm>
            </CCardBody>
        </CCard>
    );
}
