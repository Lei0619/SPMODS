import {
    CButton,
    CCard,
    CCardBody,
    CCardHeader,
    CForm,
    CFormInput,
    CFormSelect,
} from '@coreui/react';
import { Link, router } from '@inertiajs/react';
import type { FormEvent } from 'react';
import { useState } from 'react';

type Driver = {
    id: number;
    first_name: string;
    last_name: string;
    license_number: string;
    phone_number: string;
    status: string;
};

type Props = {
    driver: Driver;
};

export default function EditDriver({ driver }: Props) {
    const [form, setForm] = useState({
        first_name: driver.first_name ?? '',
        last_name: driver.last_name ?? '',
        license_number: driver.license_number ?? '',
        phone_number: driver.phone_number ?? '',
        status: driver.status ?? 'active',
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
                    first_name: form.first_name,
                    last_name: form.last_name,
                    license_number: form.license_number,
                    phone_number: form.phone_number,
                    status: form.status,
                }),
            });

            const data = await response.json().catch(() => null);

            if (!response.ok) {
                console.error(data);

                alert(
                    data?.message ?? 'There was an error updating the driver.',
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
            <CCardHeader className="d-flex justify-content-between align-items-center">
                <strong>Edit Driver #{driver.id}</strong>

                <Link href="/drivers">
                    <CButton color="secondary">Back</CButton>
                </Link>
            </CCardHeader>

            <CCardBody>
                <CForm onSubmit={handleSubmit}>
                    {/* FIRST NAME */}
                    <div className="mb-3">
                        <CFormInput
                            label="First Name"
                            name="first_name"
                            value={form.first_name}
                            onChange={handleChange}
                            required
                        />
                    </div>

                    {/* LAST NAME */}
                    <div className="mb-3">
                        <CFormInput
                            label="Last Name"
                            name="last_name"
                            value={form.last_name}
                            onChange={handleChange}
                            required
                        />
                    </div>

                    {/* LICENSE NUMBER */}
                    <div className="mb-3">
                        <CFormInput
                            label="License Number"
                            name="license_number"
                            type="text"
                            value={form.license_number}
                            onChange={handleChange}
                            required
                        />
                    </div>

                    {/* PHONE NUMBER */}
                    <div className="mb-3">
                        <CFormInput
                            label="Phone Number"
                            name="phone_number"
                            type="text"
                            value={form.phone_number}
                            onChange={handleChange}
                            required
                        />
                    </div>

                    {/* STATUS */}
                    <div className="mb-3">
                        <CFormSelect
                            label="Status"
                            name="status"
                            value={form.status}
                            onChange={handleChange}
                            required
                        >
                            <option value="active">Active</option>

                            <option value="inactive">Inactive</option>
                        </CFormSelect>
                    </div>

                    {/* BUTTONS */}
                    <div className="d-flex gap-2">
                        <CButton
                            type="submit"
                            color="primary"
                            disabled={loading}
                        >
                            {loading ? 'Updating...' : 'Update Driver'}
                        </CButton>

                        <Link href="/drivers">
                            <CButton
                                type="button"
                                color="secondary"
                                disabled={loading}
                            >
                                Cancel
                            </CButton>
                        </Link>
                    </div>
                </CForm>
            </CCardBody>
        </CCard>
    );
}
