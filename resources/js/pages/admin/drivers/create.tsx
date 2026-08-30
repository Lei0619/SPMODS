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
import { useState } from 'react';
import type { ChangeEvent, FormEvent } from 'react';

type DriverForm = {
    first_name: string;
    last_name: string;
    license_number: string;
    phone_number: string;
    status: string;
};

const initialForm: DriverForm = {
    first_name: '',
    last_name: '',
    license_number: '',
    phone_number: '',
    status: 'active',
};

export default function CreateDriver() {
    const [form, setForm] = useState<DriverForm>(initialForm);
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
            const response = await fetch('/api/drivers', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    Accept: 'application/json',
                },
                body: JSON.stringify(form),
            });

            const data = await response.json();

            if (!response.ok) {
                console.error(data);

                alert(
                    data.message ?? 'There was an error creating the driver.',
                );

                return;
            }

            alert('Driver created successfully! 🎉');

            router.visit('/drivers');
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
                    <strong>Create Driver</strong>
                </CCardHeader>

                <CCardBody>
                    <CForm onSubmit={handleSubmit}>
                        <div className="mb-3">
                            <CFormInput
                                label="First Name"
                                name="first_name"
                                value={form.first_name}
                                onChange={handleChange}
                                placeholder="e.g. Juan"
                                required
                            />
                        </div>

                        <div className="mb-3">
                            <CFormInput
                                label="Last Name"
                                name="last_name"
                                value={form.last_name}
                                onChange={handleChange}
                                placeholder="e.g. Dela Cruz"
                                required
                            />
                        </div>

                        <div className="mb-3">
                            <CFormInput
                                label="License Number"
                                name="license_number"
                                value={form.license_number}
                                onChange={handleChange}
                                placeholder="e.g. DL-123456"
                                required
                            />
                        </div>

                        <div className="mb-3">
                            <CFormInput
                                label="Phone Number"
                                name="phone_number"
                                value={form.phone_number}
                                onChange={handleChange}
                                placeholder="e.g. 09123456789"
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
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </CFormSelect>
                        </div>

                        <div className="d-flex gap-2">
                            <CButton
                                type="submit"
                                color="primary"
                                disabled={loading}
                            >
                                {loading ? 'Creating...' : 'Create Driver'}
                            </CButton>

                            <CButton
                                type="button"
                                color="secondary"
                                onClick={() => router.visit('/drivers')}
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
