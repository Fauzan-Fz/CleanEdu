<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kuis: Energi Terbarukan - CleanEdu Energy</title>

    {{-- Google Fonts: Poppins --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    {{-- Bootstrap 5 CDN --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Bootstrap Icons CDN --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>
        /* ==============================
           CSS VARIABLES & BASE
        ============================== */
        :root {
            --primary:       #2F9054;
            --primary-light: #e8f5ee;
            --primary-dark:  #236e3f;
            --accent:        #F9C349;
            --accent-dark:   #d4a300;
            --bg:            #f5f5f3;
            --bg-card:       #ffffff;
            --text-main:     #1a1a1a;
            --text-muted:    #6c757d;
            --border:        #e4e4e4;
        }

        * { box-sizing: border-box; }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--bg);
            color: var(--text-main);
            font-size: 0.92rem;
            min-height: 100vh;
        }

        /* ==============================
           BACK LINK
        ============================== */
        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 0.3rem;
            font-size: 0.84rem;
            font-weight: 500;
            color: var(--text-main);
            text-decoration: none;
            padding: 1.5rem 0 0.5rem;
            transition: color 0.2s, gap 0.2s;
        }

        .back-link:hover {
            color: var(--primary);
            gap: 0.5rem;
        }

        .back-link i { font-size: 1rem; }

        /* ==============================
           QUIZ WRAPPER
        ============================== */
        .quiz-outer {
            min-height: calc(100vh - 60px);
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 0 1rem 3rem;
        }

        /* Quiz title */
        .quiz-title {
            font-size: 1.55rem;
            font-weight: 700;
            color: var(--text-main);
            text-align: center;
            margin-bottom: 1.5rem;
        }

        /* ==============================
           PROGRESS + TIMER ROW
        ============================== */
        .quiz-meta-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 100%;
            max-width: 500px;
            margin-bottom: 0.5rem;
        }

        .question-counter {
            font-size: 0.8rem;
            font-weight: 500;
            color: var(--text-muted);
        }

        .timer-badge {
            display: flex;
            align-items: center;
            gap: 0.3rem;
            font-size: 0.82rem;
            font-weight: 600;
            color: var(--text-main);
        }

        .timer-badge i { font-size: 0.9rem; color: var(--text-muted); }

        /* Progress bar wrapper */
        .progress-wrap {
            width: 100%;
            max-width: 500px;
            margin-bottom: 1.5rem;
        }

        .quiz-progress {
            height: 6px;
            border-radius: 50px;
            background-color: #e0e0e0;
            overflow: hidden;
        }

        .quiz-progress-bar {
            height: 100%;
            width: 30%; /* 3 dari 10 */
            background-color: var(--primary);
            border-radius: 50px;
            transition: width 0.5s ease;
        }

        /* ==============================
           QUIZ CARD
        ============================== */
        .quiz-card {
            background: var(--bg-card);
            border-radius: 18px;
            border: 1px solid var(--border);
            padding: 2rem 2.2rem 1.8rem;
            width: 100%;
            max-width: 500px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.05);
        }

        /* Question text */
        .question-text {
            font-size: 1rem;
            font-weight: 600;
            color: var(--text-main);
            line-height: 1.5;
            margin-bottom: 1.5rem;
        }

        /* ==============================
           ANSWER OPTIONS
        ============================== */
        .options-list {
            display: flex;
            flex-direction: column;
            gap: 0.65rem;
            margin-bottom: 0;
        }

        .option-item {
            position: relative;
        }

        /* Hide native radio */
        .option-item input[type="radio"] {
            position: absolute;
            opacity: 0;
            width: 0;
            height: 0;
        }

        .option-label {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.75rem 1rem;
            border-radius: 10px;
            border: 1.5px solid var(--border);
            background: #fff;
            cursor: pointer;
            font-size: 0.88rem;
            font-weight: 500;
            color: var(--text-main);
            transition: border-color 0.18s, background-color 0.18s;
            user-select: none;
        }

        .option-label:hover {
            border-color: var(--primary);
            background-color: var(--primary-light);
        }

        /* Custom radio circle */
        .radio-circle {
            width: 20px;
            height: 20px;
            border-radius: 50%;
            border: 2px solid #c8c8c8;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            transition: border-color 0.18s, background-color 0.18s;
        }

        .radio-dot {
            width: 9px;
            height: 9px;
            border-radius: 50%;
            background: transparent;
            transition: background-color 0.18s;
        }

        /* Checked state — driven by JS class */
        .option-item.selected .option-label {
            border-color: var(--primary);
            background-color: var(--primary-light);
            color: var(--primary);
            font-weight: 600;
        }

        .option-item.selected .radio-circle {
            border-color: var(--primary);
            background-color: var(--primary);
        }

        .option-item.selected .radio-dot {
            background-color: #fff;
        }

        /* ==============================
           DIVIDER
        ============================== */
        .quiz-divider {
            border: none;
            border-top: 1px solid #f0f0f0;
            margin: 1.6rem 0 1.4rem;
        }

        /* ==============================
           NAV BUTTONS
        ============================== */
        .quiz-nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .btn-prev {
            padding: 0.5rem 1.4rem;
            border-radius: 50px;
            border: 1.5px solid var(--border);
            background: transparent;
            font-size: 0.85rem;
            font-weight: 500;
            color: var(--text-main);
            cursor: pointer;
            transition: border-color 0.2s, color 0.2s;
            font-family: 'Poppins', sans-serif;
        }

        .btn-prev:hover {
            border-color: var(--primary);
            color: var(--primary);
        }

        .btn-next {
            padding: 0.52rem 1.5rem;
            border-radius: 50px;
            border: none;
            background-color: var(--accent);
            font-size: 0.85rem;
            font-weight: 600;
            color: #1a1a1a;
            cursor: pointer;
            transition: background-color 0.2s, transform 0.15s;
            font-family: 'Poppins', sans-serif;
        }

        .btn-next:hover {
            background-color: var(--accent-dark);
            color: #fff;
            transform: translateY(-1px);
        }

        /* ==============================
           RESPONSIVE
        ============================== */
        @media (max-width: 575.98px) {
            .quiz-card      { padding: 1.4rem 1.1rem 1.4rem; }
            .quiz-title     { font-size: 1.2rem; }
            .question-text  { font-size: 0.92rem; }
        }
    </style>
</head>
<body>

<div class="container">

    {{-- Back link --}}
    <a href="#" class="back-link">
        <i class="bi bi-arrow-left"></i>
        Kembali
    </a>

    {{-- =================== QUIZ LAYOUT =================== --}}
    <div class="quiz-outer">

        {{-- Quiz Title --}}
        <h1 class="quiz-title">Kuis: Energi Terbarukan</h1>

        {{-- Progress meta row --}}
        <div class="quiz-meta-row">
            <span class="question-counter">Pertanyaan 3 dari 10</span>
            <div class="timer-badge">
                <i class="bi bi-clock"></i>
                <span id="timer-display">04:32</span>
            </div>
        </div>

        {{-- Progress bar --}}
        <div class="progress-wrap">
            <div class="quiz-progress">
                <div class="quiz-progress-bar" id="progress-bar" style="width: 30%;"></div>
            </div>
        </div>

        {{-- Quiz Card --}}
        <div class="quiz-card">

            {{-- Question --}}
            <p class="question-text">
                Energi yang berasal dari sinar matahari disebut?
            </p>

            {{-- Answer Options --}}
            <div class="options-list" id="options-list">

                {{-- Option A --}}
                <div class="option-item" data-value="A">
                    <input type="radio" name="answer" id="opt-a" value="A">
                    <label class="option-label" for="opt-a">
                        <span class="radio-circle"><span class="radio-dot"></span></span>
                        A. Energi Angin
                    </label>
                </div>

                {{-- Option B (pre-selected) --}}
                <div class="option-item selected" data-value="B">
                    <input type="radio" name="answer" id="opt-b" value="B" checked>
                    <label class="option-label" for="opt-b">
                        <span class="radio-circle"><span class="radio-dot"></span></span>
                        B. Energi Surya
                    </label>
                </div>

                {{-- Option C --}}
                <div class="option-item" data-value="C">
                    <input type="radio" name="answer" id="opt-c" value="C">
                    <label class="option-label" for="opt-c">
                        <span class="radio-circle"><span class="radio-dot"></span></span>
                        C. Energi Fosil
                    </label>
                </div>

                {{-- Option D --}}
                <div class="option-item" data-value="D">
                    <input type="radio" name="answer" id="opt-d" value="D">
                    <label class="option-label" for="opt-d">
                        <span class="radio-circle"><span class="radio-dot"></span></span>
                        D. Energi Biomassa
                    </label>
                </div>

            </div>{{-- /options-list --}}

            <hr class="quiz-divider">

            {{-- Navigation Buttons --}}
            <div class="quiz-nav">
                <button class="btn-prev" type="button">Sebelumnya</button>
                <button class="btn-next" type="button">Selanjutnya</button>
            </div>

        </div>{{-- /quiz-card --}}

    </div>{{-- /quiz-outer --}}

</div>{{-- /container --}}


{{-- Bootstrap 5 JS Bundle --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
    /* ==============================
       OPTION SELECTION
    ============================== */
    document.querySelectorAll('.option-item').forEach(function (item) {
        item.addEventListener('click', function () {
            // Remove selected from all
            document.querySelectorAll('.option-item').forEach(function (el) {
                el.classList.remove('selected');
                el.querySelector('input[type="radio"]').checked = false;
            });

            // Select clicked
            this.classList.add('selected');
            this.querySelector('input[type="radio"]').checked = true;
        });
    });

    /* ==============================
       COUNTDOWN TIMER
    ============================== */
    (function () {
        var totalSeconds = 4 * 60 + 32; // 04:32
        var display = document.getElementById('timer-display');

        var interval = setInterval(function () {
            if (totalSeconds <= 0) {
                clearInterval(interval);
                display.textContent = '00:00';
                display.style.color = '#dc3545';
                return;
            }
            totalSeconds--;

            var minutes = Math.floor(totalSeconds / 60);
            var seconds = totalSeconds % 60;

            display.textContent =
                String(minutes).padStart(2, '0') + ':' +
                String(seconds).padStart(2, '0');

            // Turn red in last 60 seconds
            if (totalSeconds <= 60) {
                display.style.color = '#dc3545';
            }
        }, 1000);
    })();
</script>

</body>
</html>