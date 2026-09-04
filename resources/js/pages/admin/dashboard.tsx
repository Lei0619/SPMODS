type Dashboard = {
    total_vehicles: number;
    total_drivers: number;
    total_trips: number;
    total_violations: number;
    recent_notifications: {
        id: number;
        message: string;
        created_at: string;
    }[];
};

type Props = {
    dashboard: Dashboard;
};

export default function Dashboard({ dashboard }: Props) {
    return (
        <div className="container">
            <h1>Admin Dashboard</h1>

            <p>Total Vehicles: {dashboard.total_vehicles}</p>
            <p>Total Drivers: {dashboard.total_drivers}</p>
            <p>Total Trips: {dashboard.total_trips}</p>
            <p>Total Violations: {dashboard.total_violations}</p>
        </div>
    );
}
