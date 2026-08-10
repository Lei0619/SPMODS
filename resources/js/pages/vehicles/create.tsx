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
import { useState   } from 'react';
import type {ChangeEvent, FormEvent} from 'react';

export default function CreateVehicle() {
    const [form, setForm] = useState({
        plate_number: '',
        vehicle_type: '',
        max_capacity: '',
        device_id: '',
        driver_id: '',
        route_id: '',
        status: 'available',
    });

    const [loading, setLoading] = useState(false);

    const handleChange = (
        event: ChangeEvent<HTMLInputElement | HTMLSelectElement>,
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
            const response = await fetch('/api/vehicles', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    Accept: 'application/json',
                },
                body: JSON.stringify({
                    plate_number: form.plate_number,
                    vehicle_type: form.vehicle_type,
                    max_capacity: Number(form.max_capacity),
                    device_id: form.device_id || null,
                    driver_id: Number(form.driver_id),
                    route_id: Number(form.route_id),
                    status: form.status,
                }),
            });

            const data = await response.json();

            if (!response.ok) {
                console.error(data);

                alert(
                    data.message ??
                        'There was an error creating the vehicle.',
                );

                return;
            }

            alert('Vehicle created successfully! 🎉');

            router.visit('/vehicles');
        } catch (error) {
            console.error(error);
            alert('Could not connect to the API.');
        } finally {
            setLoading(false);
        }
    };

    return (
        <div className="container py-4">
            <CCard>
                <CCardHeader>
                    <strong>Create Vehicle</strong>
                </CCardHeader>

                <CCardBody>
                    <CForm onSubmit={handleSubmit}>
                        <div className="mb-3">
                            <CFormInput
                                label="Plate Number"
                                name="plate_number"
                                value={form.plate_number}
                                onChange={handleChange}
                                placeholder="e.g. ABC1234"
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
                                <option value="">
                                    Select vehicle type
                                </option>
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
                                placeholder="e.g. 25"
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
                                placeholder="e.g. 11"
                                required
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
                                placeholder="e.g. 11"
                                required
                            />
                        </div>

                        <div className="mb-3">
                            <CFormSelect
                                label="Status"
                                name="status"
                                value={form.status}
                                onChange={handleChange}
                            >
                                <option value="available">
                                    Available
                                </option>
                                <option value="on_trip">On Trip</option>
                                <option value="offline">Offline</option>
                            </CFormSelect>
                        </div>

                        <div className="d-flex gap-2">
                            <CButton
                                type="submit"
                                color="primary"
                                disabled={loading}
                            >
                                {loading
                                    ? 'Creating...'
                                    : 'Create Vehicle'}
                            </CButton>

                            <CButton
                                type="button"
                                color="secondary"
                                onClick={() => router.visit('/vehicles')}
                            >
                                Cancel
                            </CButton>
                        </div>
                    </CForm>
                </CCardBody>
            </CCard>
        </div>
    );
}