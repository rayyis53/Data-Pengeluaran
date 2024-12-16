<!DOCTYPE html>
<html lang="id-ID">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

    <title>Edit Pengeluaran</title>
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

        /* Animasi form */
        @keyframes slideIn {
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
            animation: slideIn 0.6s ease-out;
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
            transition: border-color 0.3s ease;
        }

        input[type="text"]:focus,
        input[type="number"]:focus,
        input[type="date"]:focus,
        textarea:focus {
            border-color: #4CAF50;
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
        a {
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

        a:hover {
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

            h1 {
                font-size: 24px;
            }
        }
    </style>
</head>

<body>
    <div class="form-container">
        <h1>Edit Pengeluaran</h1>
        <form action="{{ route('expenses.update', $expense->id) }}" method="POST">
            @csrf
            @method('PUT')

            <label for="title">Judul:</label>
            <input type="text" id="title" name="title" value="{{ old('title', $expense->title) }}" required>

            <label for="amount">Nominal:</label>
            <input type="number" id="amount" name="amount" step="0.01" value="{{ old('amount', $expense->amount) }}" required>

            <label for="date">Tanggal:</label>
            <input type="date" id="date" name="date" value="{{ old('date', $expense->date) }}" required>

            <label for="description">Deskripsi:</label>
            <textarea id="description" name="description" rows="4" required>{{ old('description', $expense->description) }}</textarea>

            <button type="submit">Update Pengeluaran</button>
        </form>

        <a href="{{ route('expenses.index') }}">Kembali ke daftar pengeluaran</a>
    </div>
</body>

</html>