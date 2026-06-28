<?php declare(strict_types=1); ?>
<!DOCTYPE html>
<html lang="en" class="h-full bg-slate-950">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NarsEMR: Ngayong Araw</title>
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
    <div class="min-h-screen bg-[radial-gradient(circle_at_top_left,_rgba(59,130,246,0.22),_transparent_22%),linear-gradient(135deg,_#020617_0%,_#0f172a_45%,_#111827_100%)] px-4 py-4 sm:px-6 lg:px-8">
        <div class="mx-auto flex max-w-7xl flex-col gap-4 rounded-[2rem] border border-white/10 bg-slate-900/80 p-4 shadow-[0_30px_100px_rgba(2,6,23,0.85)] backdrop-blur xl:p-6">
            <header class="flex flex-col gap-4 rounded-3xl border border-purple-600/20 bg-slate-800/80 px-4 py-4 shadow-lg sm:flex-row sm:items-center sm:justify-between sm:px-6">
                <div>
                    <p class="text-xs font-semibold uppercase tracking-[0.35em] text-purple-300">Klinika Queue Splitter</p>
                    <h1 class="text-3xl font-black tracking-tight text-white sm:text-4xl">NarsEMR: Ngayong Araw</h1>
                    <p class="mt-1 text-sm text-slate-400">Manage a shared waiting room and route patients to multiple doctors.</p>
                </div>
                <div class="flex flex-col gap-3 rounded-2xl border border-purple-400/20 bg-slate-900/80 px-4 py-3 shadow-inner sm:flex-row sm:items-center">
                    <div class="rounded-full bg-purple-600/10 px-3 py-1 text-xs font-semibold uppercase tracking-[0.3em] text-purple-200">Pumili ng Doktor:</div>
                    <div id="doctorFilter" class="flex flex-wrap gap-2">
                        <button type="button" class="doctor-filter-btn rounded-full border border-purple-400/20 bg-slate-950/80 px-3 py-2 text-xs font-semibold text-purple-100 transition hover:bg-purple-600/20" data-filter="all">Lahat ng Doktor</button>
                        <button type="button" class="doctor-filter-btn rounded-full border border-purple-400/20 bg-slate-950/80 px-3 py-2 text-xs font-semibold text-purple-100 transition hover:bg-purple-600/20" data-filter="Dr. Cruz">Dr. Cruz (Internal Medicine)</button>
                        <button type="button" class="doctor-filter-btn rounded-full border border-purple-400/20 bg-slate-950/80 px-3 py-2 text-xs font-semibold text-purple-100 transition hover:bg-purple-600/20" data-filter="Dr. Santos">Dr. Santos (Pediatrics)</button>
                    </div>
                </div>
                <div class="flex items-center gap-3 rounded-2xl border border-purple-400/20 bg-slate-900/80 px-4 py-3 shadow-inner">
                    <div class="flex h-3 w-3 animate-pulse rounded-full bg-emerald-400"></div>
                    <div>
                        <p class="text-[10px] font-semibold uppercase tracking-[0.3em] text-slate-500">Local time</p>
                        <p id="live-clock" class="text-xl font-semibold text-cyan-200">--:--:--</p>
                    </div>
                </div>
            </header>

            <main class="grid gap-4 xl:grid-cols-3">
                <?php
                $waiting = [
                    ['name' => 'Juan Dela Cruz', 'priority' => 'Senior', 'note' => 'Checked in', 'doctor' => 'Dr. Cruz'],
                    ['name' => 'Maria Santos', 'priority' => 'Regular', 'note' => 'Arrival slip', 'doctor' => 'Dr. Santos'],
                    ['name' => 'Pedro Penduko', 'priority' => 'PWD', 'note' => 'Wheelchair', 'doctor' => 'Dr. Cruz'],
                    ['name' => 'Rosa Bautista', 'priority' => 'Regular', 'note' => 'Family medicine', 'doctor' => 'Dr. Santos'],
                ];

                $triage = [
                    ['name' => 'Alicia Lim', 'priority' => 'Senior', 'note' => 'Vitals in progress', 'doctor' => 'Dr. Cruz'],
                    ['name' => 'Benjie Reyes', 'priority' => 'Regular', 'note' => 'BP check', 'doctor' => 'Dr. Santos'],
                ];

                $doctor = [
                    ['name' => 'Criselda Gomez', 'priority' => 'PWD', 'note' => 'Doctor consult', 'doctor' => 'Dr. Cruz'],
                    ['name' => 'Noel Villanueva', 'priority' => 'Regular', 'note' => 'Assessment', 'doctor' => 'Dr. Santos'],
                ];

                $columns = [
                    [
                        'id' => 'waiting-list',
                        'title' => 'Nakahilira',
                        'subtitle' => 'Waiting Room',
                        'accent' => 'slate',
                        'border' => 'border-slate-700/70',
                        'bg' => 'bg-slate-800/95',
                        'badge' => 'text-slate-300',
                        'items' => $waiting,
                    ],
                    [
                        'id' => 'triage-list',
                        'title' => 'Inuusisa',
                        'subtitle' => 'Triage / Vital Signs',
                        'accent' => 'indigo',
                        'border' => 'border-indigo-700/70',
                        'bg' => 'bg-indigo-950/85',
                        'badge' => 'text-indigo-200',
                        'items' => $triage,
                    ],
                    [
                        'id' => 'doctor-list',
                        'title' => 'Nasa Loob',
                        'subtitle' => 'With Doctor',
                        'accent' => 'emerald',
                        'border' => 'border-emerald-700/70',
                        'bg' => 'bg-emerald-950/85',
                        'badge' => 'text-emerald-200',
                        'items' => $doctor,
                    ],
                ];

                foreach ($columns as $column) {
                    $items = $column['items'];
                    $title = $column['title'];
                    $subtitle = $column['subtitle'];
                    $id = $column['id'];
                    $bg = $column['bg'];
                    $border = $column['border'];
                    $badgeClass = $column['badge'];
                    ?>
                    <section class="rounded-[1.75rem] border <?php echo $border; ?> <?php echo $bg; ?> p-4 shadow-2xl shadow-black/30">
                        <div class="mb-4 flex items-center justify-between">
                            <div>
                                <p class="text-sm font-semibold uppercase tracking-[0.3em] <?php echo $badgeClass; ?>"><?php echo $title; ?></p>
                                <h2 class="text-2xl font-bold text-white"><?php echo $subtitle; ?></h2>
                            </div>
                            <div class="rounded-full border border-white/10 bg-white/10 px-3 py-1 text-sm font-semibold text-white">
                                <span class="queue-count" data-target="<?php echo $id; ?>">0</span> active
                            </div>
                        </div>

                        <div id="<?php echo $id; ?>" class="space-y-3">
                            <?php foreach ($items as $item) {
                                $doctorName = $item['doctor'];
                                $doctorBadgeClass = $doctorName === 'Dr. Cruz'
                                    ? 'bg-purple-500/15 text-purple-200 border border-purple-400/20'
                                    : 'bg-fuchsia-500/15 text-fuchsia-200 border border-fuchsia-400/20';
                                ?>
                                <article data-doctor="<?php echo htmlspecialchars($doctorName, ENT_QUOTES, 'UTF-8'); ?>" class="queue-card rounded-2xl border border-white/10 bg-slate-950/30 p-4 shadow-lg">
                                    <div class="flex items-start justify-between gap-3">
                                        <div>
                                            <p class="text-[11px] font-semibold uppercase tracking-[0.3em] text-slate-400">Patient</p>
                                            <h3 class="mt-1 text-xl font-black leading-tight text-white"><?php echo htmlspecialchars($item['name'], ENT_QUOTES, 'UTF-8'); ?></h3>
                                            <div class="mt-2 flex flex-wrap gap-2">
                                                <span class="inline-flex items-center rounded-full px-2.5 py-1 text-[11px] font-semibold uppercase tracking-[0.2em] text-slate-100 bg-slate-800/90 border border-white/10">
                                                    <?php echo htmlspecialchars($item['priority'], ENT_QUOTES, 'UTF-8'); ?>
                                                </span>
                                                <span class="inline-flex items-center rounded-full px-2.5 py-1 text-[11px] font-semibold uppercase tracking-[0.2em] <?php echo $doctorBadgeClass; ?>">
                                                    Kay <?php echo htmlspecialchars($doctorName, ENT_QUOTES, 'UTF-8'); ?>
                                                </span>
                                            </div>
                                        </div>
                                        <span class="inline-flex items-center gap-2 rounded-full border border-white/10 bg-white/10 px-3 py-1 text-xs font-semibold text-slate-100">
                                            <span class="pulse-dot h-2.5 w-2.5 rounded-full bg-emerald-400"></span>
                                            Live
                                        </span>
                                    </div>
                                    <div class="mt-3 flex items-center justify-between rounded-xl border border-white/10 bg-white/5 px-3 py-2">
                                        <span class="status-chip inline-flex items-center rounded-full bg-cyan-500/15 px-2.5 py-1 text-[11px] font-semibold uppercase tracking-[0.2em] text-cyan-200">
                                            <?php echo htmlspecialchars($item['note'], ENT_QUOTES, 'UTF-8'); ?>
                                        </span>
                                        <span class="text-sm font-semibold text-slate-400">#<?php echo rand(10, 99); ?></span>
                                    </div>
                                </article>
                            <?php } ?>
                        </div>
                    </section>
                    <?php
                }
                ?>
            </main>
        </div>
    </div>

    <script>
        const clockEl = document.getElementById('live-clock');
        const queueContainers = {
            'waiting-list': document.getElementById('waiting-list'),
            'triage-list': document.getElementById('triage-list'),
            'doctor-list': document.getElementById('doctor-list'),
        };
        const doctorFilterButtons = document.querySelectorAll('.doctor-filter-btn');
        let activeDoctorFilter = 'all';

        function updateClock() {
            const now = new Date();
            clockEl.textContent = now.toLocaleTimeString([], {
                hour: '2-digit',
                minute: '2-digit',
                second: '2-digit',
            });
        }

        function applyDoctorFilter() {
            const allCards = document.querySelectorAll('.queue-card');
            allCards.forEach((card) => {
                const cardDoctor = card.getAttribute('data-doctor');
                const visible = activeDoctorFilter === 'all' || cardDoctor === activeDoctorFilter;
                card.classList.toggle('hidden', !visible);
            });
            updateCounts();
        }

        function updateCounts() {
            document.querySelectorAll('.queue-count').forEach((counter) => {
                const target = counter.getAttribute('data-target');
                const container = queueContainers[target];
                counter.textContent = container ? container.querySelectorAll('.queue-card:not(.hidden)').length : 0;
            });
        }

        function setChip(card, label, tone) {
            const chip = card.querySelector('.status-chip');
            chip.textContent = label;
            chip.className = `status-chip inline-flex items-center rounded-full px-2.5 py-1 text-[11px] font-semibold uppercase tracking-[0.2em] ${tone}`;
        }

        function simulateFlow() {
            const waitingCards = queueContainers['waiting-list'].querySelectorAll('.queue-card');
            const triageCards = queueContainers['triage-list'].querySelectorAll('.queue-card');
            const doctorCards = queueContainers['doctor-list'].querySelectorAll('.queue-card');

            if (waitingCards.length > 0) {
                const movingCard = waitingCards[0];
                movingCard.querySelector('.pulse-dot').className = 'pulse-dot h-2.5 w-2.5 rounded-full bg-indigo-400';
                setChip(movingCard, 'In triage', 'bg-indigo-500/15 text-indigo-200');
                queueContainers['triage-list'].appendChild(movingCard);
            }

            if (triageCards.length > 0) {
                const movingCard = triageCards[0];
                movingCard.querySelector('.pulse-dot').className = 'pulse-dot h-2.5 w-2.5 rounded-full bg-emerald-400';
                setChip(movingCard, 'With doctor', 'bg-emerald-500/15 text-emerald-200');
                queueContainers['doctor-list'].appendChild(movingCard);
            }

            if (doctorCards.length > 0) {
                const card = doctorCards[Math.floor(Math.random() * doctorCards.length)];
                card.querySelector('.pulse-dot').className = 'pulse-dot h-2.5 w-2.5 rounded-full bg-cyan-400';
                setChip(card, 'Seen', 'bg-cyan-500/15 text-cyan-200');
            }

            applyDoctorFilter();
        }

        doctorFilterButtons.forEach((button) => {
            button.addEventListener('click', () => {
                doctorFilterButtons.forEach((btn) => btn.classList.remove('bg-purple-600/20', 'text-white'));
                button.classList.add('bg-purple-600/20', 'text-white');
                activeDoctorFilter = button.getAttribute('data-filter');
                applyDoctorFilter();
            });
        });

        // Default active button styling
        document.querySelector('.doctor-filter-btn[data-filter="all"]').classList.add('bg-purple-600/20', 'text-white');

        updateClock();
        setInterval(updateClock, 1000);
        setInterval(simulateFlow, 5000);
        applyDoctorFilter();
    </script>
</body>
</html>
