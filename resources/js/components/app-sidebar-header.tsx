import { usePage } from '@inertiajs/react';
import { Bell } from 'lucide-react';
import { useState } from 'react';
import { Breadcrumbs } from '@/components/breadcrumbs';
import { Button } from '@/components/ui/button';
import { SidebarTrigger } from '@/components/ui/sidebar';
import type { BreadcrumbItem as BreadcrumbItemType } from '@/types';

type NotificationItem = {
    id: string;
    data: {
        message?: string;
        full_name?: string;
        driver_app_id?: number;
    };
    read_at: string | null;
    created_at: string;
};

type SharedProps = {
    notifications?: {
        unread_count: number;
        recent: NotificationItem[];
    };
};

export default function AppSidebarHeader({
    breadcrumbs = [],
}: {
    breadcrumbs?: BreadcrumbItemType[];
}) {
    const { notifications: notificationProps } = usePage<SharedProps>().props;

    // Temporary fallback while debugging shared Inertia props.
    const notifications = notificationProps ?? {
        unread_count: 0,
        recent: [],
    };

    // Temporary debug log. Remove after confirming the header receives data.
    console.log('HEADER NOTIFICATIONS:', notifications);

    const [isOpen, setIsOpen] = useState(false);

    return (
        <header className="flex h-16 shrink-0 items-center gap-2 border-b border-sidebar-border/50 px-6 transition-[width,height] ease-linear group-has-data-[collapsible=icon]/sidebar-wrapper:h-12 md:px-4">
            <div className="flex items-center gap-2">
                <SidebarTrigger className="-ml-1" />
                <Breadcrumbs breadcrumbs={breadcrumbs} />
            </div>

            <div className="relative ml-auto">
                <Button
                    type="button"
                    variant="ghost"
                    size="icon"
                    aria-label={`Notifications (${notifications.unread_count} unread)`}
                    aria-expanded={isOpen}
                    onClick={() => setIsOpen((previous) => !previous)}
                >
                    <Bell className="h-5 w-5" />

                    {notifications.unread_count > 0 && (
                        <span className="absolute -top-1 -right-1 flex h-5 min-w-5 items-center justify-center rounded-full bg-red-600 px-1 text-xs text-white">
                            {notifications.unread_count}
                        </span>
                    )}
                </Button>

                {isOpen && (
                    <div className="absolute right-0 z-50 mt-2 w-80 max-w-[calc(100vw-2rem)] rounded-md border bg-background p-2 text-foreground shadow-lg">
                        <h2 className="px-3 py-2 font-semibold">
                            Notifications
                        </h2>

                        {notifications.recent.length === 0 ? (
                            <p className="px-3 py-4 text-sm text-muted-foreground">
                                No notifications yet.
                            </p>
                        ) : (
                            <ul className="max-h-80 overflow-y-auto">
                                {notifications.recent.map((notification) => (
                                    <li
                                        key={notification.id}
                                        className={`rounded-md px-3 py-3 text-sm ${
                                            notification.read_at
                                                ? ''
                                                : 'bg-muted font-medium'
                                        }`}
                                    >
                                        <p>
                                            {notification.data.message ??
                                                'You have a new notification.'}
                                        </p>

                                        {notification.data.full_name && (
                                            <p className="mt-1 text-muted-foreground">
                                                Applicant:{' '}
                                                {notification.data.full_name}
                                            </p>
                                        )}
                                    </li>
                                ))}
                            </ul>
                        )}
                    </div>
                )}
            </div>
        </header>
    );
}
