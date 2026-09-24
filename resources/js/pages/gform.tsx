import { Head } from '@inertiajs/react';

const GOOGLE_FORM_URL =
    'https://docs.google.com/forms/d/e/1FAIpQLScVwCmG9PwYmrX7q5zxWXbZp3_WR6k834gNSFKvJ6wa4EewPQ/viewform?embedded=true';

export default function GForm() {
    return (
        <>
            <Head title="Driver Application Form" />

            <div className="min-h-screen bg-slate-50 p-4 sm:p-6 dark:bg-slate-950">
                <div className="mx-auto max-w-5xl">
                    <iframe
                        src={GOOGLE_FORM_URL}
                        title="SPMods Driver Application Form"
                        className="w-full border-0"
                        style={{ height: '900px' }}
                    >
                        Loading…
                    </iframe>
                </div>
            </div>
        </>
    );
}
