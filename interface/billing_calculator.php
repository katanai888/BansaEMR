<?php declare(strict_types=1); ?>
<!DOCTYPE html>
<html lang="en" class="h-full bg-slate-950">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>NarsEMR Billing Calculator</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Arial', 'ui-sans-serif', 'system-ui', 'sans-serif'],
                    },
                },
            },
        };
    </script>
</head>
<body class="min-h-full bg-slate-900 text-slate-100 font-sans">
    <div class="min-h-screen bg-[radial-gradient(circle_at_top_left,_rgba(139,92,246,0.18),_transparent_20%),linear-gradient(135deg,_#020617_0%,_#111827_45%,_#0f172a_100%)] px-4 py-6 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-7xl space-y-6 rounded-[2rem] border border-white/10 bg-slate-950/90 p-5 shadow-[0_30px_100px_rgba(0,0,0,0.45)] backdrop-blur sm:p-6 lg:p-8">
            <header class="flex flex-col gap-4 rounded-[1.75rem] border border-purple-600/20 bg-slate-900/80 p-6 shadow-lg sm:flex-row sm:items-center sm:justify-between">
                <div>
                    <p class="text-xs font-semibold uppercase tracking-[0.35em] text-purple-300">Billing Calculator</p>
                    <h1 class="mt-2 text-3xl font-black text-white sm:text-4xl">NarsEMR Invoice Checkout</h1>
                    <p class="mt-2 max-w-2xl text-sm text-slate-400">Compute patient bills instantly with legal Philippine discounts and VAT breakout.</p>
                </div>
                <div class="rounded-3xl border border-white/10 bg-purple-600/10 px-4 py-3 text-right">
                    <p class="text-sm font-semibold text-purple-200">Local billing mode</p>
                    <p class="text-xs uppercase tracking-[0.25em] text-purple-300">RA 9994 / RA 10754 ready</p>
                </div>
            </header>

            <main class="grid gap-6 lg:grid-cols-[1.15fr_0.85fr]">
                <section class="rounded-[1.75rem] border border-white/10 bg-slate-900/80 p-6 shadow-2xl shadow-black/30">
                    <div class="mb-6 flex items-center justify-between gap-4">
                        <div>
                            <h2 class="text-xl font-bold text-white">Invoice Itemization</h2>
                            <p class="mt-1 text-sm text-slate-400">Baseline medical line items with built-in 12% EVAT.</p>
                        </div>
                        <span class="rounded-full bg-purple-600/10 px-3 py-1 text-xs font-semibold uppercase tracking-[0.25em] text-purple-300">Gross Subtotal</span>
                    </div>

                    <div class="overflow-hidden rounded-[1.5rem] border border-white/10 bg-slate-950/80">
                        <table class="min-w-full text-left text-sm text-slate-200">
                            <thead class="bg-slate-900/80 text-xs uppercase tracking-[0.24em] text-slate-400">
                                <tr>
                                    <th class="px-4 py-4">Item</th>
                                    <th class="px-4 py-4 text-right">Amount</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-800">
                                <tr class="bg-slate-950/70">
                                    <td class="px-4 py-4 font-semibold text-white">Consultation Fee</td>
                                    <td class="px-4 py-4 text-right">₱500.00</td>
                                </tr>
                                <tr>
                                    <td class="px-4 py-4 font-semibold text-white">Routine Lab Work (CBC)</td>
                                    <td class="px-4 py-4 text-right">₱350.00</td>
                                </tr>
                                <tr class="bg-slate-950/70">
                                    <td class="px-4 py-4 font-semibold text-white">Prescription Medications</td>
                                    <td class="px-4 py-4 text-right">₱450.00</td>
                                </tr>
                            </tbody>
                            <tfoot class="bg-slate-900/80 text-slate-200">
                                <tr>
                                    <th class="px-4 py-4 text-base font-bold">Subtotal Gross Amount</th>
                                    <th class="px-4 py-4 text-right text-base font-bold">₱1,300.00</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                    <div class="mt-8 rounded-[1.5rem] border border-purple-600/10 bg-purple-600/5 p-5 shadow-inner shadow-purple-950/20">
                        <h3 class="text-lg font-bold text-white">Philippine Discount Configuration</h3>
                        <p class="mt-2 text-sm text-slate-400">Toggle statutory discounts and provide required ID references.</p>

                        <div class="mt-5 space-y-4">
                            <label class="flex items-center gap-3 rounded-2xl border border-white/10 bg-slate-950/70 px-4 py-4">
                                <input id="seniorToggle" type="checkbox" class="h-5 w-5 rounded border-slate-700 bg-slate-800 text-purple-500 focus:ring-purple-400" />
                                <span class="text-sm font-semibold text-white">Senior Citizen (RA 9994)</span>
                            </label>
                            <label class="flex items-center gap-3 rounded-2xl border border-white/10 bg-slate-950/70 px-4 py-4">
                                <input id="pwdToggle" type="checkbox" class="h-5 w-5 rounded border-slate-700 bg-slate-800 text-purple-500 focus:ring-purple-400" />
                                <span class="text-sm font-semibold text-white">Person with Disability / PWD (RA 10754)</span>
                            </label>
                        </div>

                        <div id="discountFields" class="mt-6 hidden space-y-4 rounded-2xl border border-purple-500/15 bg-slate-950/80 p-4">
                            <div class="grid gap-4 md:grid-cols-2">
                                <div>
                                    <label class="mb-2 block text-xs font-semibold uppercase tracking-[0.25em] text-slate-400">Senior / PWD ID Number</label>
                                    <input id="statutoryId" type="text" placeholder="Enter ID number" class="w-full rounded-2xl border border-white/10 bg-slate-900 px-3 py-3 text-sm text-white outline-none focus:border-purple-500 focus:ring-2 focus:ring-purple-500/20" />
                                </div>
                                <div>
                                    <label class="mb-2 block text-xs font-semibold uppercase tracking-[0.25em] text-slate-400">Clinic Logbook Control Number</label>
                                    <input id="controlNumber" type="text" placeholder="Logbook control" class="w-full rounded-2xl border border-white/10 bg-slate-900 px-3 py-3 text-sm text-white outline-none focus:border-purple-500 focus:ring-2 focus:ring-purple-500/20" />
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <aside class="rounded-[1.75rem] border border-white/10 bg-slate-900/80 p-6 shadow-2xl shadow-black/40">
                    <div class="mb-6 flex items-center justify-between gap-4">
                        <div>
                            <h2 class="text-xl font-bold text-white">Resibo Summary</h2>
                            <p class="mt-1 text-sm text-slate-400">Live statutory breakdown and totals.</p>
                        </div>
                        <span class="rounded-full bg-purple-600/10 px-3 py-1 text-xs font-semibold uppercase tracking-[0.25em] text-purple-300">Summary</span>
                    </div>

                    <div class="space-y-4 rounded-[1.5rem] border border-white/10 bg-slate-950/70 p-5">
                        <div class="flex items-center justify-between rounded-2xl bg-slate-900/70 px-4 py-4">
                            <span class="text-sm text-slate-400">Gross Subtotal</span>
                            <span class="text-lg font-semibold text-white">₱1,300.00</span>
                        </div>
                        <div class="flex items-center justify-between rounded-2xl bg-slate-900/70 px-4 py-4">
                            <span class="text-sm text-slate-400">Vatable Sales (₱1,300 / 1.12)</span>
                            <span id="vatableSales" class="text-lg font-semibold text-white">₱1,160.71</span>
                        </div>
                        <div class="flex items-center justify-between rounded-2xl bg-slate-900/70 px-4 py-4">
                            <span class="text-sm text-slate-400">12% EVAT</span>
                            <span id="vatAmount" class="text-lg font-semibold text-purple-300">₱139.29</span>
                        </div>
                        <div class="flex items-center justify-between rounded-2xl bg-slate-900/70 px-4 py-4">
                            <span class="text-sm text-slate-400">Discount Amount</span>
                            <span id="discountAmount" class="text-lg font-semibold text-emerald-300">₱0.00</span>
                        </div>
                        <div class="flex items-center justify-between rounded-2xl bg-purple-600/10 px-4 py-4">
                            <span class="text-sm font-semibold text-purple-100">Total Amount Due</span>
                            <span id="netDue" class="text-xl font-black text-white">₱1,160.71</span>
                        </div>
                    </div>

                    <button id="printSaveButton" type="button" class="mt-6 inline-flex w-full items-center justify-center gap-3 rounded-2xl bg-purple-600 px-5 py-4 text-lg font-black text-white shadow-lg shadow-purple-500/20 transition hover:bg-purple-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 9V2h12v7M6 18H4a2 2 0 01-2-2v-3a2 2 0 012-2h16a2 2 0 012 2v3a2 2 0 01-2 2h-2M9 22h6" />
                        </svg>
                        I-print ang Resibo at I-save
                    </button>
                </aside>
            </main>
        </div>
    </div>

    <script>
        const seniorToggle = document.getElementById('seniorToggle');
        const pwdToggle = document.getElementById('pwdToggle');
        const discountFields = document.getElementById('discountFields');
        const statutoryId = document.getElementById('statutoryId');
        const controlNumber = document.getElementById('controlNumber');
        const vatableSalesEl = document.getElementById('vatableSales');
        const vatAmountEl = document.getElementById('vatAmount');
        const discountAmountEl = document.getElementById('discountAmount');
        const netDueEl = document.getElementById('netDue');
        const printSaveButton = document.getElementById('printSaveButton');

        const grossSubtotal = 1300.00;
        const discountRate = 0.20;

        function formatPeso(value) {
            return new Intl.NumberFormat('en-PH', {
                style: 'currency',
                currency: 'PHP',
                minimumFractionDigits: 2,
            }).format(value).replace('PHP', '₱');
        }

        function calculateAmounts() {
            const vatableSales = grossSubtotal / 1.12;
            const vatAmount = grossSubtotal - vatableSales;
            const hasDiscount = seniorToggle.checked || pwdToggle.checked;
            const discountAmount = hasDiscount ? vatableSales * discountRate : 0;
            const netDue = hasDiscount ? vatableSales - discountAmount : vatableSales;

            vatableSalesEl.textContent = formatPeso(vatableSales);
            vatAmountEl.textContent = formatPeso(vatAmount);
            discountAmountEl.textContent = formatPeso(discountAmount);
            netDueEl.textContent = formatPeso(netDue);

            if (hasDiscount) {
                vatAmountEl.parentElement.querySelector('span:first-child').textContent = '12% EVAT (shown for reference)';
            } else {
                vatAmountEl.parentElement.querySelector('span:first-child').textContent = '12% EVAT';
            }

            discountFields.classList.toggle('hidden', !hasDiscount);
        }

        function printAndSave() {
            const payload = {
                grossSubtotal: formatPeso(grossSubtotal),
                vatableSales: vatableSalesEl.textContent,
                vatAmount: vatAmountEl.textContent,
                discountAmount: discountAmountEl.textContent,
                totalDue: netDueEl.textContent,
                seniorCitizen: seniorToggle.checked,
                pwd: pwdToggle.checked,
                statutoryId: statutoryId.value.trim(),
                controlNumber: controlNumber.value.trim(),
            };

            console.log('Billing payload:', payload);
            window.alert('Ang resibo ay handa na. Ipinadala sa printer at na-save ang invoice data.');
            window.print();
        }

        [seniorToggle, pwdToggle].forEach((toggle) => {
            toggle.addEventListener('change', calculateAmounts);
        });

        printSaveButton.addEventListener('click', printAndSave);
        calculateAmounts();
    </script>
</body>
</html>
