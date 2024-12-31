<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales Visit Report</title>
    <style>
        /* General Styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f9;
            margin: 0;
            padding: 0;
            color: #333;
        }
        h1 {
            text-align: center;
            margin: 30px 0;
            color: #333;
        }

        /* Table Styling */
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #007bff;
            color: #fff;
            font-size: 16px;
        }

        td {
            font-size: 14px;
            color: #555;
        }

        /* Zebra Striping for rows */
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        /* Hover Effect on Rows */
        tr:hover {
            background-color: #f1f1f1;
        }

        /* Column Width Adjustment */
        th:nth-child(1), td:nth-child(1) {
            width: 5%;
        }
        th:nth-child(2), td:nth-child(2) {
            width: 15%;
        }
        th:nth-child(3), td:nth-child(3) {
            width: 15%;
        }
        th:nth-child(4), td:nth-child(4) {
            width: 10%;
        }
        th:nth-child(5), td:nth-child(5) {
            width: 10%;
        }
        th:nth-child(6), td:nth-child(6) {
            width: 20%;
        }
        th:nth-child(7), td:nth-child(7) {
            width: 10%;
        }
        th:nth-child(8), td:nth-child(8) {
            width: 10%;
        }
        th:nth-child(9), td:nth-child(9) {
            width: 10%;
        }

        /* Responsive Table */
        @media (max-width: 768px) {
            th, td {
                padding: 8px;
            }
            th {
                font-size: 14px;
            }
            td {
                font-size: 12px;
            }
        }
    </style>
</head>
<body>
    <h1>Sales Visit Report</h1>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>ID Sales</th>
                <th>Transaction Type</th>
                <th>Location</th>
                <th>Sector</th>
                <th>Address</th>
                <th>Date</th>
                <th>Description</th>
                <th>Proof</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($visits as $visit)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $visit->dataSales->name }}</td>
                    <td>{{ $visit->transactionType->service }}</td>
                    <td>{{ $visit->location }}</td>
                    <td>{{ $visit->sector->name }}</td>
                    <td>{{ $visit->address }}</td>
                    <td>{{ $visit->date }}</td>
                    <td>{{ $visit->description ? 'sudah' : 'belum' }}</td>
                    <td>{{ $visit->file ? 'sudah' : 'belum' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
