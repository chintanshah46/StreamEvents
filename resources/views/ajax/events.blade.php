<table class="table table-striped">
    @if(count($data) > 0)
        @if($page == 1)
            {{-- <thead>
                <tr>
                    <th></th>
                    <th class="text-center">Events</th>
                </tr>
            </thead> --}}
        @endif
        <tbody id="tbEvents" name="tbEvents" >
            @foreach ($data as $row)
            @php $class = $loop->index % 2 === 0 ? 'odd' : 'even'; @endphp
            <tr class="{{ $class }}" > 
                {{-- <td data-label="Name" class="fw-bold">
                    {{ ucwords($key) }}
                </td>                                 --}}
                <td data-label="read">
                    <input type='checkbox' data-id="{{ $row->id }}" data-type="{{ $row->type }}" />
                </td>
                <td data-label="event">
                    @switch($row->type)
                        @case('donations')
                            <p>
                                {{ $row->user }} donated {{ $row->amount }} {{ $row->cur }} to you!
                                <br/>
                                "{{ $row->message }}"
                            </p>
                            @break
                        @case('followers')
                            <p>{{ $row->user }} followed you!</p>
                            @break
                        @case('sales')
                            <p>{{ $row->user }} bought ({{ ucwords($row->product_name) }}) from you for {{ $row->amount }} {{ $row->cur }}!</p>
                            @break
                        @case('subscribers')
                            <p>{{ $row->user }} ({{ $row->subscription }}) subscribed to you!</p>
                            @break                            
                        @default
                            
                    @endswitch
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
