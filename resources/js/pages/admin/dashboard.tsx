import {
    CButton,
    CCard,
    CCardBody,
    CCardHeader,
    CCol,
    CRow,
} from '@coreui/react';
import { Link } from '@inertiajs/react';

type Notification = {
    id: number;
    message: string;
    created_at: string;
};

type Dashboard = {
    total_vehicles: number;
    total_drivers: number;
    total_trips: number;
    total_violations: number;
    recent_notifications: Notification[];
};

type Props = {
    dashboard: Dashboard;
};

export default function Dashboard({ dashboard }: Props) {
    return (
        <div className="container-fluid">
            <h1 className="mb-4">Admin Dashboard - update</h1>

            {/* Statistics */}
            <CRow className="mb-4">
                <CCol md={3}>
                    <CCard>
                        <CCardHeader>Total Drivers</CCardHeader>

                        <CCardBody>
                            <h2>{dashboard.total_drivers}</h2>
                        </CCardBody>
                    </CCard>
                </CCol>

                <CCol md={3}>
                    <CCard>
                        <CCardHeader>Total Vehicles</CCardHeader>

                        <CCardBody>
                            <h2>{dashboard.total_vehicles}</h2>
                        </CCardBody>
                    </CCard>
                </CCol>

                <CCol md={3}>
                    <CCard>
                        <CCardHeader>Total Trips</CCardHeader>

                        <CCardBody>
                            <h2>{dashboard.total_trips}</h2>
                        </CCardBody>
                    </CCard>
                </CCol>

                <CCol md={3}>
                    <CCard>
                        <CCardHeader>Total Violations</CCardHeader>

                        <CCardBody>
                            <h2>{dashboard.total_violations}</h2>
                        </CCardBody>
                    </CCard>
                </CCol>
            </CRow>

            {/* Driver Management */}
            <CCard className="mb-4">
                <CCardHeader>
                    <strong>Driver Management</strong>
                </CCardHeader>

                <CCardBody>
                    <p>
                        View and manage registered drivers, their vehicles,
                        licenses, contact information, and status.
                    </p>

                    <Link href="/admin/drivers">
                        <CButton color="primary">View All Drivers</CButton>
                    </Link>
                </CCardBody>
            </CCard>

            {/* Driver Application Management */}
            <CCard className="mb-4">
                <CCardHeader>
                    <strong>Driver Application Management</strong>
                </CCardHeader>

                <CCardBody>
                    <p>
                        Review and manage driver applications, including
                        approvals, rejections, and pending applications.
                    </p>

                    <Link href="/admin/driver-applications">
                        <CButton color="primary">
                            View Driver Applications
                        </CButton>
                    </Link>
                </CCardBody>
            </CCard>
        </div>
    );
}
