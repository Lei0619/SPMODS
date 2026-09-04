import { CButton } from '@coreui/react';
import { createInertiaApp } from '@inertiajs/react';
import React from 'react';
import { Toaster } from '@/components/ui/sonner';
import { TooltipProvider } from '@/components/ui/tooltip';
import { initializeTheme } from '@/hooks/use-appearance';
import AppLayout from '@/layouts/app-layout';
import AuthLayout from '@/layouts/auth-layout';
import SettingsLayout from '@/layouts/settings/layout';
import '@coreui/coreui/dist/css/coreui.min.css';

const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

createInertiaApp({
    title: (title) => (title ? `${title} - ${appName}` : appName),

    resolve: (name) => {
        const pages = import.meta.glob('./pages/**/*.tsx', {
            eager: true,
        }) as Record<
            string,
            {
                default: React.ComponentType;
            }
        >;

        return pages[`./pages/${name}.tsx`]?.default;
    },

    layout: (name) => {
        switch (true) {
            case name === 'welcome':
                return null;

            case name.startsWith('auth/'):
                return AuthLayout;

            case name.startsWith('settings/'):
                return [AppLayout, SettingsLayout];

            default:
                return AppLayout;
        }
    },

    strictMode: true,

    withApp(app) {
        return (
            <TooltipProvider delayDuration={0}>
                {/* CoreUI Test */}
                <div style={{ padding: '40px' }}>
                    <h1>SPMods + CoreUI Test</h1>

                    <CButton color="primary">CoreUI is working 🎉</CButton>
                </div>

                {/* Inertia application */}
                {app}

                <Toaster />
            </TooltipProvider>
        );
    },

    progress: {
        color: '#4B5563',
    },
});

initializeTheme();
