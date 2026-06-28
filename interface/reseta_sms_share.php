<?php declare(strict_types=1); ?>
<!DOCTYPE html>
<html lang="en" class="h-full bg-slate-950">
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NarsEMR Reseta SMS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'ui-sans-serif', 'system-ui', 'sans-serif'],
                    },
                },
            },
        };
    </script>
</head>
<body class="min-h-full bg-slate-950 text-slate-100">
    <div class="min-h-screen bg-[radial-gradient(circle_at_top_left,_rgba(16,185,129,0.18),_transparent_25%),linear-gradient(135deg,_#020617_0%,_#0f172a_45%,_#111827_100%)] px-4 py-6 sm:px-6 lg:px-8">
        <div class="mx-auto flex max-w-7xl flex-col gap-6 rounded-[2rem] border border-white/10 bg-slate-900/80 p-4 shadow-[0_30px_100px_rgba(2,6,23,0.85)] backdrop-blur sm:p-6 lg:p-8">
            <header class="flex flex-col gap-3 rounded-3xl border border-fuchsia-400/20 bg-slate-800/80 px-5 py-5 shadow-lg sm:flex-row sm:items-center sm:justify-between">
                <div>
                    <p class="text-xs font-semibold uppercase tracking-[0.35em] text-fuchsia-300">Prescription SMS Utility</p>
                    <h1 class="text-3xl font-black tracking-tight text-white sm:text-4xl">NarsEMR Reseta ng Araw</h1>
                    <p class="mt-1 text-sm text-slate-400">Low-bandwidth SMS sharing for fast prescription delivery.</p>
                </div>
                <div class="rounded-2xl border border-fuchsia-400/20 bg-fuchsia-500/10 px-4 py-3 text-sm text-fuchsia-200">
                    <div class="font-semibold">Status</div>
                    <div class="text-xs uppercase tracking-[0.25em] text-fuchsia-300">Ready to send</div>
                </div>
            </header>

            <main class="grid gap-6 lg:grid-cols-[1.05fr_0.95fr]">
                <section class="rounded-[1.5rem] border border-white/10 bg-slate-800/80 p-5 shadow-lg">
                    <div class="mb-4 flex items-center justify-between">
                        <div>
                            <h2 class="text-xl font-bold text-white">Prescription Preview</h2>
                            <p class="text-sm text-slate-400">Mocked from a sample OpenEMR prescription object.</p>
                        </div>
                        <span class="rounded-full border border-cyan-400/20 bg-cyan-400/10 px-3 py-1 text-xs font-semibold uppercase tracking-[0.25em] text-cyan-300">Preview</span>
                    </div>

                    <div class="space-y-4">
                        <div class="rounded-2xl border border-white/10 bg-slate-900/70 p-4">
                            <label class="mb-1 block text-xs font-semibold uppercase tracking-[0.25em] text-slate-500">Patient Name</label>
                            <input id="patientName" type="text" value="Maria Clara" class="w-full rounded-xl border border-white/10 bg-slate-800 px-3 py-2 text-base font-semibold text-white outline-none ring-0" />
                        </div>

                        <div class="rounded-2xl border border-white/10 bg-slate-900/70 p-4">
                            <label class="mb-1 block text-xs font-semibold uppercase tracking-[0.25em] text-slate-500">Drug</label>
                            <input id="drugName" type="text" value="Amoxicillin 500mg" class="w-full rounded-xl border border-white/10 bg-slate-800 px-3 py-2 text-base font-semibold text-white outline-none ring-0" />
                        </div>

                        <div class="rounded-2xl border border-white/10 bg-slate-900/70 p-4">
                            <label class="mb-1 block text-xs font-semibold uppercase tracking-[0.25em] text-slate-500">Dosage</label>
                            <textarea id="dosage" rows="3" class="w-full rounded-xl border border-white/10 bg-slate-800 px-3 py-2 text-base font-semibold text-white outline-none ring-0">Take 1 tablet 3x a day for 7 days</textarea>
                        </div>

                        <div class="rounded-2xl border border-white/10 bg-slate-900/70 p-4">
                            <label class="mb-1 block text-xs font-semibold uppercase tracking-[0.25em] text-slate-500">Doctor</label>
                            <input id="doctorName" type="text" value="Dr. Jose Rizal, PRC #123456" class="w-full rounded-xl border border-white/10 bg-slate-800 px-3 py-2 text-base font-semibold text-white outline-none ring-0" />
                        </div>

                        <div class="rounded-2xl border border-white/10 bg-slate-900/70 p-4">
                            <label class="mb-1 block text-xs font-semibold uppercase tracking-[0.25em] text-slate-500">Mobile Number</label>
                            <input id="mobileNumber" type="text" value="+639xxxxxxxxx" class="w-full rounded-xl border border-white/10 bg-slate-800 px-3 py-2 text-base font-semibold text-white outline-none ring-0" />
                        </div>
                    </div>
                </section>

                <section class="rounded-[1.5rem] border border-white/10 bg-slate-800/80 p-5 shadow-lg">
                    <div class="mb-4 flex items-center justify-between">
                        <div>
                            <h2 class="text-xl font-bold text-white">SMS Preview</h2>
                            <p class="text-sm text-slate-400">Live mobile mockup that mirrors the outbound message.</p>
                        </div>
                        <span class="rounded-full border border-fuchsia-400/20 bg-fuchsia-400/10 px-3 py-1 text-xs font-semibold uppercase tracking-[0.25em] text-fuchsia-300">Live</span>
                    </div>

                    <div class="mx-auto w-full max-w-md rounded-[2rem] border border-slate-700 bg-slate-950 p-3 shadow-2xl shadow-black/40">
                        <div class="rounded-[1.5rem] border border-slate-700 bg-slate-900 p-3">
                            <div class="mb-3 flex items-center justify-center rounded-full bg-slate-800 px-3 py-1 text-[10px] font-semibold uppercase tracking-[0.3em] text-slate-400">
                                SMS Preview
                            </div>
                            <div class="rounded-2xl border border-slate-700 bg-slate-800 p-3">
                                <div class="mb-2 flex items-center gap-2">
                                    <div class="h-8 w-8 rounded-full bg-fuchsia-500/20"></div>
                                    <div>
                                        <p class="text-sm font-semibold text-white">NarsEMR</p>
                                        <p class="text-xs text-slate-400">Now sending</p>
                                    </div>
                                </div>
                                <div id="smsPreview" class="rounded-2xl border border-fuchsia-400/20 bg-fuchsia-500/10 p-3 text-sm leading-6 text-fuchsia-50">
                                    NarsEMR Reseta para kay Maria Clara: Amoxicillin 500mg Take 1 tablet 3x a day for 7 days. Para sa buong detalye at digital signature, buksan ang link na ito: https://narsemr.ph/r/xyz123
                                </div>
                            </div>
                        </div>
                    </div>

                    <button id="sendButton" type="button" class="mt-6 flex w-full items-center justify-center gap-3 rounded-2xl bg-fuchsia-500 px-4 py-4 text-lg font-black text-white shadow-lg shadow-fuchsia-500/20 transition hover:bg-fuchsia-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 8.25V18a2.25 2.25 0 002.25 2.25h13.5A2.25 2.25 0 0021 18V8.25M3 8.25l9 6 9-6M3 8.25L21 8.25" />
                        </svg>
                        Ipadala sa SMS
                    </button>

                    <p class="mt-3 text-center text-sm text-slate-400">This utility simulates a low-bandwidth Philippine SMS gateway request.</p>
                </section>
            </main>
        </div>
    </div>

    <script>
        const patientNameInput = document.getElementById('patientName');
        const drugNameInput = document.getElementById('drugName');
        const dosageInput = document.getElementById('dosage');
        const doctorNameInput = document.getElementById('doctorName');
        const mobileNumberInput = document.getElementById('mobileNumber');
        const smsPreview = document.getElementById('smsPreview');
        const sendButton = document.getElementById('sendButton');

        function buildMessage() {
            return `NarsEMR Reseta para kay ${patientNameInput.value}: ${drugNameInput.value} ${dosageInput.value}. Para sa buong detalye at digital signature, buksan ang link na ito: https://narsemr.ph/r/xyz123`;
        }

        function syncPreview() {
            smsPreview.textContent = buildMessage();
        }

        function sendSmsStub() {
            const message = buildMessage();
            const mobile = mobileNumberInput.value || '+639xxxxxxxxx';
            const payload = {
                to: mobile,
                message: message,
                provider: 'Semaphore.co / Twilio style stub',
            };

            console.log('SMS payload', payload);
            window.alert(`Salamat! Ang reseta ay matagumpay na naipadala sa ${mobile}`);
        }

        [patientNameInput, drugNameInput, dosageInput, doctorNameInput, mobileNumberInput].forEach((field) => {
            field.addEventListener('input', syncPreview);
            field.addEventListener('change', syncPreview);
        });

        sendButton.addEventListener('click', sendSmsStub);
        syncPreview();
    </script>
</body>
</html>
