<table class="table">
    @if(count($data) > 0)
        <thead>
            <tr>
                <th>Product</th>
                <th>Quantity</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $key => $row)
            <tr> 
                <td data-label="Product" class="fw-bold">
                    {{ ucwords($row->name??'-') }}
                </td>                                
                <td data-label="USD">
                    {{ $row->total_quantity_sold??'0' }}
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
