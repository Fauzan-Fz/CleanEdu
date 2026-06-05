<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EduController extends Controller
{
    public function welcome()
    {
        return view('welcome');
    }

    public function showRegister()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|string|min:6',
        ]);

        session()->put([
            'user_name' => $request->name,
            'user_email' => $request->email,
            'user_password' => $request->password,
        ]);

        return redirect()->route('login')->with('success', 'Registrasi berhasil, silakan login!');
    }

    public function showLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if (!session()->has('user_email')) {
            return redirect()->route('login')->withErrors(['email' => 'Akun belum terdaftar. Silakan daftar terlebih dahulu.']);
        }

        if ($request->email !== session('user_email') || $request->password !== session('user_password')) {
            return redirect()->route('login')->withErrors(['email' => 'Email atau kata sandi salah.']);
        }

        session()->put('logged_in', true);

        return redirect()->route('dashboard');
    }

    public function settings()
    {
        if (!session()->has('logged_in') || !session('logged_in')) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $userName = session('user_name');
        $userEmail = session('user_email');

        return view('settings', compact('userName', 'userEmail'));
    }

    public function updateSettings(Request $request)
    {
        if (!session()->has('logged_in') || !session('logged_in')) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'password' => 'nullable|string|min:6',
        ]);

        session()->put('user_name', $request->name);

        if ($request->filled('password')) {
            session()->put('user_password', $request->password);
        }

        return redirect()->route('settings')->with('success', 'Profil akun berhasil diperbarui!');
    }

    public function dashboard()
    {
        if (!session()->has('logged_in') || !session('logged_in')) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $stats = [
            'articlesRead' => 5,
            'videosWatched' => 3,
            'quizScore' => 80,
        ];

        $userName = session('user_name');
        $userEmail = session('user_email');

        return view('dashboard', compact('stats', 'userName', 'userEmail'));
    }

    public function logout(Request $request)
    {
        // Cukup hapus status loginnya saja, JANGAN hapus data akun pendaftarannya
        $request->session()->forget('logged_in');

        return redirect()->route('welcome');
    }

    public function artikel()
    {
        $articles = [
            [
                'id' => 1,
                'title' => 'Strategi Mudah Memahami Persamaan',
                'excerpt' => 'Pelajari cara menyelesaikan persamaan secara sistematis dengan contoh yang jelas.',
                'content' => 'Artikel ini membahas langkah-langkah penyelesaian persamaan linear, kuadrat, serta contoh soal yang mudah dipahami.',
                'read_time' => '5 menit',
            ],
            [
                'id' => 2,
                'title' => 'Kiat Menulis Esai yang Persuasif',
                'excerpt' => 'Teknik menulis esai kuat dan terstruktur untuk tugas bahasa Indonesia.',
                'content' => 'Fokus pada pembukaan, argumen utama, dan penutup yang jelas untuk membangun esai yang meyakinkan.',
                'read_time' => '4 menit',
            ],
            [
                'id' => 3,
                'title' => 'Dasar-Dasar Fotosintesis',
                'excerpt' => 'Penjelasan singkat tentang proses perubahan cahaya menjadi energi oleh tumbuhan.',
                'content' => 'Pelajari bagaimana klorofil, sinar matahari, dan air berperan dalam menghasilkan glukosa untuk tumbuhan.',
                'read_time' => '6 menit',
            ],
        ];

        return view('artikel', compact('articles'));
    }

    public function detailArtikel($slug)
    {
        $daftar_artikel = [
            'apa-itu-energi-surya' => [
                'title' => 'Apa Itu Energi Surya?',
                'category' => 'Energi Surya',
                'badge_class' => 'badge-solar',
                'image' => 'https://images.unsplash.com/photo-1509391366360-2e959784a276?w=1200&auto=format&fit=crop&q=80',
                'content' => 'Energi surya adalah energi yang dikonversi langsung dari sinar matahari menjadi energi listrik menggunakan teknologi panel surya atau sel fotovoltaik. Sebagai negara tropis yang terletak di garis khatulistiwa, Indonesia memiliki potensi energi surya yang sangat melimpah dengan paparan sinar matahari sepanjang tahun. Penggunaan energi surya tidak menghasilkan emisi gas rumah kaca berbahaya, menjadikannya salah satu pilar utama dalam transisi menuju energi bersih yang berkelanjutan untuk masa depan bumi kita.',
            ],
            'manfaat-energi-angin' => [
                'title' => 'Manfaat Energi Angin',
                'category' => 'Energi Angin',
                'badge_class' => 'badge-angin',
                'image' => 'https://images.unsplash.com/photo-1466611653911-95081537e5b7?w=1200&auto=format&fit=crop&q=80',
                'content' => 'Energi angin memanfaatkan hembusan angin alami untuk memutar bilah-bilah kincir atau turbin angin raksasa. Putaran mekanis dari bilah kincir ini kemudian menggerakkan generator internal yang berfungsi untuk memproduksi arus listrik. Manfaat terbesar dari energi angin adalah sifatnya yang murni terbarukan, bebas polusi udara, dan tidak membutuhkan pasokan air untuk pendinginan. Selain itu, area di bawah kincir angin tetap dapat dimanfaatkan oleh para petani untuk lahan pertanian atau peternakan.',
            ],
            'biomassa-energi-dari-alam' => [
                'title' => 'Biomassa: Energi dari Alam',
                'category' => 'Biomassa',
                'badge_class' => 'badge-biomassa',
                'image' => 'https://images.unsplash.com/photo-1448375240586-882707db888b?w=1200&auto=format&fit=crop&q=80',
                'content' => 'Biomassa merupakan sumber energi terbarukan yang berasal dari bahan-bahan organik sisa makhluk hidup. Bahan baku biomassa meliputi limbah pertanian, sisa potongan kayu industri, kotoran hewan ternak, hingga tanaman cepat tumbuh yang sengaja dibudidayakan. Melalui teknologi pembakaran langsung atau proses fermentasi anaerobik menjadi biogas, biomassa mampu menggantikan peran batu bara dan gas elpiji konvensional, sekaligus membantu mengelola tumpukan sampah organik di lingkungan sekitar.',
            ],
            'geotermal-panas-dari-bumi' => [
                'title' => 'Geotermal: Panas dari Bumi',
                'category' => 'Geotermal',
                'badge_class' => 'badge-geo',
                'image' => 'https://images.unsplash.com/photo-1561557944-6e7860d1a7eb?w=1200&auto=format&fit=crop&q=80',
                'content' => 'Energi geotermal atau panas bumi adalah energi thermal yang dihasilkan dan disimpan di bawah lapisan kerak bumi, biasanya berada di wilayah yang memiliki banyak gunung berapi aktif. Indonesia sangat beruntung karena memiliki hampir 40% dari total cadangan geotermal di seluruh dunia. Keunggulan utama dari energi panas bumi adalah ketersediaannya yang konstan dan tidak bergantung pada faktor cuaca atau perubahan musim, sehingga sangat ideal untuk dijadikan pembangkit listrik beban dasar (baseload) nasional.',
            ],
            'hemat-listrik-di-rumah' => [
                'title' => 'Hemat Listrik di Rumah',
                'category' => 'Tips',
                'badge_class' => 'badge-tips',
                'image' => 'https://images.unsplash.com/photo-1518717758536-85ae29035b6d?w=1200&auto=format&fit=crop&q=80',
                'content' => 'Menghemat pemakaian listrik di rumah adalah langkah nyata terkecil yang bisa kita lakukan untuk melindungi lingkungan. Sebagian besar listrik kita saat ini masih diproduksi oleh pembangkit berbahan bakar fosil yang melepaskan emisi karbon tinggi. Kita dapat berkontribusi mengurangi dampak buruk tersebut dengan membiasakan diri mematikan lampu saat siang hari, mencabut kabel charger yang tidak terpakai dari stopkontak, beralih ke lampu LED hemat energi, serta mengatur suhu AC secara bijak.',
            ],
            'dampak-energi-fosil' => [
                'title' => 'Dampak Energi Fosil',
                'category' => 'Lingkungan',
                'badge_class' => 'badge-lingk',
                'image' => 'https://images.unsplash.com/photo-1581090464777-f3220bbe1b8b?w=1200&auto=format&fit=crop&q=80',
                'content' => 'Ketergantungan global yang terlalu tinggi pada energi fosil seperti minyak bumi, gas alam, dan batu bara telah membawa dampak kerusakan yang serius bagi planet bumi. Proses pembakaran bahan bakar fosil melepas milyaran ton gas karbon dioksida (CO2) ke atmosfer, memicu pemanasan global, perubahan iklim ekstrem, naiknya permukaan air laut, hingga polusi udara parah yang mengancam kesehatan pernapasan manusia. Kenyataan inilah yang mendasari pentingnya kita segera beralih ke energi bersih.',
            ],
        ];

        if (!array_key_exists($slug, $daftar_artikel)) {
            abort(404);
        }

        $artikel = $daftar_artikel[$slug];

        return view('artikel-detail', compact('artikel'));
    }

    public function video(Request $request)
    {
        $videos = [
            ['id' => 1, 'title' => 'Strategi Mengerjakan Soal Cepat', 'description' => 'Video ringkas dengan strategi belajar untuk mengerjakan soal secara sistematis.', 'youtube_id' => 'dQw4w9WgXcQ', 'views' => 1200, 'duration' => '05:40'],
            ['id' => 2, 'title' => 'Kiat Menulis Esai yang Efektif', 'description' => 'Penjelasan konsep dan contoh struktur esai yang mudah diikuti.', 'youtube_id' => 'oHg5SJYRHA0', 'views' => 5400, 'duration' => '12:15'],
            ['id' => 3, 'title' => 'Dasar-Dasar Fotosintesis', 'description' => 'Visual sederhana untuk memahami proses tanaman menghasilkan energi.', 'youtube_id' => 'ysz5S6PUM-U', 'views' => 3800, 'duration' => '08:20'],
            ['id' => 4, 'title' => 'Pemahaman Rumus Matematika', 'description' => 'Langkah-langkah cepat untuk mengingat rumus penting.', 'youtube_id' => 'dQw4w9WgXcQ', 'views' => 2600, 'duration' => '09:30'],
            ['id' => 5, 'title' => 'Teknik Menulis Paragraf yang Jelas', 'description' => 'Cara merangkai paragraf efektif untuk tugas bahasa.', 'youtube_id' => 'dQw4w9WgXcQ', 'views' => 1500, 'duration' => '06:50'],
            ['id' => 6, 'title' => 'Pembelajaran Interaktif IPA', 'description' => 'Visualisasi konsep ilmiah untuk memudahkan pemahaman.', 'youtube_id' => 'dQw4w9WgXcQ', 'views' => 2900, 'duration' => '10:05'],
            ['id' => 7, 'title' => 'Sejarah dalam Sekejap', 'description' => 'Ringkasan peristiwa penting sejarah secara visual.', 'youtube_id' => 'dQw4w9WgXcQ', 'views' => 4300, 'duration' => '11:00'],
            ['id' => 8, 'title' => 'Strategi Belajar Efektif', 'description' => 'Tips belajar yang bisa diterapkan setiap hari.', 'youtube_id' => 'dQw4w9WgXcQ', 'views' => 2100, 'duration' => '07:45'],
            ['id' => 9, 'title' => 'Meningkatkan Konsentrasi Saat Belajar', 'description' => 'Cara sederhana untuk tetap fokus selama pelajaran.', 'youtube_id' => 'dQw4w9WgXcQ', 'views' => 3200, 'duration' => '08:55'],
            ['id' => 10, 'title' => 'Ide Penulisan Kreatif', 'description' => 'Inspirasi untuk membuat tulisan yang menarik.', 'youtube_id' => 'dQw4w9WgXcQ', 'views' => 1800, 'duration' => '05:20'],
            ['id' => 11, 'title' => 'Persiapan Ulangan Akhir', 'description' => 'Rangkuman belajar cepat untuk ujian.', 'youtube_id' => 'dQw4w9WgXcQ', 'views' => 4700, 'duration' => '13:10'],
            ['id' => 12, 'title' => 'Belajar Mandiri Lebih Produktif', 'description' => 'Metode belajar mandiri yang terstruktur.', 'youtube_id' => 'dQw4w9WgXcQ', 'views' => 2500, 'duration' => '09:15'],
        ];

        $activeId = intval($request->query('id', 1));
        $currentFilter = $request->query('filter', 'all');

        $activeVideo = collect($videos)->firstWhere('id', $activeId);
        if (!$activeVideo) {
            $activeVideo = $videos[0];
        }

        $videos = collect($videos);
        switch ($currentFilter) {
            case 'terbaru':
                $videos = $videos->sortByDesc('id');
                break;
            case 'popular':
                $videos = $videos->sortByDesc('views');
                break;
            case 'durasi':
                $videos = $videos->sortByDesc('duration');
                break;
            default:
                $videos = $videos;
                break;
        }

        return view('video', [
            'videos' => $videos->values()->all(),
            'activeVideo' => $activeVideo,
            'currentFilter' => $currentFilter,
        ]);
    }

    public function quiz()
    {
        $questions = [
            [
                'id' => 1,
                'question' => 'Apa istilah untuk pergeseran energi oleh tanaman saat fotosintesis?',
                'options' => [
                    'a' => 'Respirasi seluler',
                    'b' => 'Transformasi energi',
                    'c' => 'Transmisi nutrisi',
                    'd' => 'Siklus karbon',
                ],
            ],
            [
                'id' => 2,
                'question' => 'Apa langkah pertama saat menulis esai yang baik?',
                'options' => [
                    'a' => 'Membuat kerangka',
                    'b' => 'Menyalin contoh',
                    'c' => 'Mengubah topik',
                    'd' => 'Menghindari pendahuluan',
                ],
            ],
            [
                'id' => 3,
                'question' => 'Apa yang biasanya menjadi fokus utama dalam pembukaan esai?',
                'options' => [
                    'a' => 'Mengutip statistik acak',
                    'b' => 'Menjelaskan metode belajar',
                    'c' => 'Memperkenalkan topik utama',
                    'd' => 'Menulis daftar panjang fakta',
                ],
            ],
        ];

        return view('quiz', compact('questions'));
    }

    public function checkQuiz(Request $request)
    {
        $answers = $request->input('answers', []);

        $correctAnswers = [
            1 => 'b',
            2 => 'a',
            3 => 'c',
        ];

        $score = 0;

        foreach ($correctAnswers as $questionId => $correctOption) {
            if (isset($answers[$questionId]) && $answers[$questionId] === $correctOption) {
                $score++;
            }
        }

        $percent = intval(($score / count($correctAnswers)) * 100);

        return redirect()->route('dashboard')->with('success', "Kuis selesai — skor kamu: {$percent}%.");
    }
}
