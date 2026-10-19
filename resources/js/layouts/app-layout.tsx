import AppLayoutTemplate from '@/layouts/app/app-sidebar-layout';
import type { BreadcrumbItem } from '@/types';

const AppLayoutTemplateWithChildren = AppLayoutTemplate as React.ComponentType<
    React.PropsWithChildren<{ breadcrumbs?: BreadcrumbItem[] }>
>;

export default function AppLayout({
    breadcrumbs = [],
    children,
}: {
    breadcrumbs?: BreadcrumbItem[];
    children: React.ReactNode;
}) {
    return (
        <AppLayoutTemplateWithChildren breadcrumbs={breadcrumbs}>
            {children}
        </AppLayoutTemplateWithChildren>
    );
}
