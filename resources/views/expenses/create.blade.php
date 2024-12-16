<form action="{{ route('expenses.store') }}" method="POST">
    @csrf
    <div class="form-container">
        <h1>Tambah Pengeluaran</h1>

        <label for="title">Judul:</label>
        <input type="text" id="title" name="title" required>

        <label for="amount">Nominal:</label>
        <input type="number" id="amount" name="amount" step="0.01" required>

        <label for="description">Deskripsi:</label>
        <textarea id="description" name="description" placeholder="Deskripsi pengeluaran"></textarea>

        <label for="date">Tanggal:</label>
        <input type="date" id="date" name="date" required>

        <button type="submit">Tambah</button>
        <a href="{{ route('expenses.index') }}" class="back-link">Kembali ke daftar pengeluaran</a>
    </div>
</form>

<style>
    /* Reset styling untuk body */
    body {
        font-family: Arial, sans-serif;
        background-color: #f7f7f7;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        transition: background-color 0.3s;
    }

    /* Animasi muncul form */
    @keyframes slideInUp {
        0% {
            transform: translateY(50px);
            opacity: 0;
        }

        100% {
            transform: translateY(0);
            opacity: 1;
        }
    }

    /* Form wrapper */
    .form-container {
        background-color: white;
        padding: 30px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        width: 100%;
        max-width: 500px;
        box-sizing: border-box;
        animation: slideInUp 0.6s ease-out;
    }

    h1 {
        color: #4CAF50;
        text-align: center;
        margin-bottom: 20px;
    }

    label {
        font-weight: bold;
        margin-top: 10px;
        display: block;
    }

    input[type="text"],
    input[type="number"],
    input[type="date"],
    textarea {
        width: 100%;
        padding: 10px;
        margin-top: 5px;
        margin-bottom: 20px;
        border: 1px solid #ddd;
        border-radius: 5px;
        box-sizing: border-box;
        font-size: 16px;
    }

    textarea {
        resize: vertical;
        height: 100px;
    }

    button {
        background-color: #4CAF50;
        color: white;
        border: none;
        padding: 10px 20px;
        cursor: pointer;
        border-radius: 5px;
        font-size: 16px;
        transition: background-color 0.3s, transform 0.3s;
        width: 100%;
    }

    button:hover {
        background-color: #45a049;
        transform: scale(1.05);
    }

    /* Tombol Kembali */
    .back-link {
        display: inline-block;
        margin-top: 20px;
        text-decoration: none;
        color: white;
        background-color: #4CAF50;
        padding: 10px 0px;
        font-size: 16px;
        text-align: center;
        border-radius: 5px;
        width: 100%;
        transition: background-color 0.3s, transform 0.3s;
    }

    .back-link:hover {
        background-color: #45a049;
        transform: scale(1.05);
    }

    /* Responsiveness */
    @media (max-width: 768px) {
        body {
            padding: 20px;
        }

        .form-container {
            padding: 20px;
        }

        .back-link {
            font-size: 14px;
        }
    }
</style>