<table class="table">
    @if($data > 0)
        <tbody>
            <tr>
                <td>Total followers gained: {{ $data }}</td>
            </tr>
        </tbody>
    @else
        <tbody>
            <tr>
                <td>No data found</td>
            </tr>
        </tbody>
    @endif
</table>
