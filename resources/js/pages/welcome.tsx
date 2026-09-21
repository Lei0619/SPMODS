import { Head, Link } from '@inertiajs/react';
import { login } from '@/routes';

export default function Register() {
    return (
        <>
            <Head title="Driver Registration" />

            <div className="min-h-screen bg-slate-50 px-6 py-12 text-slate-900 dark:bg-slate-950 dark:text-white">
                <div className="mx-auto flex min-h-[calc(100vh-6rem)] w-full max-w-md items-center justify-center">
                    <main className="w-full">
                        {/* Branding */}
                        <div className="mb-8 text-center">
                            <div className="mx-auto mb-4 flex h-16 w-16 items-center justify-center rounded-2xl bg-blue-600 text-3xl shadow-lg shadow-blue-600/20"></div>

                            <h1 className="text-3xl font-bold tracking-tight">
                                SPMos
                            </h1>

                            <p className="mt-2 text-sm text-slate-500 dark:text-slate-400">
                                Smart Passenger Monitoring System
                            </p>
                        </div>

                        {/* Driver Application Card */}
                        <section className="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm sm:p-8 dark:border-slate-800 dark:bg-slate-900">
                            <div className="mb-6">
                                <h2 className="text-xl font-semibold">
                                    Are you a driver?
                                </h2>

                                <p className="mt-2 text-sm leading-6 text-slate-600 dark:text-slate-400">
                                    Apply to become an authorized SPMods driver.
                                    Your information will be reviewed by an
                                    administrator before you can create your
                                    account.
                                </p>
                            </div>

                            <Link
                                href="/gform"
                                className="mb-6 flex w-full items-center justify-center rounded-xl bg-blue-600 px-5 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-blue-700 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 focus:outline-none dark:focus:ring-offset-slate-900"
                            >
                                Apply as a driver
                            </Link>

                            <p className="mt-4 text-center text-xs leading-5 text-slate-500 dark:text-slate-500">
                                Your application will be reviewed by an
                                administrator before account registration.
                            </p>
                        </section>

                        {/* Login */}
                        <div className="mt-6 text-center text-sm text-slate-600 dark:text-slate-400">
                            Already have an account?{' '}
                            <Link
                                href={login()}
                                className="font-semibold text-blue-600 transition hover:text-blue-700 hover:underline dark:text-blue-400 dark:hover:text-blue-300"
                            >
                                Log in
                            </Link>
                        </div>
                    </main>
                </div>
            </div>
        </>
    );
}
