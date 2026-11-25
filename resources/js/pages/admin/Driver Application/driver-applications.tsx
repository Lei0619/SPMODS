import { CButton } from '@coreui/react';
import { router } from '@inertiajs/react';

type Application = {
    id: number;
    full_name: string;
    phone_number: string;
    license_number: string;
    license_type: string;
    license_expiry_date: string;
    status: string;
};

export default function DriverApplications({
    applications,
}: {
    applications: Application[];
}) {
    return (
        <div className="divide-y divide-slate-200 dark:divide-slate-800">
            {applications.length === 0 ? (
                <p className="p-5 text-sm text-slate-600 dark:text-slate-400">
                    No applications yet.
                </p>
            ) : (
                applications.map((application) => (
                    <article key={application.id} className="p-5">
                        <h2 className="font-semibold text-slate-900 dark:text-white">
                            {application.full_name}
                        </h2>
                        <p className="text-sm text-slate-600 dark:text-slate-400">
                            Phone: {application.phone_number}
                        </p>
                        <p className="text-sm text-slate-600 dark:text-slate-400">
                            License: {application.license_number} (
                            {application.license_type})
                        </p>
                        <p className="text-sm text-slate-600 dark:text-slate-400">
                            Expires: {application.license_expiry_date}
                        </p>
                        <p className="mt-2 text-sm font-medium">
                            Status: {application.status}
                        </p>

                        {application.status === 'pending' && (
                            <CButton
                                color="success"
                                className="mt-2"
                                onClick={() =>
                                    router.patch(
                                        'admin.driver-applications.approve',
                                        { id: application.id },
                                    )
                                }
                            >
                                Approve
                            </CButton>
                        )}

                        {application.status === 'pending' && (
                            <CButton
                                color="danger"
                                className="mt-2 ml-2"
                                onClick={() =>
                                    router.patch(
                                        'admin.driver-applications.reject',
                                        { id: application.id },
                                    )
                                }
                            >
                                Reject
                            </CButton>
                        )}
                    </article>
                ))
            )}
        </div>
    );
}
