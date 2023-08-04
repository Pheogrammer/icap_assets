<style>
    .table-container {
        width: 100%;
        padding: 20px;
    }

    .styled-table {
        width: 100%;
        border-collapse: collapse;
        border: 1px solid #ccc;
    }

    .styled-table th,
    .styled-table td {
        border: 1px solid #ccc;
        padding: 10px;
        background-color: #f2f2f2;
    }
</style>
<div class="table-container">
    <center>
        <h5>Registered Assets Report</h5>

    </center>
    <table class="styled-table">
        <thead>
            <tr>
                <th>SN</th>
                <th>Name</th>
                <th>Asset Number</th>
                <th>Kind</th>
                <th>Purchased On</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @php
                $i = 1;
            @endphp
            @foreach ($assets as $item)
                <tr>
                    <td>{{ $i }}</td>
                    <td>{{ $item->asset_name }}</td>
                    <td>{{ $item->asset_number }}</td>
                    <td>{{ $item->kind->name }}</td>
                    <td>{{ $item->purchase_date }}</td>
                    <td>{{ $item->status }}</td>
                </tr>
                @php
                    $i++;
                @endphp
            @endforeach
        </tbody>
    </table>
</div>
