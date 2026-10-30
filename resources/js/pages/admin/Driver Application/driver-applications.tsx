import { Head } from '@inertiajs/react';

const SPREADSHEET_URL =
    'https://docs.google.com/spreadsheets/d/1JDV_T5Y6Eb4Xd_k-6-yTq-G2zLZA-in-F72HmMAIvsI/preview?rm=minimal';
const SPREADSHEET_EDIT_URL =
    'https://docs.google.com/spreadsheets/d/1JDV_T5Y6Eb4Xd_k-6-yTq-G2zLZA-in-F72HmMAIvsI/edit';

export default function DriverApplications() {
    return (
        <>
            <Head title="Driver Applications" />

            <main className="min-h-screen bg-slate-50 px-4 py-8 sm:px-6 lg:px-8 dark:bg-slate-950">
                <div className="mx-auto max-w-7xl">
                    <header className="mb-6 flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
                        <div>
                            <p className="mb-2 text-sm font-semibold tracking-wide text-blue-700 uppercase dark:text-blue-400">
                                Admin workspace
                            </p>
                            <h1 className="text-3xl font-bold tracking-tight text-slate-900 sm:text-4xl dark:text-white">
                                Driver Applications
                            </h1>
                            <p className="mt-2 max-w-2xl text-sm text-slate-600 sm:text-base dark:text-slate-400">
                                Review and manage submitted driver applications
                                in the shared spreadsheet.
                            </p>
                        </div>

                        <a
                            href={SPREADSHEET_EDIT_URL}
                            target="_blank"
                            rel="noreferrer"
                            className="inline-flex w-fit items-center gap-2 rounded-lg bg-blue-700 px-4 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-blue-800 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-700 dark:bg-blue-600 dark:hover:bg-blue-500"
                        >
                            Open in Google Sheets
                            <span aria-hidden="true"></span>
                        </a>
                    </header>

                    <section
                        aria-label="Driver applications spreadsheet"
                        className="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm dark:border-slate-800 dark:bg-slate-900"
                    >
                        <div className="flex flex-col gap-1 border-b border-slate-200 px-5 py-4 sm:flex-row sm:items-center sm:justify-between dark:border-slate-800">
                            <div>
                                <h2 className="font-semibold text-slate-900 dark:text-white">
                                    Applications overview
                                </h2>
                                <p className="text-sm text-slate-500 dark:text-slate-400">
                                    Shared Google spreadsheet
                                </p>
                            </div>
                            <span className="inline-flex w-fit items-center gap-2 rounded-full bg-emerald-50 px-3 py-1 text-xs font-medium text-emerald-700 dark:bg-emerald-950 dark:text-emerald-300">
                                <span className="size-2 rounded-full bg-emerald-500" />
                                Live document
                            </span>
                        </div>

                        <div className="bg-slate-100 p-2 sm:p-4 dark:bg-slate-950">
                            <iframe
                                src={SPREADSHEET_URL}
                                title="Driver applications spreadsheet"
                                className="h-[70vh] min-h-[480px] w-full rounded-lg border-0 bg-white sm:min-h-[600px]"
                                loading="lazy"
                            />
                        </div>
                    </section>
                </div>
            </main>
        </>
    );
}
