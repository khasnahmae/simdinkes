<!DOCTYPE html>
<html>
<head>
    <title>Detail Berita</title>
    <style>
        .news-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            padding: 20px;
        }

        .news-image {
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden; /* Menghindari overflow gambar */
            width: 50%; /* Atur sesuai kebutuhan */
            height: 350px; /* Tinggi tetap */
        }

        .news-image img {
            width: 100%; /* Mengisi area kontainer */
            height: 100%; /* Mengisi area kontainer */
            object-fit: cover; /* Menjaga proporsi */
            width: 100%; /* Atur agar foto mengambil lebar penuh kontainer */
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .news-content {
            flex: 1;
            padding-inline: 25px;
            padding-block: 25px
            background-color: #ededed;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        }
        .news-content {
            padding-bottom: 25px;
        }

        .news-title {
            font-size: 2rem;
            color: #2a2a2a;
            margin-bottom: 10px;
        }
        .news-description {
            font-style: italic;
            color: #777;
            margin-bottom: 20px;
        }

        .news-body {
            line-height: 1.6;
            color: #333;
            margin-bottom: 20px;
        }

    </style>
</head>
<body>
    <div class="news-container">
        <div class="news-image">
            <img src="{{ asset('storage/berita/' . $berita->foto) }}" alt="Foto Berita">
        </div>
        <div class="news-content">
            <h1 class="news-title">{{ $berita->judul }}</h1>
            <p class="news-description">
                {{ $berita->subjudul }}
            </p>
            <p class="news-body">
                {{ $berita->isi }}
            </p>
            <a href="{{ url('/') }}">Kembali ke Beranda</a>
        </div>
    </div>
    
</body>
</html>
