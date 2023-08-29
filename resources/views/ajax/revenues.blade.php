<table class="table">
    @if(count($data) > 0)
        <thead>
            <tr>
                <th></th>
                <th>USD</th>
                <th>CAD</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $key => $row)
            <tr> 
                <td data-label="Name" class="fw-bold">
                    {{ ucwords($key) }}
                </td>                                
                <td data-label="USD">
                    {{ $row['USD']??'-' }}
                </td>
                <td data-label="CAD">
                    {{ $row['CAD']??'-' }}
                </td>
            </tr>                   
            @endforeach
        </tbody>
    @else
        <tbody>
            <tr>
            <td>No data found</td>
            </tr>
        </tbody>
    @endif
</table>
