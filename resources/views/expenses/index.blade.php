<!DOCTYPE html>
<html lang="id-ID">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pengeluaran</title>
    <style>
        /* Reset styling untuk body */
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
            transition: background-color 0.3s;
        }

        /* Header */
        h1 {
            text-align: center;
            padding: 20px;
            background-color: #4CAF50;
            color: white;
            margin: 0;
            animation: slideIn 1s ease-out;
        }

        /* Animasi Slide In */
        @keyframes slideIn {
            0% {
                transform: translateY(-100%);
                opacity: 0;
            }

            100% {
                transform: translateY(0);
                opacity: 1;
            }
        }

        /* Tombol Tambah Pengeluaran */
        .add-button {
            display: inline-block;
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            text-align: center;
            border-radius: 5px;
            text-decoration: none;
            margin: 20px auto;
            display: block;
            width: 200px;
            font-size: 16px;
            text-align: center;
            transition: background-color 0.3s, transform 0.3s;
        }

        .add-button:hover {
            background-color: rgb(255, 255, 255);
            transform: scale(1.05);
        }

        /* Tabel */
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
            transform: scale(0.98);
            animation: tableZoom 0.5s ease-out forwards;
        }

        /* Animasi Zoom pada Tabel */
        @keyframes tableZoom {
            0% {
                transform: scale(0.98);
                opacity: 0;
            }

            100% {
                transform: scale(1);
                opacity: 1;
            }
        }

        th,
        td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #4CAF50;
            color: white;
            font-weight: bold;
        }

        tr:hover {
            background-color: #f1f1f1;
            transition: background-color 0.3s ease;
        }

        /* Link */
        a {
            text-decoration: none;
            color: #4CAF50;
            font-weight: bold;
            transition: color 0.3s;
        }

        a:hover {
            color: #45a049;
        }

        /* Tombol Hapus dan Edit */
        .action-button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s, transform 0.3s;
            font-size: 14px;
            margin: 0 5px;
        }

        .action-button:hover {
            background-color: rgb(255, 255, 255);
            transform: scale(1.05);
        }

        .delete-button {
            background-color: #f44336;
            color: white;
        }

        .delete-button:hover {
            background-color: #d32f2f;
        }

        /* Responsiveness */
        @media (max-width: 768px) {
            body {
                padding: 20px;
            }

            h1 {
                font-size: 1.5rem;
            }

            .add-button {
                width: 100%;
                margin: 10px 0;
            }

            table {
                width: 100%;
                margin: 10px 0;
            }

            th,
            td {
                padding: 8px;
            }

            th {
                font-size: 14px;
            }

            td {
                font-size: 14px;
            }

            .add-button {
                font-size: 18px;
            }
        }
    </style>
</head>

<body>
    <h1>Data Pengeluaran</h1>
    <a href="{{ route('expenses.create') }}" class="add-button">Tambah Pengeluaran</a>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Nominal</th>
                <th>Tanggal</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($expenses as $key => $expense)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $expense->title }}</td>
                <td>Rp {{ number_format($expense->amount, 2) }}</td>
                <td>{{ $expense->date }}</td>
                <td>{{ $expense->description }}</td>
                <td>
                    <a href="{{ route('expenses.edit', $expense->id) }}" class="action-button">Edit</a>
                    <form action="{{ route('expenses.destroy', $expense->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="action-button delete-button">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>