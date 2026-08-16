type Violation = {
    id: number;
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
    violations: Violation[];
};

type Props = {
    driver: Driver;
};

export default function DriverShow({ driver }: Props) {
    return (
        <div>
            <h2>
                {driver.first_name} {driver.last_name}
            </h2>

            <p>License: {driver.license_number}</p>
            <p>Phone: {driver.phone_number}</p>
            <p>Status: {driver.status}</p>

            <h3>Violations</h3>

            {driver.violations.length === 0 ? (
                <p>No violations recorded.</p>
            ) : (
                driver.violations.map((violation) => (
                    <div key={violation.id}>
                        <p>Type: {violation.violation_type}</p>

                        <p>Allowed Capacity: {violation.allowed_capacity}</p>
                    </div>
                ))
            )}
        </div>
    );
}
