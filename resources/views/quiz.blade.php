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
            CSS VARIABLES & BASE (SAMA PERSIS)
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

        .quiz-outer {
            min-height: calc(100vh - 60px);
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 0 1rem 3rem;
        }

        .quiz-title {
            font-size: 1.55rem;
            font-weight: 700;
            color: var(--text-main);
            text-align: center;
            margin-bottom: 1.5rem;
        }

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
            width: 10%;
            background-color: var(--primary);
            border-radius: 50px;
            transition: width 0.5s ease;
        }

        .quiz-card {
            background: var(--bg-card);
            border-radius: 18px;
            border: 1px solid var(--border);
            padding: 2rem 2.2rem 1.8rem;
            width: 100%;
            max-width: 500px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.05);
        }

        .question-text {
            font-size: 1rem;
            font-weight: 600;
            color: var(--text-main);
            line-height: 1.5;
            margin-bottom: 1.5rem;
        }

        .options-list {
            display: flex;
            flex-direction: column;
            gap: 0.65rem;
            margin-bottom: 0;
        }

        .option-item {
            position: relative;
        }

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

        .quiz-divider {
            border: none;
            border-top: 1px solid #f0f0f0;
            margin: 1.6rem 0 1.4rem;
        }

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

        .btn-prev:hover:not(:disabled) {
            border-color: var(--primary);
            color: var(--primary);
        }

        .btn-prev:disabled {
            opacity: 0.5;
            cursor: not-allowed;
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

        .quiz-slide {
            display: none;
        }
        .quiz-slide.active {
            display: block;
        }

        @media (max-width: 575.98px) {
            .quiz-card      { padding: 1.4rem 1.1rem 1.4rem; }
            .quiz-title     { font-size: 1.2rem; }
            .question-text  { font-size: 0.92rem; }
        }
    </style>
</head>
<body>

<div class="container">

    <a href="#" class="back-link">
        <i class="bi bi-arrow-left"></i>
        Kembali
    </a>

    <div class="quiz-outer">

        <h1 class="quiz-title">Kuis: Energi Terbarukan</h1>

        <div class="quiz-meta-row">
            <span class="question-counter" id="question-counter">Pertanyaan 1 dari 10</span>
            <div class="timer-badge">
                <i class="bi bi-clock"></i>
                <span id="timer-display">04:32</span>
            </div>
        </div>

        <div class="progress-wrap">
            <div class="quiz-progress">
                <div class="quiz-progress-bar" id="progress-bar"></div>
            </div>
        </div>

        <div class="quiz-card">

            <div id="quiz-questions-container">
                
                <div class="quiz-slide active">
                    <p class="question-text">1. Energi yang berasal dari sinar matahari disebut?</p>
                    <div class="options-list">
                        <div class="option-item">
                            <input type="radio" name="answer_1" id="opt-1-a" value="A">
                            <label class="option-label" for="opt-1-a">
                                <span class="radio-circle"><span class="radio-dot"></span></span>
                                A. Energi Angin
                            </label>
                        </div>
                        <div class="option-item">
                            <input type="radio" name="answer_1" id="opt-1-b" value="B">
                            <label class="option-label" for="opt-1-b">
                                <span class="radio-circle"><span class="radio-dot"></span></span>
                                B. Energi Surya
                            </label>
                        </div>
                        <div class="option-item">
                            <input type="radio" name="answer_1" id="opt-1-c" value="C">
                            <label class="option-label" for="opt-1-c">
                                <span class="radio-circle"><span class="radio-dot"></span></span>
                                C. Energi Fosil
                            </label>
                        </div>
                        <div class="option-item">
                            <input type="radio" name="answer_1" id="opt-1-d" value="D">
                            <label class="option-label" for="opt-1-d">
                                <span class="radio-circle"><span class="radio-dot"></span></span>
                                D. Energi Biomassa
                            </label>
                        </div>
                    </div>
                </div>

                <div class="quiz-slide">
                    <p class="question-text">2. Apa alat yang digunakan untuk mengubah energi angin menjadi listrik?</p>
                    <div class="options-list">
                        <div class="option-item">
                            <input type="radio" name="answer_2" id="opt-2-a" value="A">
                            <label class="option-label" for="opt-2-a">
                                <span class="radio-circle"><span class="radio-dot"></span></span>
                                A. Panel Surya
                            </label>
                        </div>
                        <div class="option-item">
                            <input type="radio" name="answer_2" id="opt-2-b" value="B">
                            <label class="option-label" for="opt-2-b">
                                <span class="radio-circle"><span class="radio-dot"></span></span>
                                B. Turbin Angin / Kincir Angin
                            </label>
                        </div>
                        <div class="option-item">
                            <input type="radio" name="answer_2" id="opt-2-c" value="C">
                            <label class="option-label" for="opt-2-c">
                                <span class="radio-circle"><span class="radio-dot"></span></span>
                                C. Generator Diesel
                            </label>
                        </div>
                        <div class="option-item">
                            <input type="radio" name="answer_2" id="opt-2-d" value="D">
                            <label class="option-label" for="opt-2-d">
                                <span class="radio-circle"><span class="radio-dot"></span></span>
                                D. Reaktor Nuklir
                            </label>
                        </div>
                    </div>
                </div>

                <div class="quiz-slide">
                    <p class="question-text">3. Manakah di bawah ini yang tergolong sebagai sumber energi TIDAK terbarukan?</p>
                    <div class="options-list">
                        <div class="option-item">
                            <input type="radio" name="answer_3" id="opt-3-a" value="A">
                            <label class="option-label" for="opt-3-a">
                                <span class="radio-circle"><span class="radio-dot"></span></span>
                                A. Batu bara
                            </label>
                        </div>
                        <div class="option-item">
                            <input type="radio" name="answer_3" id="opt-3-b" value="B">
                            <label class="option-label" for="opt-3-b">
                                <span class="radio-circle"><span class="radio-dot"></span></span>
                                B. Panas bumi
                            </label>
                        </div>
                        <div class="option-item">
                            <input type="radio" name="answer_3" id="opt-3-c" value="C">
                            <label class="option-label" for="opt-3-c">
                                <span class="radio-circle"><span class="radio-dot"></span></span>
                                C. Air mengalir
                            </label>
                        </div>
                        <div class="option-item">
                            <input type="radio" name="answer_3" id="opt-3-d" value="D">
                            <label class="option-label" for="opt-3-d">
                                <span class="radio-circle"><span class="radio-dot"></span></span>
                                D. Biomassa
                            </label>
                        </div>
                    </div>
                </div>

                <div class="quiz-slide">
                    <p class="question-text">4. Pembangkit listrik yang memanfaatkan aliran air sungai sering disebut dengan?</p>
                    <div class="options-list">
                        <div class="option-item">
                            <input type="radio" name="answer_4" id="opt-4-a" value="A">
                            <label class="option-label" for="opt-4-a">
                                <span class="radio-circle"><span class="radio-dot"></span></span>
                                A. PLTU
                            </label>
                        </div>
                        <div class="option-item">
                            <input type="radio" name="answer_4" id="opt-4-b" value="B">
                            <label class="option-label" for="opt-4-b">
                                <span class="radio-circle"><span class="radio-dot"></span></span>
                                B. PLTG
                            </label>
                        </div>
                        <div class="option-item">
                            <input type="radio" name="answer_4" id="opt-4-c" value="C">
                            <label class="option-label" for="opt-4-c">
                                <span class="radio-circle"><span class="radio-dot"></span></span>
                                C. PLTA
                            </label>
                        </div>
                        <div class="option-item">
                            <input type="radio" name="answer_4" id="opt-4-d" value="D">
                            <label class="option-label" for="opt-4-d">
                                <span class="radio-circle"><span class="radio-dot"></span></span>
                                D. PLTN
                            </label>
                        </div>
                    </div>
                </div>

                <div class="quiz-slide">
                    <p class="question-text">5. Apa nama bahan bakar ramah lingkungan yang diproduksi dari limbah organik / tanaman?</p>
                    <div class="options-list">
                        <div class="option-item">
                            <input type="radio" name="answer_5" id="opt-5-a" value="A">
                            <label class="option-label" for="opt-5-a">
                                <span class="radio-circle"><span class="radio-dot"></span></span>
                                A. Avtur
                            </label>
                        </div>
                        <div class="option-item">
                            <input type="radio" name="answer_5" id="opt-5-b" value="B">
                            <label class="option-label" for="opt-5-b">
                                <span class="radio-circle"><span class="radio-dot"></span></span>
                                B. Biofuel / Biodiesel
                            </label>
                        </div>
                        <div class="option-item">
                            <input type="radio" name="answer_5" id="opt-5-c" value="C">
                            <label class="option-label" for="opt-5-c">
                                <span class="radio-circle"><span class="radio-dot"></span></span>
                                C. Premium
                            </label>
                        </div>
                        <div class="option-item">
                            <input type="radio" name="answer_5" id="opt-5-d" value="D">
                            <label class="option-label" for="opt-5-d">
                                <span class="radio-circle"><span class="radio-dot"></span></span>
                                D. Oli sintetis
                            </label>
                        </div>
                    </div>
                </div>

                <div class="quiz-slide">
                    <p class="question-text">6. Energi panas bumi juga dikenal dengan istilah energi apa?</p>
                    <div class="options-list">
                        <div class="option-item">
                            <input type="radio" name="answer_6" id="opt-6-a" value="A">
                            <label class="option-label" for="opt-6-a">
                                <span class="radio-circle"><span class="radio-dot"></span></span>
                                A. Hidrotermal
                            </label>
                        </div>
                        <div class="option-item">
                            <input type="radio" name="answer_6" id="opt-6-b" value="B">
                            <label class="option-label" for="opt-6-b">
                                <span class="radio-circle"><span class="radio-dot"></span></span>
                                B. Geotermal
                            </label>
                        </div>
                        <div class="option-item">
                            <input type="radio" name="answer_6" id="opt-6-c" value="C">
                            <label class="option-label" for="opt-6-c">
                                <span class="radio-circle"><span class="radio-dot"></span></span>
                                C. Kinetik
                            </label>
                        </div>
                        <div class="option-item">
                            <input type="radio" name="answer_6" id="opt-6-d" value="D">
                            <label class="option-label" for="opt-6-d">
                                <span class="radio-circle"><span class="radio-dot"></span></span>
                                D. Solar termal
                            </label>
                        </div>
                    </div>
                </div>

                <div class="quiz-slide">
                    <p class="question-text">7. Apa keuntungan utama menggunakan energi terbarukan dibandingkan energi fosil?</p>
                    <div class="options-list">
                        <div class="option-item">
                            <input type="radio" name="answer_7" id="opt-7-a" value="A">
                            <label class="option-label" for="opt-7-a">
                                <span class="radio-circle"><span class="radio-dot"></span></span>
                                A. Menghasilkan emisi gas rumah kaca yang tinggi
                            </label>
                        </div>
                        <div class="option-item">
                            <input type="radio" name="answer_7" id="opt-7-b" value="B">
                            <label class="option-label" for="opt-7-b">
                                <span class="radio-circle"><span class="radio-dot"></span></span>
                                B. Lebih murah biaya pembuatan pertamanya
                            </label>
                        </div>
                        <div class="option-item">
                            <input type="radio" name="answer_7" id="opt-7-c" value="C">
                            <label class="option-label" for="opt-7-c">
                                <span class="radio-circle"><span class="radio-dot"></span></span>
                                C. Ramah lingkungan dan tidak akan habis
                            </label>
                        </div>
                        <div class="option-item">
                            <input type="radio" name="answer_7" id="opt-7-d" value="D">
                            <label class="option-label" for="opt-7-d">
                                <span class="radio-circle"><span class="radio-dot"></span></span>
                                D. Sangat bergantung pada cuaca ekstrem
                            </label>
                        </div>
                    </div>
                </div>

                <div class="quiz-slide">
                    <p class="question-text">8. Alat penangkap energi matahari yang biasanya dipasang di atap rumah dinamakan?</p>
                    <div class="options-list">
                        <div class="option-item">
                            <input type="radio" name="answer_8" id="opt-8-a" value="A">
                            <label class="option-label" for="opt-8-a">
                                <span class="radio-circle"><span class="radio-dot"></span></span>
                                A. Turbin Angin
                            </label>
                        </div>
                        <div class="option-item">
                            <input type="radio" name="answer_8" id="opt-8-b" value="B">
                            <label class="option-label" for="opt-8-b">
                                <span class="radio-circle"><span class="radio-dot"></span></span>
                                B. Panel Surya (Solar Panel)
                            </label>
                        </div>
                        <div class="option-item">
                            <input type="radio" name="answer_8" id="opt-8-c" value="C">
                            <label class="option-label" for="opt-8-c">
                                <span class="radio-circle"><span class="radio-dot"></span></span>
                                C. Generator Listrik
                            </label>
                        </div>
                        <div class="option-item">
                            <input type="radio" name="answer_8" id="opt-8-d" value="D">
                            <label class="option-label" for="opt-8-d">
                                <span class="radio-circle"><span class="radio-dot"></span></span>
                                D. Kapasitor
                            </label>
                        </div>
                    </div>
                </div>

                <div class="quiz-slide">
                    <p class="question-text">9. Apa nama gas ramah lingkungan yang dihasilkan dari dekomposisi kotoran ternak?</p>
                    <div class="options-list">
                        <div class="option-item">
                            <input type="radio" name="answer_9" id="opt-9-a" value="A">
                            <label class="option-label" for="opt-9-a">
                                <span class="radio-circle"><span class="radio-dot"></span></span>
                                A. Biogas
                            </label>
                        </div>
                        <div class="option-item">
                            <input type="radio" name="answer_9" id="opt-9-b" value="B">
                            <label class="option-label" for="opt-9-b">
                                <span class="radio-circle"><span class="radio-dot"></span></span>
                                B. Elpiji
                            </label>
                        </div>
                        <div class="option-item">
                            <input type="radio" name="answer_9" id="opt-9-c" value="C">
                            <label class="option-label" for="opt-9-c">
                                <span class="radio-circle"><span class="radio-dot"></span></span>
                                C. Oksigen
                            </label>
                        </div>
                        <div class="option-item">
                            <input type="radio" name="answer_9" id="opt-9-d" value="D">
                            <label class="option-label" for="opt-9-d">
                                <span class="radio-circle"><span class="radio-dot"></span></span>
                                D. Karbon Monoksida
                            </label>
                        </div>
                    </div>
                </div>

                <div class="quiz-slide">
                    <p class="question-text">10. Pembangkit listrik yang memanfaatkan energi pasang surut air laut disebut?</p>
                    <div class="options-list">
                        <div class="option-item">
                            <input type="radio" name="answer_10" id="opt-10-a" value="A">
                            <label class="option-label" for="opt-10-a">
                                <span class="radio-circle"><span class="radio-dot"></span></span>
                                A. Energi Gelombang
                            </label>
                        </div>
                        <div class="option-item">
                            <input type="radio" name="answer_10" id="opt-10-b" value="B">
                            <label class="option-label" for="opt-10-b">
                                <span class="radio-circle"><span class="radio-dot"></span></span>
                                B. Energi Tidal
                            </label>
                        </div>
                        <div class="option-item">
                            <input type="radio" name="answer_10" id="opt-10-c" value="C">
                            <label class="option-label" for="opt-10-c">
                                <span class="radio-circle"><span class="radio-dot"></span></span>
                                C. Energi Termal Laut
                            </label>
                        </div>
                        <div class="option-item">
                            <input type="radio" name="answer_10" id="opt-10-d" value="D">
                            <label class="option-label" for="opt-10-d">
                                <span class="radio-circle"><span class="radio-dot"></span></span>
                                D. Energi Angin Lepas Pantai
                            </label>
                        </div>
                    </div>
                </div>

            </div>{{-- /quiz-questions-container --}}

            <hr class="quiz-divider">

            <div class="quiz-nav">
                <button class="btn-prev" type="button" id="btn-prev">Sebelumnya</button>
                <button class="btn-next" type="button" id="btn-next">Selanjutnya</button>
            </div>

        </div>{{-- /quiz-card --}}

    </div>{{-- /quiz-outer --}}

</div>{{-- /container --}}

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
    let currentSlideIndex = 0;
    const slides = document.querySelectorAll('.quiz-slide');
    const totalSlides = slides.length; // Otomatis bernilai 10 karena slide sudah lengkap
    
    const counterDisplay = document.getElementById('question-counter');
    const progressBar = document.getElementById('progress-bar');
    const btnPrev = document.getElementById('btn-prev');
    const btnNext = document.getElementById('btn-next');

    function renderQuiz() {
        slides.forEach((slide, idx) => {
            if(idx === currentSlideIndex) {
                slide.classList.add('active');
            } else {
                slide.classList.remove('active');
            }
        });

        // Update teks counter & progress bar secara dinamis
        counterDisplay.textContent = `Pertanyaan ${currentSlideIndex + 1} dari ${totalSlides}`;
        progressBar.style.width = ((currentSlideIndex + 1) / totalSlides) * 100 + "%";

        // Atur tombol state disabilitas
        btnPrev.disabled = (currentSlideIndex === 0);
        
        if (currentSlideIndex === totalSlides - 1) {
            btnNext.textContent = "Selesai";
        } else {
            btnNext.textContent = "Selanjutnya";
        }
    }

    // Navigasi Tombol
    btnNext.addEventListener('click', function() {
        if (currentSlideIndex < totalSlides - 1) {
            currentSlideIndex++;
            renderQuiz();
        } else {
            alert("Kuis Selesai! Terima kasih.");
        }
    });

    btnPrev.addEventListener('click', function() {
        if (currentSlideIndex > 0) {
            currentSlideIndex--;
            renderQuiz();
        }
    });

    // Handle klik jawaban tanpa dobel klik / melompat
    document.querySelectorAll('.option-label').forEach(function (label) {
        label.addEventListener('click', function (e) {
            const currentItem = this.closest('.option-item');
            const parentList = this.closest('.options-list');

            parentList.querySelectorAll('.option-item').forEach(function (el) {
                el.classList.remove('selected');
                el.querySelector('input[type="radio"]').checked = false;
            });

            currentItem.classList.add('selected');
            currentItem.querySelector('input[type="radio"]').checked = true;
        });
    });

    // Jalankan render pertama kali saat page diload
    renderQuiz();

    /* ==============================
       COUNTDOWN TIMER (TETAP SAMA)
    ============================== */
    (function () {
        var totalSeconds = 4 * 60 + 32; 
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

            if (totalSeconds <= 60) {
                display.style.color = '#dc3545';
            }
        }, 1000);
    })();
</script>

</body>
</html>